<?php
    echo get_header();
?>
<?php
    while(have_posts()):the_post();
        $banner_view = get_post_meta(get_the_id(),'banner_view',true);
        $live_stream_settings = get_post_meta(get_the_id(),'live_stream_settings',true);
        $headline_settings = get_post_meta(get_the_id(),'headline_settings',true);
        $show_top_news = get_post_meta(get_the_id(),'show_top_news',true);
        $select_top_news = get_post_meta(get_the_id(),'select_top_news',true);
        $show_lates_news = get_post_meta(get_the_id(),'show_lates_news',true);
        $show_latestscore_section = get_post_meta(get_the_id(),'show_latestscore_section',true);
        $add_scores = get_post_meta(get_the_id(),'add_scores',true);
        $select_sponsored_post = rwmb_meta('select_sponsored_post');
        $post_or_ad = rwmb_meta('post_or_ad');
    endwhile;
?>
<!-- <div class="sub-nav shadow">
    <div class="row justify-content-center w-100">
        <a href="" class="mx-3 txt-md text-dark">Table of matches</a>
        <a href="" class="mx-3 txt-md text-dark">Sponsors</a>
        <a href="" class="mx-3 txt-md text-dark">Updates</a>
        <a href="" class="mx-3 txt-md text-dark">Calenders</a>
        <a href="" class="mx-3 txt-md text-dark">Team Table</a>
        <a href="" class="mx-3 txt-md text-dark">League Table</a>
        <a href="" class="mx-3 txt-md text-dark">About Fl</a>
        <a href="" class="mx-3 txt-md text-dark">Top Articles</a>
    </div>
