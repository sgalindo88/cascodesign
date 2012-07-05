 <?php
        echo ' 
            <div id="logo-social">
                <a href="#home" data-transition="fade"><img src="'. get_template_directory_uri() .'/images/internal-logo.png" alt="logo"/></a>';
        echo'
            <!--<div id="social_internal">
            	<h2>Spread The Word</h2>
                <!-- AddThis Button BEGIN -->
                <!--<div class="addthis_toolbox addthis_default_style ">
                <a class="icons addthis_button_facebook"></a>
                <a class="icons addthis_button_twitter"></a>
                <a class="icons addthis_button_linkedin"></a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f8ede903a440f5a"></script>-->
                <!-- AddThis Button END -->
            </div><!--end social_internal-->
            </div><!--end logo-social-->
            <div class="page_header" data-role="header">
                <p><a class="header-nav" id="branding-btn" href="#branding" data-transition="fade">Branding</a><a class="header-nav" id="in-btn" href="#in" data-transition="fade">in</a><a class="header-nav" href="#actionPage" data-transition="fade" id="action">Action</a></p>
            </div>
            <div class="content" data-role="content">';
            echo '<div class="main_nav">';
            foreach ($childpage as $children) {
                $child_name = $children->post_name;
                $child_title = $children->post_title;
                $child_content = $children->post_content;
                echo '<ul><li><a class="'.$child_title.'" href="#brandingPage" id="'.$child_name.'" data-transition="fade">'.$child_title.'</a></li></ul>';
            }
            echo '</div><!--end main_nav--><div id="inside_content">'; 