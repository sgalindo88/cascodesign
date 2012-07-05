<?php require_once('../../../wp-load.php'); ?>
<?php
    $page_name = $_GET['pagename'];
?>
<script type="text/javascript">        
    //Dynamically loads the content for the service pages, Logos, Stationery, Print Media, Advertising, Publications, Signage, Direct Mail, Merchandising & Websites
    $(".arrow a").live("click", function(evt){
        var whatpageto = $(this).attr('id');
        //var pagename = $(this).text();
        var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-news-post.php?postid='+whatpageto;
        $('#postPage').attr('title', 'dnPage-'+whatpageto); // the title would look like title="dpage-linksid"
        $('#postPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');
        $.get(whatpage2, function(data) { // load content from external file
            $('#postPage').html(data); // insert data to the jqMobile page (which is a div).
            $('#postPage').trigger('pagecreate');// Re-render the page otherwise the dynamic content is not styled.
        });
    });
</script>
<!--*****************************START NEWS PAGE CONTENT_***************************************-->   
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
//get the news post for the news pages
$query_news = new WP_Query(array('category_name'=>$page_name, 'order' => 'DESC'));
if ($page_name=="news")
{
    echo '<h1 id="in-title">News</h1>';
    echo '<ul class="news-list" data-role="listview" data-insert="true" data-filter="true">';
        if($query_news->have_posts())
        {
            while ($query_news->have_posts()) : $query_news->the_post();
                echo '
                <div class="single_news_post">
                    <div class="info arrow">
                        <a href="#postPage" title="'.$post->post_title.'" id="'.$post->ID.'" data-transition="fade"><h3>'.$post->post_title.'</h3> </a>
                        <small>'.get_the_time("l, F jS, Y").'</small>
                        <p>'.get_the_excerpt().'</p>
                    </div>
                </div><!--end single post-->';
            endwhile;
        }
    echo '</ul>';
}
?>
    </div>
    </div><!--end inside_content-->
</div><!--end content-->
<!--*****************************END NEWS PAGE CONTENT_*****************************************--> 