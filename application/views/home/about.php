<!-- <body> -->
      <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/editprofil'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">About</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px">About</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

      
<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px;">

          <div class="row">
            <div class="col s12" style="margin-top:20px">
              <div class="card-panel z-depth-2">
                <div class="card-image waves-effect waves-block waves-light center">
                  <img width="150px" class="activator" src="<?=base_url('assets/img/rental/logorentals.png'); ?>">
                </div>
                <div class="card-content" style="text-align:justify;">
                <span class="grey-text">Rental mobil lampung adalah sebuah perusahaan yangbergerak dibidang jasa rental mobil yang ada dilampung. <br>
                Awal berdirinya perusahaan rental mobil lampung pada tahun 2015 yang didirikan oleh seorang wirausaha muda asal lampung, yang berlokasi di JL.Sultan Haji No 18, Sepang Jaya, kota Bandar Lampung.
                </span>
                </div>
              </div>
            </div>
          </div>

</div>
</div>
      

      <!-- Compiled and minified JavaScript -->
      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){

            // $('.sidenav').sidenav();
            $('.materialboxed').materialbox();
            $('.datepicker').datepicker({
              format:'yyyy-mm-dd'
            });
            $('select').formSelect();
            $('.close').on('click',function(){
              $('.hideflash').fadeOut();
            });
            $('.goback').on('click',function(){
              parent.history.back();
              return false;
            });
            $('.bataleditinfoakun').hide();
            $('.hideeditinput').hide();
            $('.editinfoakun').on('click',function(){
              $('.infoakunhide').fadeOut();
              $('.bataleditinfoakun').fadeIn();
              $('.editinfoakun').fadeOut();
              $('.hideeditinput').show();
            });
            $('.bataleditinfoakun').on('click',function(){
              $('.infoakunhide').fadeIn();
              $('.bataleditinfoakun').fadeOut();
              $('.editinfoakun').fadeIn();
              $('.hideeditinput').hide();
            });

        });
      </script>
    </body>
  </html>