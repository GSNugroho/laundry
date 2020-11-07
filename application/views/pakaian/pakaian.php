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
            <h2 class="center teal-text"><i class="material-icons">accessibility</i></h2>
            <h5 class="center">Data Pakaian</h5>
            <br>
            <a class="waves-effect waves-light btn" href="<?php echo base_url('Pakaian/create_pakaian');?>"><i class="material-icons left">add</i>Pakaian</a>
            <!-- <button class="waves-effect waves-light btn-large" data-toggle="modal" data-target="#inputModal"  data-keyboard="false" data-backdrop="static" id="tambahinputpengeluaran"><i class="material-icons left">add</i>Laundry</button> -->
            <!-- <a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo base_url('Laundry/create_transaksi');?>"><i class="material-icons">add</i></a> -->
            <br>
            <br>
            <table class="mdl-data-table" style="width:100%" id="datapakaian">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Terakhir Laundry</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            </table>
            <script>
                $(document).ready(function() {
                    var table = $('#datapakaian').DataTable( {
                        language: {
                            "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing":   "Sedang memproses...",
                            "sLengthMenu":   "Tampilkan Data _MENU_ ",
                            "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                            "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix":  "",
                            "sSearch":       "Cari:",
                            "sUrl":          "",
                            "oPaginate": {
                                "sFirst":    "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext":     "Selanjutnya",
                                "sLast":     "Terakhir"
                            }
                        },
                        autoWidth: false,
                        'order': [[ 0, "desc" ]],
                        'processing': true,
                        'serverSide': true,
                        "searching": true,
                        "info":     false,
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "pagingType": "simple",
                        'serverMethod': 'post',
                        'ajax': {
                            'url':'<?php echo base_url().'Pakaian/dt_tbl_pakaian'?>',
                            'data': function(data){
                                var tgl_transaksi = $('#tanggalinputsca').val();
                                data.tgl_transaksi = tgl_transaksi;
                            }
                        },
                        columnDefs: [
                            {
                                targets: ['_all'],
                                className: 'mdc-data-table__cell'
                            }
                        ],
                        'columns': [
                            { data: 'nm_pakaian' },
                            { data: 'kategori' },
                            { data: 'dt_last_trans' },
                            { data: 'foto_pakaian' },
                            { data: 'aksi' }
                        ]
                    } );
                    table.on( 'draw', function () {
                        $('.paginate_button.previous').html("<");
                        $('.paginate_button.next').html(">");
                        var total_records = table.rows().count();
                        var page_length = table.page.info().length;
                        var total_pages = Math.ceil(total_records / page_length);
                        var current_page = table.page.info().page+1;
                    } );
                } );
            </script>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php $this->load->view('footer');?>