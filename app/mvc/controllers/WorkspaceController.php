<?php

namespace app\mvc\controllers;

use atare\turim\controller\Controller;
use atare\turim\session\Auth;
use atare\turim\cache\Cache;
use atare\turim\lib\Wrapper;

use app\mvc\models\workspace\Workspace;
use app\mvc\models\workspace\WorkspaceRepositorio;

class WorkspaceController extends Controller{

    public function __construct(){
        parent::__construct();

        // $this->filter->register('*', array());
    }

    public function insert($workspace){
        return (new WorkspaceRepositorio())->insert($workspace);
    }

    private function currentWorkspace(){
        return (new WorkspaceRepositorio())->fetch(1);
    }

    public function current(){
        $ws = $this->currentWorkspace();
        $ws->musicas = (new WorkspaceRepositorio())->fetchMusicas($ws->id);

        return $ws;
    }
    
    public function all(){
        return (new WorkspaceRepositorio())->fetchall();
    }
    
    public function save($ws){
        (new WorkspaceRepositorio())->clearMusicas($ws->id);

        for ($i = 0 ; $i < count($workspace->musicas); $i++) {
            (new WorkspaceRepositorio())->insertMusica($ws->id, $workspace->musicas[$i]->id);
        }

        return array();
    }
    
    public function get($id = 0){
        $ws = (new WorkspaceRepositorio())->fetch($id);
        $ws->musicas = (new WorkspaceRepositorio())->fetchMusicas($ws->id);
        
        return $ws;
    }

}