<?php
class M_dashboard extends CI_Model{

public function index()
    {
        $this->db->where('id_memo',$id);
        $this->db->insert('memo',$data);
    }
    }
 
    // function simpan_isi()
    // {
    //      $data = [
    //             'judul' => $this->input->post('judul'),
    //             'isi'=> $this->input->post('isi'),
    //              'penulis' => $this->input->post('penulis'),
    //               'tanggal' => $this->input->post('tanggal')
    //           ];
    // $this->db->set($data);
    // $this->db->insert('memo');
        

    // function get_isi_by_id($id_memo){
    //     $hsl=$this->db->query("SELECT * FROM memo WHERE id_memo='$id_memo'");
    //     return $hsl;
    // }
 
    // function get_all_isi(){
    //     $hsl=$this->db->query("SELECT * FROM memo ORDER BY id_memo DESC");
//     //     return $hsl;
//     }
// }