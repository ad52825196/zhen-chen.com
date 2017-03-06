<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data['keywords'] = 'Zhen Chen, 陈桢, 飞越彩虹';
        $data['title'] = env('APP_NAME') . ' | 飞越彩虹';
        $data['canonical'] = env('APP_URL') . '/';
        $data['pageIdentifier'] = 'index';

        if ($this -> isAjax) {
            return $this -> handle('index', $data);
        }
        return view('index', $data);
    }
}
