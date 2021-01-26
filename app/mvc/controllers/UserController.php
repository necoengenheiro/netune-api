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
        return (new UserRepositorio())->fetch($uuid);
    }

    public function all(){
        return (new UserRepositorio())->fetchall();
    }

}