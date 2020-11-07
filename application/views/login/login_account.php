<html>
    <head>
        <title>Buat Akun Login</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/materialize.css');?>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <!--  Scripts-->
        <script src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/materialize.js');?>"></script>
        <script src="<?php echo base_url('assets/js/init.js');?>"></script>
        <style>
             body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
                }
                main {
                flex: 1 0 auto;
                }
            body {
                background: #fff;
                }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
        <div class="section"></div>
        <main>
            <center>
            <div class="container">
                <div  class="z-depth-3 y-depth-3 x-depth-3 grey teal-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE;">
                <div class="section"></div>
            <div class="section"></div>
            
            <div class="section"><i class="mdi-alert-error red-text"></i></div>
            
                <form method="POST" action="<?php echo base_url('Login/create_account_action')?>">
                    <div class="row">
                        <h3>Buat Akun Login</h3>
                    </div>
                    <div class='row'>
                    <div class='input-field col s12'>
                        <input class='' type="text" name='username' id='username' required />
                        <label for='email'>Username</label>
                    </div>
                    </div>
                    <div class='row'>
                    <div class='input-field col m12'>
                        <input class='' type='text' name='password' id='password' required />
                        <label for='password'>Password</label>
                    </div>
                    </div>
                    <br/>
                    <center>
                    <div class='row'>
                        <button style="margin-left:65px;"  type='submit' name='btn_login' class='col  s6 btn btn-small white black-text  waves-effect z-depth-1 y-depth-1'>Buat Akun</button>
                    </div>
                    </center>
                </form>
                </div>
            </div>
            </center>
        </main>
        </div>
    </div>
    </body>
</html>