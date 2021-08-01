
	  <div class="navbar-fixed navbarpencarian">
        <nav class="white z-depth-0" style="top: -1px;">
          <div class="nav-wrapper">
            <form action="<?=base_url('admin/carikodebarang'); ?>" method="post">
              <div class="input-field">
                <input style="border:1px solid #ddd" id="search" type="search" name="carikodebarang" class="inputcariberanda" autocomplete="off" placeholder="masukan kode booking">
                <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
                <button class="material-icons blue" type="submit" name="carikirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;"><i class="material-icons caridatanotifikasi">search</i></button>
              </div>
            </form>
          </div>
        </nav>
      </div>

<div class="row" style="max-width:1000px;min-height:740px">
<div class="col s12 windowswidth" style="">

      <!-- slide -->
      <div class="row">
	    <div class="col s12" style="margin-bottom:-20px">
		  <div class="slider">
		    <ul class="slides white z-depth-2" style="border-radius:5px;">
		    	<div class="carousel-fixed-item center">
			      <a href="<?=base_url('users/daftarmobil'); ?>" class="btn waves-effect blue white-text" style="z-index:5;top:150px">Pesan sekarang</a>
			    </div>
		    <?php foreach($slideberanda as $sb): ?>
		      <li style="border-radius:5px;">
		      	<!-- <div class="" style="max-width:400px;height:100%;background-image:url('<?=base_url('assets/img/mobil/'.$sb['foto_mobil']); ?>');background-size:cover;background-position:center;background-repeat:no-repeat;margin:auto;left:0;right:0;"></div> -->
		        <img class="center" style="height:100%;max-width:400px;margin:auto;left:0;right:0;position:absolute;" src="<?=base_url('assets/img/mobil/'.$sb['foto_mobil']); ?>">
		        <!-- random image -->
		        <div class="caption center-align">
		          <h3 class="white-text" style="text-shadow:2px 2px 1px black"><?=$sb['nama_mobil']; ?></h3>
		          <!-- <h5 class="light">Here's our small slogan.</h5> -->
		        </div>
		      </li>
		    <?php endforeach; ?>
		    </ul>
		  </div>
		</div>
	  </div>
	  <!-- <hr style="border:2px solid #2196f3"> -->

	  <div class="group1" style="margin-top:-25px">
	  <div class="row">
	    <div class="col s12 center">
	        <button class="blue btn" style="color: red;">Rental Mobil Lampung</button>
	    </div>
	  </div>

	  <div class="row">
	    <div class="col s12" style="margin-top:-30px">
	      <div class="card blue z-depth-0" style="border-top:0">
	        <div class="card-content center white-text">
	        	<img src="<?=base_url('assets/img/rental/logorentals.png'); ?>" width="120">
	          <!-- <i class="material-icons" style="font-size:3rem;margin-top:-10px">local_library</i> -->
	          <p>Rental Mobil Lampung adalah Perusahaan rental terpercaya yang berada didaerah lampung. Kami telah melayani banyak pelanggan dari seluruh Lampung.</p>
	        </div>
	      </div>
	    </div>
	  </div>

	  <!-- <div class="row"> -->
	  <div class="col s6" style="padding:0;margin-top:-15px;">
	    <div class="card horizontal center" style="padding:0;margin-right:5px;align-items:center;">
	      <div class="card-image">
	        <i class="material-icons blue-text" style="font-size:3rem;margin-left:10px">money_off</i>
	      </div>
	      <div class="card-stacked">
	        <div class="card-content" style="font-weight:bold;padding-right:10px">
	          <p>Harga <br> Terjangkau</p>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col s6" style="padding:0;margin-top:-15px">
	    <div class="card horizontal center" style="padding:0;margin-left:5px;align-items:center;">
	      <div class="card-image">
	        <i class="material-icons blue-text" style="font-size:3rem;margin-left:10px">stars</i>
	      </div>
	      <div class="card-stacked">
	        <div class="card-content" style="font-weight:bold;padding-right:10px">
	          <p>Kualitas <br> Terjamin</p>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col s6" style="padding:0;margin-top:-15px">
	    <div class="card horizontal center" style="padding:0;margin-right:5px;align-items:center;">
	      <div class="card-image">
	        <i class="material-icons blue-text" style="font-size:3rem;margin-left:10px">flash_on</i>
	      </div>
	      <div class="card-stacked">
	        <div class="card-content" style="font-weight:bold;padding-right:10px">
	          <p>Pelayanan <br> Cepat</p>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col s6" style="padding:0;margin-top:-15px">
	    <div class="card horizontal center" style="padding:0;margin-left:5px;align-items:center;">
	      <div class="card-image">
	        <i class="material-icons blue-text" style="font-size:3rem;margin-left:10px">shutter_speed</i>
	      </div>
	      <div class="card-stacked">
	        <div class="card-content" style="font-weight:bold;padding-right:10px">
	          <p>Banyak <br> Pilihan</p>
	        </div>
	      </div>
	    </div>
	  </div>

	  <div class="row">
	  	<!-- <div class="col s12 center">
	  		<button class="btn blue center waves-effect" style="width:90%;margin-top:0px">Informasi documen dan jaminan</button>
	  	</div> -->
	  </div>

	  <ul class="collapsible" style="margin-top:-10px;margin-bottom:60px">
	    <li class="">
	      <div class="collapsible-header" style="font-weight:bold;"><i class="material-icons blue-text">description</i>Informasi Dokumen Dan Jaminan</div>
	      <div class="collapsible-body">
	      	<div class="row"><div class="col s12" style="padding:0;margin-top:-35px;">
			    <div class="card horizontal z-depth-0" style="padding:0;align-items:center;">
			      <div class="card-stacked left">
			        <div class="card-content" style="">
			          <span style="margin-left:-15px;font-weight:bold;">1.Kelengkapan Dokumen</span><br>
			          <span>-EKTP Asli</span><br>
			          <span>-Kartu Keluarga(KK) Asli</span><br>
			          <span>-SIM A Photocopy</span><br>
			          <span>-Dokumen Lainnya</span><br>
			          <span style="margin-left:-15px;font-weight:bold;">2.Barang Jaminan (Self Drive)</span><br>
			          <span>-Sepeda Motor</span><br>
			          <span>-Barang Berharga Lainnya</span>
			        </div>
			      </div>
			    </div>
			  </div>
	      </div>
	    </li>
	    <li>
	      <div class="collapsible-header" style="font-weight:bold;"><i class="material-icons blue-text">contact_phone</i>Kontak</div>
	      <div class="collapsible-body">
	      	<!-- <div class="row"> -->
			  <div class="row"><div class="col s12" style="padding:0;margin-top:-35px;">
			    <div class="card horizontal z-depth-0" style="padding:0;align-items:center;">
			      <div class="card-image">
			        <img style="width:20px" src="<?=base_url('assets/img/rental/tlp.png'); ?>">
			      </div>
			      <div class="card-stacked left">
			        <div class="card-content" style="font-weight:bold;">
			          <p style="margin-left:-15px">0821-7744-9596</p>
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="col s12" style="padding:0;margin-top:-40px;">
			    <div class="card horizontal z-depth-0" style="padding:0;align-items:center;">
			      <div class="card-image">
			        <img style="width:20px" src="<?=base_url('assets/img/rental/ig.png'); ?>">
			      </div>
			      <div class="card-stacked left">
			        <div class="card-content" style="font-weight:bold;">
			          <p style="margin-left:-15px">@rentalmobillampung</p>
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="col s12" style="padding:0;margin-top:-40px;">
			    <div class="card horizontal z-depth-0" style="padding:0;align-items:center;">
			      <div class="card-image">
			        <img style="width:20px" src="<?=base_url('assets/img/rental/web.png'); ?>">
			      </div>
			      <div class="card-stacked left">
			        <div class="card-content" style="font-weight:bold;">
			          <p style="margin-left:-15px;">www.rentalmobillampung.net</p>
			        </div>
			      </div>
			    </div>
			  </div></div>
	      </div>
	    </li>
	  </ul>

	  

  	<!-- <div class="fixed-action-btn">
	  <a class="btn-floating btn-large red">
	    <i class="large material-icons">mode_edit</i>
	  </a>
	  <ul>
	    <li><a class="btn-floating white"><img src="<?=base_url('assets/img/rental/ig.png'); ?>" width="100%"></a></li>
	    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
	    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
	    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
	  </ul>
	</div> -->

	  <!-- <ul class="collection">
	    <li class="collection-item avatar" style="display:flex;align-items:center;">
	      <i class="material-icons circle">folder</i><br>
	      <span class="title">Instagram</span>
	    </li>
	    <li class="collection-item avatar" style="display:flex;align-items:center;">
	      <i class="material-icons circle">folder</i><br>
	      <span class="title">Instagram</span>
	    </li>
	    <li class="collection-item avatar" style="display:flex;align-items:center;">
	      <i class="material-icons circle">folder</i><br>
	      <span class="title">Instagram</span>
	    </li>
	  </ul> -->


	  <!-- </div> -->
	</div><!-- tutup grup1 -->

</div>
</div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){

	    $('.slider').slider({
	    	'height':250
	    });
	    $('.collapsible').collapsible();
	    $('.dropdown-trigger').dropdown();
	    $('.fixed-action-btn').floatingActionButton({
	    	'hoverEnabled': true
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