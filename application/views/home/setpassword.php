
      <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?=base_url('users/editprofil'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">Set Password</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px"> Set Password</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px;">

      <div class="row">
        <div class="col s12" style="margin:100px auto;">
          <div class="card ">
            <div class="card-content">
              <?=$this->session->flashdata('message'); ?>
              <div class="row">
                <form class="col s12" action="<?= base_url('users/simpansetpassword'); ?>" method="post">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="passwordlama" type="password" class="validate" name="passwordlama" autocomplete="on" required>
                      <label for="passwordlama">Password lama</label>
                      <?= form_error('passwordlama','<span class="red-text right">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:-20px">
                    <div class="input-field col s6">
                      <input id="passwordbaru" type="password" class="validate" name="passwordbaru" autocomplete="on" required>
                      <label for="passwordbaru">Password baru</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="passwordconfirm" type="password" class="validate" name="passwordconfirm" autocomplete="on" required>
                      <label for="passwordconfirm">Confirm password</label>
                      <?= form_error('passwordbaru','<span class="red-text right">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="row" style="margin-top:-10px">
                    <div class="col s12">
                      <button type="submit" name="submit" class="waves-effect waves-light btn-small blue">simpan</button>
                    </div>
                  </div>
                </form>
              </div>

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
            // $('.bataleditinfoakun').hide();
            // $('.hideeditinput').hide();
            // $('.editinfoakun').on('click',function(){
            //   $('.infoakunhide').fadeOut();
            //   $('.bataleditinfoakun').fadeIn();
            //   $('.editinfoakun').fadeOut();
            //   $('.hideeditinput').show();
            // });
            // $('.bataleditinfoakun').on('click',function(){
            //   $('.infoakunhide').fadeIn();
            //   $('.bataleditinfoakun').fadeOut();
            //   $('.editinfoakun').fadeIn();
            //   $('.hideeditinput').hide();
            // });

        });
      </script>
    </body>
  </html>