</div> -->
<main>
    <div class="row live-matches bg-red w-100">
        <!-- For headlines -->
        <?php
            if($banner_view == 'Headline'){
                $headline_post = $headline_settings['headline_post'];
                $other_headliners = $headline_settings['other_headliners'];
                $other_headlines = $other_headliners['other_headlines'];

                $the_post = get_post($headline_post);
                $image = wp_get_attachment_image_src( $the_post->upload_featured_image );    
        ?>
        <div class="col-md-8 col-12 img-container desktop"
            style="padding-left: 0px !important; object-fit:cover; background-size:cover; background-image:url('<?php echo $image[0];?>');">
            <p class="txt-xlg text-light txt-bold shadow px-5 w-90 pb-2" style="bottom:0; position:absolute;">
                <?php echo $the_post->post_title;?>
            </p>
        </div>
        <?php
            }elseif($banner_view == 'Live'){
                $embed_link = $live_stream_settings['embed_link'] ?? '';
                $live_teams_playing = $live_stream_settings['live_teams_playing'] ?? '';
                $other_live_matches = $live_stream_settings['other_live_matches'] ?? '';
        ?>
        <!-- For live stream -->
        <div class="col-md-8 col-12 img-container" style="padding-left: 0px !important;">
            <iframe allowfullscreen="" border="0" frameborder="0" height="400" scrolling="no" src="<?php echo $embed_link?>" name="I1" style="width:100% !important;"></iframe>
        </div>
        <?php
            }
        ?>

        <div class="col-md-4 col-12 desktop">
            <?php
                if($banner_view == 'Live'){
            ?>
            <a href="">
                <div class="bg-red text-light p-4">
                    <p class="txt-sm">Live Now</p>
                    <p class="txt-lg txt-bold"><?php echo $live_teams_playing?></p>
                </div>
            </a>
            <hr>
            <div class="bg-red text-light p-4">
                <p class="txt-sm">Other Live Matches</p>
                <?php
                    if(is_array($other_live_matches)){
                        foreach($other_live_matches as $matches){
                            $post_link = get_permalink($matches['live_match_post']);
                ?>
                    <a href="<?php echo $post_link?>" target="_blank"><p class="txt-md text-light"><?php echo $matches['teams_playing'] ?? ''?></p></a>
                <hr>
                <?php
                        }
                    }else{
                        echo '<p class="txt-md">No Live Matches Available</p>';
                    }
                ?>
            </div>
            <?php
                }elseif($banner_view == 'Headline'){
                    $other_headlines = $other_headliners['other_headlines'];
                    foreach($other_headlines as $headlines){
                        $the_headline = get_post($headlines);
                        $date = $the_headline->post_date;
                        $date = date_create($date);

            ?>
            <!-- Healine -->
            <a href="">
                <div class="row bg-red text-light p-4">
                    <p class="txt-sm"><?php echo date_format($date,'M d, Y');?></p>
                    <p class="txt-lg txt-bold"><?php echo $the_headline->post_title;?></p>
                </div>
            </a>
            <hr>
            <?php
                    }
                }
            ?>

        </div>
        <div class="col-md-4 col-12 mobile">
            <?php
                if($banner_view == 'Live'){
            ?>
            <a href="" class="">
                <div class="row bg-red text-light px-4 pt-2 border-bottom">
                    <p class="txt-xs">Live Now<br> <span class="txt-sm txt-bold"><?php echo $live_teams_playing?></span>
                    </p>
                </div>
            </a>
            <div class="bg-red text-light p-4">
                <p class="txt-sm">Upcoming Matches</p>
                <?php
                        foreach($upcoming_matches as $matches){
                            $upcoming_match_date = $matches['upcoming_match_date'];
                            $upcoming_match_date = date_create($upcoming_match_date);
                    ?>
                <p class="txt-md"><?php echo $matches['upcoming_teams_playing']?> -
                    <?php echo date_format($upcoming_match_date,'d M, Y')?></p>
                <hr>
                <?php
                        }
                    ?>
            </div>
            <?php
                }elseif($banner_view == 'Headline'){
                    $other_headlines = $other_headliners['other_headlines'];
                    foreach($other_headlines as $headlines){
                        $the_headline = get_post($headlines);
                        $date = $the_headline->post_date;
                        $date = date_create($date);
            ?>
            <!-- Healine -->
            <a href="">
                <div class="row bg-red text-light p-4">
                    <p class="txt-sm"><?php echo date_format($date,'M d, Y');?></p>
                    <p class="txt-lg txt-bold"><?php echo $the_headline->post_title;?></p>
                </div>
            </a>
            <hr>
            <?php
                    }

                }
            ?>
        </div>
    </div>
    <?php
        if($banner_view == 'Live'){
    ?>
    <div class="text-center mx-auto mt-3">
        <p class="txt-md mx-auto"><b>Disclaimer:</b> This stream found for free on the internet, we do not stream or host it, if
            you think its illegal please send us a notification via contact form and we will remove the page
            immediately.</p>
        <p class="txt-md mx-auto">kwik12.com does not stream or host any audio or video straming content, we only link to the
            channels and we dont take any responsibility about thos streamed channels.</p>
    </div>
    <?php
        }
    ?>
    <!-- Latest Scores Section -->
    <?php
        if($show_latestscore_section == "Yes"){
    ?>
    <div class="row latest-scores-section my-4 shadow w-100 px-4 py-3">
        <div class="row w-100">
            <?php
                    foreach($add_scores as $scores){
                        $match_date = $scores['match_date'] ?? '';
                        $competition = $scores['competition'] ?? '';
                        $home_icon = $scores['home_icon'] ?? '';
                        $away_icon = $scores['away_icon'] ?? '';
                        $score = $scores['score'] ?? '';

                        // Get attachment image
                        $home_icon = wp_get_attachment_image_src($home_icon[0]);
                        $away_icon = wp_get_attachment_image_src($away_icon[0]);

                        $match_date = date_create($match_date);
                ?>
            <div class="col-md-4 px-3">
                <div class="row border-right">
                    <div class="col-md-3 col-3">
                        <img src="<?php echo $home_icon[0]?>" alt="" class="w-100 mt-2 club-img">
                    </div>
                    <div class="col-md-6 col-6 text-center">
                        <p>
                            <span class="txt-sm"><?php echo date_format($match_date, 'M d, Y')?></span><br>
                            <span
                                class="txt-xlg txt-bold text-dark"><?php if(!empty($score)){ echo $score; }else{ echo '-';}?></span><br>
                            <span class="txt-sm"><?php echo $competition?></span>
                        </p>
                    </div>
                    <div class="col-md-3 col-3">
                        <img src="<?php echo $away_icon[0]?>" alt="" class="w-100 mt-2 club-img">
                    </div>
                </div>
            </div>
            <?php
                    }
                ?>
        </div>
    </div>
    <?php
        }
    ?>

    <!-- Top News Section -->
    <?php
        if($show_top_news == "Yes"){
    ?>
    <div class="top-news">
        <div class="top-news-header bg-blue-dark w-100 row">
            <p class="txt-lg txt-bold text-light">TOP NEWS</p>
        </div>
        <div class="top-new-menu row w-100">
            <div class="row w-100 px-5">
                <a href="" class="mr-3 mb-1 txt-md text-light">
                    All Posts
                </a>
                <?php
                    $category = get_terms(array(
                        'taxonomy' => 'label', 
                        'hide_empty' => false
                    ));
                    if($category){
                        foreach($category as $cat){
                ?>
                <a href="<?php echo get_term_link($cat->term_id)?>" class="mr-3 mb-1 txt-md text-light">
                    <?php echo $cat->name;?>
                </a>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="top-news-content row-100">
            <div class="row w-100 p-4 shadow">
                <?php
                    foreach($select_top_news as $top_news){
                        $the_news = get_post($top_news);
                        $image = wp_get_attachment_image_src( $the_news->upload_featured_image );
                        $content = $the_news->content_section_group;
                        $add_content_blocks = $content['add_content_blocks'] ?? '';
                        $content = $add_content_blocks[0]['text_content'] ?? '';

                        $date = $the_news->post_date;
                        $date = date_create($date);
                        $content = substr($content, 0, 300);
                ?>
                <div class="col-md-4 px-4">
                    <div class="row">
                        <img src="<?php if(($image)){echo $image[0];}else{echo get_theme_file_uri('/assets/imgs/image.png');}?>"
                            alt="" class="w-100 news-img rounded">
                    </div>
                    <div class="row pt-4">
                        <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News </span>
                            <?php echo date_format($date,'M d, Y');?></p>
                        <a href="<?php echo get_permalink($top_news)?>" class="text-dark">
                            <p class="txt-bold txt-md"><?php echo $the_news->post_title?></p>
                        </a>
                        <p class="txt-light txt-sm">
                            <?php echo $content.'...'?>
                        </p>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>

    <!-- Latest news and side table section -->
    <?php
        if($show_lates_news == "Yes"){
    ?>
    <div class="latest-news-section row mx-auto">
        <div class="col-md-8 col-sm-12 col-12 mb-3">
            <div class="top-news-header bg-blue-dark w-100 row">
                <p class="txt-lg txt-bold text-light">LATEST NEWS</p>
            </div>
            <div class="py-4 px-3 row w-100 shadow">
                <?php
                    $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=> rwmb_meta('number_of_posts')));
                    while($query->have_posts()):$query->the_post();
                        $post_id = get_the_id();
                        $the_post = get_post($post_id);
                        $image = wp_get_attachment_image_src( $the_post->upload_featured_image );
                        $content = $the_post->content_section_group;
                        $add_content_blocks = $content['add_content_blocks'] ?? '';
                        $content = $add_content_blocks[0]['text_content'] ?? '';

                        $date = $the_post->post_date;
                        $date = date_create($date);
                        $content = substr($content, 0, 200);      
                ?>
                <div class="row w-100 mb-3">
                    <div class="col-md-4 mb-3">
                        <img src="<?php echo $image[0];?>"
                            alt="" class="w-100 rounded" style="height:100%; object-fit:cover;">
                    </div>
                    <div class="col-md-8">
                        <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News </span>
                            <?php echo date_format($date,'M d, Y');?></p>
                        <a href="<?php echo get_permalink();?>" class="text-dark">
                            <p class="txt-bold txt-md"><?php echo get_the_title();?></p>
                        </a>
                        <p class="txt-light txt-sm"><?php echo $content;?></p>
                    </div>
                </div>
                <?php
                        endwhile;
                    ?>
            </div>
        </div>
        <!-- Side Featured Posts -->
        <div class="col-md-4 col-sm-12 col-12 mb-3">
            <div class="top-news-header bg-blue-dark w-100 row mb-3">
                <p class="txt-lg txt-bold text-light">SPONSORED</p>
            </div>
            <?php
                if(isset($post_or_ad)){
                    if($post_or_ad == 'Post'){
                        foreach($select_sponsored_post as $post){
                            $the_post = get_post($post);
                            $image = wp_get_attachment_image_src($the_post->upload_featured_image);
                            $content = $the_post->content_section_group;
                            $add_content_blocks = $content['add_content_blocks'] ?? '';
                            $content = $add_content_blocks[0]['text_content'] ?? '';
                            $content = substr($content, 0, 200);
            ?>
                <div class="px-4 pt-3">
                    <div class="row w-100">
                        <img src="<?php echo $image[0];?>" alt="alt" class="w-100 rounded" style="height:200px;"/>
                        <img src="" alt="">
                    </div>
                    <div class="row pt-4">
                        <p class="txt-bold txt-md"><?php echo $the_post->post_title;?></p>
                        <p class="txt-light txt-sm"><?php echo $content;?></p>
                    </div>
                </div>
                <hr>
            <?php
                        }
                    }
                }
            ?>
        </div>
    </div>
    <?php
        }
    ?>

    <!-- Subscribe to news letter -->
    <div class="row w-100 newsletter-section shadow my-5 rounded">
        <div class="col-md-3">
            <p class="txt-blue txt-bold txt-xlg">SIGN UP NOW</p>
        </div>
        <div class="col-md-6">
            <p class="txt-md txt-light">Become a member of our online community and get tickets to upcoming matches or
                sports events faster!</p>
        </div>
        <div class="col-md-3">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default bg-blue txt-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php echo get_footer();?>