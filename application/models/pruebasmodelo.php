<?php
class Pruebasmodelo extends CI_Model{
	function_construct(){
	parent::_construct();
	}
	function getAll(){
		$query = $this->db->get('usuario')
		return $query->result();
	}
}
?>
