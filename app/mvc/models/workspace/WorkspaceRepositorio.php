<?php

namespace app\mvc\models\workspace;

use atare\turim\db\AbstractRepositorio;

class WorkspaceRepositorio extends AbstractRepositorio{
    
    public function __construct(){
        parent::__construct('app\mvc\models\workspace\Workspace');
    }

    public function fetch($id){
        return $this->getRepositorio()->fetch('SELECT * FROM workspaces WHERE id = :id', array(
            ':id' => $id
        ));
    }

    public function insertMusica($workspaceId, $musicaId){
        $this->getRepositorio()->insert('workspace_musica', array(
            'workspaceId' => $workspaceId,
            'musicaId' => $musicaId
        ));
    }

    public function clearMusicas($workspaceId){
        $this->getRepositorio()->execute('DELETE FROM workspace_musica WHERE workspaceId = :w', array(
            ':w' => $workspaceId
        ));
    }

    public function removeMusica($workspaceId, $musicaId){
        $this->getRepositorio()->execute('DELETE FROM workspace_musica WHERE workspaceId = :w AND musicaId = :m', array(
            ':w' => $workspaceId,
            ':m' => $musicaId
        ));
    }

    public function fetchMusicas($workspaceId){
        return $this->getRepositorio()->fetchAll('
        SELECT musicas.*
        FROM workspace_musica AS wm
        INNER JOIN musicas ON musicas.id = wm.musicaId
        WHERE wm.workspaceId = :id AND wm.musicaId = musicas.id', array(
            ':id' => $workspaceId
        ));
    }

    public function fetchall(){
        return $this->getRepositorio()->fetchAll('SELECT * FROM workspaces');
    }
    
}