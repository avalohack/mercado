<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo extends CI_Controller 
{
//constructor
	public function __construct()
		{  //framework en adelante FW
			//invpcacion del parent ::
			parent ::__construct();
			//invoco libreria
			$this->load->helper('form');//funciones formlario FW
			$this->load->library('form_validation');//formatea los valores pasados de un formulario
			$this->load->helper('url_helper');//url ayudas
			$this->load->model('login_model');

		}
	
	public function index()
	{
		$this->load->view('nuevo_vista');
	}

	public function nuevo()
	{
		$vector=array();
		
		$this->form_validation->set_rules('correo', 'correo', 'required|trim',array('required' => 'Campo %s Obligatorio '));
		
		
			if ($this->form_validation->run() == FALSE)
				{
					//vista
				}
			else
				{
					echo $clave = $this->input->post('clave');
					echo $clave2 = $this->input->post('clave2');
					
					if ($clave == $clave2) 
					{
						$agregar = $this->login_model->nuevo();
						//var_dump($agregar);
						$vector['mensaje'] = "Usuario creado con exito";

					}
					else
					{
						$vector['mensaje'] = "clave no coincide";
					}
					
					//vista
					//
					//var_dump($agregar);

				}
			///vector
					$this->load->view('nuevo_vista',$vector);
			
	}

}
//$vector["mensaje"]="Correo o clave incorrecto. Intente de nuevo"; 
//			$this->load->view('nuevo_vista',$vector);
