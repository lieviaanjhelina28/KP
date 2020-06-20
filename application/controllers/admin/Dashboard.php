<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
        is_logged_in();
              $this->load->model('m_pesan');
            
         
   }



    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('m_sidebar','sidebar');

        $data['sidebar'] = $this->sidebar->getrole();

        $data['pesan'] = $this->m_pesan->tampildata('pesan')->result();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');

      }


      public function kirim()
      {
        $this->rules();

        if($this->form_validation->run() == FALSE) {
            $this->index();

        }else{
            $id = $this->input->post('id_pesan');
            $nama = $this->input->post('nama');
            $email = $this->input->post('Email');
            $pesan = $this->input->post('pesan');

        $data =
        [
            'nama' => $nama,
            'Email' => $email,
            'pesan' => $pesan,
        ];
$this->m_pesan->insert_data($data,'pesan');
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pesan berhasil dikirim</div>');
   redirect('admin/dashboard');
      }
}

        public function rules()
        {
              $this->form_validation->set_rules('nama','nama','trim|required', [

                'required' => 'Nama harus di isi!'
        ]);

            $this->form_validation->set_rules('Email','Email','trim|required|valid_email', [

                'required' => 'Email harus di isi!'
        ]);

        $this->form_validation->set_rules('pesan','Pesan','trim|required', [
                'required' => 'Pesan harus di isi!'

        ]);
        }


          public function hapus($id_pesan)
{
    $where = array ('id_pesan' => $id_pesan);
    $this->m_pesan->hapus_data($where, 'pesan');
         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Memo Berhasil dihapus</div>');
    redirect('admin/dashboard');
   
}
}


            // $id=$this->input->post('id_memo');
            // $this->m_dashboard->index($id,$data);
            // redirect('admin/dashboard');

    // function simpan_post(){
    //   if(!empty($_FILES['filefoto']['name'])){
    //         if ($this->upload->do_upload('filefoto')){
    //             $gbr = $this->upload->data();
    //             //Compress Image
    //             $config['image_library']='gd2';
    //             $config['source_image']='./assets/images/'.$gbr['file_name'];
    //             $config['create_thumb']= FALSE;
    //             $config['maintain_ratio']= FALSE;
    //             $config['quality']= '60%';
    //             $config['width']= 710;
    //             $config['height']= 420;
    //             $config['new_image']= './assets/images/'.$gbr['file_name'];
    //             $this->load->library('image_lib', $config);
    //             $this->image_lib->resize();
 
    //             $gambar=$gbr['file_name'];
       
    //             $judul=$this->input->post('judul');
    //             $isi=$this->input->post('isi');
 
    //             $this->m_dashboard->simpan_isi($judul,$isi);
    //             redirect('admin/lists');

    //     }else{
    //         redirect('admin');
    //     }
                      
    //     }else{
    //         redirect('admin');
        
                 
    // }
 
    // function lists(){
    //     $x['data']=$this->m_dashboard->get_all_isi();
    //     $this->load->view('admin/post_lists',$x);
    // }
 
    // function view(){
    //     $kode=$this->uri->segment(3);
    //     $x['data']=$this->m_dashboard->get_isi_by_id($id_memo);
    //     $this->load->view('admin/post_view',$x);
    // }
 


        

// }

// }
