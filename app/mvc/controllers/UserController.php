<?php

namespace app\mvc\controllers;

use atare\turim\controller\Controller;
use atare\turim\session\Auth;
use atare\turim\cache\Cache;
use atare\turim\lib\Wrapper;

use app\mvc\models\user\User;
use app\mvc\models\user\UserRepositorio;

class UserController extends Controller{

    public function __construct(){
        parent::__construct();

        // $this->filter->register('*', array());
    }

    public function insert($user){
        (new UserRepositorio())->insert($user);

        return $user;
    }

    public function get($uuid){
        $user = (new UserRepositorio())->fetch($uuid);;
        if($user == false) return Wrapper::error('Usuário não existe');
        return $user;
    }

    public function all(){
        return (new UserRepositorio())->fetchall();
    }

    public function update($user){
        (new UserRepositorio())->update($user);
        
        return $this;
    }

    public function changeWorkspace($user){
        (new UserRepositorio())->updateWorkspace($user);
        return $user;
    }

}