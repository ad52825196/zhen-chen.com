<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PortfolioController extends HomeController
{
    public function project() {
        $data['keywords'] = 'Project, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'Project | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/portfolio/project';
        $data['pageIdentifier'] = 'project';

        $minutes = 60;
        $table_projects = DB::table('projects');
        $data['projects'] = [];

        if ($this -> isAjax) {
            return $this -> handle('portfolio.project', $data);
        }
        return view('portfolio.project', $data);
    }

    public function video() {
        $data['keywords'] = 'Video, 游戏, 解说, 视频, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'Video | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/portfolio/video';
        $data['pageIdentifier'] = 'video';

        $minutes = 60;
        $table_videos = DB::table('videos');
        $videos = Cache::remember('videos', $minutes, function() use ($table_videos) {
            return $table_videos -> orderBy('id', 'desc') -> get();
        });
        $result = array();
        foreach ($videos as $video) {
            $temp['id'] = $video -> id;
            $temp['name'] = $video -> name;
            $temp['source'] = $video -> source;
            switch ($video -> source) {
                case 'youku':
                    $temp['link'] = 'http://v.youku.com/v_show/id_' . $video -> link . '.html';
                    $temp['link_name'] = '优酷';
                    break;
                case 'youtube':
                    $temp['link'] = 'https://www.youtube.com/watch?v=' . $video -> link;
                    $temp['link_name'] = 'YouTube';
                    break;
                default:
                    $temp['link'] = $video -> link;
                    $temp['link_name'] = $video -> source;
                    break;
            }
            $result[] = $temp;
        }
        $data['videos'] = $result;

        if ($this -> isAjax) {
            return $this -> handle('portfolio.video', $data);
        }
        return view('portfolio.video', $data);
    }
}
