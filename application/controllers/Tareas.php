<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tareas extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session','parser'));
		$this->load->helper('url');
	}

	public function index()
	{
    	$this->load->model('Tarea','',true);
		$data['tareas'] = $this->Tarea->get();
		$data['title'] = "Lista de Tareas";
		$data['content'] = $this->parser->parse('tareas/index', $data, true);
		$this->load->view('template', $data);
	}

	public function buscar()
	{
    	$this->load->model('Tarea','',true);
		$data = $this->Tarea->get_buscar();
		header('Content-Type: application/json');
    	print json_encode($data);
	}

	public function tareasdehoy()
	{
		$this->load->model('Tarea','',true);
		$data['tareas'] = $this->Tarea->get_tareas_hoy();
		$data['title'] = "Lista de Tareas de Hoy";
		$data['content'] = $this->parser->parse('tareas/index', $data, true);
		$this->load->view('template', $data);
	}
	public function tareasPendientes()
	{
    	$this->load->model('Tarea','',true);
		$data['tareas'] = $this->Tarea->get_tareas_pendientes();
		$data['title'] = "Lista de Tareas Pendientes";
		$data['content'] = $this->parser->parse('tareas/index2', $data, true);
		$this->load->view('template', $data);
	}
	public function registrar()
	{
	    $data['title'] = "Registrar unidad de medida";
	    $data['content'] = $this->load->view('unidades/editar', $data, true);
		$this->load->view('template', $data);
	}
	
	public function editar($id)
	{
		$this->load->model('Tarea','',true);
		$data['tarea'] = $this->Tarea->get_tarea($id);
	    $data['title'] = "Editar Tarea";
	    $data['content'] = $this->load->view('tareas/editar', $data, true);
		$this->load->view('template', $data);
	}
	
	public function guardar($id = null)
	{
		$this->load->model('Tarea','',true);
	    if(!is_null($id)) {
			$result = $this->Tarea->update($id);
	    } else {
			$result = $this->Tarea->insert();
	    }
		$this->session->set_flashdata('result', $result);
		$this->session->set_flashdata('message', ($result == 1) ? "Guardado" : "No guardado");
		redirect('/tareas','redirect');
	}
	
	public function eliminar($id)
	{
		$this->load->model('Tarea','',true);
		$result = $this->Tarea->delete($id);
		$this->session->set_flashdata('result', $result);
		$this->session->set_flashdata('message', ($result == 1) ? "Eliminado" : "No eliminado");
		redirect('/tareas','redirect');
	}
	
	public function __toString()
	{
		return $this->nombre;
		
	}

	public function marcar($id)
	{
		$result = $this->Tarea->marcar($id);
		$this->load->model('Tarea','',true);
		redirect('/tareas','redirect');

		# code...
	}
}