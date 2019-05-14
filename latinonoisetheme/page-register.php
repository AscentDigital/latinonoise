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
                      <form class="form_type_1 type_2">
                        <div class="control-group">
                          <label class="control-label"><b>First Name</b></label>
                          <div class="controls">
                            <input name="textinput" name="first_name" type="text">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Last Name</b></label>
                          <div class="controls">
                            <input name="textinput" name="last_name" type="text">
                          </div>
                        </div> 
                        <div class="control-group">
                          <label class="control-label"><b>Email Address</b></label>
                          <div class="controls">
                            <input name="textinput" name="email_address" type="email">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Age</b></label>
                          <div class="controls">
                            <input name="textinput" name="age" type="number">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Gender</b></label>
                          <div class="custom_select">
                            <div class="select_title">Please select</div>
                            <ul id="menu_type_2" class="select_list"></ul>
                            <select class="d_none">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="robot">Robot</option>
                            </select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Username</b></label>
                          <div class="controls">
                            <input name="textinput" name="username" type="text">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label"><b>Password</b></label>
                          <div class="controls">
                            <input name="textinput" name="password" type="password" placeholder=""> 
                          </div>
                        </div> 
                        <div class="control-group">
                          <label class="control-label"><b>Confirm Password</b></label>
                          <div class="controls">
                            <input name="textinput" name="confirm_password" type="password" placeholder="">
                          </div>
                        </div>
                        
                        <div class="control-group">
                          <label class="control-label"><b>Ciudad</b></label>
                          <div class="custom_select">
                            <div class="select_title">Please select</div>
                            <ul id="menu_type_2" class="select_list"></ul>
                            <select class="d_none">
                              <option value="austin-tx">Austin, TX</option>
                              <option value="boston-lynn-worcester-mass">Boston, Lynn &amp; Worcester - Mass</option>
                              <option value="dallax-tx">Dallax, TX</option>
                              <option value="houston-tx">Houston, TX</option>
                              <option value="lawrence-lowell-mass">Lawrence &amp; Lowell - Mass</option>
                              <option value="providence-central-falls-pawtucket-ri">Providence, Central Falls, Pawtucket - RI
                              </option>
                              <option value="san-antonio-tx">San Antonio, TX</option>
                            </select>
                          </div>
                        </div> 
                        <div class="control-group form-elements">
                          <input type="checkbox" id="terms"><label for="terms"><b>I agree to the <a href="./terms.html">Terms of Service</a></b></label>  
                        </div>
                        <a href="./login.html" class="button button_type_icon_big button_orange">REGISTRATE<i class="fa fa-chevron-right"></i></a><br>
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
	get_footer();
?>