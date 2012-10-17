<!DOCTYPE html>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html lang="en">
    <head>
        <title>David Stile</title>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css"/>	
       
        <style type="text/css">
        canvas {width: 75%;}
        </style>


    </head>
        
    <body>
       
        
        <div class="container-fluid">
            <br />  <br />  
            <div id="namelogo" class="row-fluid"> 
                <div class='offset5 span4'>
                <a href="index.php">
                    <img id="Logo"  class="maxdim" src="/img/Logo.png" width="100%" alt="Name Logo"/>
                </a>
                </div>
            </div>
                
            <br />
                
            <div class="row-fluid">  
                <div class='offset5 span4'>
                <img id="motto" class="maxdim rounded1" src="/img/aboutmetext.png" width="100%" alt="About Me" />
                </div>
            </div>
                
            <br />
            <form name="menuform" method="get" action="nav.php">    
                    <input type="hidden" name="timeclassoption"/>
                    <input type="hidden" name="category"/>
                    <input type="hidden" name="seesawoption" />
                </form>
             <div class="row-fluid">
                <div class='offset5 span4'>
                <img id="timeframe" class="maxdim" src="/img/timeframe.png" style="width: 100%;" usemap="#timeframemap" alt="Past/Present/Future Selections" />
                    <map id="timeframemap" name="timeframemap">
                        <area id="past" shape="RECT" coords="7,7,98,44" href="javascript:void(0);" title="Past Button" alt="timeframe option"/>
                        <area id="present" shape="RECT" coords="109,7,259,44" href="javascript:void(0);" title="Present Button" alt="timeframe option"/>
                        <area id="future" shape="RECT" coords="265,7,392,44" href="javascript:void(0);" title="Future Button" alt="timeframe option"/>
                    </map> 
                </div>
             </div>    
                
           <!-- <div id="time_buttons" class="row-fluid" >
                
                
                    
                <img id="past_button" src="/img/past.png" class="span2 offset4" alt="Past Button" />
                    
                    
                <img id="present_button" src="/img/present.png" class="span2" alt="Present Button" />
                    
                    
                <img id="future_button" src="/img/future.png" class="span2" alt="Future Button" />
                    
                    
            </div>-->
            <div id="wrapper" class="row-fluid hidden" alt="worklifebalmedia">
                <div class="offset4 span6">
                
                <!--<img src="/img/seesaw.png" usemap="#seesawmap" alt="Work-Life Option"/>
                    
                <map name="seesawmap">
                    <area shape="RECT" coords="0,0,203,98" href="javascript:getmenuoptions('resume','work')" title="left-seesaw" alt="work-life option"/>
                    <area shape="RECT" coords="203,0,390, 97" href="javascript:getmenuoptions('','life')" title="right-seesaw" alt="work-life option"/>
                </map> -->
                <canvas data-processing-sources="seesaw_balanced.pde"></canvas>      
            </div>  
            </div>
                
                
                
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="js/jquery/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script>!window.jQuery.ui && document.write(unescape('%3Cscript src="js/jquery/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>
        <!-- mousewheel plugin -->
        <script src="js/jquery.mousewheel.min.js"></script>
        <!-- custom scrollbars plugin -->
        <script src="js/jquery.mCustomScrollbar.js"></script> 
        <script src="jquery.js"></script>
        <script src="processing-1.4.1.js"></script>


        <script>   
                var timeclass;
                $(window).load(function() {    
                
                var theWindow        = $(window),
                $bg              = $("#bg"),
                aspectRatio      = $bg.width() / $bg.height();
                
                function resizeBg() {
                    
                    if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
                        $bg
                        .removeClass()
                        .addClass('bgheight');
                    } else {
                        $bg
                        .removeClass()
                        .addClass('bgwidth');
                    }
                    
                }
                
                theWindow.resize(function() {
                    resizeBg();
                }).trigger("resize");
                
            });
            
            
            
            $(document).ready(function(){
                
                $('#past').click(function(){
                    worklife();
                    // regular array (add an optional integer
                    timeclass="past";
                    $('#timeframe').attr("src","img/timeframe_past.png");
                   
                });
                
                $('#present').click(function(){
                    
                    worklife();
                    // regular array (add an optional integer
                    timeclass="present";
                    $('#timeframe').attr("src","img/timeframe_present.png");
                   
                });
                
                $('#future').click(function(){
                    worklife();
                    // regular array (add an optional integer
                    timeclass="future";
                    $('#timeframe').attr("src","img/timeframe_future.png");
                    
                });
            });                                              
            
        function worklife(){
            if($("#wrapper").is(":hidden")) 
            {
                $("#wrapper").slideDown("slow");
            }
        }
        
        function getmenuoptions(seesawoption){
        if(seesawoption=="work"){
            document.menuform.category.value = "resume";
            document.menuform.timeclassoption.value = timeclass;
            document.menuform.seesawoption.value = seesawoption;
            document.menuform.submit();
        }

        if(seesawoption=="life"){
            document.menuform.category.value = "technology";
            document.menuform.timeclassoption.value = timeclass;
            document.menuform.seesawoption.value = seesawoption;
            document.menuform.submit();

        }
        }  
    
    </script>

  
    <img src="img/background.png" class="bg" alt=""/> 
  
</body>
</html>
