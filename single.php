<?php echo get_header();?>
<?php
    $post_id = get_the_id();
    $image = get_metabox_image_url('upload_featured_image');
    $content_section_group = rwmb_meta('content_section_group');
    $page_type = rwmb_meta('page_type');
    $date = get_the_date();
    $date = date_create($date);
?>
<div class="post-header" style="background: url('<?php echo $image?>');">
    <p class="txt-lg txt-bold">Home / News / <?php echo the_title()?></p>
</div>
<div class="main-post-content mt-5 row w-100">
    <div class="col-md-8">
        <p class="txt-xlg txt-dark txt-bold"><u><?php the_title()?></u></p>
        <?php
            if($page_type == "Live Match"){
                $stream_link = rwmb_meta('stream_link');
        ?>
            <div class="">
                <iframe allowfullscreen="" border="0" frameborder="0" height="400" scrolling="no" src="<?php echo $stream_link?>" name="I1" style="width:100% !important;"></iframe>
            </div>
            <div class="text-center mx-auto mt-3">
                <p class="txt-md mx-auto"><b>Disclaimer:</b> This stream found for free on the internet, we do not stream or host it, if
                    you think its illegal please send us a notification via contact form and we will remove the page
                    immediately.</p>
                <p class="txt-md mx-auto">kwik12.com does not stream or host any audio or video straming content, we only link to the
                    channels and we dont take any responsibility about thos streamed channels.</p>
            </div>
        <?php
            }else{
        ?>
        <img src="<?php echo get_metabox_image_url('upload_featured_image');?>" alt="" class="rounded w-100" style="height:300px; object-fit:cover;">
        <div class="post-content py-4 text-justify">
            <p class="txt-red txt-sm">
                <?php
                    $terms = wp_get_post_terms($post_id, 'label');
                    foreach($terms as $term){
                ?>
                    <span class="badge bg-red text-light mr-3 txt-sm p-2"><?php echo $term->name?> </span>
                <?php
                    }
                ?>
                <?php echo date_format($date, 'M d, Y');?></p>
            <?php
                $add_content_blocks = $content_section_group['add_content_blocks'];
                foreach($add_content_blocks as $content_blocks){
                    if(isset($content_blocks['text_content'])){
                ?>
                    <p class="txt-light txt-md"><?php echo $content_blocks['text_content'];?></p>
                <?php
                    }
                    if(isset($content_blocks['upload_image'])){
                        $upload_image = wp_get_attachment_image_src($content_blocks['upload_image'][0]);
                ?>
                    <img src="<?php echo $upload_image[0];?>" alt="" class="w-50 rounded mb-4">
                <?php
                    }
                    if(isset($content_blocks['upload_audio'])){
                        $audio = wp_get_attachment_url($content_blocks['upload_audio'][0]);
                ?>
                    <audio controls class="w-100 mb-3">
                        <source src="<?php echo $audio?>" type="audio/ogg">
                        Your browser does not support the audio tag.
                    </audio>
                <?php
                    }
                    if(isset($content_blocks['add_video_group'])){
                        $add_video_group = $content_blocks['add_video_group'];
                ?>
                    <iframe class="mb-3" style="width:100%;" height="330" src="<?php echo $add_video_group['youtube_link'] ?? '';?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php
                    }
                    if(isset($content_blocks['insert_url'])){
                        $insert_url = $content_blocks['insert_url'];
                ?>
                    <a class="txt-light txt-md" href="<?php echo $insert_url['enter_url']?>"><?php echo $insert_url['link_text']?></a>
                <?php
                    }
                }
            ?>
            <p>Tags: 
                <?php
                    $labels = get_terms( array(
                        'taxonomy' => 'label',
                        'hide_empty' => false
                    ) );
                    if(!empty($labels)){
                        foreach($labels as $label){
                ?>
                    <a href="<?php echo get_term_link($label->term_id)?>" style="color:black !important;"><span class="badge bg-light rounded p-2 mr-2"><?php echo $label->name?></span></a>
                <?php
                        }
                    }
                ?>
                </p>
        </div>
        <hr>
        <div class="also-like">
            <p class="txt-xlg txt-bold txt-blue">YOU MAY ALSO LIKE</p>
            <div class="row">
                <?php
                    $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=>'2'));
                    while($query->have_posts()):$query->the_post();
                        $post_id = get_the_id();
                        $the_post = get_post($post_id);
                        $image = wp_get_attachment_image_src($the_post->upload_featured_image);
                        $content = $the_post->content_section_group;
                        $add_content_blocks = $content['add_content_blocks'] ?? '';
                        $content = $add_content_blocks[0]['text_content'] ?? '';
                        $content = substr($content, 0, 200);
                        
                ?>
                <div class="col-md-6 px-4">
                    <div class="row">
                        <img src="<?php echo $image[0];?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="row pt-4">
                        <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News</span>
                            <?php echo date_format($date, 'M d, Y');?></p>
                        <a href="<?php echo get_permalink()?>" class="text-dark">
                            <a href="<?php echo get_permalink()?>"><p class="txt-bold txt-md"><?php the_title()?></p>
                        </a>
                        <p class="txt-light txt-sm"><?php echo $content;?></p>
                    </div>
                </div>
                <?php
                    endwhile;
                ?>
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
                    $content = substr($content, 0, 200);
                    
            ?>
            <div class="row w-100 mb-3">
                <div class="col-md-4">
                    <img src="<?php echo $image[0]?>" alt="" class="w-100 rounded">
                </div>
                <div class="col-md-8">
                    <a href="<?php echo get_permalink()?>"><p class="txt-bold txt-sm"><?php the_title();?></p></a>
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
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-bold txt-sm">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES <br><span class="txt-light txt-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </p>
                    </div>
                </div>
            </div> -->
            <hr>
        </div>
    </div>
</div>
<?php
    echo get_footer();
?>