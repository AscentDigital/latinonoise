<?php  
	get_header();
?>

<!--==============================content================================-->
      <div class="content">
        <div class="container">
          <div class="row">





            <!-- 404 -->
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="section" data-appear-animation="fadeInDown"
                   data-appear-animation-delay="1150">
                <div class="tabs">
                  <!--tabs navigation-->
                  <div class="clearfix tabs_conrainer">
                    <ul class="tabs_nav clearfix">
                      <li class="">
                        <a href="#tab-1">
                          <!-- <h1 class="text-accent">QUE BUEN CONCIERTO!</h1>
                          <small class="text-primary">OCTOBER 10, 2016</small> -->
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 page_404 section">
                     <h2 class="title_404">404</h2>
                      <h2 class="section_title section_title_big">Page Not Found!</h2>
                      <p>We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it and we'll try to fix it. In the meantime, try one of these options:</p>
                      <div class="buttons_404"> 
                        <a href="<?php echo get_site_url(); ?>" class="button button_type_2 button_grey_light">Go to Home page</a>
                      </div>
                      <form class="search" action = "<?php echo get_site_url(); ?>/search/">
                        <input type="text" name="" placeholder="Search Latino Noise">
                        <button class=""><i class="fa fa-search"></i></button>
                      </form>
                  </div>
                </div>




  


              </div>
            </div>
            <!-- END 404 -->






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