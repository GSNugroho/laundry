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
            <h5 class="center">Detail Data Transaksi Laundry</h5>
            <br>
            <?php foreach($rincian as $row){?>
            <a style="float: right;" class="waves-effect waves-light btn-flat" href="<?php echo base_url('Laundry/laundry_detail_download/').$row->kd_transaksi;?>"><i class="material-icons left">local_printshop</i><u>Download</u></a>
            <br>
                    <table>
                        <tr>
                            <th>Tanggal Laundry</th>
                            <td><?php echo date('d-m-Y', strtotime($row->tgl_transaksi));?></td>
                        </tr>
                        <tr>
                            <th>Nama Laundry</th>
                            <td><?php echo $row->laundry;?></td>
                        </tr>
                        <tr>
                            <th>Alamat Laundry</th>
                            <td><?php echo $row->almt_laundry;?></td>
                        </tr>
                        <tr>
                            <th>PIC</th>
                            <td><?php echo $row->pic;?></td>
                        </tr>
                    </table>
                <?php }?>
                <br>

                <div class="row">
                    <h4>Rincian Barang</h4>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Nama Pakaian</th>
                            <th>Kategori</th>
                            <th>Foto Pakaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($detail_rincian as $row){
                            ?>
                            <tr><td><?php echo $row->nm_pakaian;?></td><td><?php echo $row->kategori;?></td><td><img src='<?php echo base_url().'upload/'.$row->foto_pakaian;?>' width='100' height='100' /></td></tr>
                            
                        <?php }?>
                    </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('footer');?>