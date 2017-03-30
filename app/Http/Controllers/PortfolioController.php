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
        $perPage = 30;
        $page = $this -> request -> input('page', 1);
        $table_videos = DB::table('videos');
        $videos = Cache::remember("videos.$page", $minutes, function() use ($table_videos, $perPage) {
            return $table_videos -> orderBy('id', 'desc') -> paginate($perPage);
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
        $data['links'] = $videos -> links();

        if ($this -> isAjax) {
            return $this -> handle('portfolio.video', $data);
        }
        return view('portfolio.video', $data);
    }

    public function translation() {
        $data['keywords'] = 'Translation, 汉化, 蒹葭汉化组, Zhen Chen, 陈桢, 飞越彩虹, Rainbow Studio, 彩虹工作室';
        $data['title'] = 'Translation | ' . env('APP_NAME');
        $data['canonical'] = env('APP_URL') . '/portfolio/translation';
        $data['pageIdentifier'] = 'translation';

        $minutes = 60;
        $table_translations = DB::table('translations');
        $data['translations'] = [];

        if ($this -> isAjax) {
            return $this -> handle('portfolio.translation', $data);
        }
        return view('portfolio.translation', $data);
    }
}
