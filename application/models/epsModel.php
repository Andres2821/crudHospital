<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo eps
 * @author Andres Felipe Monsalve
 * @date 31/01/2023 
 */
class epsModel extends CI_Model {    
    
    /**
     * funcion guardar en BD
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param type $data
     */
    public function saveDb($data)
    {
        $this->db->insert('eps', $data);
        $this->db->error();
    }
    
    /**
     * Funcion conseguir doctores BD
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @return type
     */    
    public function getUsers()
        {
        $this->db->select('*');
        $this->db->from('eps');
        $results=$this->db->get();
        return $results->result_array();
        }
    
    /**
     * Funcion traer eps 
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id doctor
     * @return type
     */    
    public function getUser($id)
    {
        $this->db->select('e.id, e.name_eps, e.email, e.direction');
        $this->db->from('eps e');
        $this->db->where('e.id',$id);
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
        $this->db->update('eps', $data);
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
        $this->db->delete('eps');
    }
}

