<?php

namespace app\mvc\controllers;

use atare\turim\controller\Controller;
use atare\turim\session\Auth;
use atare\turim\cache\Cache;
use atare\turim\lib\Wrapper;

class CifraclubController extends Controller{

    public function __construct(){
        parent::__construct();

        // $this->filter->register('*', array());
    }

    public function get($url){
        try {
            $html = file_get_contents($url);
            $i = strpos($html, '<pre>');
            if($i === false){
                return [];
            }

            $f = strpos($html, '</pre>', $i + 1);
            if($f === false){
                return [];
            }

            $lyrics = strip_tags(substr($html, $i, $f - $i));
            return Wrapper::ok($lyrics);
        } catch (\Throwable $th) {
            return [];
        }
    }

}