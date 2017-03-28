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
        $data['videos'] = [];

        if ($this -> isAjax) {
            return $this -> handle('portfolio.video', $data);
        }
        return view('portfolio.video', $data);
    }
}
