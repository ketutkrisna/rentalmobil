    <div class="navbar-fixed navbarpencarian">
      <nav class="white z-depth-0" style="top: -1px;">
        <div class="nav-wrapper">
          <form action="<?=base_url('users/carinamamobil'); ?>" method="post">
            <div class="input-field">
              <input style="border:1px solid #ddd" id="search" type="search" name="carimobil" class="inputcariberanda" autocomplete="off" placeholder="Cari nama mobil" value="<?=$valuecari; ?>">
              <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
              <button class="material-icons blue" type="submit" name="carimobilkirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;"><i class="material-icons caridatanotifikasi">search</i></button>
            </div>
          </form>
        </div>
      </nav>
    </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px;">
        
        <div class="row">
        <div class="col s12 center" style="margin-bottom:-15px;margin-top:-10px">
              <span style="font-size:20px;">DAFTAR MOBIL</span>
        </div>
        </div>

        <div class="row">
          <div class="col s12">
            <!-- tempat flash data -->
            <?=$this->session->flashdata('message'); ?>
          </div>
        </div>

        <div class="row" style="margin-top:-15px">
        <?php foreach($daftarmobil as $dftm): ?>
          <div class="col s12 m6 l4" style="margin-top:-5px;">
            <div class="card horizontal grey lighten-4">
              <div class="card-image">
                <img class="materialboxed" src="<?=base_url('assets/img/mobil/'.$dftm['foto_mobil']); ?>">
              </div>
              <div class="card-stacked">
                <div class="card-content">

                  <table class="" style="margin-top:-20px;margin-left:-20px;border:0;font-weight:bold;">
                    <tbody>
                      <tr style="border:0">
                        <td style="padding: 0">Nama</td>
                        <td style="padding: 0">:<?=$dftm['nama_mobil']; ?></td>
                      </tr>
                      <tr style="border:0">
                        <td style="padding: 0">Tarif</td>
                        <td style="padding: 0">:<?='Rp'.number_format($dftm['tarif_mobil'], 0, ".", ".").'/hari'; ?></td>
                      </tr>
                      <tr style="border:0">
                        <td style="padding: 0">Warna</td>
                        <td style="padding: 0">:<?=$dftm['warna_mobil']; ?></td>
                      </tr>
                    </tbody>
                  </table>

                </div>
                <div class="card-action">
                  <table class="" style="margin-top:-20px;margin-left:-30px;border:0">
                    <tbody>
                      <tr style="border:0">
                        <td style="padding:3px 3px 3px 6px;"><a href="<?=base_url('users/bookingmobil/'.$dftm['id_mobil']); ?>" class="teal btn-small left">Booking</a></td>
                        <td style="padding:0"><a href="<?=base_url('users/detailmobil/'.$dftm['id_mobil']); ?>" class="blue btn-small right">detail</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>

      <?php if($this->session->userdata('level_user')=='admin'){ ?>
        <div class="fixed-action-btn" style="bottom: 70px">
          <a class="btn-floating btn-large blue waves-effect waves-grey z-depth-2 modal-trigger" href="#modaltambahproduk">
            <i class="large material-icons white-text" style="font-size:25px;">post_add</i>
          </a>
        </div>
      <?php } ?>

        <!-- Modal Structure tambah produk-->
        <div id="modaltambahproduk" class="modal">
          <div class="modal-content">

            <h5 style="margin-top:-10px">Tambah Mobil</h5>
            <form action="<?=base_url('admin/tambahmobil/'); ?>" method="post" enctype="multipart/form-data">
              <div class="file-field input-field">
                <div class="btn blue">
                  <span>File</span>
                  <input type="file" name="fotomobil" required multiple>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" required placeholder="Upload foto mobil">
                </div>
              </div>
              <div class="input-field">
                <input id="lastnama" type="text" class="validate" name="namamobil" required>
                <label for="lastnama">Nama mobil</label>
              </div>
              <div class="input-field">
                <input id="lastwarna" type="text" class="validate" name="jenismobil" required>
                <label for="lastwarna">Jenis mobil</label>
              </div>
              <div class="input-field">
                <input id="lastwarna1" type="text" class="validate" name="warnamobil" required>
                <label for="lastwarna1">Warna mobil</label>
              </div>
              <div class="input-field">
                <input id="lastwarna2" type="text" class="validate" name="nopolmobil" required>
                <label for="lastwarna2">Nopol mobil</label>
              </div>
              <div class="input-field">
                <input id="lastwarna3" type="text" class="validate" name="tarifmobil" required>
                <label for="lastwarna3">Tarif mobil/hari</label>
              </div>
              <div class="input-field">
                <input id="lastwarna4" type="text" class="validate" name="dendamobil" required>
                <label for="lastwarna4">Denda mobil/jam</label>
              </div>
              <div class="input-field">
                <textarea id="textarea5" class="materialize-textarea validate" name="deskripsimobil"></textarea>
                <label for="textarea5">Deskripsi mobil</label>
              </div>
              <button class="btn waves-effect waves-light right blue" type="submit" name="tambah">Tambah</button>
            </form>
          </div>
          <div class="modal-footer" style="margin-top:-20px">
            <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
          </div>
        </div>
        <!-- tutup modal tambah produk -->


</div>
</div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){

      $('.slider').slider({
        'height':300
      });
      $('.materialboxed').materialbox();
      $('.modal').modal();

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
        $('.close').on('click',function(){
          $('.hideflash').fadeOut();
        });

  });
    </script>
    </body>
  </html>