<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $request;
    protected $url;
    protected $path;
    protected $isAjax;

    public function __construct(Request $request) {
        $this -> request = $request;
        $this -> url = $request -> url();
        $this -> path = $request -> path();
        $this -> isAjax = $request -> ajax() || $request -> pjax();

        // record pageview
        if (strlen($this -> path) <= 255) {
            DB::transaction(function() {
                $table = DB::table('posts');
                $exists = $table -> where('path', $this -> path) -> exists();
                if ($exists) {
                    $table -> where('path', $this -> path) -> increment('pageview');
                } else {
                    $table -> insert(['path' => $this -> path, 'pageview' => 1]);
                }
            }, 5);
        }
    }

    protected function handle($view, $data) {
        $sections = view($view, $data) -> renderSections();

        return $sections['title'] . $sections['body'];
    }

    protected function getContentByLocale($name, $row) {
        $result = $row -> {$name . '_' . App::getLocale()};
        if ($result === null) {
            $default_lang = $row -> default_lang;
            $result = $row -> {$name . '_' . $default_lang};
        }
        return $result;
    }

    public function index() {
        $data['keywords'] = 'Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = env('APP_NAME') . ' | 飞越彩虹';
        $data['canonical'] = env('APP_URL') . '/';
        $data['pageIdentifier'] = 'index';

        // cache number of rows in table 'quotes'
        $minutes = 60;
        $table_quotes = DB::table('quotes');
        $count = Cache::remember('quotes.count', $minutes, function() use ($table_quotes) {
            return $table_quotes -> count();
        });
        // generate random quote id of the day
        $today = Carbon::today() -> timestamp;
        srand($today);
        $id = rand(1, $count);
        // cache quote of the day
        $data['quote'] = Cache::remember("quote.$id", Carbon::tomorrow(), function() use ($table_quotes, $id) {
            return $table_quotes -> where('id', $id) -> value('quote');
        });

        if ($this -> isAjax) {
            return $this -> handle('index', $data);
        }
        return view('index', $data);
    }

    public function guestbook() {
        $data['keywords'] = 'Guestbook, 留言板, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'Guestbook | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/guestbook';
        $data['pageIdentifier'] = 'guestbook';

        if ($this -> isAjax) {
            return $this -> handle('guestbook', $data);
        }
        return view('guestbook', $data);
    }

    public function status() {
        $data['keywords'] = 'Status, 状态, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'Status | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/status';
        $data['pageIdentifier'] = 'status';

        if ($this -> isAjax) {
            return $this -> handle('status', $data);
        }
        return view('status', $data);
    }

    public function changelog() {
        $data['keywords'] = 'Changelog, 更新日志, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室, University of Auckland, 奥克兰大学, Auckland, 奥克兰';
        $data['title'] = 'Changelog | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/changelog';
        $data['pageIdentifier'] = 'changelog';

        $minutes = 60;
        $table_changelogs = DB::table('changelogs');
        $changelogs = Cache::remember('changelogs', $minutes, function() use ($table_changelogs) {
            return $table_changelogs -> get();
        });
        $result = array();
        foreach ($changelogs as $changelog) {
            $temp['time'] = $changelog -> time;
            $temp['log'] = $this -> getContentByLocale('log', $changelog);
            $result[] = $temp;
        }
        $collection = collect($result);
        $data['changelogs'] = $collection -> groupBy('time') -> groupBy(function ($item, $key) {
            return substr($key, 0, 4);
        }) -> toArray();

        if ($this -> isAjax) {
            return $this -> handle('changelog', $data);
        }
        return view('changelog', $data);
    }
}
