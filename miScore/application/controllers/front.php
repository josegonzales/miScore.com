<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
		$this->load->view('crearTorneo.html',$output);	
	}
	
	function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function crearTorneo()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('torneo');
		$crud->fields('idTorneo', 'nombreTorneo');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
}

