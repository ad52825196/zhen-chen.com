<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class GalleryController extends HomeController
{
    public function people() {
        $data['keywords'] = 'People, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'People | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/gallery/people';
        $data['pageIdentifier'] = 'people';

        $minutes = 60;
        $table_peoples = DB::table('peoples');
        $people = Cache::remember('peoples', $minutes, function() use ($table_peoples) {
            return $table_peoples -> get();
        });
        $result = array();
        foreach ($people as $person) {
            $temp['name'] = $this -> getContentByLocale('name', $person);
            $temp['link'] = $person -> link;
            $result[] = $temp;
        }
        $data['people'] = $result;

        if ($this -> isAjax) {
            return $this -> handle('gallery.people', $data);
        }
        return view('gallery.people', $data);
    }
}
