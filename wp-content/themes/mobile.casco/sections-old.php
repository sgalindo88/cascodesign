<div id="section_wraper">
    <!--*****************************START SECTION '01'***************************************-->
    <section id="home" data-role="page">
        <div class="page_header" data-role="header"><h1>Home Page</h1></div>
        <div id="home_puzzle">
            <div class="puzzle"><img height="249" width="249" src="<?php echo get_template_directory_uri(); ?>/images/puzzle.jpg" alt="puzzle" style="display: block;" /></div>
        </div>
        <ul>
            <li><a href="#branding" data-role="button" data-transition="fade">Branding</a></li>
            <li><a href="#in" data-role="button" data-transition="fade">In</a></li>
            <li><a href="#action" data-role="button" data-transition="fade">Action</a></li> 
        </ul>
    </section>
    <!--*****************************END SECTIOM '01'*****************************************--> 
    <!--*****************************START MAIN PAGES SECTIONS********************************-->
            <?php             
                //Gets a list of all the pages and returns an array
                $pages = get_pages();
                    
                //loops through the array 
                foreach ($pages as $page)
                {
                    //gets the data for each page 
                    $page_id = $page->ID;
                    $page_data = get_page($page_id);
                    $page_name = $page_data->post_name;
                    $page_title = $page_data->post_title;
                    $page_content = $page_data->post_content;
                    $page_link = get_page_link($page_id);
                    
                    //get the child pages of the main pages but exclude the children of the child pages
                    $childpage = get_pages(array('child_of' => $page_id, 'exclude' => '56, 59, 61, 63, 65, 67, 69, 71, 73', 'sort_column' => 'ID' ));
                    
                    //gets the children of the child pages
                    $subchild_bi = get_pages(array('child_of' => $page_id, 'include' => '56, 59', 'sort_column' => 'ID' ));
                    
                    //gets the children of the child pages
                    $subchild_gd = get_pages(array('child_of' => $page_id, 'include' => '61, 63, 65, 67, 69, 71', 'sort_column' => 'ID' ));
                    
                    //gets the children of the child pages
                    $subchild_om = get_pages(array('child_of' => $page_id, 'include' => '73', 'sort_column' => 'ID' ));

               
                    //checks if the page is "branding", "in" or "action" and creates their HTML5 sections with their respective content
                    if($page_name=="branding" || $page_name=="action" )
                    {
                        echo ' 
                        <!--*****************************START SECTION PAGE_'.$page_name.'***************************************-->   
                        <section id="'.$page_name.'" data-role="page">
                            <div class="page_header" data-role="header"><h1>'.$page_title.'</h1></div>
                            <div class="content">';
                            //prints out the content of the page using Wordpress filters
                            echo apply_filters('the_content', $page_content); 
                            
                            echo '<div data-role="collapsible-set">';
                            foreach($childpage as $children)
                            {
                                $child_name = $children->post_name;
                                $child_title = $children->post_title;
                                $child_content = $children->post_content;
                                
                                                              
                                echo '<div data-role="collapsible">';
                                if ($child_name=="brandconsulting")
                                {
                                   echo '<h3>'.$child_title.'</h3>';
                                   echo '<p>'.apply_filters('the_content', $child_content).'</p>';
                                   echo '<p><ul><li><a href="#'.$child_name.'" data-transition="fade">'.$child_title.'</a></li></ul></p>';
                                }
                                else
                                {
                                    echo '<h3>'.$child_title.'</h3>';
                                    if ($child_name=="brandidentity")
                                    {
                                        echo '<p>'.apply_filters('the_content', $child_content).'</p>';
                                        foreach($subchild_bi as $child)
                                        {
                                            $subchild_name = $child->post_name;
                                            $subchild_title = $child->post_title;
                                            
                                            echo '<p><ul><li><a href="#'.$subchild_name.'" data-transition="fade">'.$subchild_title.'</a></li></ul></p>';
                                        }
                                    } 
                                    elseif ($child_name=="graphicdesign")
                                    {
                                        echo '<p>'.apply_filters('the_content', $child_content).'</p>';
                                        foreach($subchild_gd as $child)
                                        {
                                            $subchild_name = $child->post_name;
                                            $subchild_title = $child->post_title;
                                            
                                            echo '<p><ul><li><a href="#'.$subchild_name.'" data-transition="fade">'.$subchild_title.'</a></li></ul></p>';
                                        }                                    
                                    }
                                    elseif ($child_name=="onlinemedia")
                                    {
                                        echo '<p>'.apply_filters('the_content', $child_content).'</p>';
                                        foreach($subchild_om as $child)
                                        {
                                            $subchild_name = $child->post_name;
                                            $subchild_title = $child->post_title;
                                            
                                            echo '<p><ul><li><a href="#'.$subchild_name.'" data-transition="fade">'.$subchild_title.'</a></li></ul></p>';
                                        }
                                    }
                                } 
                                echo '</div><!--end collapsible-->'; 
                            }
                            echo '</div><!--end collapsible-set--></div><!--end content-->';
                        echo'</section>';                            
                    }
                    
                    if($page_name=="brandconsulting")
                    {
                       
                    }
                    
                    if ($page_name=="in")
                    {
                        echo ' 
                        <!--*****************************START SECTION PAGE_'.$page_name.'***************************************-->   
                        <section id="'.$page_name.'" data-role="page">
                            <div class="page_header" data-role="header"><h1>'.$page_title.'</h1></div>
                            <div class="content">';
                            //prints out the content of the page using Wordpress filters
                            echo apply_filters('the_content', $page_content); 
                            foreach($childpage as $children)
                            {
                                $child_name = $children->post_name;
                                $child_title = $children->post_title;
                                $child_content = $children->post_content;
                                                                
                                echo '<p><ul><li><a href="#'.$child_name.'" data-transition="fade">'.$child_title.'</a></li></ul></p>';
                            }
                        echo'</div><!--end content--></section>'; 
                    }
                                    
                }
                
            ?>  
    <!--*****************************END MAIN PAGES SECTIONS**********************************-->    
    <!--*****************************START IN PAGES SECTIONS****************************-->
            <?php
                //Gets a list of all the pages and returns an array
                $pages = get_pages();
    
                //loops through the array 
                foreach ($pages as $page)
                {
                    //gets the data for each page 
                    $page_id = $page->ID;
                    $page_data = get_page($page_id);
                    $page_name = $page_data->post_name;
                    $page_title = $page_data->post_title;
                    $page_content = $page_data->post_content;
                    $page_link = get_page_link($page_id); 
                    
                    //checks if the page is "about", "studio", "team", "news", "clients" or "contact" and creates their HTML5 sections with their respective content
                    if($page_name=="about" || $page_name=="studio" || $page_name=="team" || $page_name=="news" || $page_name=="clients" || $page_name=="contact" )
                    {
                        echo ' 
                        <!--*****************************START SECTION PAGE_'.$page_name.'***************************************-->   
                        <section id="'.$page_name.'" data-role="page">
                            <div class="page_header" data-role="header"><h1>'.$page_title.'</h1></div>
                            
                            <div class="content">';
                                                                                    
                            //prints out the content of the page using Wordpress filters
                            echo apply_filters('the_content', $page_content); 
                            echo'</div>
                            <a href="" data-rel="back" data-role="button">Back</a>
                        </section>';                        
                    }                  
                }
                
            ?>  
    <!--*****************************END IN PAGES SECTIONS******************************-->      
    <!--*****************************START CHILD PAGES SECTIONS****************************-->
            <?php
                //Gets a list of all the pages and returns an array
                $pages = get_pages();
    
                //loops through the array 
                foreach ($pages as $page)
                {
                    //gets the data for each page 
                    $page_id = $page->ID;
                    $page_data = get_page($page_id);
                    $page_name = $page_data->post_name;
                    $page_title = $page_data->post_title;
                    $page_content = $page_data->post_content;
                    $page_link = get_page_link($page_id); 
                    $page_parent = get_the_title($page_data->post_parent);
                    
                    $query = new WP_Query(array('category_name'=>$page_name, 'post_per_page' => 5, 'order' => 'DESC'));
                    
                    //checks if the page is "logo", "stationery", "printmedia", "advertising", "publications", "signage", "directmail", "merchandising" or "websites" and creates their HTML5 sections with their respective content
                    if($page_name=="logo" || $page_name=="stationery" || $page_name=="printmedia" || $page_name=="advertising" || $page_name=="publications" || $page_name=="signage" || 
                       $page_name=="directmail" || $page_name=="merchandising" || $page_name=="websites" )
                    {
                        echo ' 
                        <!--*****************************START SECTION PAGE_'.$page_name.'***************************************-->   
                        <section id="'.$page_name.'" data-role="page">
                            <div class="page_header" data-role="header"><h1>'.$page_title.'</h1></div>
                            <div class="content">';
                                                   
                            //echo "PARENT: ".$page_parent."<br/>";
                                                   
                        while ($query->have_posts()) : $query->the_post();
                            echo '<div id="single_post">';
                                echo '<h3>'.the_title().'</h3>';
                                $case = get_post_meta($post->ID, 'client', $single = true);
                                $case2 =  get_post_meta($post->ID, 'year', $single = true);
                                $case3 = get_post_meta($post->ID, 'feature-image', $single = true);
                                echo '<p>Client Name: '.$case.'</p>';
                                echo '<small>Year: '.$case2.'</small><br/>';
                                //echo '<div id="gallery" style="width:310px; overflow-x:scroll;"><img alt="'.$case.'" src="'.get_bloginfo("home").'/wp-content/uploads/'.$case3.'"/></div>';
                                //echo '<div id="gallery">'.do_shortcode('[gallery]').'</div>';
                                //echo do_shortcode('[gallery itemtag="div" icontag="tr" captiontag="td" link=""]');
                                $args = array ('post_type' => 'attachment', 'numberpost' => -1, 'post_status' => null, 'post_parent' => $post->ID, 'post_mime_type' => 'image', 'order'=>'ASC');
                                
                                $attachments = get_posts($args);
                                echo '<div id="gallery" style="width:310px; overflow-x:scroll;">
                                <table width="600" border="0" cellspacing="0" cellpadding="0">
                                <tr>';
                                foreach ($attachments as $pics)
                                {
                                    echo '<td>'.wp_get_attachment_image($pics->ID, 'full').'</td>';
                                    //$single = wp_get_attachment_image_src($pics->ID);
                            
                                    //echo '<td><img src="'.$single[0].'"/><td>';    
                                    
                                }
                                echo '</table></div>';
                            echo '</div>';
                        endwhile;
                         
                        echo'</div>
                        </section>';
                    } 
                }
            ?>  
    <!--*****************************END CHILD PAGES SECTIONS******************************-->  
</div>