<?php echo get_header();?>
<?php
    // Get category ID
    $category = $wp_query->get_queried_object();
    $category_id = get_queried_object_id();
    $posts = get_posts(
        array(
            'taxonomy' => $category_id,
            'post_type' => 'post',
            'post_status' => 'publish',
        )
    );
?>
<div class="post-header" style="background: url('<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-6k0VD3xNw6U-unsplash.jpg')?>');">
    <p class="txt-xlg text-light txt-bold"><?php ?></p>
    <p class="txt-md text-light">Home / Category / <?php echo $category->name?></p>
</div>
<div class="main-post-content mt-5 row w-100">
    <div class="col-md-8">
        <?php
            foreach($posts as $post){
                $post_id = $post->ID;
                $the_post = get_post($post_id);
                $image = wp_get_attachment_image_src( $the_post->upload_featured_image );
                $content = $the_post->content_section_group;
                $add_content_blocks = $content['add_content_blocks'] ?? '';
                $content = $add_content_blocks[0]['text_content'] ?? '';

                $date = $the_post->post_date;
                $date = date_create($date);
                $content = substr($content, 0, 200);      
        ?>
        <div class="mb-5">
            <div class="row">
                <img src="<?php echo $image[0];?>" alt="" class="" style="width:96%; height:350px; object-fit:cover;">
            </div>
            <div class="row p-4 shadow cat-news">
                <p class="txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2"><?php echo $category->name?> </span> <?php echo date_format($date,'M d, Y');?></p>
                <br>
                <a style="color:black !important;" href="<?php echo get_permalink($post_id)?>"><p class="txt-dark txt-xlg txt-bold" style="text-transform:uppercase;"><?php echo $the_post->post_title;?></p></a>
                <p class="txt-sm txt-light"><?php echo $content?>...</p>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="col-md-4">
        <div class="top-news-header bg-blue-dark w-100 row">
            <p class="txt-lg txt-bold text-light">Other News</p>
        </div>
        <div class="pt-3">
            <?php
                $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=>'-1'));
                while($query->have_posts()):$query->the_post();
                    $post_id = get_the_id();
                    $the_post = get_post($post_id);
                    $image = wp_get_attachment_image_src($the_post->upload_featured_image);
                    $content = $the_post->content_section_group;
                    $add_content_blocks = $content['add_content_blocks'] ?? '';
                    $content = $add_content_blocks[0]['text_content'] ?? '';
                    $content = substr($content, 0, 100);
                    
            ?>
            <div class="row w-100">
                <div class="col-md-4">
                    <img src="<?php echo $image[0]?>" alt="" class="w-100 rounded">
                </div>
                <div class="col-md-8">
                    <p class="txt-bold txt-sm"><a href="<?php echo get_permalink()?>"><?php the_title()?></a><br><span
                            class="txt-light txt-xs"><?php echo $content?>.</span></p>
                </div>
            </div>
            <?php
                endwhile;
            ?>
            <br>
            <!-- <div class="top-news-header bg-blue-dark w-100 row">
                <p class="txt-lg txt-bold text-light">Other News</p>
            </div>
            <div class="pt-3">
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span
                                class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
            </div> -->
            <hr>
        </div>
    </div>
</div>
<?php echo get_footer();?>