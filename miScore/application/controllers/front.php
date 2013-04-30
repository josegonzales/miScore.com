<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _llamadoVistaCrearTorneo($output = null)
	{
		$this->load->view('crearTorneo.html',$output);	
	}
	
	function _llamadoVistaCrearEquipo($output = null)
	{
		$this->load->view('crearEquipo.html',$output);
	}
	
	function _llamadoVistaRelacionarTorneoEquipo($output = null)
	{
		$this->load->view('relacionarEquipos.html',$output);
	}
	
	
	function crearTorneo()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('torneo');
		$crud->fields('nombreTorneo');
		$crud->required_fields('nombreTorneo');
		$crud->unset_delete();
		$output = $crud->render();
		
		$this->_llamadoVistaCrearTorneo($output);
	}

	function crearEquipo()
	{
		$crud = new grocery_CRUD();
	
		$crud->set_table('equipo');
		$crud->fields('nombreEquipo');
		$crud->required_fields('nombreEquipo');
		$crud->unset_delete();
		$output = $crud->render();
	
		$this->_llamadoVistaCrearEquipo($output);
	}
	
	function relacionarEquipos()
	{
		$crud = new grocery_CRUD();
	
		$crud->set_table('torneo_has_equipo');
		//$crud->fields('Torneo_idTorneo', 'Equipo_idEquipo');
		$crud->set_field_upload('Torneo_idTorneo','Equipo_idEquipo');
		$output = $crud->render();
	
		$this->_llamadoVistaRelacionarTorneoEquipo($output);
	}
	
}

