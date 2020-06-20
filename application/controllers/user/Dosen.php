<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Dosen extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
   if (!$this->session->userdata('email')) {
            redirect('auth');
		$this->load->model('dosen_m');
}
}

	public function index()
	{
		
		$data['title'] = 'Halaman Form Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/user_topbar',$data);
		$this->load->view('user/f_dosen',$data);
		$this->load->view('templates/footer');
		

}


public function tambah()
    {
        $nama_dosen     = $this->input->post('nama_dosen');
        $NIK            = $this->input->post('NIK');
        $kebutuhan      = $this->input->post('kebutuhan');
        $keperluan      = $this->input->post('keperluan');
        $file    = $_FILES['file'];
        if ($file=''){}else{
            $config['upload_path'] = './assets/files';
            $config['allowed_types'] = 'pdf|docx|doc';

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')) {
                echo "Upload File Gagal"; die();
            }else{
                $file=$this->upload->data('file_name');
            }

        }

   

        $data = array
        (
            'user_id'=>$this->session->userdata('id_user'),
            'nama_dosen'     => $nama_dosen,
            'NIK'            => $NIK,
            'kebutuhan'      => $kebutuhan,
            'keperluan'      => $keperluan,
            'file'           => $file,

        );
        $this->db->insert('notif',array('user_id'=>$this->session->userdata('id_user')));
        
        $this->dosen_m->input_data($data,'form_dosen');
         $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Permintaan berhasil dikirim.</div>');

        redirect('user/H_dosen');


  }





	 
}