<?php  
	get_header();
?>
<!--==============================content================================-->
      <div class="content">
        <div class="container">
          <div class="row">





            <!-- FORGOT -->
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="section" data-appear-animation="fadeInDown"
                   data-appear-animation-delay="1150">
                <div class="tabs">
                  <!--tabs navigation-->
                  <div class="clearfix tabs_conrainer">
                    <ul class="tabs_nav clearfix">
                      <li class="">
                        <a href="#tab-1">
                          <h2 class="text-primary">Forgot your username/password?</h2>
                          <h1 class="text-accent">Let's get you back to your account</h1>
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
                          <label class="control-label"><b>Email address</b></label>
                          <div class="controls">
                            <input name="textinput" name="email" type="email">
                          </div>
                        </div>
                        <div class="control-group form-elements">
                          <span><b>I forgot my...<br></b></span><br>
                          <input type="radio" checked="" id="username_forgot" name="radio" class="hide">
                          <label for="username_forgot">Username</label> <br><br> 
                          <input type="radio" id="password_forgot" name="radio" class="hide">
                          <label for="password_forgot">Password</label>
                        </div>
                        <br>
                        <a href="<?php echo get_site_url(); ?>/login/" class="button button_type_icon_big button_orange">Submit<i class="fa fa-chevron-right"></i></a><br>
                        
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
            <!-- END FORGOT  -->






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