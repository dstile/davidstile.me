<?php
//determine whether or not to hide the project options
if (($_GET['category'] == "")) {
	$hideproject = TRUE;
} else {
	$hideproject = FALSE;
}

include '_partials/header.php';
require_once 'classes/contentgenerator.php';
?>
<body class='nav'>
<img src="img/background1.png" class="bg"/> 
<div class="container-fluid">
	<form name="menuform" method="get" action="nav.php"> 
		<input type="hidden" name="timeclassoption"/>
		<input type="hidden" name="seesawoption"/>
		<input type="hidden" name="category"/>
	</form>

	<div id='navigation'>

	<div class="row-fluid">   
		<div class="offset4 span4">

			<a href="index.php" >
				<img id="Logo" class="maxdim" src="/img/Logo.png" style="width: 100%;" alt="Name Logo" />
			</a>

		</div>     
		<div class="span3"> 

			<div class="row-fluid" id="wrapper"> 
			</div>
		</div> 

	</div>

	<div class="row-fluid">
		<div id="topic-logos" class="span12">
			<div class='offset4 span4' >
				<div id="topicholder" class='center'>
					<ul id="hoverlist">
						<li id="technology"></li>
						<li id="music"></li>
						<li id="activities"></li>
						<li id="inspiration"></li>
					</ul>
					<img id='topicsimg' class='center' src="/img/topiclogos-design.png" usemap="#topicsmap">

					<map name="topicsmap" id="topicsmap">
						<area id="area_technology" shape="RECT" coords="8,17,79,87" href='javascript:getmenuoptions("technology", timeclass, seesawoption)' title="Technology and Design Work" style="display: none;">
						<area id="area_music" shape="RECT" coords="111,17,182,87" href='javascript:getmenuoptions("music", timeclass, seesawoption)' title="Musical Creations" style="display: none;">
						<area id="area_activities" shape="RECT" coords="215,17,284,87" href='javascript:getmenuoptions("activities", timeclass, seesawoption)' title="My Activities" style="display: none;">
						<area id="area_inspiration" shape="RECT" coords="320,17,392,87" href='javascript:getmenuoptions("inspiration", timeclass, seesawoption)' title="My Inspirations" style="display: none;">
					</map>
				</div>
			</div>
		</div> 
	</div>
	</div>





	<div class = 'offset1 span11'>

		<div id="project-content">	
	
		
			<script id="header-template" type="text/x-handlebars-template">
			<div class="sectionHeader">{{sectionHeader}}</div>
			</script>

			<!--Template used when Life is selected-->
			<a type="application/rss+xml" href="http://feeds.feedburner.com/DavidStile"><img class='rss' src= "img/rss.png"/></a>
						<select id='timedrop'>
							  <option>Past</option>
							  <option>Present</option>
							  <option>Future</option>
							</select>
						
			<script id="lifepost-template" type="text/x-handlebars-template">

			{{#each this}}
			<container class= "newRow">
			<posthead>{{posthead}}</posthead>
			<datesequence><span style="color:black">Published: </span><i>{{{datesequence}}}</i></datesequence>
			<br />
			<br />
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
			{{#if compImg}}<worklogo class="colw0"><img src='{{compImg}}' height="80px" width="80px"></worklogo>{{/if}}
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
<?php include '_partials/footer.php' ?>
<script src="js/DOMAssistantCompressed-2.8.1.js"></script>
<script src="js/hoverlinks.js"></script>
<script src="processing-1.4.1.js"></script> 
<script src="js/handlebars-1.0.rc.1.js"></script> 
<script src="js/postTemplates.js"></script>


<!--Twitter API Library -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script>
var timeclass,
seesawoption,
category;


(function($){
	var projinfoArrayjs = new Array(),
	contentHeight = 0.5*$(window).height(),
	timedrop = $('#timedrop');
	
	$('.contentNav').css('height', contentHeight);


	<?php
	$timeclassoption = $_GET['timeclassoption'];
	$category = $_GET['category'];
	$seesawoption = $_GET['seesawoption'];
	$js_convert = json_encode($hideproject);
	echo "var hideproject =" . $js_convert . ";\n";
	$js_convert = json_encode($timeclassoption);
	echo "timeclass =" . $js_convert . ";\n";
	$js_convert = json_encode($category);
	echo "category = " . $js_convert . ";\n";
	$js_convert = json_encode($seesawoption);
	echo "seesawoption= " . $js_convert . ";\n";
	$congen = new Congen();
	$congen->proj_content($timeclassoption, $category, $seesawoption);
	?>

     $('#timedrop').val(timeclass).attr('selected','selected');

	timedrop.change(function() {
		getmenuoptions(category,  $('#timedrop option:selected').text(), seesawoption);
		
	});


	var template=[seesawoption,category,timeclass],
	timeframe = $('#timeframe'),
	lifetemp = $('#topicholder'),
	wrapper = $('#wrapper'),
	canvas = $('<canvas>');

	lifetemp.hide();
	wrapper.empty();
	canvas.attr('data-processing-sources','seesaw_'+seesawoption+'.pde');
	wrapper.append(canvas);

	//template[0] is POST value for work/life

	if(template[0] == 'life' || (template[0]=='work' && template[2]=='Future')) {
		
		if(template[0] =='life'){
			lifetemp.show();
			var header= [
			{
				category: 'technology',
				logo: '/img/Logo.png',
				button: '/img/topiclogos-design.png', 
				headerText: 'The Things I Create, Design and Engineer'
			},
			{
				category: 'music',
				logo: '/img/Logoguitar.png',
				button: '/img/topiclogos-music.png',
				headerText: 'My Music.  Enjoy!'
			},
			{
				category: 'activities',
				logo: '/img/Logo.png',
				button:  '/img/topiclogos-activities.png', 
				headerText: 'Organizations and Activities'
			},
			{
				category: 'inspiration',
				logo: '/img/Logo.png',
				button: '/img/topiclogos-inspirations.png',
				headerText: 'All things Interesting, Creative, Inspiring'
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
	} else {
		catSelection = { headerText: 'Things I do to make a living.'};
	}
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
	
	if(template[0] =='work' && template[2]!=='Future') {
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


	function getmenuoptions(category, timeclass, seesawoption) {
		document.menuform.category.value = category;
		document.menuform.timeclassoption.value = timeclass;
		document.menuform.seesawoption.value = seesawoption;
		document.menuform.submit();
	};
	
})(jQuery);
</script>
