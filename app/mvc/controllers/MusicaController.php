<?php

namespace app\mvc\controllers;

use atare\turim\controller\Controller;
use atare\turim\session\Auth;
use atare\turim\cache\Cache;
use atare\turim\lib\Wrapper;

use app\mvc\models\musica\Musica;
use app\mvc\models\musica\MusicaRepositorio;

class MusicaController extends Controller{

    public function __construct(){
        parent::__construct();

        // $this->filter->register('*', array());
    }

    public function insert($musica){
        (new MusicaRepositorio())->insert($musica);

        return array();
    }

    public function get($id = 0){
        return (new MusicaRepositorio())->fetch($id);
    }

    public function update($musica){
        (new MusicaRepositorio())->update($musica);

        return array();
    }
    
    public function all(){
        return (new MusicaRepositorio())->fetchall();
    }

}