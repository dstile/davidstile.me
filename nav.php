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
                        <div id="topic-logos" class="span12"></div> 
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
        
    var template=[seesawoption,category,timeclass];

    if(timeclass=="past"){
        $('#timeframe').attr("src","/img/timeframe_past2.png"); 
          
    }
    if(timeclass=="present"){
        $('#timeframe').attr("src","/img/timeframe_present2.png"); 
    }
    if(timeclass=="future"){
        $('#timeframe').attr("src","/img/timeframe_future2.png"); 
    }
        

    if(seesawoption=="work"){
       
        $('#wrapper').empty();
        var wrapper = document.getElementById('wrapper');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('data-processing-sources','seesaw_work.pde')
        wrapper.appendChild(canvas);
        
        generatecontent(template, projinfoArrayjs);
        
    }
    
    //Loads the Template for Life Selection
    if(seesawoption == "life"){
        
        
        $('#wrapper').empty();
        var wrapper = document.getElementById('wrapper');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('data-processing-sources','seesaw_life.pde')
        wrapper.appendChild(canvas);
           
 
        var topiclogos = document.getElementById('topic-logos');
        var topicimg = document.createElement('img');
        var imgdiv = document.createElement('div');
        var topicmap = document.createElement('map');
        var transmap = document.createElement('map');
        var ul = document.createElement('ul');
        var li1=document.createElement('li');
        var li2=document.createElement('li');
        var li3=document.createElement('li');
        var li4=document.createElement('li');
        var area3 = document.createElement('area');
        var area4 = document.createElement('area');
        var area5 = document.createElement('area');
        var area6 = document.createElement('area');

        imgdiv.id='topicholder';
        imgdiv.setAttribute('class','center');
        topicimg.id='topicsimg';
        
        topicmap.setAttribute('name','topicsmap');
        topicmap.id='topicsmap';
        topicimg.setAttribute('src','/img/topiclogos.png');
        topicimg.setAttribute('usemap','#topicsmap');
        transmap.setAttribute('src','/img/transp.png');
        transmap.setAttribute('id','transparent_map');
        transmap.setAttribute('usemap','#topicsmap');
                            
        area3.setAttribute('id','area_technology');
        area3.setAttribute('shape','RECT');
        area3.setAttribute('coords','8,17,79,87');
        area3.setAttribute('href','javascript:getmenuoptions("technology", timeclass, seesawoption)');
        area3.setAttribute('title','Technology & Design Work');
        area4.setAttribute('id','area_music');
        area4.setAttribute('shape','RECT');
        area4.setAttribute('coords','111,17,182,87');
        area4.setAttribute('href','javascript:getmenuoptions("music", timeclass, seesawoption)');
        area4.setAttribute('title','Musical Creations');
        area5.setAttribute('id','area_activities');
        area5.setAttribute('shape','RECT');
        area5.setAttribute('coords','215,17,284,87');
        area5.setAttribute('href','javascript:getmenuoptions("activities", timeclass, seesawoption)');
        area5.setAttribute('title','My Activities');
        area6.setAttribute('id','area_inspiration');
        area6.setAttribute('shape','RECT');
        area6.setAttribute('coords','320,17,392,87');
        area6.setAttribute('href',"javascript:getmenuoptions('inspiration', timeclass, seesawoption)");
        area6.setAttribute('title','My Inspirations');
        
        ul.setAttribute('id','hoverlist');
        li1.setAttribute('id','technology');
        li2.setAttribute('id','music');
        li3.setAttribute('id','activities');
        li4.setAttribute('id','inspiration');
    
    
    
        topiclogos.appendChild(imgdiv);
        topiclogos.appendChild(topicmap);
        topicmap.appendChild(area3);
        topicmap.appendChild(area4);
        topicmap.appendChild(area5);
        topicmap.appendChild(area6);
        imgdiv.appendChild(ul);
        ul.appendChild(li1);
        ul.appendChild(li2);
        ul.appendChild(li3);
        ul.appendChild(li4);
        imgdiv.appendChild(topicimg);

    generatecontent(template, projinfoArrayjs);   
    } 
$(document).ready(function(){
        $('#past').click(function(){
            timeclass="past";
        
        });
        $('#present').click(function(){
            timeclass="present";
        
        });
        $('#future').click(function(){
            timeclass="future";
        });
    
        $('#area_music').click(function(){
            category="music";
        });
        
        $('#area_technology').click(function(){
            category="technology";
        });
        
        $('#area_activities').click(function(){
            category="activities";
        });
        
        $('#area_inspirations').click(function(){
            category="inspiration";
        });
    });


    //checks screen size
    
    (function($){
        $(window).load(function(){
            $(".content").mCustomScrollbar({
                scrollButtons:{
                    enable:true
                }
            });
        });
    })(jQuery);
    
  
    
    
        //Generates the content that appears in the content table
    
    
    window.onload = function () { 
    
        if($("#project-content").is(":hidden") && hideproject==0){
            $("#project-content").slideDown("slow");  
        }    
    
        else if($("project-content").not(":hidden") && hideproject==1){
        
            $("project-content").hide();
        }
    };



//This function scales the map coordinates (hot spots) with the image div
 $(window).bind("load resize", function(){

 var defcoords = ["7,7,98,44", "109,7,259,44", "265,7,392,44"];   
 var new_x1;
 var new_x2;
 var new_y1;
 var new_y2;
 

 var screenImage = $("#timeframe");
var theImage = new Image();
theImage.src = screenImage.attr("src");
var original_image_width=theImage.width;
var original_image_height=theImage.height;
 //console.log(original_image_width);

   // var original_image_width=screenImage[0].naturalWidth
  //  var original_image_height=screenImage[0].naturalHeight;
  // console.log(original_image_width);
   var new_image_width = screenImage.width();
   var new_image_height = screenImage.height();
  // console.log(new_image_width);
      
   var newcoords; 
    var hotspots = $('#timeframemap area').length;
  
   // console.log(hotspots);
    for(var i=0;i<hotspots;i++) {
       
        coords=defcoords[i].split(",");
     //console.log(coords[0]);
        new_x1 = (new_image_width/original_image_width)*coords[0];
        new_y1 = (new_image_height/original_image_height)*coords[1];
        new_x2 = (new_image_width/original_image_width)*coords[2];
        new_y2 = (new_image_height/original_image_height)*coords[3];
        //console.log(original_image_height);


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

        </script>

    </body>

</html>
