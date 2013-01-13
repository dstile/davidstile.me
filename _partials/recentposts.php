<script id="header-template" type="text/x-handlebars-template">
			<div class="sectionHeader"><h3>{{sectionHeader}}</h3></div>
			</script>
<div id='content-stream' class = 'center'>
<script id="recentpost-template" type="text/x-handlebars-template">
	{{#each this}}
		<container class= "newRow">
		<posthead>{{posthead}}</posthead>
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
                headerText: 'Most recent Posts.'
            }];

            Recentposts.init({
                headerTemplate: $('#header-template').html(),
                postTemplate: $('#recentpost-template').html(),
                container: $('div#content-stream'),
                //data was pulled in from php and mysql
                data: projinfoArrayjs,
                header: header[0]
            });

            console.log(projinfoArrayjs);
            </script>




</div>