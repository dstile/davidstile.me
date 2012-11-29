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
        <div  id="motto" class="row-fluid">  
            <div class='offset5 span4'>
                <img class="maxdim rounded1" src="/img/aboutmetext.png" width="100%" alt="About Me" />
            </div>
        </div>
        <br />

        <div class='offset3 span9'>
            <button id='short'>Short Story</button>
            <button id='long'>Long Story</button>
        </div>
        <form name="menuform" method="get" action="nav.php">    
            <input type="hidden" name="timeclassoption"/>
            <input type="hidden" name="category"/>
            <input type="hidden" name="seesawoption" />
        </form>
        <div id='longstory'>
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
        <div class='offset2 span9'>
            <section id='shortstory' class='transbackground rounded content'>
                <u><i><h1>The Short Story</h1></i></u>
                <h2 class='center'>About Me</h2>
                <p>I am a technology enthusiast with a passion for developing and creating unique products.  My ultimate goal is for end users to find true enjoyment and/or utility from my works. My past background and work is diverse and broad in scope. 
                    <br />
                    <br />
                    I studied Mechanical Engineering at the University of Michigan and subsequently performed work in both strategy and execution based consulting roles. Much of this work was focused on Product Lifecycle Management and Supply Chain Management.
                    <br /><br />
                    Fast forward to today and I am an aspiring programmer/software developer with a range of interests spanning interactive media (think Kinect meets sensors meets music meets complete sensory overload), web design, and software development.</p>

                    <h2 class='center'>About this Website</h2>
                     
                        <p>This website was one of my first personal coding projects.  I made it a point to develop it from scratch.  No Drupal, and no Wordpress. I am not opposed to them but I really just wanted to learn what goes on behind the scenes as much as possible.  It was developed using:</p> 
                        <ul>
                            <li>Javascript (with plenty of jQuery help)</li>
                            <li>PHP</li>
                            <li>mySQL</li>
                            <li>Twitter Boostrap</li>
                            <li>Processing.js(the animated work/life balance seesaw)</li>
                            <li>javascript plugin developed by Brandon Aaron for my scrolling content window.</li>
                        </ul>

                        <p>This site will always be a work in progress.  My latest updates have been integrating Handlebars.js for templating, using more OOO programming to clean up the coding structure for improved modularity, as well as building in more ajax to reduce number of full page refreshes required.</p>
                    </section>
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




             $longstory=$('div #longstory');
             $shortstory=$('div #shortstory');
             $mottoimg=$('div #motto');
             $shortstory.hide();
             $longstory.hide();

             $('#short').on('click', function(){
                 $mottoimg.hide();
                 $shortstory.animate({opacity: 'toggle'},500, function(){
                     if($longstory.is(':hidden')==false){
                         $longstory.fadeOut();
                     }
                     checkmotto();
                 });
             });

             $('#long').on('click', function(){
                $mottoimg.hide();
                $longstory.animate({opacity: 'toggle'},500,function(){
                   if($shortstory.is(':hidden')==false){
                    $shortstory.fadeOut();
                }
                checkmotto();
            });
            });


             $(".content").mCustomScrollbar({
                scrollButtons:{
                    enable:true
                }
            });

             function worklife(){
                if($("#wrapper").is(":hidden")) 
                {
                    $("#wrapper").slideDown("slow");
                }
            };

            function checkmotto(){
                if($longstory.is(':hidden') && $shortstory.is(':hidden'))
                {
                    $mottoimg.fadeIn(500);
                }
                if($longstory.is(':hidden')==false || $shortstory.is(':hidden')==false){
                    $mottoimg.fadeOut(500);
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