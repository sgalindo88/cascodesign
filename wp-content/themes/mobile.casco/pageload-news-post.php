<?php require_once('../../../wp-load.php'); ?>
<?php
    $post_id = $_GET['postid'];
    
    $post = get_post($post_id);
?>
<!--*****************************START POST PAGE CONTENT_***************************************-->   
    <?php 
            $home = get_bloginfo('home');
            //get the child pages of the main pages but exclude the children of the child pages
            $childpage = get_pages(array(
                'child_of' => '7',
                'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
                'sort_column' => 'ID'));
             include ('sidebar-in.php'); 
    ?>
    <div class="the_post">
        <h1><?php echo $post->post_title; ?></h1>
        <?php 
        //get the gallery attachments from every post to display.
        $args = array ('post_type' => 'attachment', 'numberpost' => -1, 'post_status' => null, 'post_parent' => $post->ID, 'post_mime_type' => 'image', 'order'=>'ASC');
        $attachments = get_posts($args);
        if($attachments){
        ?>
        <div id="gallery" style="width:100%; overflow-x:scroll;">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                <?php
                foreach ($attachments as $pics)
                {
                    echo '<td>'.wp_get_attachment_image($pics->ID, 'medium').'</td>'; 
                }
                ?>
                </tr>
            </table>
        </div><!--end #gallery-->
        <?php } ?>
    </div><!--end the_post-->
    <div class="post_content">
        <small id="newspost_date"><?php echo get_the_time("l, F jS, Y"); ?></small>
        <p><?php echo $post->post_content; ?></p>
    </div><!--end post_content-->
    </div>
    </div><!--end inside_content-->
</div><!--end content-->
<!--*****************************END POST PAGE CONTENT_*****************************************--> 