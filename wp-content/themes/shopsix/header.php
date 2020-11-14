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
    <header>
        <div class="container-fluid">
            <div class="heading-logo">
                <div class="logo">
                    <a href="<?php bloginfo('/')?>">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/assets/images/logo-navigation.png' ?>" alt="#logo">
                    </a>
                </div>
            </div>
            <div class="row">
                <nav class="site-navigation col-lg-6">
                    <ul class="menu-primary">
                        <li class="menu-item active">
                            <a href="#home">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#category">Category</a>
                        </li>
                        <li class="menu-item">
                            <a href="#feature">Features</a>
                        </li>
                        <li class="menu-item">
                            <a href="#page">Page</a>
                        </li>
                        <li class="menu-item">
                            <a href="#blog">Blog</a>
                        </li>
                    </ul>
                </nav>

                <div class="col-lg-6">
                    <div class="header-icon">
                        <ul class="list-func-ico">
                            <li class="menu-item icon-search">
                                <a href="#search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item icon-user">
                                <a href="#user">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="menu-item icon-car">
                                <a href="#user">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    <span class="count-cart">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>