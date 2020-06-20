
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Mahasiswa</h6>
            </div>



          <!-- Content Row -->
          <div class="row">
              <div class="col-lg">

    <?php echo $this->session->flashdata('message'); ?>


    <!-- Button trigger modal -->
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Tulis Pesan
</a>

            <div class="card-body">
              <div class="table-responsive">
            
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
            <tr>
                <th>Nama</th>
                <th>Pesan</th>
                   <th>Tanggal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>       
                      <?php 
                        $no = 1;
                        foreach ($pesan as $p)  { ?>
                      <tr>
               
                      <td><?php echo $p->nama?></td>
                      <td><?php echo $p->pesan?></td>
                      <td><?php echo $p->tanggal?></td>


                      <td onclick="javascript: return confirm('Anda yakin akan Menghapus?')"><?php echo anchor('admin/pesan/hapus/'.$p->id_pesan, '<div class="btn btn-danger btn-sm">Hapus</div>');  ?></td>

             
                    </tr>
                    <?php } ?>
                                             
</tbody>
</table>
</form>
</div>
</div>
</div>
</div>


    

      





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tulis Memo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('admin/pesan/kirim') ?>" method="post">
      <div class="modal-body">
        <div class="form-group mx-sm-3 mb-2">
       <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?php echo $user['nama'];?>"><?php echo form_error('nama','<small class="text-danger">','</small>'); ?>
     </div>
      <div class="form-group mx-sm-3 mb-2">
    <textarea type="text" class="form-control" id="pesan" name="pesan" placeholder="tulis pesan"></textarea>
  </div><?php echo form_error('pesan','<small class="text-danger pl-3">','</small>'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
