<?php echo get_header();?>
    <div class="post-header" style="background: url('<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-6k0VD3xNw6U-unsplash.jpg')?>');">
        <p class="txt-xlg txt-bold txt-light">Home / <?php echo the_title()?></p>
    </div>
    <div class="main">
        <div class="about-section shadow row w-90 mx-auto">
            <div class="col-md-6">
                <p class="txt-bold txt-md txt-red"><?php echo rwmb_meta('header')?> <br> <span class="txt-bold txt-xlg txt-dark" style="color:black !important;"><?php echo rwmb_meta('sub_header')?></span></p>
                <p class="txt-normal txt-light txt-md">
                    <?php echo rwmb_meta('content')?>
                </p>
            </div>
            <div class="col-md-6">
                <img src="<?php echo get_metabox_image_url('upload_featured_image')?>" alt="" class="w-100">
            </div>
        </div>
    </div>
<?php echo get_footer();?>