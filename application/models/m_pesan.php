<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_model{

      
    	public $table = 'pesan';
    	public $id = 'id_pesan';

    	  public function tampildata($table)
    {
    	return $this->db->get($table);
    }

    public function insert_data($data,$table)
    {
    	$this->db->insert($table,$data);
    }

      public function hapus_data($where,$table)
    {
         $this->db->where($where);
         $this->db->delete($table);
    }
}