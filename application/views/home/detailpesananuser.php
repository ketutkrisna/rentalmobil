      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons left blue-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center blue-text">Detail pesanan</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center blue-text" style="font-size: 18px">Detail pesanan</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px;">
      <?php 
        $date = new DateTime($detailpesananuser['tanggalkembali_booking']);
        $timestamp = $date->getTimestamp();
        $waktusekarang=time();
        if($waktusekarang>$timestamp){
          $totalwaktu=($waktusekarang-$timestamp)/3600;
          $totaldenda=ceil($totalwaktu);
        }else{
          $totaldenda=0;
        }
        // var_dump($totaldenda);die;
      ?>

      <div class="group1" style="margin-top:50px">
      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="col s12">
              <!-- tempat flash data -->
              <?=$this->session->flashdata('message'); ?>
            </div>
          </div>
          <div class="card">
            <div class="card-image">
              <img class="materialboxed" src="<?=base_url('assets/img/mobil/'.$detailpesananuser['foto_mobil']); ?>">
              <span class="card-title orange-text" style="font-weight:bold;text-shadow:1px 1px 1px black;"><?=$detailpesananuser['nama_mobil']; ?></span>
              <a href="#modaldetailmobil" style="top:10px;right:10px" class="btn-floating halfway-fab waves-effect waves-light blue z-depth-2 modal-trigger"><i class="material-icons">article</i></a>
              <a href="#modalbuktibayar" style="top:60px;right:10px" class="btn-floating halfway-fab waves-effect waves-light orange z-depth-2 modal-trigger"><i class="material-icons">attach_money</i></a>
            </div>
            <div class="card-content" style="padding:0">
              <ul class="collection" style="font-weight:bold;">
                <li class="collection-item modal-trigger" href="#modaldetailuser"><div>Nama<a class="secondary-content right"><?=$detailpesananuser['nama_user']; ?><i class="material-icons blue-text left">touch_app</i></a></div></li>
                <li class="collection-item"><div>Kode Booking<a class="secondary-content"><?=$detailpesananuser['kode_booking']; ?></a></div></li>
                <li class="collection-item"><div>Tanggal Ambil<a class="secondary-content"><?=date('d M Y', strtotime($detailpesananuser['tanggalambil_booking'])); ?> (<?=$detailpesananuser['jamambil_booking']; ?>)</a></div></li>
                <li class="collection-item"><div>Tanggal Kembali<a class="secondary-content"><?=date('d M Y', strtotime($detailpesananuser['tanggalkembali_booking'])); ?> (<?=$detailpesananuser['jamambil_booking']; ?>)</a></div></li>
                <li class="collection-item"><div>Total<a class="secondary-content">Rp <?=number_format($detailpesananuser['totalharga_booking'], 0, ".", ".").'/'.$detailpesananuser['totalhari_booking']; ?>hari</a></div></li>
                <?php if($detailpesananuser['status_booking']=='diambil'||$detailpesananuser['status_booking']=='dikembalikan'||$detailpesananuser['status_booking']=='selesai'){ ?>
                  <?php if($detailpesananuser['denda_booking']==0){ ?>
                    <?php if($totaldenda==0){}else{ ?>
                    <li class="collection-item red-text"><div>Total Denda<a class="secondary-content red-text">Rp <?=number_format($detailpesananuser['denda_mobil']*$totaldenda, 0, ".", ".").'/'.$totaldenda.'jam'; ?></a></div></li>
                    <?php } ?>
                  <?php }else{ ?>
                    <li class="collection-item red-text"><div>Total Denda<a class="secondary-content red-text">Rp <?=number_format($detailpesananuser['denda_booking'], 0, ".", "."); ?></a></div></li>
                  <?php } ?>
                <?php } ?>
                <li class="collection-item"><div>Status<a class="secondary-content"><?=$detailpesananuser['status_booking']; ?></a></div></li>
                <li class="collection-item"><div>No.Tlp<a class="secondary-content"><?=$detailpesananuser['notlp_booking']; ?></a></div></li>
                <li class="collection-item"><div>Alamat: <br><a class="teal-text"><?=$detailpesananuser['alamat_booking']; ?></a></div></li>
                <li class="collection-item"><div><a class="waves-effect waves-light btn-small modal-trigger" href="#modalktp">KTP</a></div></li>
              </ul>
            </div>

            <?php if($detailpesananuser['statuspembayaran_booking']=='bayarditerima'||$detailpesananuser['status_booking']=='ditolak'||$detailpesananuser['status_booking']=='dicancel'||$detailpesananuser['status_booking']=='diambil'||$detailpesananuser['status_booking']=='dikembalikan'||$detailpesananuser['status_booking']=='selesai'){}else{ ?>
            <div class="card-action">
              <div class="row">
                <a onclick="return confirm('Pilih OK untuk cancel!')" href="<?=base_url('users/cancelpesanan/'.$detailpesananuser['id_booking']); ?>" class="btn red right">Cancel</a>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div><!-- group1 tutup -->

    <!-- Modal detail mobil -->
    <div id="modaldetailmobil" class="modal">
      <div class="modal-content" style="padding:0">
        <h5 style="padding-left:15px">Detail mobil</h5>
        <ul class="collection" style="font-weight:bold;">
          <li class="collection-item"><div>Nama<a class="secondary-content right"><?=$detailpesananuser['nama_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Jenis<a class="secondary-content"><?=$detailpesananuser['jenis_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Warna<a class="secondary-content"><?=$detailpesananuser['warna_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Nopol<a class="secondary-content"><?=$detailpesananuser['nopol_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Tarif<a class="secondary-content">Rp <?=number_format($detailpesananuser['tarif_mobil'], 0, ".", "."); ?>/hari</a></div></li>
          <li class="collection-item"><div>Denda<a class="secondary-content">Rp <?=number_format($detailpesananuser['denda_mobil'], 0, ".", "."); ?>/jam</a></div></li>
          <li class="collection-item"><div>Deskripsi: <br><a class="teal-text"><?=$detailpesananuser['deskripsi_mobil']; ?></a></div></li>
        </ul>
      </div>
    </div>
    <!-- Modal detail mobil -->
    <div id="modaldetailuser" class="modal">
      <div class="modal-content" style="padding:0">
        <h5 style="padding-left:15px">Detail User</h5>
        <img src="<?=base_url('assets/img/users/'.$detailpesananuser['foto_user']); ?>" width="100%">
        <ul class="collection" style="font-weight:bold;">
          <li class="collection-item"><div>Nama<a class="secondary-content right"><?=$detailpesananuser['nama_user']; ?></a></div></li>
          <li class="collection-item"><div>Tgl Lahir<a class="secondary-content"><?=date('d M Y', strtotime($detailpesananuser['tanggallahir_user'])); ?></a></div></li>
          <li class="collection-item"><div>Jenis Kelamin<a class="secondary-content"><?=$detailpesananuser['jeniskelamin_user']; ?></a></div></li>
          <li class="collection-item"><div>No.Tlp<a class="secondary-content"><?=$detailpesananuser['nomertelepon_user']; ?></a></div></li>
          <li class="collection-item"><div>Alamat: <br><a class="teal-text"><?=$detailpesananuser['alamat_user']; ?></a></div></li>
        </ul>
      </div>
    </div>
    <!-- Modal bukti pembayaran -->
    <div id="modalbuktibayar" class="modal">
      <div class="bungkus" style="padding-left:15px;padding-right:15px;padding-bottom:20px">
      <div class="modal-content" style="padding:0">
        <h5>Bukti Pembayaran</h5>
      <?php if($detailpesananuser['statuspembayaran_booking']=='belumbayar'){ ?>
        <p class="orange-text" style="font-size:15px;margin-top:-5px">Belum melakukan pembayaran!</p>
      <?php }else if($detailpesananuser['statuspembayaran_booking']=='sudahbayar'){ ?>
        <p class="green-text" style="font-size:15px;margin-top:-5px">Bukti pembayaran dikirim, tunggu konfirmasi penerimaan!</p>
      <?php }else if($detailpesananuser['statuspembayaran_booking']=='bayarditolak'){ ?>
        <p class="red-text" style="font-size:15px;margin-top:-5px">Bukti pembayaran ditolak!</p>
      <?php }else{ ?>
        <p class="blue-text" style="font-size:15px;margin-top:-5px">Bukti pembayaran diterima!</p>
      <?php } ?>

        <p style="margin-bottom:-10px;margin-top:-10px"><b>Cara Pembayaran</b></p>
        <p style="">Untuk terus mempermudah metode pembayaran bagi para customer rental mobil lampung, kini kami menyediakan berbagai alternatif metode pambayaran, yaitu:</p>
        <!-- <ul> -->
          <div class="container">
          <li>Mobile Banking</li>
          <li>Internet Banking</li>
          <li>SMS Banking</li>
          <li>Phone Banking</li>
          <li>ATM</li>
          <li>Transfer Bank</li>
          </div>
        <!-- </ul> -->
        <p style="margin-bottom: -0px"><b>Rekening Pembayaran Bank Lokal</b></p>
        <table class="striped">
          <tbody>
            <!-- <tr>
              <td style="padding:7px">Nama Bank</td>
              <td style="padding:7px">: <span style="font-weight: bold;">BRI</span></td>
            </tr> -->
            <tr>
              <td style="padding:7px">Atas Nama</td>
              <td style="padding:7px">: <span style="">An. Y EVA AGUSTIANDAR</span></td>
            </tr>
            <tr>
              <td style="padding:7px">Mandiri</td>
              <td style="padding:7px">: <span style="font-weight: bold;">1140-0055-2192-0</span></td>
            </tr>
            <tr>
              <td style="padding:7px">BNI</td>
              <td style="padding:7px">: <span style="font-weight: bold;">0269-1463-75</span></td>
            </tr>
            <tr>
              <td style="padding:7px">BRI</td>
              <td style="padding:7px">: <span style="font-weight: bold;">2077-0100-1619-500</span></td>
            </tr>
          </tbody>
        </table>

        <p style="margin-bottom: -0px"><b>Foto Bukti Pembayaran</b></p>
        <?php if($detailpesananuser['statuspembayaran_booking']=='belumbayar') { ?>
          <span class="grey-text">belum upload</span>
        <?php }else{ ?>
          <img class="materialboxed" src="<?=base_url('assets/img/buktibayar/'.$detailpesananuser['fotopembayaran_booking']); ?>" width="100%">
        <?php } ?>
        <?php if($detailpesananuser['statuspembayaran_booking']=='bayarditerima'||$detailpesananuser['status_booking']=='ditolak'||$detailpesananuser['status_booking']=='dicancel'||$detailpesananuser['status_booking']=='diambil'||$detailpesananuser['status_booking']=='dikembalikan'||$detailpesananuser['status_booking']=='selesai'){}else{ ?>
          <form action="<?=base_url('users/uploadbuktibayar'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="bookingid" value="<?=$detailpesananuser['id_booking']; ?>">
            <div class="file-field input-field">
              <div class="btn blue">
                <span>File</span>
                <input type="file" name="fotobuktibayar" required multiple>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload bukti pembayaran" required>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
              <button type="submit" name="kirimbukti" class="btn blue right">Upload</button>
              </div>
            </div>
          </form>
        <?php } ?>
      </div><!-- tutup modalcontent -->
      </div><!-- tutup bungkus -->
    </div>
    <!-- modals ktp -->
    <div id="modalktp" class="modal">
      <div class="modal-content" style="padding:0">
        <!-- <h4>Modal Header</h4>
        <p>A bunch of text</p> -->
        <img class="materialboxed" src="<?=base_url('assets/img/ktpuser/'.$detailpesananuser['ktp_booking']); ?>" width="100%">
      </div>
      <!-- <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
      </div> -->
    </div>


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
      $('.tooltipped').tooltip();
      $('select').formSelect();
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