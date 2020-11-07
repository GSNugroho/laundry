<?php $this->load->view('mainmenu');?>

<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Adilaya Laundry</h1>
        <div class="row center">
          <h5 class="header col s12 light">Solusi Cepat Untuk Mengelola Laundry Anda</h5>
        </div>
        <div class="row center">
          <a href="<?php echo base_url('Login')?>" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Masuk</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url('assets/background1.jpg')?>" alt="Unsplashed background img 1"></div>
  </div>
  
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Cepat Dalam Pendataan</h5>

            <p class="light">Data yang kami proses sangat cepat antara anda dengan laundry yang dituju hanya dengan 1 kali klik data sudah sampai.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Fokus Pada Pengguna</h5>

            <p class="light">Aplikasi kami sangat terbuka dengan pengguna. Kritik dan saran akan kami tampung semua.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Mudah Digunakan</h5>

            <p class="light">Aplikasi ini sangat mudah sekali untuk digunakan meskipun anda belum pernah menggunakannya.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Adilaya Laundry Mempermudah Pendataan Anda</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url('assets/background2.jpg')?>" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Tentang Kami</h4>
          <p class="left-align light">Kami adalah perusahaan yang berisikan jiwa - jiwa muda dan selalu siap untuk berinovasi. Kami membuat sesuatu yang sulit dilakukan sekalipun menjadi mudah. Kami hadir dengan konsep yang sudah matang dan berani bersaing dengan kompetitor lainnya. Kami selalu siap membantu jika anda ada kendala apapun. Jangan khawatir semua kendala akan kami bantu secara secepat dan tepat sesuai apa yang anda inginkan.</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Adilaya Laundry Siap Membantu Anda</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url('assets/background3.jpg')?>" alt="Unsplashed background img 3"></div>
  </div>

  <script>
    if(!('serviceWorker' in navigator)){
      console.log("Service Worker tidak didukung browser ini.");
    }else{
      registerServiceWorker();
    }

    // Register ServiceWorker
    function registerServiceWorker(){
      return navigator.serviceWorker.register('service-worker.js')
        .then(function(registration){
          console.log("Registrasi service worker berhasil.");
          return registration;
        })
        .catch(function(err){
          console.error("Registrasi service worker gagal.", err);
        })
    }

  </script>

<?php $this->load->view('footer');?>