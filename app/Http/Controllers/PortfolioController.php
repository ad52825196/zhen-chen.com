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
        $table_projects = DB::table('projects') -> join('projects_category', 'projects.category_id', '=', 'projects_category.id');
        $projects = Cache::remember('projects', $minutes, function() use ($table_projects) {
            return $table_projects -> select('projects.id', 'projects.default_lang', 'projects.name_en', 'projects.name_zh', 'projects.desc_en', 'projects.desc_zh', 'projects.link', 'projects.source', 'projects.image', 'projects_category.category') -> orderBy('category', 'asc') -> get();
        });
        $result = array();
        foreach ($projects as $project) {
            $temp['id'] = $project -> id;
            $temp['category'] = $project -> category;
            $temp['name'] = $this -> getContentByLocale('name', $project);
            $temp['desc'] = $this -> getContentByLocale('desc', $project);
            $temp['link'] = $project -> link;
            $temp['source'] = $project -> source;
            $temp['image'] = $project -> image;
            $result[] = $temp;
        }
        $collection = collect($result);
        $data['projects'] = $collection -> groupBy('category') -> toArray();

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
        $perPage = 5;
        $page = $this -> request -> input('page', 1);
        $table_translations = DB::table('translations') -> join('translations_role', 'translations.role_id', '=', 'translations_role.id');
        $translations = Cache::remember("translations.$page", $minutes, function() use ($table_translations, $perPage) {
            return $table_translations -> select('translations.id as id', 'translations.default_lang', 'translations.game_en', 'translations.game_zh', 'translations.nickname', 'translations.link', 'translations.image', 'translations_role.role_en', 'translations_role.role_zh') -> orderBy('id', 'desc') -> paginate($perPage);
        });
        $result = array();
        foreach ($translations as $translation) {
            $temp['id'] = $translation -> id;
            $temp['game_en'] = $translation -> game_en;
            $temp['game_zh'] = $translation -> game_zh;
            $temp['role'] = $this -> getContentByLocale('role', $translation);
            $temp['nickname'] = $translation -> nickname;
            $temp['link'] = $translation -> link;
            $temp['image'] = $translation -> image;
            $result[] = $temp;
        }
        $data['translations'] = $result;
        $data['links'] = $translations -> links();

        if ($this -> isAjax) {
            return $this -> handle('portfolio.translation', $data);
        }
        return view('portfolio.translation', $data);
    }
}
