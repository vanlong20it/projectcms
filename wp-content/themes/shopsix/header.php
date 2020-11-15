<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="site-header">
        <div class="container-fluid header-container clearfix">
            <div class="row">
                <nav class="site-navigation col-xs-3 col-sm-3 col-md-3 col-lg-5">
                    <span class="toggle-nav hidden-lg">
                        <span class="icon-nav"></span>
                    </span>
                    <ul id="menu-primary-menu" class="nav-menu">
                        <li class="menu-item current-menu">
                            <a href="#nav-item">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#nav-item">Shop</a>
                        </li>
                        <li class="menu-item">
                            <a href="#nav-item">Features</a>
                        </li>
                        <li class="menu-item">
                            <a href="#nav-item">Pages</a>
                        </li>
                        <li class="menu-item">
                            <a href="#nav-item">Blog</a>
                        </li>
                    </ul>
                </nav>
                <div class="site-branding col-xs-6 col-sn-5 col-md-6 col-lg-2">
                    <a href="#home" class="logo">
                        <span>Sh6p</span>
                    </a>
                    <h1 class="site-title"></h1>
                    <p class="site-description"></p>
                </div>
                <div class="header-icon col-sx-3 col-sm-3 col-md-3 col-lg-5">
                    <ul class="hidden-sm hidden-md hidden xs">
                        <li class="menu-item menu-item-search">
                            <a href="#">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-account">
                            <a href="#">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="menu-item menu-item-cart">
                            <a href="#">
                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                <span class="count cart-counter">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    