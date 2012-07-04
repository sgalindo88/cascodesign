<?php require_once('../../../wp-load.php'); ?>
<?php
    $page_name = $_GET['pagename'];
    $page_title = $_GET['pagetitle'];
    
    $page = get_page_by_title($page_title);
    setup_postdata($page);
?>
<script type="text/javascript">        
    //Dynamically loads the content for the service pages, Logos, Stationery, Print Media, Advertising, Publications, Signage, Direct Mail, Merchandising & Websites
    $("#clients a").live("click", function(evt){
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
<!--*****************************START ACTION PAGE CONTENT_***************************************-->   
    <?php 
            $home = get_bloginfo('home');
            //get the child pages of the main pages but exclude the children of the child pages
            $childpage = get_pages(array(
                'child_of' => '7',
                'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
                'sort_column' => 'ID'));
             include ('sidebar-in.php'); 
    ?>

    <?php 
    if($page_name == "about" || $page_name == "contact-us" || $page_name == "team") {
        echo '<h1 id="in-title">'.$page_title.'</h1>';
        echo '<div class="post_content">
            '.the_content().'
        </div><!--end post_content-->';
    }
    elseif ($page_name == "studio") {
        echo '<h1 id="in-title">'.$page_title.'</h1>';
        echo '<div class="post_content">
            '.the_content().'
        </div><!--end post_content-->';
        //get the gallery attachments from every post to display.
        $args = array ('post_type' => 'attachment', 'numberpost' => -1, 'post_status' => null, 'post_parent' => 25, 'post_mime_type' => 'image', 'order'=>'ASC');
        $attachments = get_posts($args);
        if($attachments){
        echo '<div id="gallery" style="width:100%; overflow-x:scroll;">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>';
                foreach ($attachments as $pics)
                {
                    echo '<td>'.wp_get_attachment_image($pics->ID, 'medium').'</td>'; 
                }
                echo '</tr>
            </table>
        </div><!--end #gallery-->';
        }
    }
    elseif ($page_name == "clients") {
        $tags = get_tags();
        echo '<h1 id="in-title">'.$page_title.'</h1>';
        $html = '<div id="clients">';
        foreach ($tags as $tag) {
            $tag_name = $tag->name;
            $tag_slug = $tag->slug;
            $html .= '<a href="#clientsPage" title="'.$tag_name.'" id="'.$tag_slug.'" data-transition="fade">'.$tag_name.'</a><br/>';
        }
        $html .= '</div>';
        echo $html;
    }
    ?>
    </div>
    </div><!--end inside_content-->
</div><!--end content-->
<!--*****************************END ACTION PAGE CONTENT_*****************************************--> 