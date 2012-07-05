function dynamicPage(){       
        //Dynamically loads the content for the service pages, Logos, Stationery, Print Media, Advertising, Publications, Signage, Direct Mail, Merchandising & Websites
        $("#bbgo ul a").live("click", function(evt){
            var whatpageto = $(this).attr('id');
            var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-services.php?id='+whatpageto;
            $('#servicePage').attr('title', 'dsPage-'+whatpageto); // the title would look like title="dpage-linksid"
            $('servicePage').html('');
            $.get(whatpage2, function(data) { // load content from external file
              $('#servicePage').html(data); // insert data to the jqMobile page (which is a div).
              $('#servicePage').trigger('pagecreate');// Re-render the page otherwise the dynamic content is not styled.
            });
        });
            

        
        //Dynamically loads the content for the News Page 
        $("#insidecasco a").live("click", function(evt){
            var whatpageto = $(this).attr('id');
            $('#newsPage').attr('title', 'dnPage-'+whatpageto); // the title would look like title="dpage-linksid"
        });
        
   	    $('#newsPage').live('pageinit', function() {
            $('#newsPage').html(''); // animate while we're loading data
            var whatpage = $(this).attr('title'); // get the page's title we changed earlier
            var divid = $(this).attr('id'); // get the page's title we changed earlier
            var whatpage1 = whatpage.replace("dnPage-", ''); // remove the 'dpage-' part from the title, and we have our id.
            var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-news.php?id='+whatpage1; // where is the content coming from? url or path to file
            $.get(whatpage2, function(data) { // load content from external file
              $('#newsPage').html(data); // insert data to the jqMobile page (which is a div).
              $('#newsPage').trigger('pagecreate'); // Re-render the page otherwise the dynamic content is not styled.
            });
         });
         
         //Dynamically loads the content for the Action Page 
        $("#action").live("click", function(evt){
            var whatpageto = $(this).attr('id');
            $('#actionPage').attr('title', 'daPage-'+whatpageto); // the title would look like title="dpage-linksid"
        });
        
      
   	    $('#actionPage').live('pageinit', function() {
            $('#actionPage').html(''); // animate while we're loading data
            var whatpage = $(this).attr('title'); // get the page's title we changed earlier
            var divid = $(this).attr('id'); // get the page's title we changed earlier
            var whatpage1 = whatpage.replace("daPage-", ''); // remove the 'dpage-' part from the title, and we have our id.
            var whatpage2 = '<?php echo get_template_directory_uri(); ?>/pageload-action.php?id='+whatpage1; // where is the content coming from? url or path to file
            $.get(whatpage2, function(data) { // load content from external file
              $('#actionPage').html(data); // insert data to the jqMobile page (which is a div).
              $('#actionPage').trigger('pagecreate'); // Re-render the page otherwise the dynamic content is not styled.
            });
         });
}