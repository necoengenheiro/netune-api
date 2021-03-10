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

        $this->filter->register('*', array('cors'));
    }

    public function insert($musica){
        $musica->createdby = $this->request->get->query('userid');
        (new MusicaRepositorio())->insert($musica);

        return array();
    }

    public function get($id = 0){
        return (new MusicaRepositorio())->fetch($id);
    }
    
    public function update($musica){
        $userid = $this->request->get->query('userid');
        $current = (new MusicaRepositorio())->fetch($musica->id);

        // if($current->createdby != $userid){
        //     return Wrapper::error('Somente o criador da cifra pode altera-la.');
        // }

        (new MusicaRepositorio())->update($musica);

        return array();
    }
    
    public function all(){
        return (new MusicaRepositorio())->fetchall();
    }

}