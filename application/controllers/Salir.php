<?php
//genera el proceso de salir del sistema
defined('BASEPATH') OR exit('No direct script access allowed');

class Salir extends CI_Controller 
{
		public function __construct()			
				{
					parent:: __construct();
					$this->load->helper('url_helper');
				}
	public function index()
	{
		//proceso para limpiar las variables de session
		//1 ejecutar el metodo sess_destroy
		//2 redireccionar 
		$this->session->sess_destroy();
		redirect("login");
	}
}
