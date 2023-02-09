<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controlador de Eps
* @author Andres Felipe Monsalve 
* @date 30/01/2023 
*/
class epsController extends CI_Controller {
        
    /**
     * Constructor de Modelo Eps
     * @author Andres Felipe Monsalve <test@sena.edu.co>
     * @date 30/01/2023 
     */
    public function __construct()
    {
         parent::__construct();

         $this->load->model('epsModel');
    }

    /**
     * Pagina vista Principal de eps
     * @author Andres Felipe Monsalve
     * @date 30/01/2023  
     * @return renderizado de la vista y informacion de los usuarios
     */
    public function index(){
        $data = array('data'=>$this->epsModel->getUsers());   
        $this->load->view('eps/initialEps',$data);
    }

    /**
     * Vista agregar una nueva eps
     * @author Andres Felipe Monsalve 
     * @date 30/01/2023  
     */
    public function add(){
        $this->load->view('eps/addEps');
    }

    /**
     * Funcion Guardar eps
     * @author Andres Felipe Monsalve 
     * @date 30/01/2023  
     * @param {array} $_POST Estructura del formulario
     *      {string} name_eps Nombre de la eps
     *      {string} email Email de la eps
     *      {string} direction Dirección de la eps
     * @return {return} Redireccionamiento 
     */
    public function save(){
        $name_eps = $this->input->post('name_eps');
        $email = $this->input->post('email');
        $direction = $this->input->post('direction');

        /**
         * Validaciones y requerimientos de los campos
         */
        $this->form_validation->set_rules('name_eps', 'Nombre Eps', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'required|min_length[3]');
        $this->form_validation->set_rules('direction', 'Direccion', 'required|min_length[6]');            

        //Si la validacion es falsa redirije a la pagina agregar, si no guarde los cambios en el areglo.
        if ($this->form_validation->run() == FALSE){
            $this->load->view('eps/addEps');
        }else{

            $data = array(
                'name_eps'=>$name_eps,
                'email'=>$email,  
                'direction'=>$direction,
            );
            // Guardar en data y mostras mensaje si se ejecuta correctamente.
            $this->epsModel->saveDb($data);
            $this->session->set_flashdata('success', 'Se guardaron las datos correctamente');
            redirect(base_url('epss'));
        }

    }

    /**
     * Funcion Eliminar
     * @author Andres Felipe Monsalve 
     * @date 27/01/2023 
     * @param {int} $id doctores
     */
    public function delete($id)
    {
        $this->epsModel->delete($id,'id');
        $this->session->set_flashdata('success','La eps se elimino correctamente');
        redirect(base_url('epss'));
    }

    /**
     * Campo que vamos a editar
     * @author Andres Felipe Monsalve 
     * @date 27/01/2023 
     * @param {int} $id de tabla doctores 
     */
    public function indexEdit($id)
    {   
        $data = $this->epsModel->getUser($id);
        $this->load->view('eps/editEps',[
            'data' => $data
        ]);
    }

    /**
     * Actualizar algun campo
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id doctor
     * @return filas afectadas
     */
    public function update($id)
    {
        $name_eps = $this->input->post('name_eps');
        $email = $this->input->post('email');
        $direction = $this->input->post('direction');

        $data = $this->epsModel->getUser($id);

        $validateEmail='';
        if($email!=$data['email']){
    //  $validateEmail='|required|min_length[3],[user.email]';
        }

        /**
         * Validaciones y requerimientos de los datos
         */
        $this->form_validation->set_rules('name_eps', 'Nombre Eps', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'required|min_length[3]'.$validateEmail);
        $this->form_validation->set_rules('direction', 'Direccion', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE){
        }else{
            $data = array(
               'name_eps'=>$name_eps,
               'email'=>$email,  
               'direction'=>$direction,
            );

            /**
             * Actuaizar datos y alerta del proceso si se ejecuto correctamente
             */
            $this->epsModel->update($data, $id);
            $this->session->set_flashdata('success', 'Se actualizaron las datos correctamente');
            redirect(base_url('epss')); 
        }
    }
}
