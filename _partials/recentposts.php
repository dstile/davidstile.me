
 <form name = 'getpost' method="get" action = 'index.php'>
           <input type='hidden' name='get_post'> 
</form>
<script id="header-template" type="text/x-handlebars-template">
<div class="sectionHeader"><h3>{{sectionHeader}}</h3></div>
</script>
<div id='content-stream' class = 'center'>
<script id="recentpost-template" type="text/x-handlebars-template">
	{{#each this}}
		<container class= "newRow">
         <a href={{{headerlink}}}><posthead>{{{posthead}}}</posthead></a>
		<datesequence>{{{datesequence}}}</datesequence>
		{{#if picture}}<picture>{{{picture}}}</picture>{{/if}}
		<article>{{{article}}}</article>
		{{#if media}}<media>{{{media}}}</media>{{/if}}
		</container>	
		{{/each}}

</script>
<script src="js/postTemplates.js"></script>
 <script src="js/handlebars-1.0.rc.1.js"></script> 
<script>
  //Logic for generating most recent posts

            var projinfoArrayjs = new Array();
           
            <?php
            $congen = new Congen();
            $congen->recent_content();
            ?>
         
         
            var header= [
            {
                headerText: 'Most Recent Posts.'
            }];

            Recentposts.init({
                headerTemplate: $('#header-template').html(),
                postTemplate: $('#recentpost-template').html(),
                container: $('div#content-stream'),
                //data was pulled in from php and mysql
                data: projinfoArrayjs,
                header: header[0]
            });

            //submits link to get blog page
            function getpost(post_title)
            {
            document.getpost.get_post.value = post_title ;
            document.getpost.submit();
        };
        </script>
</div>