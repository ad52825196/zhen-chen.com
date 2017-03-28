<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if ($this -> isAjax) {
            return $this -> handle('portfolio.project', $data);
        }
        return view('portfolio.project', $data);
    }
}
