<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo Doctores
 * @author Andres Felipe Monsalve
 * @date 31/01/2023 
 */
class dbDoc extends CI_Model {    
    
    public $tDoctors;
    function __construct() {
        parent::__construct();
        
        $this->tDoctors = T_DOCTORS;
    }
    /**
     * funcion guardar en BD
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param type $data
     */
    public function saveDb($data)
        {
        $this->db->query('ALTER TABLE doctores AUTO_INCREMENT 1');
        $this->db->insert($this->tDoctors, $data);
        $this->db->error();
        }
    
    /**
     * Funcion traer doctores de BD
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @return type
     */    
    public function getUsersDb()
        {
        $this->db->select('*');
        $this->db->from('doctores');
        $results=$this->db->get();
        return $results->result_array();
    }
    
    /**
     * Funcion traer datos doctores 
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id doctor
     * @return type
     */    
    public function getUser($id)
        {
        $this->db->select('d.id, d.full_nameDoc, d.email, d.num_doc');
        $this->db->from('doctores d');
        $this->db->where('d.id',$id);
        $results=$this->db->get();
        return $results->row_array();
        }
    
    /**
     * Funcion Actualizar
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param type $data
     * @param {int} $id dcotor
     */  
    public function update($data,$id)
        {
        $this->db->where('id',$id);
        $this->db->update('doctores', $data);
        }
        
    /**
     * Funcion Eliminar
     * @author Andres Felipe Monsalve
     * @date 31/01/2023 
     * @param {int} $id doctor
     */  
    public function delete($id)
        {
        $this->db->where('id',$id);
        $this->db->delete('doctores');
        }
    
	
}

