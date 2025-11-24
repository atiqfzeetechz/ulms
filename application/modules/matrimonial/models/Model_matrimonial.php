<?php
class Model_matrimonial extends CI_Model
{
    function insert_data($table,$data)
    {
       return  $this->db->insert($table,$data);
    }
    function get_data()
    {
                $q=$this->db->get('matrimony');
                return $q->result();
    }
    function edit_data($id)
    {
            $this->db->where('id',$id);
            return $q=$this->db->get('matrimony')->result();
    }
    function update_data($id,$data)
    {
            $this->db->where('id',$id);
            return $this->db->update('matrimony',$data);
    }
}

?>