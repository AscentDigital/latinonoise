<?php  
	get_header();
?>


      <!--==============================content================================-->
      <div class="content">
        <div class="container">
          <div class="row">





            <!-- REGISTER -->
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="section" data-appear-animation="fadeInDown"
                   data-appear-animation-delay="1150">
                <div class="tabs">
                  <!--tabs navigation-->
                  <div class="clearfix tabs_conrainer">
                    <ul class="tabs_nav clearfix">
                      <li class="">
                        <a href="#tab-1">
                          <h2 class="text-primary">Welcome,</h2>
                          <h1 class="text-accent">Register to Latino Noise</h1>
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
                        <?php if(isset($_SESSION['errors'])){ ?>
                          <div class="alert alert-error">
                            <ul>
                              <?php foreach ($_SESSION['errors'] as $error) { ?>
                                <li><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></li>
                              <?php } ?>
                            </ul>
                          </div>
                        <?php } ?>
                        <input type="hidden" name="action" value="registration_form">
                        <input type="hidden" name="page_id" value="<?php echo $post->ID; ?>">
                        <div class="control-group">
                          <label class="control-label"><b>First Name</b></label>
                          <div class="controls">
                            <input name="first_name" type="text" value="<?php if(isset($_SESSION['inputs']['first_name'])){ echo $_SESSION['inputs']['first_name']; } ?>">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Last Name</b></label>
                          <div class="controls">
                            <input name="last_name" type="text" value="<?php if(isset($_SESSION['inputs']['last_name'])){ echo $_SESSION['inputs']['last_name']; } ?>">
                          </div>
                        </div> 
                        <div class="control-group">
                          <label class="control-label"><b>Email Address</b></label>
                          <div class="controls">
                            <input name="email" type="email" value="<?php if(isset($_SESSION['inputs']['email'])){ echo $_SESSION['inputs']['email']; } ?>">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Age</b></label>
                          <div class="controls">
                            <input name="age" type="number" value="<?php if(isset($_SESSION['inputs']['age'])){ echo $_SESSION['inputs']['age']; } ?>">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Gender</b></label>
                          <div class="controls">
                            <select class="form-control select" name="gender">
                                <option value="" style="display: none;">Please select your gender</option>
                                <option value="male" <?php if(isset($_SESSION['inputs']['gender']) && $_SESSION['inputs']['gender'] == 'male'){ echo 'selected'; } ?>>Male</option>
                                <option value="female" <?php if(isset($_SESSION['inputs']['gender']) && $_SESSION['inputs']['gender'] == 'female'){ echo 'selected'; } ?>>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Username</b></label>
                          <div class="controls">
                            <input name="username" type="text" value="<?php if(isset($_SESSION['inputs']['username'])){ echo $_SESSION['inputs']['username']; } ?>">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Password</b></label>
                          <div class="controls">
                            <input name="password" type="password" placeholder=""> 
                          </div>
                        </div> 
                        <div class="control-group">
                          <label class="control-label"><b>Confirm Password</b></label>
                          <div class="controls">
                            <input name="confirm_password" type="password" placeholder="">
                          </div>
                        </div>
                        
                        <div class="control-group">
                          <label class="control-label"><b>Ciudad</b></label>
                          <div class="controls">
                            <select class="form-control select" name="location">
                              <option value="" style="display: none;">Please select your location</option>
                                <?php  
                                  $locations = get_terms('location', array('hide_empty' => false,));
                                  foreach ($locations as $location) {
                                ?>
                                  <option value="<?php echo $location->term_id; ?>" <?php if(isset($_SESSION['inputs']['location']) && $_SESSION['inputs']['location'] == $location->term_id){ echo 'selected'; } ?>><?php echo $location->name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                        </div> 
                        <div class="control-group form-elements">
                          <input type="checkbox" id="terms" name="terms"><label for="terms"><b>I agree to the <a href="./terms.html">Terms of Service</a></b></label>  
                        </div>
                        <button class="button button_type_icon_big button_orange" type="submit">RESGISTATE</button><br>
                        <br>
                        <a href="./forgot.html" class="text-dark">¿Olvidaste tu contraseña?</a><br>
                        <a href="./forgot.html" class="text-dark">¿Olvidó su nombre de usuario?</a>

                        <br><br><br><br>

                        <h3>Already have an account? Log in</h3><br>
                        <a href="<?php echo get_site_url(); ?>/login/" class="button button_type_icon_medium button_grey">Login<i class="fa fa-chevron-right"></i></a>
                        
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
            <!-- END REGISTER  -->






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
	get_footer();
?>