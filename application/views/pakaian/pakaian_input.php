<?php $this->load->view('mainmenu');?>
<link href="<?php echo base_url('assets/css/dataTables.material.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="<?php echo base_url('assets/css/material-components-web.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.material.min.js');?>"></script>
<style>
    #preview img { max-height: 100px; }
</style>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons">input</i></h2>
            <h5 class="center">Input Data Pakaian</h5>
            <br>
            <br>
            <form method="POST" action="<?php echo base_url('Pakaian/create_pakaian_action')?>" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="" id="nm_pakaian" name="nm_pakaian" type="text" class="validate">
                        <label for="nm_pakaian">Nama</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select id="jns_pakaian" name="jns_pakaian">
                            <option value="0" selected>- Pilih -</option>
                            <?php
                                foreach ($dd_kategori as $row) {  
                                    echo "<option value='".$row->id."' >".$row->kategori."</option>";
                                    }
                                    echo"
                                </select>";
							?>
                        <label>Kategori</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="" id="keterangan" name="keterangan" type="text" class="validate">
                        <label for="keterangan">Keterangan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field col s12">
                        <div class="btn">
                            <span>Foto</span>
                            <input type="file" accept="image/*;capture=camera" id="foto_pakaian" name="foto_pakaian" width="320" height="240">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="nama_foto" id="nama_foto">
                        </div>
                        <div id="preview"></div>
                        
                    </div>
                </div>
                <input type="hidden" id="kode_user" name="kode_user" value="<?php echo $this->session->userdata('kode_user');?>">
                <div class="row">
                    <a class="waves-effect waves-red btn" href="<?php echo base_url('Pakaian');?>">Batal</a>
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
            const EL_browse  = document.getElementById('foto_pakaian');
            const EL_preview = document.getElementById('preview');

            const readImage  = file => {
            if ( !(/^image\/(png|jpe?g|gif)$/).test(file.type) )
                return EL_preview.insertAdjacentHTML('beforeend', `Unsupported format ${file.type}: ${file.name}<br>`);

            const img = new Image();
            img.addEventListener('load', () => {
                EL_preview.appendChild(img);
                EL_preview.insertAdjacentHTML('beforeend', `<div>${file.name} ${img.width}×${img.height} ${file.type} ${Math.round(file.size/1024)}KB<div>`);
                window.URL.revokeObjectURL(img.src); // Free some memory
            });
            img.src = window.URL.createObjectURL(file);
            }

            EL_browse.addEventListener('change', ev => {
                EL_preview.innerHTML = ''; // Remove old images and data
                const files = ev.target.files;
                if (!files || !files[0]) return alert('File upload not supported');
                [...files].forEach( readImage );
            });

            $(document).ready(function() {
                    $('.datepicker').datepicker();
                    $('select').formSelect();
            })
        </script>
    </div>
  </div>

<?php $this->load->view('footer');?>