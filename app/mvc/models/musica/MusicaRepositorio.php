<?php

namespace app\mvc\models\musica;

use atare\turim\db\AbstractRepositorio;

class MusicaRepositorio extends AbstractRepositorio{
    
    public function __construct(){
        parent::__construct('app\mvc\models\musica\Musica');
    }

    public function insert($musica){
        $this->getRepositorio()->insert('musicas', $musica);
    }

    public function update($musica){
        $this->getRepositorio()->update('musicas', $musica);
    }

    public function fetch($id){
        return $this->getRepositorio()->fetch('SELECT * FROM musicas WHERE id = :id', array(
            ':id' => $id
        ));
    }

    public function fetchall(){
        return $this->getRepositorio()->fetchAll('SELECT * FROM musicas ORDER BY nome');
    }
    
}