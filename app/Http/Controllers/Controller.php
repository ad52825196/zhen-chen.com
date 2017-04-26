<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
}
