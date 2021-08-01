    <div class="navbar-fixed navbarpencarian">
      <nav class="white z-depth-0" style="top: -1px;">
        <div class="nav-wrapper">
          <form action="<?=base_url('users/carikodebooking'); ?>" method="post">
            <div class="input-field">
              <input style="border:1px solid #ddd" id="search" type="search" name="carikodebooking" class="inputcariberanda" autocomplete="off" placeholder="Cari kode booking" value="<?=$valuecari; ?>">
              <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
              <button class="material-icons blue" type="submit" name="carikirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;"><i class="material-icons caridatanotifikasi">search</i></button>
            </div>
          </form>
        </div>
      </nav>
    </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px;">


	  <div class="row">
      <div class="col s12 center" style="margin-bottom:-15px;margin-top:-10px">
        <span style="font-size: 20px;">DAFTAR PESANAN </span>
      </div>
    </div>

<?php if($qcountcari<=0){ ?>
    <p class="center">Data <b><?=$valuecari; ?></b> tidak ditemukan</p>
<?php }else{ ?>

    <div class="row">
    <div class="col s12">
	  	<span style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px">
	  		<i class="material-icons blue-text left">local_police</i>
	  		<span class="left" style="margin-left:-10px">Pesanan anda</span>
	  	</span>
	  	<ul class="collection z-depth-2" style="border-radius:5px">
      <?php foreach($daftarpesananuser as $dpu): ?>
	    	<li class="collection-item avatar">
	      		<img src="<?=base_url('assets/img/users/'.$dpu['foto_user']); ?>" alt="" class="circle">
	      		<span class="title"><b>Anda</b> booking mobil <?=$dpu['nama_mobil'].' '.$dpu['totalhari_booking']; ?> hari</span>
	      		<p class="grey-text">
              <?='Diambil : '.date('d M Y', strtotime($dpu['tanggalambil_booking'])).' '.$dpu['jamambil_booking']; ?>
              <?php 
                // $date = new DateTime($dpu['tanggalkembali_booking'].' '.$dpu['jamambil_booking']);
                $date = new DateTime($dpu['tanggalkembali_booking']);
                $timestamp = $date->getTimestamp();
                $waktusekarang=time();
                if($waktusekarang>$timestamp){
                  echo '(<span class="red-text">Berahir</span>)';
                }
              ?>
              <br>
	        		<span>Status</span> :
            <?php if($dpu['status_booking']=='dipesan'){ ?>
		        	<i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            <?php }else if($dpu['status_booking']=='dibayar'){ ?>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
            <?php if($dpu['statuspembayaran_booking']=='sudahbayar'){ ?>
              <i class="material-icons circle blue tooltipped" data-position="top" data-tooltip="<?=$dpu['statuspembayaran_booking']; ?>" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
            <?php }else if($dpu['statuspembayaran_booking']=='bayarditolak'){ ?>
              <i class="material-icons circle red tooltipped" data-position="top" data-tooltip="<?=$dpu['statuspembayaran_booking']; ?>" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
            <?php }else{ ?>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="<?=$dpu['statuspembayaran_booking']; ?>" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
            <?php } ?>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            <?php }else if($dpu['status_booking']=='diambil'){ ?>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            <?php }else if($dpu['status_booking']=='dikembalikan'){ ?>
              <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            <?php }else if($dpu['status_booking']=='selesai'){ ?>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikembalikan" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">reply_all</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="diambil" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">electric_car</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
              <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dipesan" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">mark_email_read</i>
            <?php }else if($dpu['status_booking']=='ditolak'){ ?>
              <i class="material-icons circle red tooltipped" data-position="top" data-tooltip="ditolak" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
            <?php }else if($dpu['status_booking']=='dicancel'){ ?>
              <i class="material-icons circle orange tooltipped" data-position="top" data-tooltip="dicancel" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
            <?php } ?>
	      		</p>
	      		<!-- notif bukti pembayaran -->
	      		<span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
          		<?php 
                $waktu=time()-$dpu['tanggalpemesanan_booking'];
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
	      			<a href="<?=base_url('users/detailpesananuser/'.$dpu['id_booking']); ?>" class="white-text">Detail</a>
	      		</span>
	      		<!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
	    	</li>
      <?php endforeach; ?>
	  	</ul>
	  </div>
	  </div>

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