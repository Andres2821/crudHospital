<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo usuarios
 * @author Andres Felipe Monsalve
 * @date 31/01/2023
 */
class userModel extends CI_Model {
    
    /**
     * Funcion guardar en BD
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param type $data
     */
    public function saveDb($data){
        $this->db->insert('pacientes', $data);

        $error = $this->db->error();
        if($error['message']){
            throw new Exception($error['message'].' class:'.__CLASS__.' line:'.__LINE__);
        }
    }
    
    /**
     * Funcion traer pacientes BD
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @return {arreglo}
     */    
    public function getUsers()
    {
        $this->db->select('a.*,b.name_eps');
        $this->db->join('eps b', 'b.id = a.eps_assigned');
        $this->db->from('pacientes a');
        $results=$this->db->get();

        $error = $this->db->error();
        if($error['message']){
            throw new Exception($error['message'].' class:'.__CLASS__.' line:'.__LINE__);
        }
        return $results->result_array();
    }
    
    /**
     * Funcion traer id y nombre de la eps de la taba EPS
     * @author Andres felipe Monsalve
     * @date 01/02/2023
     * @return type
     */    
    public function getEps()
    {
        $this->db->select('id,name_eps');
        $this->db->from('eps ');
        $results=$this->db->get();
        $error = $this->db->error();
        if($error['message']){
            throw new Exception($error['message'].' class:'.__CLASS__.' line:'.__LINE__);
        }
        return $results->result_array();
    }
        
    /**
     * Conseguir Datos de paciente
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id
     * @return type
     */
    public function getUser($id)
    {
        $this->db->select('u.id, u.full_name, u.email, u.numeroDocumento,u.eps_assigned');
        $this->db->from('pacientes u');
        $this->db->where('u.id',$id);
        $results=$this->db->get();
        return $results->row_array();
    }
    
    /**
     * Funcion actualizar DB
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {type} $data
     * @param {int} $id
     */
    public function update($data,$id){
            $this->db->update('pacientes', $data,['id' => $id]);
    }
         
    /**
     * Funcion de eliminar
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id de paciente
     */
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('pacientes');
    }
        
    /**
     * Funcion actulizar contraseña
     * @param {array} $data informacion de contraseña a actualizar
     * @param {int} $id id de usuario
     */
    public function updatePassword($data,$id)
    {
        $this->db->update('pacientes', $data,['id' => $id]);
    }
}