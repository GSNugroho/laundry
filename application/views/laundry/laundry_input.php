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
            <h2 class="center teal-text"><i class="material-icons">input</i></h2>
            <h5 class="center">Input Data Transaksi Laundry</h5>
            <br>
            <br>
            <form method="POST" action="<?php echo base_url('Laundry/create_transaksi_action')?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="" id="tgl_transaksi" name="tgl_transaksi" type="text" class="datepicker">
                        <label for="tgl_transaksi">Tanggal Laundry</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="" id="nm_laundry" name="nm_laundry" type="text" class="validate">
                        <label for="nm_laundry">Nama Laundry</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="" id="almt_laundry" name="almt_laundry" type="text" class="validate">
                        <label for="almt_laundry">Alamat Laundry</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="" id="pic" name="pic" type="text" class="validate">
                        <label for="pic">PIC</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select id="jns_pakaian">
                            <option value="0" selected>- Pilih -</option>
                            <?php
                                foreach ($dd_kategori as $row) {  
                                    echo "<option value='".$row->id."' >".$row->kategori."</option>";
                                    }
                                    echo"
                                </select>";
							?>
                        </select>
                        <label>Jenis/ Kategori</label>
                    </div>
                    <div class="input-field col s6">
                        <select class="icons" id="pakaian">
                            <option value="0" selected>- Pilih -</option>
                        </select>
                        <label>Nama</label>
                    </div>
                </div>
                <input type="hidden" id="kode_user" name="kode_user" value="<?php echo $this->session->userdata('kode_user');?>">
                <div class="row">
                    <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" type="button" name="tambah" id="tambah" disabled>Tambah
                        <i class="material-icons right">add</i>
                    </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <table class="responsive-table centered striped" id="tbl-pilih">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Foto</th>
                                <th>Hapus</th>
                            </tr>
                            </thead>
                            <tbody id="tbl-pilih-isi">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <a class="waves-effect waves-red btn" href="<?php echo base_url('Laundry/transaksi');?>">Batal</a>
                    <!-- <button class="btn waves-effect waves-green" id="savetrans" name="savetrans">Simpan</button> -->
                    <button class="btn waves-effect waves-light" type="submit" name="savetrans" id="savetrans">Simpan
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
        <script>
            $(document).ready(function() {
                    $('.datepicker').datepicker();
                    $('select').formSelect();
                    rincian_barang();
            })
            function rincian_barang(){
                var kode_user = $('#kode_user').val();
                var dataString = 'kode_user='+kode_user;
                $.get("<?php echo base_url('Laundry/get_rincian_barang')?>", dataString, function(data){
                    var table = "";
                    if(data.table != undefined){
                        for(var i = 0; i < data.table.length; i++){
                            table += "<tr><td>"+data.table[i].nm_pakaian+"</td><td>"+data.table[i].kategori+"</td><td><img src='<?php echo base_url().'upload/';?>"+data.table[i].foto_pakaian+"' width='100' height='100' /></td><td><button class='btn-flat waves-effect waves-light' type='button'><i class='material-icons '>delete</i></button></td></tr>";
                        }
                    }else{
                        table += "<tr><td colspan='3'>Tidak Ada Data</td></tr>";
                    }
                    
                    $('#tbl-pilih-isi').html(table);
                }, 'json')
            }

            $('#jns_pakaian').on('change', function(){
                var id = $('#jns_pakaian option:selected').val();
                var kode_user = $('#kode_user').val();
                var dataString = 'id='+id+'&kode_user='+kode_user;

                $.get("<?php echo base_url('Laundry/get_data_kategori')?>", dataString, function(data){
                    var dropdown = "<option value='0' selected>- Pilih -</option>";
                    if(data.baju != undefined){
                        for(var i = 0; i < data.baju.length; i++){
                            dropdown += "<option value="+data.baju[i].kd_pakaian+" data-icon='<?php echo base_url().'upload/';?>"+data.baju[i].foto_pakaian+"' class='left'>"+data.baju[i].nm_pakaian+"</option>";
                        }
                    }

                    $('#pakaian').empty();
                    $('#pakaian').append(dropdown);
                    $('#pakaian').formSelect();
                }, 'json')
            })

            $('#pakaian').on('change', function(){
                $('#tambah').prop('disabled', false);
            });

            $('#tambah').on('click', function(){
                var pakaian = $('#pakaian option:selected').val();
                var kode = $('#kode_user').val();

                var dataString = 'pakaian='+pakaian+'&kode='+kode;
                $.post("<?php echo base_url('Laundry/tambah_barang');?>", dataString, function(data){
                    $('#tambah').prop('disabled', true);
                    rincian_barang();
                });
            });
        </script>
    </div>
  </div>

<?php $this->load->view('footer');?>