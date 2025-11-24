<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlroll extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	function get_roll()
	{
		return $this->db->get('roll')->result_array();
	}
	
	
	function get_roll_by_id($roll_id)
	{
		return $this->db->get_where('roll',array('roll_id'=>$roll_id))->result_array();
	}
	
	
	
}