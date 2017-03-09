<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $request;
    protected $isAjax;

    public function __construct(Request $request) {
        $this -> request = $request;
        $this -> isAjax = $request -> ajax() || $request -> pjax();
    }

    protected function handle($view, $data) {
        $sections = view($view, $data) -> renderSections();

        return $sections['title'] . $sections['body'];
    }

    public function index() {
        $data['keywords'] = 'Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = env('APP_NAME') . ' | 飞越彩虹';
        $data['canonical'] = env('APP_URL') . '/';
        $data['pageIdentifier'] = 'index';

        // cache number of rows in table 'quote'
        $minutes = 60;
        $table = DB::table('quote');
        $count = Cache::remember('quote.count', $minutes, function() use ($table) {
            return $table -> count();
        });
        // generate random quote id of the day
        $today = Carbon::today() -> timestamp;
        srand($today);
        $id = rand(1, $count);
        // cache quote of the day
        $data['quote'] = Cache::remember("quote.$id", Carbon::tomorrow(), function() use ($table, $id) {
            return $table -> where('id', $id) -> value('quote');
        });

        if ($this -> isAjax) {
            return $this -> handle('index', $data);
        }
        return view('index', $data);
    }
}
