<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();

			$this->load->helper('url_helper');
			//si correo no esta definido retorna a login
				if (!$this->session->userdata('correo'))
				 {
					redirect('login');
				 }								
					$this->load->helper('form');//funciones formlario FW
					$this->load->library('form_validation');//formatea los valores pasados de un formulario
					$this->load->helper('url_helper');//url ayudas
					$this->load->model('lista_model');
	}

	public function index()
	{ 		
		 	$this->form_validation->set_rules('producto', 'producto', 'required|trim',array('required' => 'Hola se requiere un %s '));
			if ($this->form_validation->run() == FALSE)
				{}
			else
				{
					//vista
					$agregar = $this->lista_model->agregar();
					//var_dump($agregar);
				}
			$vector["correo"]=$this->session->userdata("correo");
			$vector['tabla'] = $this->lista_model->leer();
			$vector['compartido'] = $this->lista_model->leer_compartido();
			$vector['compartido_con_migo'] = $this->lista_model->compartido_con_migo();
			//var_dump($vector['compartido']);
			$this->load->view('lista',$vector);
	}
	public function compartir()
		{
			$this->form_validation->set_rules('mail', 'mail', 'required|trim',array('required' => 'Hola se requiere un %s para compartir '));

			if ($this->form_validation->run() == FALSE)
			{
				//vista
			}
			else
			{
				//vista
				$agregar = $this->lista_model->compartir();
				//var_dump($agregar);
			}
			$vector["correo"]=$this->session->userdata("correo");
			$vector['tabla'] = $this->lista_model->leer();
			$vector['compartido'] = $this->lista_model->leer_compartido();
			$vector['compartido_con_migo'] = $this->lista_model->compartido_con_migo();
			$this->load->view('lista',$vector);
		
		}
	


	public function eliminar($id,$from)
	{
		if ($from == 1)
			{
				$tabla = 'compartir';
				$eliminar = $this->lista_model->eliminar($id,$tabla);
				//var_dump($eliminar);
			}
		if ($from == 2)
			{
				$tabla = 'producto';
				$eliminar = $this->lista_model->eliminar($id,$tabla);
				//var_dump($eliminar);
			}
			$vector["correo"]=$this->session->userdata("correo");
			$vector['tabla'] = $this->lista_model->leer();
			$vector['compartido'] = $this->lista_model->leer_compartido();
			$vector['compartido_con_migo'] = $this->lista_model->compartido_con_migo();
			$this->load->view('lista',$vector);
	}
}


