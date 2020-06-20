 <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-4s">
              <h6 class="m-0 font-weight-bold text-primary">Status Surat</h6>
            </div>

  <?php echo $this->session->flashdata('message'); ?>
            
            <div class="card-body">
                 <form action="<?php echo base_url().'admin/h_mhs/';  ?>" method="post"> 
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>NPM</th>
                      <th>Kebutuhan</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Tanggal Selesai</th>
                      <th>Status</th>
                  </tr>
                </thead>
              <tbody>
                <?php 
                  $NPM = $this->session->userdata('NPM');
                $verifikasi = $this->db->get_where('form_mahasiswa', array('NPM'=> $NPM))->result();
                if ($verifikasi > 0) {
                  foreach ($verifikasi as $vf) { 
                    echo "
                <tr>
                <td>$vf->nama_mahasiswa</td>
                <td>$vf->NPM</td>
                <td>$vf->kebutuhan</td>
                <td>$vf->tgl_input</td>
                <td>$vf->tgl_selesai</td>";
                                 if ($vf->status < 1) {
                                    echo "<td><label class='badge badge-danger'>Menunggu </label></td>
                        </tr>";
                                } else {
                                    echo "<td><label class='badge badge-info'>Selesai</label></td>
                        </tr>";
                                   }
                                   
                            }
                        } else {
                            echo "<tr>
                                    <td>" . $this->session->userdata('nama_mahasiswa') . "</td>
                                    <td>" . $this->session->userdata('NPM') . "</td>
                                   <td>ANDA BELUM MENGAJUKAN SURAT</td>";
                            echo "<td>TIDAK ADA</td>
                                 <td>TIDAK ADA</td>
                               </tr>";
                          
                        }
                        ?>
                    
                      
                
</tbody>
</table>
</form>
</div>
</div>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->