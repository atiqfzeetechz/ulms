<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlmaster extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    
function sentSMS($Mobile='',$SMS=''){
  $encodedSMS  = urlencode($SMS);   
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://obligr.io/api_v2/message/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "sender_id=SGOLDS&message=$encodedSMS&mobile_no=$Mobile",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer fAaGuybR0puHkTQsy_TP50xQ7GTnFdxJ9qfT7PhncfQf9dGWNHEy7gxoQ_WXJj5f",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //$result =  "cURL Error #:" . $err;
 $result = 0;
} else {

   $json = json_decode($response, true);
   if($json['success']==1){
   $result = 1;    
   }
   else
   {
   $result = 0;       
   }
 
}


return $result; 


 }
function getItemCurrentStock()
{
 return 0;
}	
function getOpeningStock($ItemId){
$CompanyId = getActiveCompany();
$this->db->select('OpeningStock');
$this->db->from('companystock');
$this->db->where('ItemId',$ItemId);
$this->db->where('CompanyId',$CompanyId);
$ck = $this->db->get();
if($ck->num_rows()>0)
{
	return $ck->row()->OpeningStock;
}
else
{
	return 0;
}
}	
function getCompanyItem()
{
 	$this->db->select('ItemName,ItemId');
    $this->db->from('itemmaster');
	return $result = $this->db->get()->result();
}
function getContact()
{
 	$this->db->select('id,name');
    $this->db->from('contact');
	return $result = $this->db->get()->result();
}

function getStateCity($StateId)
{
return $this->db->get_where('citymaster',array('StateId'=>$StateId))->result();
}

function count_all_by_sess_com($table)
 {
  $query = $this->db->get_where($table,array('CompanyId'=>getActiveCompany(),'SessionId'=>getActiveSession()));
  return $query->num_rows();
 }
 
 function count_all_by_col($table,$colName,$colValue)
 {
  $query = $this->db->get_where($table,array($colName=>$colValue));
  return $query->num_rows();
 }
 
 
  function count_all_by_col_sess_company($table,$colName,$colValue)
 {
  $query = $this->db->get_where($table,array($colName=>$colValue,'CompanyId'=>getActiveCompany(),'SessionId'=>getActiveSession()));
  return $query->num_rows();
 }
 
function count_all($table)
 {
  $query = $this->db->get($table);
  return $query->num_rows();
 }
function save_DB($table,$data)
 {
	 return $this->db->insert($table,$data);
	 
 }
 
 function get_order_table_result($table,$id='',$order='',$limits='',$starts='')
 {  
 $this->db->select('*');
 $this->db->from($table); 
 if($id!='')
 {
 $this->db->order_by($id,$order);
 }
 if($limits!='')
 {
 $this->db->limit($limits,$starts);
 }
 return $this->db->get()->result();
 }
 
 function get_order_table_where_result($table,$id,$order,$where)
 {    
 $this->db->order_by($id,$order);
 return $this->db->get_where($table,array($where))->result();
 }
 
 
 
 function get_col_by_key($table,$key,$value,$col_name)
	{
	    $this->db->select($col_name);
	    $this->db->from($table);
	    $this->db->where($key,$value);
	    $res = $this->db->get();
	    if($res->num_rows()>0)
	    {
	    
	    
	    return $res->row()->$col_name;
	    }
	    else
	    {
	     $na ="NA";
	    return $na; 
	    }
	    
	}
	
	
}

?>