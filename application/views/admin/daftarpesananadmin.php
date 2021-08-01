    <div class="navbar-fixed navbarpencarian">
      <nav class="white z-depth-0" style="top: -1px;">
        <div class="nav-wrapper">
          <form action="<?=base_url('admin/carikodebooking'); ?>" method="post">
            <div class="input-field">
              <input style="border:1px solid #ddd" id="search" type="search" name="carikodebooking" class="inputcariberanda" autocomplete="off" placeholder="Cari kode booking" value="<?=$valuecari;?>">
              <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
              <button class="material-icons blue" type="submit" name="carikirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;"><i class="material-icons caridatanotifikasi">search</i></button>
            </div>
          </form>
        </div>
      </nav>
    </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px">


    <div class="row">
      <div class="col s12 center" style="margin-bottom:-10px;margin-top:-10px">
            <span style="font-size: 20px;">DAFTAR PESANAN</span>
      </div>
    </div>

<?php if($qdipesanbelum<=0&&$qdipesan<=0&&$qdibayarbelum<=0&&$qdibayar<=0&&$qdiambil<=0&&$qdikembalikan<=0&&$qselesai<=0&&$qditolak<=0&&$qdicancel<=0){ ?>
    <p class="center">Data <b><?=$valuecari;?></b> tidak ditemukan!</p>
<?php }else{ ?>

    <div class="row" style="margin-top:-20px;position:relative;">
      <form action="<?= base_url('admin/methodsorting'); ?>" method="post" style="position: absolute;right: 15px">
        <div class="kanan" style="">
        <div class="col s7 offset-s3">
          <div class="input-field">
            <select name="sortingdata">
            <?php if($method=='terbaru'){ ?>
              <option value="" disabled>sorting</option>
              <option value="terbaru" selected>Terbaru</option>
              <option value="terbanyak">Terbanyak</option>
            <?php }else if($method=='terbanyak'){ ?>
              <option value="" disabled>sorting</option>
              <option value="terbaru">Terbaru</option>
              <option value="terbanyak" selected>Terbanyak</option>
            <?php }else{ ?>
              <option value=""  selected disabled>sorting</option>
              <option value="terbaru">Terbaru</option>
              <option value="terbanyak">Terbanyak</option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="col s2">
          <div class="input-field">
            <button style="margin-top:5px;margin-left:-15px" class="btn blue" type="submit" name="sorting">Ok</button>
          </div>
        </div>
        </div>
      </form>
    </div>

    <div class="group1" style="margin-top:70px">
    <div class="row">
    <div class="col s12">
  <?php if($qdipesanbelum<=0&&$qdibayarbelum<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">notifications_active</i>
        <span class="left" style="margin-left:-10px">Pesanan baru</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['notif_booking']=='belumdilihat'&&$dpa['status_booking']=='dipesan'||$dpa['notif_booking']=='belumdilihat'&&$dpa['status_booking']=='dibayar'): ?>
        <li class="collection-item avatar teal lighten-5">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
            <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
            <br>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
            <?php 
              $waktu=time()-$dpa['tanggalpemesanan_booking'];
              if($waktu<60){
                echo $waktu.' detik lalu';
              }else if($waktu>=60&&$waktu<=3600){
                $waktumenit=$waktu/60;
                echo floor($waktumenit).' menit lalu';
              }else if($waktu>=3600&&$waktu<=86400){
                $waktujam=$waktu/3600;
                echo floor($waktujam).' jam lalu';
              }else if($waktu>=86400&&$waktu<=604800){
                $waktuhari=$waktu/86400;
                echo floor($waktuhari).' hari lalu';
              }else if($waktu>=604800&&$waktu<=2592000){
                $waktuminggu=$waktu/604800;
                echo floor($waktuminggu).' minggu lalu';
              }else if($waktu>=2592000&&$waktu<=31536000){
                $waktubulan=$waktu/2592000;
                echo floor($waktubulan).' bulan lalu';
              }else{
                $waktutahun=$waktu/31536000;
                echo floor($waktubulan).' tahun lalu';
              }
            ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text" style="">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qdipesan<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">library_add_check</i>
        <span class="left" style="margin-left:-10px">Pesanan dikonfirmasi</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='dipesan'&&$dpa['notif_booking']=='sudahdilihat'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                // $date = new DateTime($dpa['tanggalkembali_booking'].' '.$dpa['jamambil_booking']);
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qdibayar<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">monetization_on</i>
        <span class="left" style="margin-left:-10px">Pesanan dibayar</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='dibayar'&&$dpa['notif_booking']=='sudahdilihat'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <?php if($dpa['statuspembayaran_booking']=='sudahbayar'){ ?>
                <i class="material-icons circle blue tooltipped" data-position="top" data-tooltip="<?=$dpa['statuspembayaran_booking']; ?>" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <?php }else if($dpa['statuspembayaran_booking']=='bayarditolak'){ ?>
                <i class="material-icons circle red tooltipped" data-position="top" data-tooltip="<?=$dpa['statuspembayaran_booking']; ?>" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <?php }else{ ?>
                <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="<?=$dpa['statuspembayaran_booking']; ?>" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <?php } ?>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qdiambil<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">departure_board</i>
        <span class="left" style="margin-left:-10px">Pesanan diambil</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='diambil'&&$dpa['notif_booking']=='sudahdilihat'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="bayarditerima" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qdikembalikan<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">save_alt</i>
        <span class="left" style="margin-left:-10px">Pesanan dikembalikan</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='dikembalikan'&&$dpa['notif_booking']=='sudahdilihat'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="bayarditerima" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qselesai<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">verified</i>
        <span class="left" style="margin-left:-10px">Pesanan selesai</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='selesai'&&$dpa['notif_booking']=='sudahdilihat'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="bayarditerima" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qditolak<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">remove_shopping_cart</i>
        <span class="left" style="margin-left:-10px">Pesanan ditolak</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='ditolak'&&$dpa['notif_booking']=='sudahdilihat'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle red tooltipped" data-position="top" data-tooltip="ditolak" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">highlight_off</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

  <?php if($qdicancel<=0){}else{ ?>
      <span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
        <i class="material-icons blue-text left">clear</i>
        <span class="left" style="margin-left:-10px">Pesanan dicancel</span>
      </span>
      <ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananadmin as $dpa): ?>
        <?php if($dpa['status_booking']=='dicancel'): ?>
        <li class="collection-item avatar">
            <img src="<?=base_url('assets/img/users/'.$dpa['foto_user']); ?>" alt="" class="circle">
            <span class="title"><b><?=$dpa['nama_user']; ?></b> booking mobil <?=$dpa['nama_mobil'].' '.$dpa['totalhari_booking']; ?> hari</span>
            <p class="" style="color:#757575;">
              <?='Diambil : '.date('d M Y', strtotime($dpa['tanggalambil_booking'])).' '.$dpa['jamambil_booking']; ?>
              <?php 
                $date = new DateTime($dpa['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
              <span>Status</span> :
              <i class="material-icons circle orange tooltipped" data-position="top" data-tooltip="dicancel" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
            </p>
            <!-- notif bukti pembayaran -->
            <span class="grey-text" style="font-size:11px;padding:3px 0 3px -3px;">
              <?php 
                $waktu=time()-$dpa['tanggalpemesanan_booking'];
                if($waktu<60){
                  echo $waktu.' detik lalu';
                }else if($waktu>=60&&$waktu<=3600){
                  $waktumenit=$waktu/60;
                  echo floor($waktumenit).' menit lalu';
                }else if($waktu>=3600&&$waktu<=86400){
                  $waktujam=$waktu/3600;
                  echo floor($waktujam).' jam lalu';
                }else if($waktu>=86400&&$waktu<=604800){
                  $waktuhari=$waktu/86400;
                  echo floor($waktuhari).' hari lalu';
                }else if($waktu>=604800&&$waktu<=2592000){
                  $waktuminggu=$waktu/604800;
                  echo floor($waktuminggu).' minggu lalu';
                }else if($waktu>=2592000&&$waktu<=31536000){
                  $waktubulan=$waktu/2592000;
                  echo floor($waktubulan).' bulan lalu';
                }else{
                  $waktutahun=$waktu/31536000;
                  echo floor($waktubulan).' tahun lalu';
                }
              ?>
            </span>
            <!-- link url detail pesanan -->
            <span class="right badge blue white-text">
              <a href="<?=base_url('admin/detailpesananadmin/'.$dpa['id_booking']); ?>" class="white-text">Detail</a>
            </span>
            <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
  <?php } ?>

    </div>
    </div>
    </div><!-- tutup group1 -->

<?php } ?>

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