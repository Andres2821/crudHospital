<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class logDoctor extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->model('persistence/dbDoc','dbDoc');
    }
    public function getDoctorLog(){
        $data = array('data'=>$this->dbDoc->getUsersDb()); 
        
        return [
            'status' => 200, 
            'message' => 'consulta exitosa', 
            'data' => $data
        ];
    }
}

