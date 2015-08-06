<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>

    <title><?php wp_title( ' | ', true, 'right' ); ?></title>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class("bizz-buzz-app"); ?>>
    <header>
      <div class="navbar-fixed">
        <nav class="bizz-buzz-blue">
          <div class="nav-wrapper">
            <a href="#!" class="right brand-logo">BizzBuzz Comics</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="hide-on-med-and-down">
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </ul>
            <ul id="mobile-demo" class="side-nav">
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </ul>
          </div>
        </nav>
      </div>
    </header>


