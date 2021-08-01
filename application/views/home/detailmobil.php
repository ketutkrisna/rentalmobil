      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/daftarmobil'); ?>"><i class="material-icons left blue-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center blue-text">Detail mobil</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center blue-text" style="font-size: 18px">Detail mobil</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px;">

      <div class="group1" style="margin-top:50px">
      <div class="row">
        <div class="col s12">
        <!-- tempat flash data -->
          <?=$this->session->flashdata('message'); ?>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-image">
              <img class="materialboxed" src="<?=base_url('assets/img/mobil/'.$detailmobil['foto_mobil']); ?>">
              <span class="card-title orange-text" style="font-weight:bold;text-shadow:1px 1px 1px black;"><?=$detailmobil['nama_mobil']; ?></span>
              <?php if($this->session->userdata('level_user')=='admin'){ ?>
              <a href="#modaleditproduk" style="top:10px;right:10px;" class="btn-floating halfway-fab waves-effect waves-light blue z-depth-2 modal-trigger"><i class="material-icons">create</i></a>
              <a onclick="return confirm('Pilih OK untuk hapus!');" href="<?=base_url('admin/hapusmobil/'.$detailmobil['id_mobil']); ?>" style="top:60px;right:10px;" class="btn-floating halfway-fab waves-effect waves-light red z-depth-2 modal-trigger"><i class="material-icons">delete_forever</i></a>
              <?php } ?>
            </div>
            <div class="card-content" style="padding:0">
              <ul class="collection with-header" style="font-weight:bold;">
                <li class="collection-item"><div>Nama<a class="secondary-content"><?=$detailmobil['nama_mobil']; ?></a></div></li>
                <li class="collection-item"><div>Jenis<a class="secondary-content"><?=$detailmobil['jenis_mobil']; ?></a></div></li>
                <li class="collection-item"><div>Warna<a class="secondary-content"><?=$detailmobil['warna_mobil']; ?></a></div></li>
                <li class="collection-item"><div>Nopol<a class="secondary-content"><?=$detailmobil['nopol_mobil']; ?></a></div></li>
                <li class="collection-item"><div>Tarif<a class="secondary-content"><?='Rp '.number_format($detailmobil['tarif_mobil'], 0, ".", ".").'/hari'; ?></a></div></li>
                <li class="collection-item"><div>Denda<a class="secondary-content"><?='Rp '.number_format($detailmobil['denda_mobil'], 0, ".", ".").'/jam'; ?></a></div></li>
                <li class="collection-item left"><div>Deskripsi: <br><a class="teal-text"><?=$detailmobil['deskripsi_mobil']; ?></a></div></li>
              </ul>
              <div class="card-action">
                <div class="row">
                <a href="<?=base_url('users/bookingmobil/'.$detailmobil['id_mobil']); ?>" class="btn teal right">Booking</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

      <!-- Modal Structure tambah produk-->
      <div id="modaleditproduk" class="modal">
        <div class="modal-content">

          <h5 style="margin-top:-10px">Edit Mobil</h5>
          <form action="<?=base_url('admin/editmobil/'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idmobil" value="<?=$detailmobil['id_mobil']; ?>">
            <div class="file-field input-field">
              <div class="btn blue">
                <span>File</span>
                <input type="file" name="fotomobil" multiple>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload foto mobil">
              </div>
            </div>
            <div class="input-field">
              <input id="lastnama" type="text" class="validate" name="namamobil" value="<?=$detailmobil['nama_mobil']; ?>" required>
              <label for="lastnama">Nama mobil</label>
            </div>
            <div class="input-field">
              <input id="lastwarna" type="text" class="validate" name="jenismobil" value="<?=$detailmobil['jenis_mobil']; ?>" required>
              <label for="lastwarna">Jenis mobil</label>
            </div>
            <div class="input-field">
              <input id="lastwarna1" type="text" class="validate" name="warnamobil" value="<?=$detailmobil['warna_mobil']; ?>" required>
              <label for="lastwarna1">Warna mobil</label>
            </div>
            <div class="input-field">
              <input id="lastwarna2" type="text" class="validate" name="nopolmobil" value="<?=$detailmobil['nopol_mobil']; ?>" required>
              <label for="lastwarna2">Nopol mobil</label>
            </div>
            <div class="input-field">
              <input id="lastwarna3" type="text" class="validate" name="tarifmobil" value="<?=$detailmobil['tarif_mobil']; ?>" required>
              <label for="lastwarna3">Tarif mobil/hari</label>
            </div>
            <div class="input-field">
              <input id="lastwarna4" type="text" class="validate" name="dendamobil" value="<?=$detailmobil['denda_mobil']; ?>" required>
              <label for="lastwarna4">Denda mobil/jam</label>
            </div>
            <div class="input-field">
              <textarea id="textarea5" class="materialize-textarea validate" name="deskripsimobil"><?=$detailmobil['deskripsi_mobil']; ?></textarea>
              <label for="textarea5">Deskripsi mobil</label>
            </div>
            <button class="btn waves-effect waves-light right blue" type="submit" name="simpan">Simpan</button>
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