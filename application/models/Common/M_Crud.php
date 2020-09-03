<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Crud extends CI_Model {
	
	/*
	| ------------------------------------------------------------------------------------
	| Insert Data
	| ------------------------------------------------------------------------------------
	| @	$table 	:	nama tabel 
	| @	$data[]	:	data untuk field dan set
	|
	*/
	public function create($table=NULL,$data=[])
	{
		return $this->db->insert($table,$data);
	}

	/*
	| ------------------------------------------------------------------------------------
	| Read Data
	| ------------------------------------------------------------------------------------
	| @	$table 	:	nama tabel 
	| @ $result_type : Tipe result
	|
	*/
	public function get($table=NULL,$result_type=NULL)
	{
		$data = $this->db->get($table);

		switch ($result_type) {
			case 'result_array':
					$result = $data->result_array();	
				break;
			case 'num_rows':
					$result = $data->num_rows();
				break;
			default:
					$result = $data->result_array();		
				break;
		}
	}

	/*
	| ------------------------------------------------------------------------------------
	| Show Detail Data By Param
	| ------------------------------------------------------------------------------------
	| @	$table 	:	nama tabel 
	| @	$field 	:	nama field yang akan jadi kunci show
	| @	$param 	:	parameter / primary (data kunci untuk aksi show)
	| @ $result_type : Tipe result
	|
	*/
	public function show($table=NULL,$field=NULL,$params=NULL,$result_type=NULL)
	{
		$data = $this->db->get_where($table,[$field => $params]);
		
		switch ($result_type) {
			case 'row_array':
					$result = $data->row_array();	
				break;
			case 'result_array':
					$result = $data->result_array();	
				break;
			case 'num_rows':
					$result = $data->num_rows();
				break;
			default:
					$result = $data->row_array();		
				break;
		}

		return $result;	
	}

	/*
	| ------------------------------------------------------------------------------------
	| Update Data
	| ------------------------------------------------------------------------------------
	| @	$table 	:	nama tabel 
	| @	$data[]	:	data untuk field dan set
	| @	$field 	:	nama field yang akan jadi kunci update
	| @	$param 	:	parameter / primary (data kunci untuk aksi update)
	|
	*/
	public function update($table=NULL,$data=[],$field=NULL,$params=NULL)
	{
		return $this->db->where($field,$params)->update($table,$data);
	}

	/*
	| ------------------------------------------------------------------------------------
	| Delete Data
	| ------------------------------------------------------------------------------------
	| @	$table 	:	nama tabel 
	| @	$field 	:	nama field yang akan jadi kunci delete
	| @	$param 	:	parameter / primary (data kunci untuk aksi delete)
	|
	*/
	public function delete($table=NULL,$field=NULL,$params=NULL)
	{
		return $this->db->where($field,$params)->delete($table);
	}

}

/* End of file M_Crud.php */
/* Location: ./application/models/Common/M_Crud.php */