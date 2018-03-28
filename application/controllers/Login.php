<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
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
		$this->load->view('login_vista');
	}

	public function acceso()
	{
		//acceso inici		
		// invocar la funcion del modelo que me permite validar el usuario
		$data=$this->login_model->validar_acceso();
		// en la variable saldra el vector que contenga el resultado de la funcion  validar_acceso() de bd login_model.php
		if (count($data)>0) 
			{ 
				// puede continuar 	// mandar a la vista principal del sitio o el app  	//asociar las variables de session que son basadas en el objeto vetor $data //$this->load->view('principal'); //print_r($data);
				$usuario_session=array
							(
								"correo"=>$data[0]["correo"],
								"nombre_empresa"=>$data[0]["nombre_empresa"],
								"cantidad_factura"=>$data[0]["cantidad_factura"],
								"id_empresa"=>$data[0]["id_empresa"]
							);
							//var_dump($usuario_session);
							//para crear las variables de session se usa la libreria set_userdata. este metodo pide que los valores sean enviados en un vector o array
					$this->session->set_userdata($usuario_session);
					//redirect hace parte de una libreria que se llama url_helper
					redirect('lista');
			} 
		else 
			{
				// mandar a la pagina de inicio
				//con mensaje que diga "usuario o clave incorrecto"
				// los datos de salida o impresion de una vista se pasan por medio de vectores
				$vector["mensaje"]="Correo o clave incorrecto. Intente de nuevo"; 			
				$this->load->view('login_vista',$vector);
			}

	}
	//acceso fin
		
}
