<!DOCTYPE html>
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if(gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<?php 
global $wp;
global $option; 
?>
<head>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" />
    <title> <?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
    <meta name="format-detection" content="telephone=no" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--meta info-->
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/favico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favico/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--stylesheet include-->
    <?php wp_head(); ?>
    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
    <script src="https://www.grandvincent-marion.fr/_codepen/jquery.fancybox.pack.js"></script>
    <script src="https://www.grandvincent-marion.fr/_codepen/mediaelement-and-player.min.js"></script>
</head>

<body class="wide_layout">
    <div class="loader"></div>
    <!--[if (lt IE 9) | IE 9]> <div class="ie_message_block"> <div class="container"> <div class="wrapper"> <div class="clearfix"> <i class="fa fa-exclamation-triangle f_left"></i><b>Attention!</b>This page may not display correctly.You areusing an outdated version of Internet Explorer.For a faster,safer browsing experience.<ahref="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"class="button button_type_3 button_grey_light f_right"target="_blank">Update Now!</a></div></div></div></div><![endif]-->
    <!--cookie-->
    <!--<div class="cookie"><div class="container"><div class="clearfix"><span>Please note this website requires cookies in order to function correctly,they do not store any specific information about you personally.</span><div class="f_right"><a href="#" class="button button_type_3 button_orange">Accept Cookies</a><a href="#" class="button button_type_3 button_grey_light">Read More</a></div></div></div></div>-->
    <div class="wrapper_container">
        <!--==============================header=================================-->
        <header role="banner" class="header header_6">
            <div class="h_top_part">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="header_top mobile_menu">
                                <nav>
                                    <ul></ul>
                                </nav>
                                <div class="login_block">
                                    <ul>
                                        <!--Login-->
                                        <?php if(!is_user_logged_in()){ ?>
                                        <li class="login_button"><a href="#" role="button"><i
                                            class="fa fa-user login_icon"></i>Iniciar Sesion</a>
                                            <div class="popup">
                                                <form>
                                                    <ul>
                                                        <li>
                                                            <label for="username">Username</label>
                                                            <br />
                                                            <input type="text" name="" id="username" /> </li>
                                                            <li>
                                                                <label for="password">Password</label>
                                                                <br />
                                                                <input type="password" name="" id="password" /> </li>
                                                                <li>
                                                                    <input type="checkbox" id="checkbox_10" />
                                                                    <label for="checkbox_10">Recuérdame</label>
                                                                </li>
                                                                <li><a href="<?php echo get_site_url(); ?>/login/" class="button button_orange">Log In</a>
                                                                    <div class="t_align_c"><a href="<?php echo get_site_url(); ?>/forgot/"
                                                                        class="color_dark">¿Olvidaste tu contraseña?</a>
                                                                        <br /><a href="<?php echo get_site_url(); ?>/forgot/" class="color_dark">¿Olvidó su nombre
                                                                        de usuario?</a></div>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                            <section class="login_footer">
                                                                <h3>Nuevo en Latino Noise?</h3><a href="<?php echo get_site_url(); ?>/register/"
                                                                class="button button_grey">REGISTRATE</a>
                                                            </section>
                                                        </div>
                                                    </li>
                                                    <li class="login_button"><a href="<?php echo get_site_url(); ?>/register/" role="button">Registrate</a></li>
                                                    <?php }else{ ?>
                                                        <li class="login_button"><a href="<?php echo wp_logout_url(); ?>" role="button">Logout</a></li>
                                                    <?php 
                                                        } 
                                                        global $ciudad;
                                                        $current_location = get_term($ciudad);
                                                    ?>
                                                    <!--language/location settings-->
                                                    <li class="lang_button"><a role="button" href="#"><span
                                                        class="d_mxs_none"><?php echo $current_location->name; ?></span></a>
                                                        <ul class="dropdown_list">
                                                            <?php
                                                                $locations = get_terms('location', array('hide_empty' => false,));
                                                                foreach ($locations as $location) {
                                                                    if($location->term_id != $ciudad){
                                                            ?>
                                                            <li><a href="<?php echo get_permalink($post->ID) . '?' . http_build_query(array('ciudad' => $location->slug)); ?>" class="tr_delay_hover default_t_color"><?php echo $location->name; ?></a></li>
                                                            <?php 
                                                                    }
                                                                } 
                                                            ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h_bot_part">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="clearfix header-flex">
                                            <a href="index.html" class="f_left logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" /></a>
                                            <a href="#" class="f_right"><img
                                                src="https://placehold.it/370x110/64696D/FFFFFF?text=ANUNCIO%20PUBLICIDAD"
                                                alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--main menu container-->
                            <div class="menu_wrap">
                                <div class="container clearfix menu_border_wrap">
                                    <!--button for responsive menu-->
                                    <button id="menu_button">Menu</button>
                                    <!--main menu-->
                                    <nav role="navigation" class="main_menu menu_var2">
                                        <ul>
                                        <?php 
                                        $menuLocations = get_nav_menu_locations();
                                          $menuID = $menuLocations['primary'];
                                          $menus = wp_get_nav_menu_items($menuID);
                                            foreach ($menus as $menu) {
                                                $check = is_page($menu->ID);
                                        ?>
                                            <li class ="<?php if (is_page($menu->title)) echo 'current'; ?>"><a href="<?php echo $menu->url ?>"><?php echo $menu->title; ?></a></li>
                                                                            <?php } ?>
                                                                            </ul>
                                                                        </nav>
                                                                        <div class="search-holder">
                                                                            <div class="search_box">
                                                                                <button class="search_button button button_orange_hover"><i
                                                                                    class="fa fa-search"></i></button>
                                                                                </div>
                                                                                <!--search form-->
                                                                                <div class="searchform_wrap">
                                                                                    <div class="container vc_child h_inherit relative">
                                                                                        <form role="search" action = "<?php echo get_site_url(); ?>/search/">
                                                                                            <input type="text" name="search" placeholder="🔍 Search Latino Noise" /> </form>
                                                                                            <button class="close_search_form"><i class="fa fa-times"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </header>