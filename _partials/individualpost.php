<script id="header-template" type="text/x-handlebars-template">
	<div class="sectionHeader">{{sectionHeader}}</div>
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
<br />
<br />
   <div id="disqus_thread" class = 'comments'></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'davidstile'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

<a style = 'float: left; padding: 20px;' href='http://davidstile.me/index.php?get_post=recent'><button>&lt &ltBack</button></a>
