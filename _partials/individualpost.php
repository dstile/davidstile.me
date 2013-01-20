<script id="header-template" type="text/x-handlebars-template">
	<div class="sectionHeader"><h3>{{sectionHeader}}</h3></div>
</script>
<div id='content-stream' class = 'center'>
<script id="individualpost-template" type="text/x-handlebars-template">
		{{#each this}}
        <container>
		<posthead>{{posthead}}</posthead>
		<datesequence>{{{datesequence}}}</datesequence>
		{{#if picture}}<picture>{{{picture}}}</picture>{{/if}}
		<article>{{{article}}}</article>
		{{#if media}}<media>{{{media}}}</media>{{/if}}
		</container>
        <div id={{id}} class='comments'></div>  	
		{{/each}}
        
         



</script>


<script src="js/postTemplates.js"></script>
 <script src="js/handlebars-1.0.rc.1.js"></script> 
<script>
  //Logic for generating most recent posts

            var projinfoArrayjs = new Array();

           //First check sees whether slider loads most recent or a single blog

//If no parameters have been posted then load individual blog entry
    <?php
    $congen = new Congen();
    $congen->individual_content($post);
  ?>

            var header= [
            {
                headerText: 'THE STILE LOG'
            }];

            Individualpost.init({
                headerTemplate: $('#header-template').html(),
                postTemplate: $('#individualpost-template').html(),
                 container: $('div#content-stream'),
                //data was pulled in from php and mysql
                data: projinfoArrayjs,
                header: header[0]
            });
</script>
</div>


 

<a style = 'float: left; padding: 20px;' href='http://davidstile.me/index.php?get_post=recent'><button>&lt &ltBack</button></a>
