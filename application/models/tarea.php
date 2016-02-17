<?php

class Tarea extends CI_Model {
	public $Id;
	public $Titulo;
	public $Contenido;
	public $Fecha;
	public $Estado;
	
	function __construct()
	{
	    parent::__construct();
	}
	
	function get()
	{
	    $query = $this->db->get('tareas');
	    return $query->result();
	}
	
	function get_tarea($id)
	{
	    $query = $this->db->get_where('tareas', array('Id'=>$id));
	    return $query->row();
	}

	function get_buscar()
	{
		$buscar = $this->input->get('buscar');
		$pagina = $this->input->get('pag');
		$regs_pagina = 5;
		
		$this->db->from('tareas');
		if ($buscar)
		{
			$this->db->like('Titulo', $buscar);
			$total = $this->db->count_all_results();
			
			$this->db->like('Titulo', $buscar);
		} else {
			$total = $this->db->count_all_results();
		}
		
		$this->db->from('tareas');
		if ($pagina) {
			$this->db->limit($regs_pagina, $regs_pagina * ($pagina-1));			
		} else {
			$this->db->limit($regs_pagina);
		}
		$this->db->order_by('Titulo');
		$query = $this->db->get();
		
		$result['tareas'] = $query->result_array();
		$result['paginas'] = ceil($total/$regs_pagina);
		return $result;
	}

	function get_tareas_hoy()
	{
		$query = $this->db->get_where('tareas', array('Fecha'=>date("Y-m-d")));
	    return $query->result();
	}

	function get_tareas_pendientes()
	{
	    $query = $this->db->get_where('tareas', array('Estado'=>0));
	    return $query->result();
	}
	
	function insert()
	{
		$this->Titulo = $this->input->post('Titulo');
		$this->Contenido = $this->input->post('Contenido');
		$this->Fecha = $this->input->post('Fecha');
		$this->Estado = 0;
		return $this->db->insert('tareas', $this);
	}
	
	function update($id)
	{
		unset($this->Id);
		$this->Titulo = $this->input->post('Titulo');
		$this->Contenido = $this->input->post('Contenido');
		$this->Fecha = $this->input->post('Fecha');
		$this->Estado = $this->input->post('Estado');
		return $this->db->update('tareas', $this, array('Id' => $id));
	}
	
	function delete($id)
	{
		return $this->db->delete('tareas', array('id' => $id));
	}


}