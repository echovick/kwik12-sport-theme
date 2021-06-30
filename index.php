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
    endwhile;
?>
<div class="sub-nav shadow">
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
</div>
<main>
    <div class="row live-matches bg-red w-100">
        <!-- For headlines -->
        <?php
            if($banner_view == 'Headline'){
                $headline_post = $headline_settings['headline_post'];
                $other_headliners = $headline_settings['other_headliners'];
                $other_headlines = $other_headliners['other_headlines'];

                $the_post = get_post($headline_post);
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $headline_post ) );
        ?>
            <div class="col-md-8 col-12 img-container" style="padding-left: 0px !important; object-fit:cover; background-size:cover; background-image:url('<?php echo $image[0];?>');">
                <p class="txt-xlg text-light txt-bold shadow px-5 w-90 pb-2" style="bottom:0; position:absolute;"><?php echo $the_post->post_title;?></p>
            </div>
        <?php
            }elseif($banner_view == 'Live'){
                $embed_link = $live_stream_settings['embed_link'] ?? '';
                $live_teams_playing = $live_stream_settings['live_teams_playing'] ?? '';
                $upcoming_matches = $live_stream_settings['upcoming_matches'] ?? '';
        ?>
             <!-- For live stream -->
            <div class="col-md-8 col-12 img-container" style="padding-left: 0px !important;">
                <iframe style="width:100%; height:100%; border:none;" src="<?php echo $embed_link;?>"></iframe>
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
                    <p class="txt-sm">Upcoming Matches</p>
                    <?php
                        foreach($upcoming_matches as $matches){
                    ?>
                        <p class="txt-md"><?php echo $matches['upcoming_teams_playing']?> - 5th Sept, 2021</p>
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
            ?>
                <!-- Healine -->
                <a href="">
                    <div class="row bg-red text-light p-4">
                        <p class="txt-sm">September 8, 2018</p>
                        <p class="txt-lg txt-bold"><?php echo $the_headline->post_title;?></p>
                    </div>
                </a>
                <hr>
                <!-- <a href="">
                    <div class="row bg-red text-light p-4">
                        <p class="txt-sm">September 8, 2018</p>
                        <p class="txt-lg txt-bold">THE TOP CLUBS OPEN THE NEW SEASON</p>
                    </div>
                </a> -->
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
                        <p class="txt-xs">Live Now<br> <span class="txt-sm txt-bold">Nigeria Vs Biafra</span></p>
                    </div>
                </a>
                <div class="bg-red text-light p-4">
                    <p class="txt-sm">Upcoming Matches</p>
                    <p class="txt-md">England Vs London - 5th Sept, 2021</p>
                    <hr>
                    <p class="txt-md">England Vs London - 5th Sept, 2021</p>
                    <hr>
                    <p class="txt-md">England Vs London - 5th Sept, 2021</p>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
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
                ?>
                    <div class="col-md-4 px-3">
                        <div class="row border-right">
                            <div class="col-md-3 col-3">
                                <img src="http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/go-4-copyright-400x400.png"
                                    alt="" class="w-100 mt-2 club-img">
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <p>
                                    <span class="txt-sm">July 11, 2018</span><br>
                                    <span class="txt-xlg txt-bold text-dark"><?php echo $score?></span><br>
                                    <span class="txt-sm">Premier League</span>
                                </p>
                            </div>
                            <div class="col-md-3 col-3">
                                <img src="http://fc-united.axiomthemes.com/wp-content/uploads/2018/11/go-4-copyright-400x400.png"
                                    alt="" class="w-100 mt-2 club-img">
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
                <a href="" class="mr-3 mb-1 txt-md text-light">
                    Football Clubs
                </a>
                <a href="" class="mr-3 mb-1 txt-md text-light">
                    Sports & Games
                </a>
                <a href="" class="mr-3 mb-1 txt-md text-light">
                    Topics
                </a>
                <a href="" class="mr-3 mb-1 txt-md text-light">
                    News
                </a>
                <a href="" class="mr-3 mb-1 txt-md text-light">
                    Training
                </a>
            </div>
        </div>
        <div class="top-news-content row-100">
            <div class="row w-100 p-4 shadow">
                <?php
                    foreach($select_top_news as $top_news){
                        $the_news = get_post($top_news);
                ?>
                    <div class="col-md-4 px-4">
                        <div class="row">
                            <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>"
                                alt="" class="w-100 rounded">
                        </div>
                        <div class="row pt-4">
                            <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News </span>
                                November 19, 2018</p>
                            <p class="txt-bold txt-lg"><?php echo $the_news->post_title?></p>
                            <p class="txt-light txt-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
                                rerum non debitis assumenda impedit obcaecati voluptatem.</p>
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
        <div class="latest-news-section row w-100 mt-4">
            <div class="col-md-8">
                <div class="top-news-header bg-blue-dark w-100 row">
                    <p class="txt-lg txt-bold text-light">LATEST NEWS</p>
                </div>
                <div class="py-4 px-3 row w-100 shadow">
                    <?php
                        $query = new WP_Query(array('post_type'=>'post', 'posts_per_page'=>'-1'));
                        while($query->have_posts()):$query->the_post();
                    ?>
                        <div class="row w-100 mb-3">
                            <div class="col-md-4 mb-3">
                                <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>"
                                    alt="" class="w-100 rounded" style="height:100%;">
                            </div>
                            <div class="col-md-8">
                                <p class="txt-red txt-sm"><span class="badge bg-red text-light mr-3 txt-sm p-2">News </span>
                                    November 19, 2018</p>
                                <a href="<?php echo get_permalink();?>" class="text-dark"><p class="txt-bold txt-lg"><?php echo get_the_title();?></p></a>
                                <p class="txt-light txt-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
                                    rerum non debitis assumenda.</p>
                            </div>
                        </div>
                    <?php
                        endwhile;
                    ?>
                </div>
            </div>
            <!-- Side Featured Posts -->
            <div class="col-md-4">
                <div class="top-news-header bg-blue-dark w-100 row my-3">
                    <p class="txt-lg txt-bold text-light">SPONSORED</p>
                </div>
                <div class="px-4 pt-3">
                    <div class="row w-100">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>"
                            alt="" class="w-100 rounded">
                    </div>
                    <div class="row pt-4">
                        <p class="txt-bold txt-md">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES</p>
                        <p class="txt-light txt-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia rerum
                            non debitis assumenda impedit obcaecati voluptatem.</p>
                    </div>
                </div>
                <hr>
                <div class="px-4 pt-3">
                    <div class="row w-100">
                        <img src="<?php echo get_theme_file_uri('assets/imgs/jeffrey-f-lin-fR7JtPh6ZA8-unsplash.jpg')?>"
                            alt="" class="w-100 rounded">
                    </div>
                    <div class="row pt-4">
                        <p class="txt-bold txt-md">THE EXCELLENT RESULT OF JUNIOR LEAGUE GAMES</p>
                        <p class="txt-light txt-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia rerum
                            non debitis assumenda impedit obcaecati voluptatem.</p>
                    </div>
                </div>
                <hr>
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