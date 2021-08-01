      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('admin'); ?>"><i class="material-icons left blue-text">arrow_back</i></a></span>
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
        $date = new DateTime($detailpesananadmin['tanggalkembali_booking']);
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
              <img class="materialboxed" src="<?=base_url('assets/img/mobil/'.$detailpesananadmin['foto_mobil']); ?>">
              <span class="card-title orange-text" style="font-weight:bold;text-shadow:1px 1px 1px black;"><?=$detailpesananadmin['nama_mobil']; ?></span>
              <a href="#modaldetailmobil" style="top:10px;right:10px" class="btn-floating halfway-fab waves-effect waves-light blue z-depth-2 modal-trigger"><i class="material-icons">article</i></a>
              <a href="#modalbuktibayar" style="top:60px;right:10px" class="btn-floating halfway-fab waves-effect waves-light orange z-depth-2 modal-trigger"><i class="material-icons">attach_money</i></a>
            </div>
            <div class="card-content" style="padding:0">
              <ul class="collection" style="font-weight:bold;">
                <li class="collection-item modal-trigger" href="#modaldetailuser"><div>Nama<a class="secondary-content right"><?=$detailpesananadmin['nama_user']; ?><i class="material-icons blue-text left">touch_app</i></a></div></li>
                <li class="collection-item"><div>Kode Booking<a class="secondary-content"><?=$detailpesananadmin['kode_booking']; ?></a></div></li>
                <li class="collection-item"><div>Tanggal Ambil<a class="secondary-content"><?=date('d M Y', strtotime($detailpesananadmin['tanggalambil_booking'])); ?> (<?=$detailpesananadmin['jamambil_booking']; ?>)</a></div></li>
                <li class="collection-item"><div>Tanggal Kembali<a class="secondary-content"><?=date('d M Y', strtotime($detailpesananadmin['tanggalkembali_booking'])); ?> (<?=$detailpesananadmin['jamambil_booking']; ?>)</a></div></li>
                <li class="collection-item"><div>Total<a class="secondary-content">Rp <?=number_format($detailpesananadmin['totalharga_booking'], 0, ".", ".").'/'.$detailpesananadmin['totalhari_booking']; ?>hari</a></div></li>
                <?php if($detailpesananadmin['status_booking']=='diambil'){ ?>
                  <?php if($totaldenda==0){}else{ ?>
                  <li class="collection-item red-text"><div>Total Denda<a class="secondary-content red-text">Rp <?=number_format($detailpesananadmin['denda_mobil']*$totaldenda, 0, ".", ".").'/'.$totaldenda.'jam'; ?></a></div></li>
                  <?php } ?>
                <?php } if($detailpesananadmin['status_booking']=='dikembalikan'||$detailpesananadmin['status_booking']=='selesai'){ ?>
                  <?php if($detailpesananadmin['denda_booking']==0){}else{ ?>
                    <li class="collection-item red-text"><div>Total Denda<a class="secondary-content red-text">Rp <?=number_format($detailpesananadmin['denda_booking'], 0, ".", "."); ?></a></div></li>
                  <?php } ?>
                <?php } ?>
                <li class="collection-item"><div>Status<a class="secondary-content"><?=$detailpesananadmin['status_booking']; ?></a></div></li>
                <li class="collection-item"><div>No.Tlp<a class="secondary-content"><?=$detailpesananadmin['notlp_booking']; ?></a></div></li>
                <li class="collection-item"><div>Alamat: <br><a class="teal-text"><?=$detailpesananadmin['alamat_booking']; ?></a></div></li>
                <li class="collection-item"><div><a class="waves-effect waves-light btn-small modal-trigger" href="#modalktp">KTP</a></div></li>
              </ul>
            </div>
            <?php if($detailpesananadmin['status_booking']=='dipesan'||$detailpesananadmin['status_booking']=='dibayar'): ?>
              <?php if($detailpesananadmin['statuspembayaran_booking']=='bayarditerima'){ ?>
                <?php if($waktusekarang>$timestamp&&$detailpesananadmin['status_booking']=='dibayar'){ ?>
                  <div class="card-action">
                    <div class="row">
                      <a onclick="return confirm('Pilih OK untuk confirmasi telah selesai!')" href="<?=base_url('admin/prosesngilang/'.$detailpesananadmin['id_booking']); ?>" class="btn blue right">Proses selesai</a>
                    </div>
                  </div>
                <?php }else{ ?> 
                  <div class="card-action">
                    <div class="row">
                      <a onclick="return confirm('Pilih OK untuk confirmasi telah diambil!')" href="<?=base_url('admin/prosespengambilan/'.$detailpesananadmin['id_booking']); ?>" class="btn blue right">Proses Pengambilan</a>
                    </div>
                  </div>
                <?php } ?>
              <?php }else{ ?>
                <div class="card-action">
                  <div class="row">
                    <a onclick="return confirm('Pilih OK untuk tolak pesanan ini!')" href="<?=base_url('admin/prosestolak/'.$detailpesananadmin['id_booking']); ?>" class="btn red right">Tolak pesanan</a>
                  </div>
                </div> 
              <?php } ?>
            <?php endif; ?>

            <?php if($detailpesananadmin['status_booking']=='diambil'){ ?>
              <?php if($waktusekarang>$timestamp&&$detailpesananadmin['status_booking']=='diambil'){ ?>
                <div class="card-action">
                  <div class="row">
                    <form action="<?=base_url('admin/prosesdikembalikandenda/'); ?>" method="post">
                      <input type="hidden" name="idbooking" value="<?=$detailpesananadmin['id_booking']; ?>">
                      <div class="row">
                        <div class="input-field col s6 right" style="margin-top:-5px">
                          <input id="last_name" type="number" class="validate jumlahdenda" name="jumlahdenda" required>
                          <label for="last_name">Jumlah denda</label>
                        </div>
                      </div>
                      <button style="margin-top:-30px" class="btn blue right kirimdenda" type="submit" name="kirimdenda">Confirmasi dikembalikan</button>
                    </form>
                   <!--  <a onclick="return confirm('Confirmasi telah dikembalikan,dengan denda Rp <?=number_format($detailpesananadmin['denda_mobil']*$totaldenda, 0, ".", "."); ?>')" href="<?=base_url('admin/prosesdikembalikandenda/'.$detailpesananadmin['id_booking'].'/'.$detailpesananadmin['denda_mobil']*$totaldenda); ?>" class="btn blue right">Confirmasi dikembalikan</a> -->
                  </div>
                </div>
              <?php }else{ ?>
                <div class="card-action">
                  <div class="row">
                    <a onclick="return confirm('Pilih OK untuk konfirmasi telah dikembalikan!')" href="<?=base_url('admin/prosesdikembalikan/'.$detailpesananadmin['id_booking']); ?>" class="btn blue right">Confirmasi dikembalikan</a>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>

            <?php if($detailpesananadmin['status_booking']=='dikembalikan'){ ?>
                <div class="card-action">
                  <div class="row">
                    <a onclick="return confirm('Pilih OK untuk konfirmasi telah selesai!')" href="<?=base_url('admin/prosesselesai/'.$detailpesananadmin['id_booking']); ?>" class="btn blue right">Confirmasi selesai</a>
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
          <li class="collection-item"><div>Nama<a class="secondary-content right"><?=$detailpesananadmin['nama_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Jenis<a class="secondary-content"><?=$detailpesananadmin['jenis_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Warna<a class="secondary-content"><?=$detailpesananadmin['warna_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Nopol<a class="secondary-content"><?=$detailpesananadmin['nopol_mobil']; ?></a></div></li>
          <li class="collection-item"><div>Tarif<a class="secondary-content">Rp <?=number_format($detailpesananadmin['tarif_mobil'], 0, ".", "."); ?>/hari</a></div></li>
          <li class="collection-item"><div>Denda<a class="secondary-content">Rp <?=number_format($detailpesananadmin['denda_mobil'], 0, ".", "."); ?>/jam</a></div></li>
          <li class="collection-item"><div>Deskripsi: <br><a class="teal-text"><?=$detailpesananadmin['deskripsi_mobil']; ?></a></div></li>
        </ul>
      </div>
    </div>
    <!-- Modal detail mobil -->
    <div id="modaldetailuser" class="modal">
      <div class="modal-content" style="padding:0">
        <h5 style="padding-left:15px">Detail User</h5>
        <img src="<?=base_url('assets/img/users/'.$detailpesananadmin['foto_user']); ?>" width="100%">
        <ul class="collection" style="font-weight:bold;">
          <li class="collection-item"><div>Nama<a class="secondary-content right"><?=$detailpesananadmin['nama_user']; ?></a></div></li>
          <li class="collection-item"><div>Tgl Lahir<a class="secondary-content"><?=date('d M Y', strtotime($detailpesananadmin['tanggallahir_user'])); ?></a></div></li>
          <li class="collection-item"><div>Jenis Kelamin<a class="secondary-content"><?=$detailpesananadmin['jeniskelamin_user']; ?></a></div></li>
          <li class="collection-item"><div>No.Tlp<a class="secondary-content"><?=$detailpesananadmin['nomertelepon_user']; ?></a></div></li>
          <li class="collection-item"><div>Alamat: <br><a class="teal-text"><?=$detailpesananadmin['alamat_user']; ?></a></div></li>
        </ul>
      </div>
    </div>
    <!-- Modal bukti pembayaran -->
    <div id="modalbuktibayar" class="modal">
      <div class="modal-content" style="padding:0">
        <h5 style="padding-left:15px">Bukti Pembayaran</h5>
      <?php if($detailpesananadmin['statuspembayaran_booking']=='belumbayar'){ ?>
        <p class="center red-text" style="font-size:19px">Belum melakukan pembayaran!</p>
      <?php }else{ ?>
      <?php  
        if($detailpesananadmin['statuspembayaran_booking']=='sudahbayar'){
          echo '<span class="green-text" style="padding-left:15px">Bukti pembayaran baru telah masuk!</span>';
        }else if($detailpesananadmin['statuspembayaran_booking']=='bayarditolak'){
          echo '<span class="red-text" style="padding-left:15px">Bukti pembayaran telah anda tolak!</span>';
        }else if($detailpesananadmin['statuspembayaran_booking']=='bayarditerima'){
          echo '<span class="blue-text" style="padding-left:15px">Bukti pembayaran telah anda terima!</span>';
        }
      ?>
        <img class="materialboxed" src="<?=base_url('assets/img/buktibayar/'.$detailpesananadmin['fotopembayaran_booking']); ?>" width="100%">
      </div>
      <?php if($detailpesananadmin['status_booking']=='diambil'||$detailpesananadmin['status_booking']=='dikembalikan'||$detailpesananadmin['status_booking']=='selesai'||$detailpesananadmin['status_booking']=='ditolak'){}else{ ?>
        <div class="modal-footer">
          <a onclick="return confirm('Tolak pembayaran ini?');" href="<?=base_url('admin/tolakbuktibayar/'.$detailpesananadmin['id_booking']); ?>" class="modal-close waves-effect waves-green red btn-small">Tolak</a>
          <a onclick="return confirm('Terima pembayaran ini?');" href="<?=base_url('admin/terimabuktibayar/'.$detailpesananadmin['id_booking']); ?>" class="modal-close waves-effect waves-green blue btn-small">Terima</a>
        </div>
      <?php } ?>
      <?php } ?>
    </div>
  </div>

<!-- modals ktp -->
  <div id="modalktp" class="modal">
    <div class="modal-content" style="padding:0">
      <!-- <h4>Modal Header</h4>
      <p>A bunch of text</p> -->
      <img class="materialboxed" src="<?=base_url('assets/img/ktpuser/'.$detailpesananadmin['ktp_booking']); ?>" width="100%">
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

      function rubah(angka){
       var reverse = angka.toString().split('').reverse().join(''),
       ribuan = reverse.match(/\d{1,3}/g);
       ribuan = ribuan.join('.').split('').reverse().join('');
       return ribuan;
      }

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

        $('.kirimdenda').on('click',function(){
          var jumlahdendaa=$('.jumlahdenda').val();
          return confirm('Pilih OK untuk konfirmasi dikembalikan,dengan denda Rp '+rubah(jumlahdendaa));
        });

    });
    </script>
    </body>
  </html>