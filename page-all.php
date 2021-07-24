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
    <p class="txt-md text-light">Home / All </p>
</div>
<div class="main-post-content mt-5 row w-100">
    <div class="col-md-8">
        <?php
            $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=>'-1'));
            while($query->have_posts()):$query->the_post();
               $post_id = get_the_id();
               $the_post = get_post($post_id);
               $date = get_the_date();
                $date = date_create($date);
               $image = wp_get_attachment_image_src($the_post->upload_featured_image);
               $content = $the_post->content_section_group;
               $add_content_blocks = $content['add_content_blocks'] ?? '';
               $content = $add_content_blocks[0]['text_content'] ?? '';
               $content = substr($content, 0, 300); 
               $terms = wp_get_post_terms($post_id, 'label');
        ?>
        <div class="mb-5">
            <div class="row">
                <img src="<?php echo $image[0];?>" alt="" class="" style="width:96%; height:350px; object-fit:cover;">
            </div>
            <div class="row p-4 shadow cat-news">
                <p class="txt-sm">
                <?php
                    foreach($terms as $term){
                ?>
                <span class="badge bg-red text-light mr-3 txt-sm p-2"><?php echo $term->name?></span>
                <?php
                    }
                ?>
                <br>
                <?php echo date_format($date,'M d, Y');?>
                </p>
                <br>
                <a style="color:black !important;" href="<?php echo get_permalink($post_id)?>"><p class="txt-dark txt-md txt-bold" style="text-transform:uppercase;"><?php echo $the_post->post_title;?></p></a>
                <p class="txt-sm txt-light"><?php echo $content?>...</p>
            </div>
        </div>
        <?php
            endwhile;
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
            <hr>
        </div>
    </div>
</div>
<?php echo get_footer();?>