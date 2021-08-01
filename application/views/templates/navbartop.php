<?php if($title=='beranda'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left blue-text">
            <!-- <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/users/shank.png'); ?>"> -->
           <span style="font-family: 'Fredericka the Great', cursive;font-size:30px;">Rental mobil</span> <span style="padding-top:10px;font-size:13px;font-style:;margin-left:5px">Lampung</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;">
          <div class="mobile">
            <?= $iconcari; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url(); ?>" class="black-text"><i style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;" class="material-icons blue-text text-darken-2 left">home</i>Beranda</a></li>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarmobil'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">commute</i>Mobil</a></li>
          <?php if($this->session->userdata('level_user')=='admin'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">shopping_cart</i>Pesanan
          <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
          <?php } ?>
            </a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('level_user')=='user'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">local_mall</i>Pesanan</a></li>
          <?php endif; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/editprofil'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">account_box</i>Profil</a></li>
          </div>
          </ul>
        </div>
      </nav>
      </div>
<?php }else if($title=='daftar mobil'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left blue-text">
            <!-- <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/users/shank.png'); ?>"> -->
           <span style="font-family: 'Fredericka the Great', cursive;font-size:30px;">Rental mobil</span> <span style="padding-top:10px;font-size:13px;font-style:;margin-left:5px">Lampung</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;">
          <div class="mobile">
            <?= $iconcari; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">home</i>Beranda</a></li>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarmobil'); ?>" class="black-text"><i style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;" class="material-icons blue-text text-darken-2 left">commute</i>Mobil</a></li>
          <?php if($this->session->userdata('level_user')=='admin'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">shopping_cart</i>Pesanan 
          <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
          <?php } ?>
            </a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('level_user')=='user'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">local_mall</i>Pesanan</a></li>
          <?php endif; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/editprofil'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">account_box</i>Profil</a></li>
          </div>
          </ul>
        </div>
      </nav>
      </div>
<?php }else if($title=='daftar pesanan'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left blue-text">
            <!-- <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/users/shank.png'); ?>"> -->
           <span style="font-family: 'Fredericka the Great', cursive;font-size:30px;">Rental mobil</span> <span style="padding-top:10px;font-size:13px;font-style:;margin-left:5px">Lampung</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;">
          <div class="mobile">
            <?= $iconcari; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">home</i>Beranda</a></li>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarmobil'); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">commute</i>Mobil</a></li>
          <?php if($this->session->userdata('level_user')=='admin'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('admin'); ?>" class="black-text"><i style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;" class="material-icons blue-text text-darken-2 left">shopping_cart</i>Pesanan 
          <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
          <?php } ?>
            </a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('level_user')=='user'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarpesanan'); ?>" class="black-text"><i style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;" class="material-icons blue-text text-darken-2 left">local_mall</i>Pesanan</a></li>
          <?php endif; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/editprofil'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons blue-text left">account_box</i>Profil</a></li>
          </div>
          </ul>
        </div>
      </nav>
      </div>
<?php }else if($title=='profile'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left blue-text">
            <!-- <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/users/shank.png'); ?>"> -->
           <span style="font-family: 'Fredericka the Great', cursive;font-size:30px;">Rental mobil</span> <span style="padding-top:10px;font-size:13px;font-style:;margin-left:5px">Lampung</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;">
          <div class="mobile">
            <?= $iconcari; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">home</i>Beranda</a></li>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarmobil'); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">commute</i>Mobil</a></li>
          <?php if($this->session->userdata('level_user')=='admin'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">shopping_cart</i>Pesanan 
          <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
          <?php } ?>
            </a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('level_user')=='user'): ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px;" class="material-icons blue-text left">local_mall</i>Pesanan</a></li>
          <?php endif; ?>
            <li class="hide-on-med-and-down"><a href="<?= base_url('users/editprofil'); ?>" class="black-text"><i style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;" class="material-icons blue-text text-darken-2 left">account_box</i>Profil</a></li>
          </div>
          </ul>
        </div>
      </nav>
      </div>
<?php } ?>