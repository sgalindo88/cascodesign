<script type="text/javascript">$(".main_nav a").live("click",function(evt){var whatpageto=$(this).attr('id');var pagename=$(this).text();var whatpage2='<?php echo get_template_directory_uri(); ?>/pageload-branding.php?pagename='+whatpageto+'&pagetitle='+pagename;$('#brandingPage').attr('title','dsPage-'+whatpageto);$('#brandingPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');$.get(whatpage2,function(data){$('#brandingPage').html(data);$('#brandingPage').trigger('pagecreate');});});$("#news").live("click",function(evt){var whatpageto=$(this).attr('id');$('#newsPage').attr('title','dnPage-'+whatpageto);});$('#newsPage').live('pageinit',function(){$('#newsPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');var whatpage=$(this).attr('title');var divid=$(this).attr('id');var whatpage1=whatpage.replace("dnPage-",'');var whatpage2='<?php echo get_template_directory_uri(); ?>/pageload-news.php?pagename='+whatpage1;$.get(whatpage2,function(data){$('#newsPage').html(data);$('#newsPage').trigger('pagecreate');});});$("#action").live("click",function(evt){var whatpageto=$(this).attr('id');$('#actionPage').attr('title','daPage-'+whatpageto);});$('#actionPage').live('pageinit',function(){$('#actionPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');var whatpage=$(this).attr('title');var divid=$(this).attr('id');var whatpage1=whatpage.replace("daPage-",'');var whatpage2='<?php echo get_template_directory_uri(); ?>/pageload-action.php?pagename='+whatpage1;$.get(whatpage2,function(data){$('#actionPage').html(data);$('#actionPage').trigger('pagecreate');});});$("#insidecasco a").live("click",function(evt){var whatpageto=$(this).attr('id');var pagename=$(this).text();var whatpage2='<?php echo get_template_directory_uri(); ?>/pageload-in.php?pagename='+whatpageto+'&pagetitle='+pagename;$('#inPage').attr('title','dsPage-'+whatpageto);$('#inPage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');$.get(whatpage2,function(data){$('#inPage').html(data);$('#inPage').trigger('pagecreate');});});</script>
<!--*****************************START SECTION HOME***************************************-->
<section id="home" data-role="page">
    <div class="content-home" data-role="content">
        <div id="home_puzzle">
            <div id="bg_click">
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
                <div class="links"><a class="menu" href=""></a></div>
            </div>
            <div id="border">
                <div class="puzzle"><img height="231" width="231" src="<?php echo get_template_directory_uri(); ?>/images/puzzle.jpg" alt="puzzle" style="display: block;" /></div>
            </div>
            <div id="copy-home">
                <p>&copy; 2012 Casco Design Communications Inc.</p>
            </div>
            <ul>
                <li><a id="branding-btn" href="#branding" data-role="button" data-transition="fade">Branding</a></li>
                <li><a id="in-btn" href="#in" data-role="button" data-transition="fade">in</a></li>
                <li><a href="#actionPage" data-role="button" data-transition="fade" id="action">Action</a></li> 
            </ul>
            <div id="cap-home">
                <img src="<?php echo get_template_directory_uri(); ?>/images/tee.png" alt="cap" />
            </div>
            <div id="logo-home">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home-logo.png" alt="cap" />
            </div>
            <div id="social_home">
            	<h2>Spread The Word</h2>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_linkedin"></a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f8ede903a440f5a"></script>
                <!-- AddThis Button END -->
            </div><!--end social_home-->
        </div>

    </div><!--end content home-->
</section>
<!--****************************END SECTION HOME******************************************-->
<!--*****************************START MAIN PAGES & SECOND LEVEL SECTIONS********************************-->
<?php
//Gets the link to home
$home = get_bloginfo('home');
//Gets a list of all the pages and returns an array
$pages = get_pages();
//loops through the array
foreach ($pages as $page) {
    //gets the data for each page
    $page_id = $page->ID;
    $page_data = get_page($page_id);
    $page_name = $page_data->post_name;
    $page_title = $page_data->post_title;
    $page_content = $page_data->post_content;
    $page_link = get_page_link($page_id);
    //get the child pages of the main pages but exclude the children of the child pages
    $childpage = get_pages(array(
        'child_of' => $page_id,
        'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
        'sort_column' => 'ID'));
    //get the categories for the project pages
    $query = new WP_Query(array('category_name' => $page_name, 'order' => 'DESC'));
    //get the action posts
    $query_action = new WP_Query(array('meta_key' => 'feature-action', 'meta_value' => 'yes'));

    //checks if the page is "branding", "in" or "action" and creates their HTML5 sections with their respective content
    if ($page_name == "branding") {
        echo '<!--*****************************START SECTION PAGE_' . $page_name .
                    '***************************************-->   
            <section id="' . $page_name . '" data-role="page" class="internal_page">';
            include ('sidebar.php');
            //prints out the content of the page using Wordpress filters
            echo apply_filters('the_content', $page_content);
            echo '</div><!--end inside_content">-->';
        echo '</div><!--end content--></section>';
    } elseif ($page_name == "in") {
        echo ' 
            <!--*****************************START SECTION PAGE_' . $page_name .
                    '***************************************-->   
            <section id="' . $page_name . '" data-role="page"  class="internal_page">';
            include ('sidebar-in.php');
            //prints out the content of the page using Wordpress filters
            echo apply_filters('the_content', $page_content);
            echo '</div><!--end inside_content">-->';
        echo '</div><!--end content--></section>';
    }
    
}
?>  
<!--*****************************END MAIN PAGES SECTIONS**************************************-->
<!--*****************************START SERVICES PAGES SECTIONS********************************--> 
<section id="brandingPage" data-role="page" class="internal_page">
</section>        
<!--*****************************END SERVICES PAGES SECTIONS**********************************-->
<!--*****************************START SERVICES PAGES SECTIONS********************************--> 
<section id="servicePage" data-role="page" class="internal_page">
</section>        
<!--*****************************END SERVICES PAGES SECTIONS**********************************-->
<!--*****************************START SERVICES PAGES SECTIONS********************************--> 
<section id="actionPage" data-role="page" class="internal_page">
</section>        
<!--*****************************END SERVICES PAGES SECTIONS**********************************-->
<!--*****************************START SERVICES PAGES SECTIONS********************************--> 
<section id="newsPage" data-role="page" class="internal_page">
</section>        
<!--*****************************END SERVICES PAGES SECTIONS**********************************-->
<!--*****************************START POSTS PAGES SECTIONS***********************************--> 
<section id="postPage" data-role="page" class="internal_page"> 
</section>
<!--*****************************END POSTS PAGES SECTIONS*************************************--> 
<!--*****************************START INSIDE CASCO PAGES SECTIONS****************************--> 
<section id="inPage" data-role="page" class="internal_page"> 
</section>
<!--*****************************END INSIDE CASCO PAGES SECTIONS******************************--> 
<!--*****************************START INSIDE CASCO PAGES SECTIONS****************************--> 
<section id="clientsPage" data-role="page" class="internal_page"> 
</section>
<!--*****************************END INSIDE CASCO PAGES SECTIONS******************************--> 