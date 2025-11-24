<?php

class MY_Form_validation extends CI_Form_validation{

    public function edit_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'teacher_id !=' => $id))->num_rows() === 0)
            : FALSE;
    }
    
	
	function edit_uniqueallcity($value, $params)
    {
		$this->set_message('edit_uniqueallcity', "This %s is already exist!");
        list($table, $field, $current_id) = explode(".", $params);
        $result = $this->CI->db->where($field, $value)->get($table)->row();
        return ($result && $result->CityId != $current_id) ? FALSE : TRUE;
    }
	
	function edit_uniqueallusers($value, $params)
    {
		$this->set_message('edit_uniqueallusers', "This %s is already exist!");
        list($table, $field, $current_id) = explode(".", $params);
        $result = $this->CI->db->where($field, $value)->get($table)->row();
        return ($result && $result->users_id != $current_id) ? FALSE : TRUE;
    }
	
	function edit_uniqueallitems($value, $params)
    {
		$this->set_message('edit_uniqueallitems', "This %s is already exist!");
        list($table, $field, $current_id) = explode(".", $params);
        $result = $this->CI->db->where($field, $value)->get($table)->row();
        return ($result && $result->ItemId != $current_id) ? FALSE : TRUE;
    }
	
	
	function edit_uniqueallvendor($value, $params)
    {
		$this->set_message('edit_uniqueallvendor', "This %s is already exist!");
        list($table, $field, $current_id) = explode(".", $params);
        $result = $this->CI->db->where($field, $value)->get($table)->row();
        return ($result && $result->VendorId != $current_id) ? FALSE : TRUE;
    }
	
	
	public function edit_uniqueclass($str,$field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'class_id !=' =>$id))->num_rows() === 0)
            : FALSE;
    }
    
	
	public function edit_uniquecategory($str,$field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'id !=' =>$id))->num_rows() === 0)
            : FALSE;
    }
	
	
	
	public function edit_feetype($str,$field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'fee_type_id !=' =>$id))->num_rows() === 0)
            : FALSE;
    }
    
	
	
    
	
	public function edit_unique_td($str,$field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'id !=' =>$id))->num_rows() === 0)
            : FALSE;
    }
    

}