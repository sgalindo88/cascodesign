<?php require_once('../../../wp-load.php'); ?>
<?php
    $page_name = $_GET['pagename'];
    $page_title = $_GET['pagetitle'];
?>
<script type="text/javascript">        
    //Dynamically loads the content for the service pages, Logos, Stationery, Print Media, Advertising, Publications, Signage, Direct Mail, Merchandising & Websites
    $("#the_post a").live("click", function(evt){
        var whatpageto = $(this).attr('id');
        //var pagename = $(this).text();
        var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-post.php?postid='+whatpageto;
        $('#postPage').attr('title', 'dsPage-'+whatpageto); // the title would look like title="dpage-linksid"
        $('#postPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');
        $.get(whatpage2, function(data) { // load content from external file
            $('#postPage').html(data); // insert data to the jqMobile page (which is a div).
            $('#postPage').trigger('pagecreate');// Re-render the page otherwise the dynamic content is not styled.
        });
    });
</script>
<!--*****************************START SERVICE PAGE CONTENT_***************************************-->   
    <?php 
            $home = get_bloginfo('home');
            //get the child pages of the main pages but exclude the children of the child pages
            $childpage = get_pages(array(
                'child_of' => '5',
                'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
                'sort_column' => 'ID'));
             include ('sidebar.php'); 
    ?>
<?php
    //get the categories for the project pages
    $query = new WP_Query(array('category_name'=>$page_name, 'order' => 'DESC'));
    if ($page_name=="brandconsulting")
    {
        echo '<h1>'.$child_title.'</h1>';
        echo '<p>'.apply_filters('the_content', $child_content).'</p>';
        echo '<p><ul><li><a href="#'.$child_name.'" data-transition="fade">'.$child_title.'</a></li></ul></p>';
    }
    elseif ($page_name=="logos" || $page_name=="stationery" || $page_name=="printmedia" || $page_name=="advertising" || $page_name=="publications" || $page_name=="signage" || $page_name=="directmail" || $page_name=="merchandising" || $page_name=="websites")
    {
        echo '<h1 id="in-title">'.$page_title.'</h1>';
        echo '<ul class="services-list" data-role="listview" data-insert="true" data-filter="true">';
            if($query->have_posts())
            {
                while ($query->have_posts()) : $query->the_post();
                    $clientname = get_post_meta($post->ID, 'client', $single = true);
                    $year =  get_post_meta($post->ID, 'year', $single = true);
                    $featurepic = get_post_meta($post->ID, 'feature-image', $single = true);
                    echo '
                    <div id="the_post" class="single_post">';
                        //get the gallery attachments from every post to display.
                        $args = array ('post_type' => 'attachment', 'numberposts' => 1, 'post_status' => null, 'post_parent' => $post->ID, 'post_mime_type' => 'image', 'order'=>'ASC');
                        $attachments = get_posts($args);
                        if($attachments){
                        echo '<div class="image"><a href="#postPage" title="'.$post->post_title.'" id="'.$post->ID.'" data-transition="fade">';
                            foreach ($attachments as $pics)
                            {
                                echo wp_get_attachment_image($pics->ID, 'medium');
                            }
                            echo'
                        </a></div>';
                        }
                        echo '<div class="info">
                            <h3>'.$post->post_title.'</h3>
                        </div>
                    </div><!--end single post-->';
                endwhile;
            }
            else
            {
                echo '<div class="single_post"><p>Sorry, currently there are no '.$page_name.' related posts.</p></div><!--end single post-->';                           
            }
        echo '</ul>';
    }
?>
    </div>
    </div><!--end inside_content-->
</div><!--end content-->

<!--*****************************END SERVICE PAGE CONTENT_*****************************************-->