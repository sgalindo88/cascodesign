<?php require_once('../../../wp-load.php'); ?>
<?php
    $post_id = $_GET['postid'];
    
    $post = get_post($post_id);
    
    $tag = wp_get_post_tags($post->ID);
?>
<script type="text/javascript">        
    //Dynamically loads the content for the service pages, Logos, Stationery, Print Media, Advertising, Publications, Signage, Direct Mail, Merchandising & Websites
    $("#tag-list a").live("click", function(evt){
        var whatpageto = $(this).attr('id');
        var pagename = $(this).text();
        var url = encodeURIComponent(pagename);
        var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-client.php?tagname='+whatpageto+'&tagtitle='+url;
        $('#clientsPage').attr('title', 'daPage-'+whatpageto); // the title would look like title="dpage-linksid"
        $('#clientsPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');
        $.get(whatpage2, function(data) { // load content from external file
            $('#clientsPage').html(data); // insert data to the jqMobile page (which is a div).
            $('#clientsPage').trigger('pagecreate');// Re-render the page otherwise the dynamic content is not styled.
        });
    });
</script>
<!--*****************************START POST PAGE CONTENT_***************************************-->   
    <?php 
            $home = get_bloginfo('home');
            //get the child pages of the main pages but exclude the children of the child pages
            $childpage = get_pages(array(
                'child_of' => '5',
                'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
                'sort_column' => 'ID'));
             include ('sidebar.php'); 
    ?>
    <div class="the_post">
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
    <h1><?php echo $post->post_title; ?></h1>
    <?php
    if (get_post_meta($post->ID, 'client', $single = true)){
        $client = get_post_meta($post->ID, 'client', $single = true);
        echo '<span class="underinfo">'.$client.'</span>';
    }     
    if (get_post_meta($post->ID, 'year', $single = true)){
        $year = get_post_meta($post->ID, 'year', $single = true);
        echo '<span class="underinfo">, '.$year.'</span>';
    } 
    ?>
    <div class="post_content">
        <p><?php echo $post->post_content; ?></p>
    </div><!--end post_content-->
    <div id="tag-list">
        <?php foreach ($tag as $tags)
        {
            $tag_name = $tags->name;
            $tag_slug = $tags->slug;
            echo 'Tags: <a href="#clientsPage" title="'.$tag_name.'" id="'.$tag_slug.'" data-transition="fade">'.$tag_name.'</a><br/>';
        }
        ?>
    </div>
    <br/>
    <small><a href="" data-rel="back" data-transition="fade" id="back-button">Back</a></small>
        
    </div>
    </div>
    </div><!--end inside_content-->
</div><!--end content-->
<!--*****************************END POST PAGE CONTENT_*****************************************--> 