<!DOCTYPE html>
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
        <div id="wrapper" class="row-fluid hidden" alt="worklifebalmedia">
            <div class="offset4 span6">
                <canvas data-processing-sources="seesaw_balanced.pde"></canvas>      
            </div>  
        </div>
    </div>
    <!--if javascript is not enabled default background loads-->
    <img id="background" class="bg" alt=""/>
    <noscript><img id="background1" class="bg" alt="" src = "img/background3.png"/></noscript> 
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="js/jquery/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script>!window.jQuery.ui && document.write(unescape('%3Cscript src="js/jquery/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>
    <!-- mousewheel plugin -->
    <script src="js/jquery.mousewheel.min.js"></script>
    <!-- custom scrollbars plugin -->
    <script src="js/jquery.mCustomScrollbar.js"></script> 
    <script src="processing-1.4.1.js"></script>
    <script src="jquery.js"></script>
    

    <script>  

    var timeclass;
    (function($) {
        var timeoption = ['past', 'present', 'future'],
        currentTime = new Date().getDate(),
        background = $('#background');

        //Changes background every other day
        if(currentTime%2==0) {
            background.attr('src', 'img/background.png');
        } else{
            background.attr('src', 'img/background3.png');
        }
        
        //Listen to each timeframe button for when they are clicked
        var timeframe = $('#timeframe');
        $("#timeframemap area").each(function(i) {
            var ind = i;     
            $("map #"+timeoption[ind]).on('click', function(){
                timeclass=timeoption[ind];
                timeframe.attr("src","img/timeframe_"+timeclass+".png");
                worklife();
            });
        });

        function worklife(){
            if($("#wrapper").is(":hidden")) 
            {
                $("#wrapper").slideDown("slow");
            }
        };

    })(jQuery);

    function getmenuoptions(seesawoption){
        if(seesawoption=="work"){
            document.menuform.category.value = "resume";
        }
        if(seesawoption=="life"){
            document.menuform.category.value = "technology";
        }
        document.menuform.timeclassoption.value = timeclass;
        document.menuform.seesawoption.value = seesawoption;
        document.menuform.submit();
    };  
    </script>
</body>
</html>
