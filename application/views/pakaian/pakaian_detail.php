<?php $this->load->view('mainmenu');?>
<link href="<?php echo base_url('assets/css/dataTables.material.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="<?php echo base_url('assets/css/material-components-web.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.material.min.js');?>"></script>
<style>
    #modal1 .modal{
        height: 100%;
    }
</style>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">info</i></h2>
            <h5 class="center">Detail Data Pakaian</h5>
            <br>
            <br>
                <?php foreach($rincian_pakaian as $row){
                    ?>
                    <table>
                        <tr>
                            <th>Nama Pakaian</th>
                            <td><?php echo $row->nm_pakaian;?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><?php echo $row->kategori;?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?php echo $row->keterangan;?></td>
                        </tr>
                        <tr>
                            <th>Terakhir Laundry</th>
                            <td><?php if($row->dt_last_trans != Null){echo date('d-m-Y', strtotime($row->dt_last_trans));}else{echo '-';}?></td>
                        </tr>
                        <tr>
                            <th>Foto Pakaian</th>
                            <td><img src="<?php echo base_url('upload/').$row->foto_pakaian;?>" width="200px" height="200px"/></td>
                        </tr>
                    </table>
                <?php }?>
                <br>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('footer');?>