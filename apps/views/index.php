<?php
/*
 * @author : Pt. Kiwari Usaha Nusantara
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- head start here -->
    <?= $this->load->view('slice/header-login'); ?>
    <!-- head end here -->
    <body class='background'>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>

        <div class="login">
            <? if (isset($_GET['ShowDiv'])) {
                ?>
                <div class="alert alert-error">            
                   Username dan Password Salah...! 
                </div>
                <?
            } elseif (isset($_GET['gagal'])){
                ?>
                <div class="alert alert-error">            
                   Silahkan Login Terlebih Dahulu...! 
                </div>
            <?}
            ?>

            <div class="page-header">
                <img src="<?= NOTARY_ASSETS.'img/notary_logo.svg'; ?>" width="300px" height="63px">
            </div>
            <div class="row-fluid">
                <form action="<?= base_url() ?>auth/login" method="post" name="login_form">
                    <div class="row-form">
                        <div class="span12">
                            <input style="background-color : #C3C3C3;" type="text" name="username" placeholder="username" required/>
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span12">
                            <input style="background-color : #C3C3C3;" type="password" name="password" placeholder="password" required/>
                        </div>            
                    </div>
                    <div class="row-form">
                        <div class="span12 bottom tar">
                            <button class="btn">Sign in <span class="icon-arrow-next icon-white"></span></button>
                        </div>                
                    </div>
                    &nbsp;<br>
                    &nbsp;<br>
                    &nbsp;<br>
                    <div class="footer" align='center'>designed and programmed by QUN.&copy;2014</div>
                </form>
            </div>
        </div>

    </body>
</html>
