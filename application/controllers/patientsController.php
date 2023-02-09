<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de Pacientes
 * @author Andres Felipe Monsalve 
 * @date 30/01/2023 
 */
 class patientsController extends CI_Controller {

    /**
     * Constructor de Modelo
     * @author Andres Felipe Monsalve 
     * @date 30/01/2023 
     */
    public function __construct(){
         parent::__construct();

         $this->load->model('userModel');
    }
    /**
     * Cargar vista de los modulos
     * @author Andres Felipe Monsalve
     * @date 06/02/2023
     */
    public function module(){
         $this->load->view('viewsInitial/mainView');
    }

    /**
     * Vista inicial de pacientes
     * @author Andres Felipe Monsalve
     * @date 31/01/2023  
     */
    public function patients(){
        $data = $this->userModel->getUsers(); 
        $this->load->view('user/initial',[
            'data' => $data
        ]);
    }

    /**
     * Consulta para la lista de las Eps en el select
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     */
    public function add(){      
        $listEps = $this->userModel->getEps();
        $this->load->view('user/add', [
            'listEps' => $listEps
            ]);
    }

    /**
     * Funcion guardar
     * @author Andres Felipe Monsalve 
     * @date 30/01/2023 
     */
    public function save(){
        $fullName = $this->input->post('fullName');
        $email = $this->input->post('email');
        $numeroDocumento = $this->input->post('numeroDocumento');
        $eps_assigned = $this->input->post('eps_assigned');
        $password = $this->input->post('password');
        $repeatpassword = $this->input->post('repeatpassword');

    
        //Validaciones y requerimientos de los campos
     
        $this->form_validation->set_rules('fullName', 'Nombre completo', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'required|min_length[3]');
        $this->form_validation->set_rules('numeroDocumento', 'Numero Documento', 'required|min_length[6]');
        $this->form_validation->set_rules('eps_assigned', 'Eps Asignada', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('repeatpassword', 'Repite la Contraseña','required|matches[password]');
        
        //si la validacion es falsa cargar la vista agregar si no guardeme en el arreglo.
        if ($this->form_validation->run() == FALSE){
            $this->load->view('user/add');
        }else{

        $data = [
            'full_name'=>$fullName,
            'email'=>$email,  
            'numeroDocumento'=>$numeroDocumento,
            'eps_assigned'=>$eps_assigned,
            'password'=> md5($password)
        ];

        $this->userModel->saveDb($data);
        $this->session->set_flashdata('success', 'Se guardaron las datos correctamente');
        redirect(base_url('users'));
        }
    }

    /**
     * Funcion Eliminar paciente
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id id del paciente
     */
    public function delete($id){
        $this->userModel->delete($id,'id');
        $this->session->set_flashdata('success','El paciente se elimino correctamente');
        redirect(base_url('users'));
    }

    /**
     * Cargar la vista editar paciente y la lista de las eps
     * @author Andres Felipe Monsalve
     * @date 30/01/2023
     * @param {int} $id id del paciente
     */
    public function editPatients($id){   
        $data = $this->userModel->getUser($id);
        $listEps = $this->userModel->getEps();
        $this->load->view('user/edit',[
            'data' => $data,
            'listEps' => $listEps
        ]);
    }

    /**
     * Funcion Actualizar datos de paciente
     * @author Andres Felipe Monsalve
     * @date 30/01/2023
     * @param {int} $id id del paciente
     */
    public function update($id)
    {
        $fullName = $this->input->post('fullName');
        $email = $this->input->post('email');
        $numeroDocumento = $this->input->post('numeroDocumento');
        $eps_assigned = $this->input->post('eps_assigned');

        $data = $this->userModel->getUser($id);

        //  $validateEmail='';
        if($email!=$data['email']){
            $validateEmail='|required|min_length[3],[user.email]';
        }

        /**
         * Validaciones y requerimientos para actualizar
         */
        $this->form_validation->set_rules('fullName', 'Nombre completo', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Correo Electronico', 'required|min_length[3]');
        $this->form_validation->set_rules('numeroDocumento', 'Numero Documento', 'required|min_length[6]');
        $this->form_validation->set_rules('eps_assigned', 'Eps Asignada', 'required');
        
        //
        if ($this->form_validation->run() == FALSE){
            $this->indexEdit($id);
        }else{
            $data = array(
                'full_name'=>$fullName,
                'email'=>$email,  
                'numeroDocumento'=>$numeroDocumento,
                'eps_assigned'=>$eps_assigned,
            );
            /**
             * Actuaizar datos y alerta del proceso si se ejecuto correctamente
             */ 
            $this->userModel->update($data, $id);
            $this->session->set_flashdata('success', 'Se actualizaron las datos correctamente');
            redirect(base_url('users')); 
        }
    }
    //documentacion y cambiar nombre de la funcion
    public function indexPassword($id){   
        $data = $this->userModel->getUser($id);
        $this->load->view('user/editPassword',['data' => $data]);
    }

    /**
     * Actualizar Contraseña
     * @author Andres Felipe Monsalve
     * @date 31/01/2023
     * @param {int} $id id del paciente
     */
    public function updatePassword($id)
    {
        $password = $this->input->post('password');
        $repeatpassword = $this->input->post('repeatpassword');

        /**
         * Validaciones y requerimientos para  contraseña
         */
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('repeatpassword', 'Repite la Contraseña','required|matches[password]');
        //
        if ($this->form_validation->run() == FALSE){
            $this->indexPassword($id);
        }else{
            $data = array(
                'password'=> md5($password),
            );

            /**
             * Actuaizar datos y alerta del proceso si se ejecuto correctamente
             */ 
            $this->userModel->updatePassword($data, $id);
            $this->session->set_flashdata('success', 'Se actualizo la contraseña del paciente correctamente');
            redirect(base_url('users')); 
        }
    }
      public function consultar(){
         $this->load->view('Angular');
    }
    public function getPatients(){
        $data = $this->userModel->getUsers();
        echo json_encode($data);
    }
}

