<?php get_header(); ?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak">
<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row page">
            <div class="col-md-8 post">
                <div class="heading"><h1><?php the_title(); ?></h1></div>
                <div class="post_content">
                    <?php 
                    the_content(); 
                    $course_field = get_post_meta($post->ID, 'course_field', true);
                    if($course_field):
                        $course_field = json_decode($course_field);
                        for ($i = 0; $i < count($course_field[0]); $i++) :
                    ?>
                    
                    <div class="accordion" id="nav-section<?php echo $i; ?>"><?php echo $course_field[0][$i]; ?><span></span></div>
                    <div class="accordion-container">
                        <?php echo do_shortcode(nl2br($course_field[1][$i])); ?>
                    </div>
                    <?php endfor; 
                    endif;
                    ?>
                    
                    <?php echo stripslashes(get_post_meta(get_queried_object_id(), "c_code", true)); ?>
                </div>
                <div class="tags_box mt20"><p><?php the_tags('<b>TAGS: </b>', ', ', ''); ?></p></div>
                <div class="share"><?php show_share_socials(); ?></div>
            </div>
            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>