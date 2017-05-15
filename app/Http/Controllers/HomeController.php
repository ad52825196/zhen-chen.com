<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class HomeController extends Controller
{

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

    public function me() {
        $data['keywords'] = 'Me, CV, 简历, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'Me | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/me';
        $data['pageIdentifier'] = 'me';

        // avatar
        $email = "chenzhen42@qq.com";
        $email = md5(strtolower(trim($email)));
        $size = 200;
        $data['avatar'] = "//www.gravatar.com/avatar/$email?s=$size";

        // cache page views
        $minutes = 1;
        $table_posts = DB::table('posts');
        $data['pageview'] = Cache::remember("pageview.{$this -> path}", $minutes, function() use ($table_posts) {
            return $table_posts -> where('path', $this -> path) -> value('pageview');
        });

        if ($this -> isAjax) {
            return $this -> handle('me', $data);
        }
        return view('me', $data);
    }

    public function cv() {
        $pathToFile = public_path() . DIRECTORY_SEPARATOR . 'Zhen Chen - CV.pdf';
        try {
            return response() -> download($pathToFile);
        } catch (Exception $e) {
            abort(404);
        }
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
            return $table_changelogs -> orderBy('time', 'asc') -> get();
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
