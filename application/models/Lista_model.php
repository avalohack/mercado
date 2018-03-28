<?php
/* clase que invoca el modelo principal del CI y permite cargar todas las operaciones con una basde de datos, basado en CI MODEL Recomendacion:
a todos los script siempre colocarle el control que si no son invocados desde la raiz del framework no lo permita visualizar */
defined('BASEPATH') OR exit('No direct script access allowed');
// definir la clase que permite validar si  el usuario existe.
class Lista_model extends CI_Model 
{
	// iniciar el constructor
	public function __construct() 
	{
		// cargar del modelo central de la base de datos
		$this->load->database();
	}
	// funcio que me permite validar si el usuario existe o no en la base de datos
	public function validar_acceso() 
	{
		// inicializar las variables
		// proceso normal
		//$correo=$_POST['correo'];
		//$clave=$_POST['clave'];
		// proceso de setear las variables con codeigniter
		$correo=$this->input->post('correo');
		$clave=md5($this->input->post('clave'));
		// crear la sentencia que me permite
		// buscar el usuario en la tabla correspondiente
		$sql=" select * from usuario ";
		$sql.=" where correo  = ?  ";
		$sql.=" and clave  = ?  ";
		// ejecutar la sentencia pasando los valores en un vector. Aclaracion: los valores se pasan de acuerdo a la cantidad de ? que hayan
		$query=$this->db->query($sql,array($correo,$clave));
		// cuando se ejecute la sentencia que devuelva los valores en un vector
		return $query->result_array();		
	}

	
	public function agregar()
		{
			$data = array
					(
						'correo' 			=> $this->session->userdata('correo'),
						'cantidad'			=> $this->input->post('cantidad'),
						'nombre_producto'	=> $this->input->post('producto'),
						'nota'				=> $this->input->post('nota'),
					);
			return $this->db->insert('producto',$data);
		}	
	public function leer()
		{
			$correo =$this->session->userdata('correo');
			$sql=" select  correo,cantidad,nombre_producto,nota,id from producto ";
			$sql.=" where correo  = ?  ";
			// ejecutar la sentencia pasando los valores en un vector. Aclaracion: los valores se pasan de acuerdo a la cantidad de ? que hayan
			$query=$this->db->query($sql,array($correo));
			// cuando se ejecute la sentencia que devuelva los valores en un vector
			return $query->result_array();
		}

	public function leer_compartido()
		{
			$correo =$this->session->userdata('correo');
			$sql=" select  compartir,id from compartir ";
			$sql.=" where correo  = ?  ";
			// ejecutar la sentencia pasando los valores en un vector. Aclaracion: los valores se pasan de acuerdo a la cantidad de ? que hayan
			$query=$this->db->query($sql,array($correo));
			// cuando se ejecute la sentencia que devuelva los valores en un vector
			return $query->result_array();
		}	
	public function compartir()
		{
			$data=array 
				(
					'correo'    => $this->session->userdata('correo'),
					'compartir' => $this->input->post('mail'),					
				);
			return $this->db->insert('compartir',$data);
		}

	public function eliminar($id,$from)
	{
		//echo "soy id".$id." from ".$from;
		$this->db->where('id',$id);
		return $this->db->delete($from);

	}

	public function compartido_con_migo()
	{
		$correo =$this->session->userdata('correo');

		$sql=" 
				SELECT cantidad,nombre_producto,nota,id FROM producto WHERE correo =(SELECT correo FROM compartir WHERE compartir = ? )
		";
		
		// ejecutar la sentencia pasando los valores en un vector. Aclaracion: los valores se pasan de acuerdo a la cantidad de ? que hayan
		$query=$this->db->query($sql,array($correo));
		// cuando se ejecute la sentencia que devuelva los valores en un vector
		return $query->result_array();
	}
}

?>