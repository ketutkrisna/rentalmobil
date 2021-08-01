<!-- <body> -->
      <!-- navbar -->
      <!-- <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">Profile</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px">Profile</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div> -->

      
<div class="row" style="max-width:1000px;min-height:720px;position:relative;">
<div class="col s12 windowswidth" style="">
<a class='dropdown-trigger' href='#' data-target='dropdown1' style="opacity:0;padding:0px;top:-20px">Drop Me!</a>
          <!-- <div class="row"> -->
          <div class="col s12 center" style="margin-top:0px">
            <div class="card center" style="margin-top:-0px">
            <img class="materialboxed circle center" src="<?= base_url('assets/img/users/'.$profileuser['foto_user']); ?>" height="200" width="200" style="position:absolute;right:0;left:0;margin:auto;">
            <a href='#' class="btn-floating halfway-fab waves-effect z-depth-0 dropdown-trigger waves-light white" data-target="dropdown1" style="top:0px;right:0px;"><i class="material-icons blue-text" style="font-size:30px;text-shadow:1px 1px 1px grey">settings</i></a>
            </div>
          </div>
          <!-- </div> -->
          <?php 
            $birthDt = new DateTime($profileuser['tanggallahir_user']);
            $today = new DateTime('today');
            $umur = $today->diff($birthDt)->y;
          ?>

          <ul class="collection infoakunhide" style="top:200px;">
            <?= $this->session->flashdata('message'); ?>
            <li class="collection-item avatar" style="min-height:63px;padding:10px 25px 0px 85px;">
              <!-- <div class="container"> -->
                <i class="material-icons circle right">credit_card</i>
                <span class="title" style="font-weight:500;"><?=ucwords($profileuser['nama_user']); ?></span>
                <p class="grey-text">Nama</p>
              <!-- </div> -->
            </li>
            <li class="collection-item avatar" style="min-height:63px;padding:10px 25px 0px 85px;">
              <!-- <div class="container"> -->
                <i class="material-icons circle right">phone</i>
                <span class="title" style="font-weight:500;"><?=$profileuser['nomertelepon_user']; ?></span>
                <p class="grey-text">No. Telp</p>
              <!-- </div> -->
            </li>
            <li class="collection-item avatar" style="min-height:63px;padding:10px 25px 0px 85px;">
              <!-- <div class="container"> -->
                <i class="material-icons circle right">date_range</i>
                <span class="title" style="font-weight:500;"><?=$umur.' Tahun'; ?></span>
                <p class="grey-text">Umur</p>
              <!-- </div> -->
            </li>
            <li class="collection-item avatar" style="min-height:63px;padding:10px 25px 0px 85px;">
              <!-- <div class="container"> -->
                <i class="material-icons circle right">exposure</i>
                <span class="title" style="font-weight:500;"><?=ucwords($profileuser['jeniskelamin_user']); ?></span>
                <p class="grey-text">Jenis Kelamin</p>
              <!-- </div> -->
            </li>
            <li class="collection-item avatar" style="min-height:63px;padding:10px 25px 0px 85px;">
              <!-- <div class="container"> -->
                <i class="material-icons circle right">location_on</i>
                <span class="title" style="font-weight:500;"><?=ucwords($profileuser['alamat_user']); ?></span>
                <p class="grey-text">Alamat</p>
              <!-- </div> -->
            </li>
            <li class="collection-item avatar" style="min-height:63px;padding:10px 25px 0px 85px;">
              <!-- <div class="container"> -->
                <i class="material-icons circle right">email</i>
                <span class="title" style="font-weight:500;"><?=$profileuser['email_user']; ?></span>
                <p class="grey-text">E-mail</p>
              <!-- </div> -->
            </li>
            <!-- <li class="collection-item" style="font-weight:bold;">Tentang Perusahaan</li> -->
          </ul>

          <span class="hideeditinput" style="top:180px;position:absolute;left:0;right:0;">
          <form action="<?= base_url('users/updateakun'); ?>" method="post" enctype="multipart/form-data">
          <div class="container">
            <div class="row" style="">
            <div class="file-field input-field col s12">
              <div class="btn blue">
                <span>File</span>
                <input type="file" name="fotoakun" class="fotoakun" multiple>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate hilangvaluetextmember" type="text" placeholder="Klik untuk pilih file">
              </div>
            </div>
            </div>

            <input type="hidden" name="idmemberlama" class="idmemberlama">
            <div class="row">
              <div class="input-field col s12" style="margin-top: -25px">
                <i class="material-icons prefix">credit_card</i>
                <input id="namaakun" class="namaakun validate" type="text" name="namaakun" value="<?=$profileuser['nama_user']; ?>" autocomplete="off" required>
                <label for="namaakun">Nama</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12" style="margin-top: -25px">
                <i class="material-icons prefix">phone</i>
                <input id="tlpakun" class="tlpakun validate" type="number" name="tlpakun" value="<?=$profileuser['nomertelepon_user']; ?>" autocomplete="off" required>
                <label for="tlpakun">No.telp</label>
              </div>
            </div>
            
            <div class="row">
              <div class="input-field col s12" style="margin-top: -25px">
                <i class="material-icons prefix">date_range</i>
                <input id="lahirakun" class="lahirakun datepicker" name="lahirakun" type="text" value="<?=$profileuser['tanggallahir_user']; ?>" required>
                <label for="lahirakun">Tanggal lahir</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12" style="margin-top: -25px">
                <i class="material-icons prefix">exposure</i>
                <select name="kelaminakun" class="kelaminakun" required>
                  <?php if($profileuser['jeniskelamin_user']=='laki-laki'){ ?>
                  <option selected value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                  <?php }else{ ?>
                  <option value="laki-laki">Laki-laki</option>
                  <option selected value="perempuan">Perempuan</option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12" style="margin-top: -25px">
                <i class="material-icons prefix">location_on</i>
                <input id="alamatakun" class="alamatakun validate" type="text" name="alamatakun" value="<?=$profileuser['alamat_user']; ?>" autocomplete="off" required>
                <label for="alamatakun">Alamat</label>
              </div>
            </div>
            
            <div class="row">
              <div class="input-field col s12" style="margin-top: -25px">
                <i class="material-icons grey-text prefix">email</i>
                <input id="emailakun" class="emailakun validate disabled" type="text" name="emailakun" value="<?=$profileuser['email_user']; ?>" autocomplete="off" required disabled>
                <label for="emailakun">Email</label>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <button type="submit" class="waves-effect waves-light btn-small blue" style="margin-top:-20px">simpan</button>
              </div>
            </div>

          </div>
          </form>
          </span>

              

          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content z-depth-2'>
            <li><a href="<?=base_url('users/setpassword'); ?>">Password</a></li>
            <!-- <li class="divider" tabindex="-1"></li> -->
            <li><a href="<?=base_url('auth/logout'); ?>">Keluar</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="<?=base_url('users/about'); ?>">About Us</a></li>
          </ul>

</div>
</div>

      <div class="fixed-action-btn editinfoakun" style="bottom:90px;">
        <a class="btn-floating btn-large blue">
          <i class="large material-icons">mode_edit</i>
        </a>
      </div>
      <div class="fixed-action-btn bataleditinfoakun" style="bottom:90px;">
        <a class="btn-floating btn-large red">
          <i class="large material-icons">close</i>
        </a>
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
            $('.dropdown-trigger').dropdown();
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

            var wwidth = $(window).width();
              if(wwidth>973){
                  $('.windowswidth').css('margin-top','30px');
                }else{
                  $('.windowswidth').css('margin-top','-40px');
                }
            $(window).resize(function() {
              var wwidth = $(window).width();
                if(wwidth>973){
                  $('.windowswidth').css('margin-top','30px');
                }else{
                  $('.windowswidth').css('margin-top','-40px');
                }
            });

              $('.navbarpencarian').hide();
            $('.triggernavbarcari').on('click',function(){
              $('.navbarmenu').hide();
              $('.navbarpencarian').fadeIn();
              $('.inputcariberanda').focus()
            });
            $('.closepencarian').on('click',function(){
              $('.navbarmenu').fadeIn();
              $('.navbarpencarian').hide();
            });

        });
      </script>
    </body>
  </html>