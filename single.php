<?php echo get_header();?>
<?php
    $image = wp_get_attachment_image_src( get_post_thumbnail_id() );
    $date = get_the_date();
    $date = date_create($date);
?>
<div class="post-header" style="background: url('<?php echo $image[0];?>');">
    <p class="txt-xlg txt-dark txt-bold"><?php the_title()?></p>
    <p class="txt-md txt-dark">Home / News / <?php echo the_title()?></p>
</div>
<div class="main-post-content mt-5 row w-100">
    <div class="col-md-8">
        <img src="<?php echo $image[0];?>" alt=""
            class="rounded w-100">
        <div class="post-content p-4">
            <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News </span><?php echo date_format($date, 'M d, Y');?></p>
            <p class="txt-light txt-md">
                <?php echo the_content();?>
            </p>
            <p>Tags: <span class="badge bg-light rounded p-2 mr-2">News</span> <span
                    class="badge bg-light rounded p-2 mr-2">Transfers</span> <span
                    class="badge bg-light rounded p-2 mr-2">EUROs</span></p>
        </div>
        <hr>
        <div class="also-like">
            <p class="txt-xlg txt-bold txt-blue">YOU MAY ALSO LIKE</p>
            <div class="row">
                <?php
                    $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=>'2'));
                    while($query->have_posts()):$query->the_post();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ) );
                        $date = get_the_date();
                        $date = date_create($date);
                        $content = get_the_content();
                        $content = substr($content, 0, 200);
                        
                ?>
                <div class="col-md-6 px-4">
                    <div class="row">
                        <img src="<?php echo $image[0];?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="row pt-4">
                        <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News </span>
                        <?php echo date_format($date, 'M d, Y');?></p>
                        <a href="<?php echo get_permalink()?>" class="text-dark"><p class="txt-bold txt-lg"><?php the_title()?></p></a>
                        <p class="txt-light txt-md"><?php echo $content;?></p>
                    </div>
                </div>
                <?php
                    endwhile;
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="top-news-header bg-blue-dark w-100 row">
            <p class="txt-lg txt-bold text-light">Other News</p>
        </div>
        <div class="pt-3">
            <?php
                $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=>'-1'));
                while($query->have_posts()):$query->the_post();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ) );
                    $date = get_the_date();
                    $date = date_create($date);
                    $content = get_the_content();
                    $content = substr($content, 0, 100);
                    
            ?>
            <div class="row w-100">
                <div class="col-md-4">
                    <img src="<?php echo $image[0]?>" alt="" class="w-100 rounded">
                </div>
                <div class="col-md-8">
                    <p class="txt-bold txt-sm"><?php the_title();?></p>
                </div>
            </div>
            <?php
                endwhile;
            ?>
            
            <br>
            <div class="top-news-header bg-blue-dark w-100 row">
                <p class="txt-lg txt-bold text-light">Other News</p>
            </div>
            <div class="pt-3">
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<?php
    echo get_footer();
?>