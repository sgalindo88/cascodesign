<?php require_once('../../../wp-load.php'); ?>
<?php
    $page_name = $_GET['pagename'];
    $page_title = $_GET['pagetitle'];
    
    $page = get_page_by_title($page_title);
    setup_postdata($page);
?>
<script type = "text/javascript"> 
$("#bbgo a").live("click", function(evt) {
	var whatpageto = $(this).attr('id');
	var pagename = $(this).text();
    $('.main_nav').addClass("current");
    var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-services.php?pagename=' + whatpageto + '&pagetitle=' + pagename;
	$('#servicePage').attr('title', 'dsPage-' + whatpageto);
	$('#servicePage').html('<img src="<?php echo get_template_directory_uri(); ?>/images/internal-loading-small.gif"/>');
	$.get(whatpage2, function(data) {
		$('#servicePage').html(data);
		$('#servicePage').trigger('pagecreate');
	});
});
</script>
<!--*****************************START BRANDING PAGE CONTENT_***************************************-->   
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
            //get the child pages of the main pages but exclude the children of the child pages
        $childpage = get_pages(array(
            'child_of' => $page_id,
            'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73',
            'sort_column' => 'ID'));
        //gets the children of the child pages
        $subchild_bi = get_pages(array(
            'child_of' => $page_id,
            'include' => '56, 59',
            'sort_column' => 'ID'));
        //gets the children of the child pages
        $subchild_gd = get_pages(array(
            'child_of' => $page_id,
            'include' => '61, 63, 65, 67, 69, 71',
            'sort_column' => 'ID'));
        //gets the children of the child pages
        $subchild_om = get_pages(array(
            'child_of' => $page_id,
            'include' => '73',
            'sort_column' => 'ID'));
        if ($page_name == "brandidentity") {
            if (get_post_meta(17, 'graphic', $single = true)){
                $graphic = get_post_meta(17, 'graphic', $single = true);
                $graphic_text = get_post_meta(17, 'graphic-text', $single = true);
                echo '<div id="graphic"><img src="'.$home.'/wp-content/uploads/'.$graphic.'" alt="graphic" style="width:268px;height:146px;" /><div id="graphictext">';
                echo $graphic_text;
                echo '</div><!--end graphictext--></div><!--end graphic-->';  
            }                      
            echo '<div id="bbgo" class="'.$page_name.'">';                        
            foreach ($subchild_bi as $child) {
                $subchild_name = $child->post_name;
                $subchild_title = $child->post_title;
                echo '<ul><li><a href="#servicePage" class="sec_nav" data-transition="fade" id="'.$subchild_name.'">'.$subchild_title.'</a></li></ul>';
            }
            echo '</div>';                                    
        } elseif ($page_name == "graphicdesign") {
            if (get_post_meta(19, 'graphic', $single = true)){
                $graphic = get_post_meta(19, 'graphic', $single = true);
                $graphic_text = get_post_meta(19, 'graphic-text', $single = true);
                echo '<div id="graphic"><img src="'.$home.'/wp-content/uploads/'.$graphic.'" alt="graphic" style="width:268px;height:146px;" /><div id="graphictext">';
                echo $graphic_text;
                echo '</div><!--end graphictext--></div><!--end graphic-->';  
            } 
            echo '<div id="bbgo" class="'.$page_name.'">';
            foreach ($subchild_gd as $child) {
                $subchild_name = $child->post_name;
                $subchild_title = $child->post_title;
                echo '<ul><li><a href="#servicePage" class="sec_nav" data-transition="fade" id="'.$subchild_name .'">'.$subchild_title.'</a></li></ul>';
            }
            echo '</div>';                        
        } elseif ($page_name == "onlinemedia") {
            if (get_post_meta(21, 'graphic', $single = true)){
                $graphic = get_post_meta(21, 'graphic', $single = true);
                $graphic_text = get_post_meta(21, 'graphic-text', $single = true);
                echo '<div id="graphic"><img src="'.$home.'/wp-content/uploads/'.$graphic.'" alt="graphic" style="width:268px;height:146px;" /><div id="graphictext">';
                echo $graphic_text;
                echo '</div><!--end graphictext--></div><!--end graphic-->';  
            } 
            echo '<div id="bbgo" class="'.$page_name.'">';
            foreach ($subchild_om as $child) {
                $subchild_name = $child->post_name;
                $subchild_title = $child->post_title;
                echo '<ul><li><a href="#servicePage" class="sec_nav" data-transition="fade" id="'.$subchild_name.'">'.$subchild_title.'</a></li></ul>';
            }
            echo '</div>';                                    
        } else {
            the_content(); 
            echo '<div id="bbgo" class="'.$page_name.'"></div>'; 
        }          
          
        ?>
    </div>
    </div><!--end inside_content-->
</div><!--end content-->
<!--*****************************END BRANDING PAGE CONTENT_*****************************************--> 