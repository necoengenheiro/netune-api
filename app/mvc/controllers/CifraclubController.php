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

    public function search($query){
        $query = urlencode($query);
        $content = file_get_contents("https://studiosolsolr-a.akamaihd.net/cc/h2/?q=$query");
        $response = Wrapper::ok([
            'numFound' => 0
        ]);

        if(strlen($content) > 5){
            $json = json_decode(substr($content, 1, strlen($content) - 3));
            $response = Wrapper::ok($json->response);
        }

        return $response;
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