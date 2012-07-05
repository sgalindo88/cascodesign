<?php require_once('../../../wp-load.php'); ?>
<?php
    $page_name = $_GET['pagename'];
?>
<script type="text/javascript">        
    //Dynamically loads the content for the service pages, Logos, Stationery, Print Media, Advertising, Publications, Signage, Direct Mail, Merchandising & Websites
    $(".arrow a").live("click", function(evt){
        var whatpageto = encodeURIComponent($(this).attr('id'));
        //var pagename = $(this).text();
        var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-post.php?postid='+whatpageto;
        $('#postPage').attr('title', 'daPage-'+whatpageto); // the title would look like title="dpage-linksid"
        $('#postPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');
        $.get(whatpage2, function(data) { // load content from external file
            $('#postPage').html(data); // insert data to the jqMobile page (which is a div).
            $('#postPage').trigger('pagecreate');// Re-render the page otherwise the dynamic content is not styled.
        });
    });
</script>
<!--*****************************START ACTION PAGE CONTENT_***************************************-->   
    <?php 
            $home = get_bloginfo('home');
            //get the child pages of the main pages but exclude the children of the child pages
            $childpage = get_pages(array(
                'child_of' => '7',
                'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
                'sort_column' => 'ID'));
             include ('sidebar-action.php'); 
    ?>
<?php    
//get the action posts
$query_action = new WP_Query(array('meta_key' => 'feature-action', 'meta_value' => 'yes'));

if ($page_name=="action")
{
    echo '<ul data-role="listview" data-insert="true" data-filter="true">';
        if($query_action->have_posts())
        {
            while ($query_action->have_posts()) : $query_action->the_post();
                $clientname = get_post_meta($post->ID, 'client', $single = true);
                $year =  get_post_meta($post->ID, 'year', $single = true);
                $featurepic = get_post_meta($post->ID, 'feature-image', $single = true);
                //get the gallery attachments from every post to display.
                $args = array ('post_type' => 'attachment', 'numberposts' => 1, 'post_status' => null, 'post_parent' => $post->ID, 'post_mime_type' => 'image', 'order'=>'ASC');
                $attachments = get_posts($args);
                
                if ($attachments){
                    echo '
                    <div class="single_post">';
                        echo '
                        <div class="image arrow"><a href="#postPage" title="'.$post->post_title.'" id="'.$post->ID.'" data-transition="fade">';
                            foreach ($attachments as $pics)
                            {
                                echo wp_get_attachment_image($pics->ID, 'medium');
                            }
                            echo'
                        </a></div>
                        <div class="info">
                            <h3>'.$post->post_title.'</h3>
                        </div>
                    </div><!--end single post-->';
                }
            endwhile;
        }
    echo '</ul>';
}
?>
    </div>
    </div><!--end inside_content-->
</div><!--end content-->
<!--*****************************END ACTION PAGE CONTENT_*****************************************--> 