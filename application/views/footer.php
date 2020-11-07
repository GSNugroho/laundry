
  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Adilaya Laundry</h5>
          <?php if($this->session->userdata('login') == TRUE){?>
          <p class="grey-text text-lighten-4">Anda login sebagai <b><u><i><?php echo $this->session->userdata('username')?></i></u></b></p>
          <a style="float: right;" class="grey-text text-lighten-4" href="<?php echo base_url('Login/destroy');?>">Logout</a>
          <?php ;}?>

        </div>
        <div class="col l3 s12">
          
        </div>
        <div class="col l3 s12">
          
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
         <a class="brown-text text-lighten-3" href="#">2020 Adilaya. All rights reserved.</a>
      </div>
    </div>
  </footer>


  

  </body>
</html>