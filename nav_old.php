<!DOCTYPE html>

<?php
require_once 'classes/contentgenerator.php';

if (($_GET['category'] == "")) {
    $hideproject = TRUE;
} else {
    $hideproject = FALSE;
}
?>


<html lang="en">
<head>
    <title>David Stile</title>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
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
            <div id="project-content" class="hidden offset1 span10 transbackground content rounded"></div>
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
    <script>
    
    (function($){
        var projinfoArrayjs = new Array();

        <?php
        $timeclassoption = $_GET['timeclassoption'];
        $category = $_GET['category'];
        $seesawoption = $_GET['seesawoption'];
        $js_convert = json_encode($hideproject);
        echo "hideproject =" . $js_convert . ";\n";
        $js_convert = json_encode($timeclassoption);
        echo "timeclass =" . $js_convert . ";\n";
        $js_convert = json_encode($category);
        echo "category = " . $js_convert . ";\n";
        $js_convert = json_encode($seesawoption);
        echo "seesawoption= " . $js_convert . ";\n";
        $congen = new Congen();
        $congen->proj_content($timeclassoption, $category, $seesawoption);
        ?>
   //Loads Template for Work Selection
   var template=[seesawoption,category,timeclass],
   timeframe = $('#timeframe'),
   lifetemp = $('#topicholder'),
   wrapper = $('#wrapper'),
   canvas = $('<canvas>');
   


   timeframe.attr("src","/img/timeframe_"+timeclass+"2.png"); 
   wrapper.empty();
   canvas.attr('data-processing-sources','seesaw_'+seesawoption+'.pde');
   wrapper.append(canvas);
   if(seesawoption=="work" && lifetemp.not(":hidden")){
    lifetemp.hide();
    }
    //Loads the Template for Life category Selection
    if(seesawoption == "life" && lifetemp.is(":hidden")){
        lifetemp.show();
    } 
    generatecontent(template, projinfoArrayjs);

    $(".content").mCustomScrollbar({
        scrollButtons:{
            enable:true
        }
    });


//This function scales the map coordinates (hot spots) with the image div
$(window).bind("load resize", function(){

   var defcoords = ["7,7,98,44", "109,7,259,44", "265,7,392,44"], 
   new_x1, new_x2, new_y1, new_y2;
   var theImage = new Image();
   var screenImage = $("#timeframe");
   theImage.src = screenImage.attr("src");
   var original_image_width=theImage.width,
   original_image_height=theImage.height,
   new_image_width = screenImage.width(),
   new_image_height = screenImage.height(),
   hotspots = $('#timeframemap area').length,
   newcoords; 
  


   for(var i=0;i<hotspots;i++) {

    coords=defcoords[i].split(",");
    new_x1 = (new_image_width/original_image_width)*coords[0];
    new_y1 = (new_image_height/original_image_height)*coords[1];
    new_x2 = (new_image_width/original_image_width)*coords[2];
    new_y2 = (new_image_height/original_image_height)*coords[3];
    newcoords = new_x1+","+new_y1+","+new_x2+","+new_y2;
  

    $('#timeframemap area')[i].coords=newcoords;
}

});

function getmenuoptions(category, timeclass, seesawoption)
{
    document.menuform.category.value = category;
    document.menuform.timeclassoption.value = timeclass;
    document.menuform.seesawoption.value = seesawoption;
    document.menuform.submit();
}
})(jQuery);
</script>
</body>
</html>
