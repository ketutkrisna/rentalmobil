      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/daftarmobil'); ?>"><i class="material-icons left blue-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center blue-text">Booking mobil</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center blue-text" style="font-size: 18px">Booking mobil</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

<div class="row" style="max-width:1000px;min-height:600px">
<div class="col s12 windowswidth" style="padding-bottom:20px">

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
              <a href="#modaleditproduk" style="top:10px;right:10px;" class="btn-floating halfway-fab waves-effect waves-light blue z-depth-2 modal-trigger"><i class="material-icons">list_alt</i></a>
            </div>
            <div class="card-content">
            <form action="<?=base_url('users/booking/'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" class="idmobil" name="idmobil" value="<?=$detailmobil['id_mobil']; ?>">
              <input type="hidden" name="totalbooking" class="valuetotalboking">
              <div class="row">
                <div class="input-field col s6">
                  <input id="first_name" type="date" class="tanggalambil" name="tanggalambil" required>
                  <label for="first_name" class="tgla">Tgl ambil</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="date" class="tanggalkembali" name="tanggalkembali" required>
                  <label for="last_name" class="tglk">Tgl kembali</label>
                </div>
              </div>
              <!-- <div class="input-field" style="margin-top:-15px">
                <button class="btn-small">cek tanggal</button>
              </div> -->
              <div class="input-field" style="margin-top:-20px">
                <input id="lastwarna1" type="time" class="jamambilmobil" name="jamambilmobil" required>
                <label for="lastwarna1">Jam pengambilan</label>
              </div>
              <div class="input-field">
                <input id="lastnama" type="text" class="validate" name="alamatbooking" required>
                <label for="lastnama">Alamat anda</label>
              </div>
              <div class="input-field">
                <input id="lastwarna" type="number" class="validate" name="tlpbooking" required>
                <label for="lastwarna">No.Tlp anda</label>
              </div>
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="ktpbooking" required multiple>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload ktp anda.." required>
                </div>
              </div>
              <div class="row">
                <div class="col s12" style="margin-top:-10px;">
                  <span class="left totalbooking"></span>
                  <span class="right red-text cekmobil"></span>
                </div>
              </div>
              <?php if($this->session->userdata('level_user')=='admin'){}else{ ?>
              <button class="btn waves-effect waves-light blue btnbooking" type="submit" name="booking">Kirim</button>
              <?php } ?>
            </form>
            </div>
          </div>
        </div>
      </div>
      </div>

      <!-- Modal Structure tambah produk-->
      <div id="modaleditproduk" class="modal">
        <div class="modal-content" style="padding:0">

          <h5 style="padding-left:15px">Detail Mobil</h5>
          <ul class="collection with-header" style="font-weight:bold;">
            <li class="collection-item"><div>Nama :<a class="secondary-content"><?=$detailmobil['nama_mobil']; ?></a></div></li>
            <li class="collection-item"><div>Jenis :<a class="secondary-content"><?=$detailmobil['jenis_mobil']; ?></a></div></li>
            <li class="collection-item"><div>Warna :<a class="secondary-content"><?=$detailmobil['warna_mobil']; ?></a></div></li>
            <li class="collection-item"><div>Nopol :<a class="secondary-content"><?=$detailmobil['nopol_mobil']; ?></a></div></li>
            <li class="collection-item"><div>Tarif :<a class="secondary-content"><?='Rp '.number_format($detailmobil['tarif_mobil'], 0, ".", ".").'/hari'; ?></a></div></li>
            <li class="collection-item"><div>Denda :<a class="secondary-content"><?='Rp '.number_format($detailmobil['denda_mobil'], 0, ".", ".").'/jam'; ?></a></div></li>
            <li class="collection-item left"><div>Deskripsi: <br><a class="teal-text"><?=$detailmobil['deskripsi_mobil']; ?></a></div></li>
          </ul>
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

      var base_url='<?=base_url(); ?>';
      $('.slider').slider({
        'height':300
      });
      $('.materialboxed').materialbox();
      $('.modal').modal();
      $('.datepicker').datepicker();
      $('.timepicker').timepicker();

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

      // $('.timepicker').on('click',function(){
      //   $('.timepicker').attr('autofocus','off');
      // });

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

        function rubah(angka){
         var reverse = angka.toString().split('').reverse().join(''),
         ribuan = reverse.match(/\d{1,3}/g);
         ribuan = ribuan.join('.').split('').reverse().join('');
         return ribuan;
        }

        $('.tanggalambil').on('change',function(){
          var hari = 24*60*60*1000; // format perhitungan dalam 1 hari
          var tgl_1 = new Date($('.tanggalambil').val());
          var tgl_2 = new Date($('.tanggalkembali').val());
          var total_hari = Math.round(Math.round((tgl_2.getTime() - tgl_1.getTime()) / hari));
          // $('.asu').text(total_hari);
          // $('.total').text(rubah(total_hari*$('.hargamember').val()));
          // $('.totalbooking').val(total_hari*$('.hargamember').val());
          var idmobil=$('.idmobil').val();
          var tanggalambil=$('.tanggalambil').val();
          var tanggalkembali=$('.tanggalkembali').val();
          var jamambilmobil=$('.jamambilmobil').val();
          $.ajax({
            url: base_url+'users/cekbooking',
            method: "POST",
            data: {
                    idmobil : idmobil,
                    tanggalambil : tanggalambil,
                    tanggalkembali : tanggalkembali,
                    jamambilmobil : jamambilmobil
                  },
            dataType: "json",
            success:function(data){
              if(data[0]['datajson']=='ok'){
                $('.cekmobil').text('');
                $('.tanggalambil').css('color','green');
                $('.tanggalkembali').css('color','green');
                $('.jamambilmobil').css('color','green');
                $('.btnbooking').removeClass('disabled');
                $('.totalbooking').text('Total Rp '+rubah(data[1]['totalbooking'])+'/'+total_hari+'hari');
                $('.valuetotalboking').val(data[1]['totalbooking']);
              }else if(data[0]['datajson']=='Mobil sedang dibooking pada jam tsb!'){
                $('.cekmobil').text(data[0]['datajson']);
                $('.tanggalambil').css('color','red');
                $('.tanggalkembali').css('color','red');
                $('.jamambilmobil').css('color','red');
                $('.btnbooking').addClass('disabled');
                $('.totalbooking').text('');
              }else{
                $('.cekmobil').text('');
                $('.tanggalambil').css('color','red');
                $('.tanggalkembali').css('color','red');
                $('.jamambilmobil').css('color','red');
                $('.btnbooking').addClass('disabled');
                $('.totalbooking').text('');
              }
            }
          });
        });

        $('.tanggalkembali').on('change',function(){
          var hari = 24*60*60*1000; // format perhitungan dalam 1 hari
          var tgl_1 = new Date($('.tanggalambil').val());
          var tgl_2 = new Date($('.tanggalkembali').val());
          var total_hari = Math.round(Math.round((tgl_2.getTime() - tgl_1.getTime()) / hari));
          // $('.asu').text(total_hari);
          // $('.total').text(rubah(total_hari*$('.hargamember').val()));
          // $('.totalbooking').val(total_hari*$('.hargamember').val());
          var idmobil=$('.idmobil').val();
          var tanggalambil=$('.tanggalambil').val();
          var tanggalkembali=$('.tanggalkembali').val();
          var jamambilmobil=$('.jamambilmobil').val();
          $.ajax({
            url: base_url+'users/cekbooking',
            method: "POST",
            data: {
                    idmobil : idmobil,
                    tanggalambil : tanggalambil,
                    tanggalkembali : tanggalkembali,
                    jamambilmobil : jamambilmobil
                  },
            dataType: "json",
            success:function(data){
              if(data[0]['datajson']=='ok'){
                $('.cekmobil').text('');
                $('.tanggalambil').css('color','green');
                $('.tanggalkembali').css('color','green');
                $('.jamambilmobil').css('color','green');
                $('.btnbooking').removeClass('disabled');
                $('.totalbooking').text('Total Rp '+rubah(data[1]['totalbooking'])+'/'+total_hari+'hari');
                $('.valuetotalboking').val(data[1]['totalbooking']);
              }else if(data[0]['datajson']=='Mobil sedang dibooking pada jam tsb!'){
                $('.cekmobil').text(data[0]['datajson']);
                $('.tanggalambil').css('color','red');
                $('.tanggalkembali').css('color','red');
                $('.jamambilmobil').css('color','red');
                $('.btnbooking').addClass('disabled');
                $('.totalbooking').text('');
              }else{
                $('.cekmobil').text('');
                $('.tanggalambil').css('color','red');
                $('.tanggalkembali').css('color','red');
                $('.jamambilmobil').css('color','red');
                $('.btnbooking').addClass('disabled');
                $('.totalbooking').text('');
              }
            }
          });
        });

        $('.jamambilmobil').on('change',function(){
          var hari = 24*60*60*1000; // format perhitungan dalam 1 hari
          var tgl_1 = new Date($('.tanggalambil').val());
          var tgl_2 = new Date($('.tanggalkembali').val());
          var total_hari = Math.round(Math.round((tgl_2.getTime() - tgl_1.getTime()) / hari));
          // $('.asu').text(total_hari);
          // $('.total').text(rubah(total_hari*$('.hargamember').val()));
          // $('.totalbooking').val(total_hari*$('.hargamember').val());
          var idmobil=$('.idmobil').val();
          var tanggalambil=$('.tanggalambil').val();
          var tanggalkembali=$('.tanggalkembali').val();
          var jamambilmobil=$('.jamambilmobil').val();
          $.ajax({
            url: base_url+'users/cekbooking',
            method: "POST",
            data: {
                    idmobil : idmobil,
                    tanggalambil : tanggalambil,
                    tanggalkembali : tanggalkembali,
                    jamambilmobil : jamambilmobil
                  },
            dataType: "json",
            success:function(data){
              if(data[0]['datajson']=='ok'){
                $('.cekmobil').text('');
                $('.tanggalambil').css('color','green');
                $('.tanggalkembali').css('color','green');
                $('.jamambilmobil').css('color','green');
                $('.btnbooking').removeClass('disabled');
                $('.totalbooking').text('Total Rp '+rubah(data[1]['totalbooking'])+'/'+total_hari+'hari');
                $('.valuetotalboking').val(data[1]['totalbooking']);
              }else if(data[0]['datajson']=='Mobil sedang dibooking pada jam tsb!'){
                $('.cekmobil').text(data[0]['datajson']);
                $('.tanggalambil').css('color','red');
                $('.tanggalkembali').css('color','red');
                $('.jamambilmobil').css('color','red');
                $('.btnbooking').addClass('disabled');
                $('.totalbooking').text('');
              }else{
                $('.cekmobil').text('');
                $('.tanggalambil').css('color','red');
                $('.tanggalkembali').css('color','red');
                $('.jamambilmobil').css('color','red');
                $('.btnbooking').addClass('disabled');
                $('.totalbooking').text('');
              }
            }
          });

        });

  });
    </script>
    </body>
  </html>