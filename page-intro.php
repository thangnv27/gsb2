<?php
/*
  Template Name: Video About
*/

while (have_posts()) : the_post();
//    $url = $post->post_content;
//    $url = trim($url);
//    if(!empty($url)){
?>
<title>Khóa học Google Adwords by Nguyễn Hiển AdWords</title>
<style type="text/css">
    body{
        margin: 0;
        padding: 0;
    }
</style>
<!--<script src="http://jwpsrv.com/library/MDberugLEeSDYxJtO5t17w.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jwplayer/jwplayer.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jwplayer/jwplayer.html5.js"></script>
<div id='playerLaOWyWNdpEVE'></div>
<script type='text/javascript'>
    jwplayer.key = "58TBujyyCUP+cEmwMmC6hv6KhP7bJJgI//VkMU65FYnU09bZUz+BbVB4+5L58ZCY";
    jwplayer('playerLaOWyWNdpEVE').setup({
        skin: "<?php bloginfo('stylesheet_directory'); ?>/js/jwplayer/vapor.xml",
        file: '<?php bloginfo('stylesheet_directory'); ?>/video.MP4',
        image: '<?php bloginfo('stylesheet_directory'); ?>/video.jpg',
        primary: 'flash',
        width: '100%',
        height: '100%',
//        aspectratio: '16:9',
//        controls: 'true',
//        mute: 'false',
        autostart: 'false',
        repeat: 'false'
    });
</script>
<?php // } ?>
<?php endwhile; ?>