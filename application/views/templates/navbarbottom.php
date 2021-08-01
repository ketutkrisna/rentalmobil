<?php if($title=='beranda'){ ?>
     <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-between;padding:0;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height:100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons blue-text text-darken-2" style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;">home</i>
                <!-- <span class="blue-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarmobil'); ?>"><i class="material-icons blue-text" style="font-size:30px;">commute</i>
                </a>
              </div>
            <?php if($this->session->userdata('level_user')=='admin'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('admin'); ?>"><i class="material-icons blue-text" style="font-size:30px;">shopping_cart</i>
              <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
                <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
              <?php } ?>
                </a>
              </div>
            <?php } ?>
            <?php if($this->session->userdata('level_user')=='user'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons blue-text" style="font-size:30px;">local_mall</i>
                </a>
              </div>
            <?php } ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/editprofil'); ?>"><i class="material-icons blue-text" style="font-size:30px;">account_box</i>
                </a>
              </div>
            </div>
        </div>
      </nav>
      </div>
<?php }else if($title=='daftar mobil'){ ?>
      <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-between;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons blue-text" style="font-size:30px;">home</i>
                <!-- <span class="blue-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarmobil'); ?>"><i class="material-icons blue-text text-darken-2" style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;">commute</i>
                </a>
              </div>
            <?php if($this->session->userdata('level_user')=='admin'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('admin'); ?>"><i class="material-icons blue-text" style="font-size:30px;">shopping_cart</i>
              <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
                <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
              <?php } ?>
                </a>
              </div>
            <?php } ?>
            <?php if($this->session->userdata('level_user')=='user'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons blue-text" style="font-size:30px;">local_mall</i>
                </a>
              </div>
            <?php } ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/editprofil'); ?>"><i class="material-icons blue-text" style="font-size:30px;">account_box</i>
                </a>
              </div>
            </div>
        </div>
      </nav>
      </div>
<?php }else if($title=='daftar pesanan'){ ?>
      <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-between;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons blue-text" style="font-size:30px;">home</i>
                <!-- <span class="blue-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarmobil'); ?>"><i class="material-icons blue-text" style="font-size:30px;">commute</i>
                </a>
              </div>
            <?php if($this->session->userdata('level_user')=='admin'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('admin'); ?>"><i class="material-icons blue-text text-darken-2" style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;">shopping_cart</i>
              <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
                <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
              <?php } ?>
                </a>
              </div>
            <?php } ?>
            <?php if($this->session->userdata('level_user')=='user'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons blue-text text-darken-2" style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;">local_mall</i>
                </a>
              </div>
            <?php } ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/editprofil'); ?>"><i class="material-icons blue-text" style="font-size:30px;">account_box</i>
                </a>
              </div>
            </div>
        </div>
      </nav>
      </div>
<?php }else if($title=='profile'){ ?>
      <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-between;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons blue-text" style="font-size:30px;">home</i>
                <!-- <span class="blue-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarmobil'); ?>"><i class="material-icons blue-text" style="font-size:30px;">commute</i>
                </a>
              </div>
            <?php if($this->session->userdata('level_user')=='admin'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('admin'); ?>"><i class="material-icons blue-text" style="font-size:30px;">shopping_cart</i>
              <?php if($belumdilihat['belumdilihat']<=0){}else{ ?>
                <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$belumdilihat['belumdilihat']; ?></span>
              <?php } ?>
                </a>
              </div>
            <?php } ?>
            <?php if($this->session->userdata('level_user')=='user'){ ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons blue-text" style="font-size:30px;">local_mall</i>
                </a>
              </div>
            <?php } ?>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;">
                <a href="<?= base_url('users/editprofil'); ?>"><i class="material-icons blue-text text-darken-2" style="font-size:30px;font-weight:bold;text-shadow:1px 1px 0px black;">account_box</i>
                </a>
              </div>
            </div>
        </div>
      </nav>
      </div>
<?php } ?>