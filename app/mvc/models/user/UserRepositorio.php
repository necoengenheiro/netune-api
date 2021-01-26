<?php

namespace app\mvc\models\user;

use atare\turim\db\AbstractRepositorio;

class UserRepositorio extends AbstractRepositorio{
    
    public function __construct(){
        parent::__construct('app\mvc\models\user\User');
    }

    public function insert($user){
        return $this->getRepositorio()->insert('users', $user);
    }

    public function fetch($uuid){
        return $this->getRepositorio()->fetch('SELECT * FROM users WHERE uuid = :uuid', array(
            ':uuid' => $uuid
        ));
    }

    public function fetchall(){
        return $this->getRepositorio()->fetchAll('SELECT * FROM users ORDER BY nome');
    }
    
}