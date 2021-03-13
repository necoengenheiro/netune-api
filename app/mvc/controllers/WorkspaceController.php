<?php

namespace app\mvc\controllers;

use atare\turim\controller\Controller;
use atare\turim\session\Auth;
use atare\turim\cache\Cache;
use atare\turim\lib\Wrapper;

use app\mvc\models\workspace\Workspace;
use app\mvc\models\workspace\WorkspaceRepositorio;

use app\mvc\models\user\User;
use app\mvc\models\user\UserRepositorio;

use \Exception;

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

    public function delete($workspace = null){
        $user = (new UserRepositorio())->fetch($this->request->get->query('userid'));
        if($user == false){
            throw new Exception("Você não possui permissão para remover este workspace", 1);
        }
        
        $workspace = (new WorkspaceRepositorio())->fetch($workspace->id);
        if($workspace->userId == $userid){
            throw new Exception("Você não possui permissão para remover este workspace", 1);
        }

        (new WorkspaceRepositorio())->delete($workspace->id);

        return [];
    }
    
    public function all(){
        return (new WorkspaceRepositorio())->fetchall();
    }
    
    public function save($ws){
        (new WorkspaceRepositorio())->clearMusicas($ws->id);

        for ($i = 0 ; $i < count($ws->musicas); $i++) {
            (new WorkspaceRepositorio())->insertMusica($ws->id, $ws->musicas[$i]->id, $i);
        }

        return array();
    }
    
    public function get($id = 0){
        $ws = (new WorkspaceRepositorio())->fetch($id);
        $ws->musicas = (new WorkspaceRepositorio())->fetchMusicas($ws->id);
        
        return $ws;
    }

}