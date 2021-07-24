<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
            $page_type = rwmb_meta('page_type');
            if(isset($page_type)){
                if($page_type !== "Live Match"){
                    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
                }
            }
        ?>
        <title>Kwik12.com</title>
        <?php wp_head();?>
        <meta name="referrer" content="no-referrer" />
        <link rel="shortcut icon" href="<?php echo get_theme_file_uri('assets/imgs/kwiklogo.png')?>" type="image/x-icon">
    </head>

    <body>
        <nav class="bg-blue">
            <?php
                $settings = get_page_by_title( 'Settings' );
                $website_logo = $settings->website_logo;
                $website_logo = wp_get_attachment_image_src($website_logo);

                // Social Media handles
                $social_media_handles = $settings->social_media_handles;
            ?>
            <div class="row w-100">
                <div class="col-md-3">
                    <a href="<?php echo site_url()?>">
                        <img src="<?php echo $website_logo[0]?>" alt="" class="w-100">
                    </a>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo site_url()?>" class="mx-2 txt-md txt-light">Home</a>
                        <a href="<?php echo site_url('about')?>" class="mx-2 txt-md txt-light">About Us</a>
                        <a href="<?php echo site_url('donations')?>" class="mx-2 txt-md txt-light">Donations</a>
                        <a href="<?php echo site_url('contact')?>" class="mx-2 txt-md txt-light">Contacts</a>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="d-flex">
                        <p class="txt-md txt-light mr-3">Follow Us:</p>
                        <a href="<?php echo $social_media_handles['facebook_link'] ?? '';?>" target="_blank" class="mx-3"><i class="fab fa-facebook txt-lg"></i></a>
                        <a href="<?php echo $social_media_handles['instagram_link'] ?? '';?>" target="_blank" class="mx-3"><i class="fab fa-instagram txt-lg"></i></a>
                        <a href="<?php echo $social_media_handles['twitter_link'] ?? '';?>" target="_blank" class="mx-3"><i class="fab fa-twitter txt-lg"></i></a>
                        <a href="<?php echo $social_media_handles['pinterest_link'] ?? '';?>" target="_blank" class="mx-3"><i class="fab fa-pinterest txt-lg"></i></a>
                    </div>
                </div>
            </div>
        </nav>