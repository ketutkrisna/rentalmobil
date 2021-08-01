  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- google font -->
      <link href="https://fonts.googleapis.com/css2?family=Fascinate+Inline&family=Faster+One&family=Fredericka+the+Great&family=Frijole&family=Monofett&family=Nosifer&display=swap" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Login Rental Mobil Lampung</title>
      <style>
        html,body, .row{
          height:100%;
        }
        body{
          /*background-color:#2196f3;*/
          overflow-y:hidden;
          background-image: linear-gradient(#2196f3,#2196f3,#90caf9,#2196f3);
        }
        img[alt*="www.000webhost.com"]{
          display:none
        }
      </style>
    </head>

    <body>

    <div class="navbar-fixed">
    <nav class="z-depth-0 blue">
      <div class="nav-wrapper" style="max-width:1000px;width:97%;margin:1px auto;left:0;right:0;">
        <a href="#" class="brand-logo left" style="margin-top:-7px"><span style="font-family: 'Fredericka the Great', cursive;font-size:28px;">Rental Mobil</span> <span style="font-size:12px;margin-left:-5px">Lampung</span></a>
      </div>
    </nav>
    </div>

<!-- <div class="row" style="max-width:1000px;display:flex;align-items:center;">
<div class="batastepi" style="border-radius:10px;width:99%;margin:1px auto;left:0;right:0;"> -->
<div class="row" style="max-width:1000px;display:flex;align-items:center;margin-top:-70px">
<div class="col s12 windowswidth" style="">

      <div class="col s12 center" style="align-items:center;">
        <h5 class="header white-text" style="margin:20px">LOGIN</h5>
        <div class="card horizontal z-depth-2" style="border-radius:10px;">
          <!-- <div class="card-image">
            <img src="https://lorempixel.com/100/190/nature/6">
          </div> -->
          <div class="card-stacked">
            <div class="card-content">
              <div class="row center">
                  <div class="row">
                    <div class="col s12">
                    <?= $this->session->flashdata('pesan'); ?>
                    </div>
                    <form class="col s12" action="<?=base_url('auth'); ?>" method="post">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="email" name="email" class="validate" value="<?= set_value('email'); ?>" required>
                          <label for="icon_prefix">Email</label>
                        </div>
                        <div class="input-field col s12">
                          <i class="material-icons prefix">lock</i>
                          <input id="icon_password" type="password" name="password" class="validate" required>
                          <label for="icon_password">Password</label>
                        </div>
                        <div class="col s12">
                          <button style="width:100%" class="btn-large waves-effect waves-light blue" type="submit" name="login">login
                            <!-- <i class="material-icons right">send</i> IWin2[7-Egvg]xHM   R1XdKw-tZ!JqCOvH rgb:uW9ELISw-unCoAda X{EMVEy)h1BvXydd-->
                          </button>
                        </div>
                      </div>
                    </form>
                        <a href="<?=base_url('auth/daftarakun'); ?>">Belum punya akun? Daftar sekarang!</a>
                  </div>
              </div>
            </div>
            <!-- <div class="card-action">
              <a href="#">This is a link</a>
            </div> -->
          </div>
        </div>
      </div>

</div><!-- tutup batastepi -->
</div><!-- tutup maxwidth -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){

        $('.close').on('click',function(){
          $('.hideflash').fadeOut();
        });

      });
    </script>
    </body>
  </html>