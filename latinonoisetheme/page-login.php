<?php  
	get_header();
  if(is_user_logged_in()){
     redirect_none_user();
  }
?>
<!--==============================content================================-->
      <div class="content">
        <div class="container">
          <div class="row">





            <!-- LOGIN -->
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="section" data-appear-animation="fadeInDown"
                   data-appear-animation-delay="1150">
                <div class="tabs">
                  <!--tabs navigation-->
                  <div class="clearfix tabs_conrainer">
                    <ul class="tabs_nav clearfix">
                      <li class="">
                        <a href="#tab-1">
                          <h2 class="text-primary">Welcome back,</h2>
                          <h1 class="text-accent">Login to your account</h1>
                          <br>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="section_2">
                      <form class="form_type_1 type_2" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
                        <input type="hidden" name="action" value="login_form">
                        <input type="hidden" name="page_id" value="<?php echo $post->ID; ?>">
                        <?php if(isset($_GET['return_url']) && !empty($_GET['return_url'])){ ?>
                          <input type="hidden" name="return_url" value="<?php echo $_GET['return_url']; ?>">
                        <?php } ?>
                        <?php if(isset($_SESSION['success'])){ ?>
                          <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                        <?php } ?>
                        <?php if(isset($_SESSION['errors'])){ ?>
                          <div class="alert alert-error">
                            <ul>
                              <?php foreach ($_SESSION['errors'] as $error) { ?>
                                <li><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></li>
                              <?php } ?>
                            </ul>
                          </div>
                        <?php } ?>
                        <div class="control-group">
                          <label class="control-label"><b>Username</b></label>
                          <div class="controls">
                            <input name="username" type="text" value="<?php if(isset($_SESSION['input']['username'])){ echo $_SESSION['input']['username']; } ?>">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Password</b></label>
                          <div class="controls">
                            <input name="password" type="password" placeholder=""> 
                          </div>
                        </div> 
                        <div class="control-group form-elements">
                          <input type="checkbox" id="remember" name="remember"><label for="remember"><b>Recuérdame</b></label>  
                        </div>
                        <button class="button button_type_icon_big button_orange" type="submit">LOGIN</button><br>
                        <br>
                        <a href="<?php echo get_site_url(); ?>/forgot/" class="text-dark">¿Olvidaste tu contraseña?</a><br>
                        <a href="<?php echo get_site_url(); ?>/forgot/" class="text-dark">¿Olvidó su nombre de usuario?</a>

                        <br><br><br><br>

                        <h3>NUEVA EN LATINO NOIE?</h3><br>
                        <a href="<?php echo get_site_url(); ?>/register/" class="button button_type_icon_medium button_grey">REGISTRATE<i class="fa fa-user"></i></a>
                        
                      </form>
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class=" ">
                     
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    
                  </div>
                </div>


  


              </div>
            </div>
            <!-- END LOGIN  -->






    		<!-- SIDEBAR -->
            <div class="col-md-3 col-sm- col-xs-12">
                <div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
					<?php adzone('noticias'); ?>
                </div>
            </div>
            <!-- END SIDEBAR -->



          </div>



        </div>
      </div>
<?php  
  unset($_SESSION['errors']);
  unset($_SESSION['input']);
  unset($_SESSION['success']);
	get_footer();
?>