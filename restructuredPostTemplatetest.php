<!DOCTYPE html>

<?php
require_once '/classes/contentgenerator.php';
?>
<html lang="en">	
<head>
	 <title>David Stile</title>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Scada' rel='stylesheet' type='text/css'>
</head>
<body>
    <img src="img/background1.png" class="bg"/> 
    <div class="container-fluid">
        <form name="menuform" method="get" action="nav.php"> 
            <input type="hidden" name="timeclassoption"/>
            <input type="hidden" name="seesawoption"/>
            <input type="hidden" name="category"/>
        </form>

        <div class="row-fluid">   
            <div class="offset4 span4">

                <a href="index.php" >
                    <img id="Logo" class="maxdim" src="/img/Logo.png" style="width: 100%;" alt="Name Logo" />
                </a>

            </div>     
            <div class="span3"> 

                <div class="row-fluid">
                    <img id="timeframe" class="maxdim" src="/img/timeframe.png" style="width: 100%;" usemap="#timeframemap" alt="Past/Present/Future Selections" />
                    <map id="timeframemap" name="timeframemap">
                        <area shape="RECT" coords="7,7,98,44" href="javascript:getmenuoptions(category, 'past', seesawoption)" title="Past Button" alt="timeframe option"/>
                        <area shape="RECT" coords="109,7,259,44" href="javascript:getmenuoptions(category, 'present', seesawoption)" title="Present Button" alt="timeframe option"/>
                        <area shape="RECT" coords="265,7,392,44" href="javascript:getmenuoptions(category, 'future', seesawoption)" title="Future Button" alt="timeframe option"/>
                    </map> 
                </div>

                <div class="row-fluid" id="wrapper"> 
                </div>
            </div> 

        </div>

        <div class="row-fluid">
            <div id="topic-logos" class="span12">
                <div id="topicholder" class="center">
                    <ul id="hoverlist">
                        <li id="technology"></li>
                        <li id="music"></li>
                        <li id="activities"></li>
                        <li id="inspiration"></li>
                    </ul>
                    <img id="topicsimg" src="/img/topiclogos-design.png" usemap="#topicsmap">
                </div>
                <map name="topicsmap" id="topicsmap">
                    <area id="area_technology" shape="RECT" coords="8,17,79,87" href='javascript:getmenuoptions("technology", timeclass, seesawoption)' title="Technology &amp; Design Work" style="display: none;">
                    <area id="area_music" shape="RECT" coords="111,17,182,87" href='javascript:getmenuoptions("music", timeclass, seesawoption)' title="Musical Creations" style="display: none;">
                    <area id="area_activities" shape="RECT" coords="215,17,284,87" href='javascript:getmenuoptions("activities", timeclass, seesawoption)' title="My Activities" style="display: none;">
                    <area id="area_inspiration" shape="RECT" coords="320,17,392,87" href='javascript:getmenuoptions('inspiration', timeclass, seesawoption)' title="My Inspirations" style="display: none;">
                </map>
            </div> 
        </div>


        <div class="row-fluid">
            <div id="project-content" class="hidden offset1 span10 transbackground content rounded">	
		
		<!--Template used when Life is selected-->
		<script id="header-template" type="text/x-handlebars-template">
		<div class="sectionHeader"><h3>{{sectionHeader}}</h3></div>
		</script>
		<script id="lifepost-template" type="text/x-handlebars-template">
		{{#each this}}
		<container class= "newRow">
		<posthead>{{posthead}}</posthead>
		<datesequence>{{{datesequence}}}</datesequence>
		{{#if picture}}<picture>{{{picture}}}</picture>{{/if}}
		<description>{{{description}}}</description>
		{{#if media}}<media>{{{media}}}</media>{{/if}}
		</container>	
		{{/each}}
		</script>

		<!--Template used when Work is selected-->
		
		<script id="workpost-template" type="text/x-handlebars-template">
		<container class="titleRow">
		<worklogo class="colw0">Logo</worklogo>
		<companyname class="colw1">Company</companyname>
		<position class="colw2">Position</position>
		<role class="colw3">Role</role>
		<timeframe class="colw4">Timeframe</timeframe>
		</container>
		
		{{#each this}}
		<container class="newRow">
		<worklogo class="colw0"><img src={{compImg}} height="80px" width="80px"></worklogo>
		<companyname class="colw1">{{compName}}</companyname>
		<position class="colw2">{{compPosition}}</position>
		<role class="colw3">{{{compRole}}}</role>
		<timeframe class="colw4">{{compTimeframe}}</timeframe>
		</container>
		{{/each}}
		</script>
</div>	
</div> 
</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="js/jquery/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script>!window.jQuery.ui && document.write(unescape('%3Cscript src="js/jquery/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>
    <!--mousewheel plugin -->
    <script src="js/jquery.mousewheel.min.js"></script>
    <!-- custom scrollbars plugin -->
    <script src="js/jquery.mCustomScrollbar.js"></script>
    <script src="js/DOMAssistantCompressed-2.8.1.js"></script>
    <script src="js/hoverlinks.js"></script>
    <script src="js/contenttemplates.js"></script>
    <script src="processing-1.4.1.js"></script> 
    <script src="js/handlebars-1.0.rc.1.js"></script> 
    <script src="js/postTemplates.js"></script>
	<script>
	(function($) {
	var projinfoArrayjs = new Array();

	<?php
	$timeclassoption = $_GET['timeclassoption'];
    $category = $_GET['category'];
    $seesawoption = $_GET['seesawoption'];
	$js_convert = json_encode($hideproject);
	echo "var hideproject =" . $js_convert . ";\n";
	$js_convert = json_encode($timeclassoption);
	echo "var timeclass =" . $js_convert . ";\n";
	$js_convert = json_encode($category);
	echo "var category = " . $js_convert . ";\n";
	$js_convert = json_encode($seesawoption);
	echo "var seesawoption= " . $js_convert . ";\n";
	$congen = new Congen();
	$congen->proj_content($timeclassoption, $category, $seesawoption);
	?>

	var template=[seesawoption,category,timeclass];
	timeframe = $('#timeframe'),
   	lifetemp = $('#topicholder'),
   	wrapper = $('#wrapper'),
   	canvas = $('<canvas>');

   	lifetemp.hide();
   	timeframe.attr("src","/img/timeframe_"+timeclass+"2.png"); 
   	wrapper.empty();
   	canvas.attr('data-processing-sources','seesaw_'+seesawoption+'.pde');
   	wrapper.append(canvas);
	
	//template[0] is POST value for work/life

	if(template[0] == 'life') {
		lifetemp.show();
		var header= [
		{
			category: 'technology',
			logo: '/img/Logo.png',
			button: '/img/topiclogos-design.png', 
			headerText: 'The things I Create, Design and Engineer.'
		},
		{
			category: 'music',
			logo: '/img/Logoguitar',
			button: '/img/topiclogos-music.png',
			headerText: 'Music contained in this section is all original composition using computer, guitar and keyboard.  Enjoy!'
		},
		{
			category: 'activities',
			logo: '/img/Logo.png',
			button:  '/img/topiclogos-activities.png', 
			headerText: 'The organizations and activities where I am involved.'
		},
		{
			category: 'inspiration',
			logo: '/img/Logo.png',
			button: '/img/topiclogos-inspiration.png',
			headerText: 'All the people/projects/things that are interesting, creative, inspiring.'
		}];
		//This portion of code tweaks different areas of the website according to the category selected 
		var logoImg = $('#Logo'),
		topicsimg = $('#topicsimg'),
		catSelection;
		header.forEach(function(obj){
			//temp[1] is POST value for category This function updates areas of website based on category selection
			if(obj.category==template[1]){
				logoImg.attr('src', obj.logo);
				topicsimg.attr('src', obj.button);
				catSelection=obj;
			}
		});

		//pulls in the Life class, pulls data, populates the Handlesbars template and attaches it
		Lifeposts.init({
			headerTemplate: $('#header-template').html(),
			postTemplate: $('#lifepost-template').html(),
			container: $('div #project-content'),
			//data was pulled in from php and mysql
			data: projinfoArrayjs,
			header: catSelection
		});
	}
	if(template[0] =='work') {
	var header = 'Things I do to make a living';

	if(lifetemp.not(":hidden")){
		lifetemp.hide();
		}

	Workposts.init({
		headerTemplate: $('#header-template').html(),
		postTemplate: $('#workpost-template').html(),
		container: $('div #project-content'),
		//data was pulled in from php and mysql
		data: projinfoArrayjs,
		header: header
	});
	}

//This is a plugin that pulls in the window with the scroll bar for content
	$(".content").mCustomScrollbar({
        scrollButtons:{
            enable:true
        }
    });
})(jQuery);

</script>
</body>
<footer>
</footer>
</html>


		