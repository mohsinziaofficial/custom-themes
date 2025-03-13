<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- load header files -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="preHeader">
    <div class="container">
        <div class="preHeaderContent">
            <div class="logo">
                <a class="no-line" href="/">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/theme-images/Logo.png" alt="Logo">
                </a>
            </div>
            <div class="contactDetails">
                <div class="address">
                    <p><i class="fa-solid fa-location-dot"></i> &nbsp; Lorem Ipsum is simply dummy text.</p>
                </div>
                <div class="email">
                    <p><a href="mailto:info@example.com"><i class="fa-solid fa-envelope"></i> &nbsp; info@example.com</a></p>
                </div>
                <div class="phone">
                    <p><a href="tel:0123456789"><i class="fa-solid fa-phone"></i> &nbsp; 012.345.6789</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="container">
        <nav>
            <?php wp_nav_menu(['theme_location' => 'primary']); ?>
        </nav>
    </div>
</header>