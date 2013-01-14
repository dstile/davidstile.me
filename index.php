<?php include '_partials/header.php';

require_once 'classes/contentgenerator.php';
?>

<!--Background source is set in Javascript based on day of week-->
<img id="background" class="bg1" alt=""/>

<div class="container-fluid">
    <div id = 'corewrap'>
        <br />  <br />  
        <div class='row-fluid'>
            <div class='offset2 span10'>

            <div id="namelogo" class="row-fluid"> 
                <a href="index.php">
                    <img id="Logo"  class="maxdim center" src="/img/Logo.png" width="100%" alt="Name Logo"/>
                </a>
            </div>
            <div  id="motto" class="row-fluid">  
                <img class="maxdim rounded1 center" src="/img/aboutmetext.png" width="100%" alt="About Me" />
            </div>
            <br />


            <img id='short' title="Short Story Button" class='center inline-block' src='/img/shortStory.png'/>
            <img id='long' title="Long Story Button" class='center inline-block' src='/img/longStory.png'/>

            <form name="menuform" method="get" action="nav.php">    
                <input type="hidden" name="timeclassoption"/>
                <input type="hidden" name="category"/>
                <input type="hidden" name="seesawoption" />
            </form>
            <section id='longstory'>
                <div class="row-fluid">

                    <img id="timeframe" class="maxdim center" src="/img/timeframe.png" style="width: 100%;" usemap="#timeframemap" alt="Past/Present/Future Selections" />
                    <map id="timeframemap" name="timeframemap">
                        <area id="past" shape="RECT" coords="7,7,98,44" href="javascript:void(0);" title="Past Button" alt="timeframe option"/>
                        <area id="present" shape="RECT" coords="109,7,259,44" href="javascript:void(0);" title="Present Button" alt="timeframe option"/>
                        <area id="future" shape="RECT" coords="265,7,392,44" href="javascript:void(0);" title="Future Button" alt="timeframe option"/>
                    </map> 

                </div>    
                <div id="wrapper" class="row-fluid hidden" alt="worklifebalmedia">
                    <div class="center">
                        <canvas data-processing-sources="seesaw_balanced.pde"></canvas>      
                    </div>  
                </div>
            </section>
            <script type="text/javascript">
            var $longstory=$('div #longstory');
            $longstory.hide();
            </script>

            <section id='shortstory' class='transbackground rounded contentIndex center'>
                <u><i><h1>The Short Story</h1></i></u>
                <h2 class='center'>About Me</h2>
                <p class='intro'>I am a technology enthusiast with a passion for developing and creating unique products.  My ultimate goal is for end users to find true enjoyment and/or utility from my works. My past background and work is diverse and broad in scope. 
                    <br />
                    <br />
                    I studied Mechanical Engineering at the University of Michigan and subsequently performed work in both strategy and execution based consulting roles. Much of this work was focused on Product Lifecycle Management and Supply Chain Management.
                    <br /><br />
                    Fast forward to today and I am an aspiring programmer/software developer with a range of interests spanning interactive media (think Kinect meets sensors meets music meets complete sensory overload), web design, and software development.</p>
                    <div>
                        <a href='http://www.github.com/dstile/' title='github link'><img class='icon center' src='/img/github-icon.png'/></a>
                        <a href='http://www.twitter.com/David_Stile/' title='twitter link'><img class='icon center' src='/img/twitter-icon.png'/></a>
                    </div>
                    <h2 class='center'>About this Website</h2>

                    <p class='intro'>This website was one of my first personal coding projects.  I made it a point to develop it from scratch.  No Drupal, and no Wordpress. I am not opposed to them but I really just wanted to learn what goes on behind the scenes as much as possible.  It was developed using:</p> 
                    <div class = 'intro'>
                        <ul>
                            <li>Javascript (with plenty of jQuery help)</li>
                            <li>PHP</li>
                            <li>mySQL</li>
                            <li>Twitter Boostrap</li>
                            <li>Processing.js(the animated work/life balance seesaw)</li>
                            <li>javascript plugin developed by Brandon Aaron for my scrolling content window.</li>
                        </ul>
                    </div>
                    <p class='intro'>This site will always be a work in progress.  My latest updates have been integrating Handlebars.js for templating, using more OOO programming to clean up the coding structure for improved modularity, as well as building in more ajax to reduce number of full page refreshes required.</p>
                </section>
                <script type="text/javascript">
                var $shortstory=$('div #shortstory');
                $shortstory.hide();
                </script>
            </div>
        </div>
    </div>
        <!--Bottom Tab dynamic content-->
        <div class = 'row-fluid tabContent'>
            <div class ='offset2 span10 row'>
                <bottomTab class='center'>
                    Latest & Greatest
                </bottomTab>
            </div>

            <div class = 'offset2 span9 recentContainer row'>                 
                <?php include '_partials/recentposts.php' ?>
            </div>
        </div>

    </div>
    <!--PLaced at the end to improve load time -->
    <img id="background" class="bg2" alt="" src = "img/background1.png"/>
    


    <?php include '_partials/footer.php' ?>
    <!--if javascript is not enabled default background loads-->

    <noscript><img id="background" class="bg1" alt=""/></noscript> 
    <!-- mousewheel plugin -->
    <script src="js/jquery.mousewheel.min.js"></script>
    <!-- custom scrollbars plugin -->
    <script src="js/jquery.mCustomScrollbar.js"></script> 
    <script src="processing-1.4.1.js"></script>

    <script>  
    var timeclass;
    (function($){

            //Main Navigation page slider

            //save container that holds all information about recent posts
            var tabHeight = $(window).height() - $('bottomTab').height(),
            recentContainer = $('div.recent_container');
        

            $('div#corewrap').css('height', tabHeight);
            //if bottom tab is clicked => hide all current information, change the background
            //AND show most recent blog posts
            $('bottomTab').on('click', function() {  
                $('body').toggleClass('bodyvis');
                $('#corewrap').slideToggle(2000);
                $('img#background.bg1').toggleClass('bgopacity1');
                $('img#background.bg2').toggleClass('bgopacity2');
            });

            //Logic for showing and hiding original portions of screen
            var timeoption = ['past', 'present', 'future'],
            currentTime = new Date().getDate(),
            background = $('#background'),
            timeframe = $('#timeframe');

            //Changes background every other day
            if(currentTime%2==0) {
                background.attr('src', 'img/background3.png');
            }else{
                background.attr('src', 'img/background.png');
            }
             //Listen to each timeframe button for when they are clicked

             $("#timeframemap area").each(function(i) {
                var ind = i;     
                $("map #"+timeoption[ind]).on('click', function(){
                    timeclass=timeoption[ind];
                    timeframe.attr("src","img/timeframe_"+timeclass+".png");
                    worklife();
                });
            });


             //This section manages the flow of what is shown vs. hidden on the main index
             var $longstoryButton = $('#long'),
             $shortstoryButton = $('#short'),
             $mottoimg=$('div #motto'),
             /*Status 1=none clicked, Status 2=shortStory clicked, Status 3=longStory clicked*/
             status_short=1,
             status_long=1,
             status_main=1;             

             //This function checks to see if the number passed in is odd/even
             var isEven = function(someNumber){
                return (someNumber%2 == 0) ? true : false;
            };

            

            $shortstoryButton.on('mouseenter', function(){
                $(this).attr('src', '/img/shortStory_mouseover.png');
            });

            $shortstoryButton.on('mouseleave', function(){
                $this=$(this);
                if(isEven(status_short)){
                    $this.attr('src','/img/shortStory_clicked.png' );
                }else{
                    if(status_main>1){
                        $this.attr('src','/img/shortStory_storyselect.png');
                    }else{
                        $this.attr('src','/img/shortStory.png');
                    }
                }
            });

            $longstoryButton.on('mouseenter', function(){
                $(this).attr('src', '/img/longStory_mouseover.png');
            });


            $longstoryButton.on('mouseleave', function(){
                $this=$(this);
                if(isEven(status_long)){
                    $this.attr('src','/img/longStory_clicked.png' );
                }else{
                    if(status_main>1){
                        $this.attr('src','/img/longStory_storyselect.png');
                    }else{
                        $this.attr('src','/img/longStory.png');
                    }
                }
            });


            $shortstoryButton.on('click', function(){
               status_short += 1;
               status_main +=1;
               status_long=1;
               $this= $(this);
               $this.attr('src','/img/shortStory_clicked.png');
               if(status_main>1){
                $longstoryButton.attr('src','/img/longStory_storyselect.png');
            }else {
                $longstoryButton.attr('src','/img/longStory.png');
            }
            $mottoimg.hide();
            $shortstory.animate({opacity: 'toggle'},500, function(){
                if($longstory.is(':hidden')==false){
                    $longstory.fadeOut();
                }
                checkmotto();
            });
        });

            $longstoryButton.on('click', function(){
                status_long += 1;
                status_main +=1;
                status_short=1;
                $this= $(this);
                $this.attr('src','/img/longStory_clicked.png');
                if(status_main>1){
                    $shortstoryButton.attr('src','/img/shortStory_storyselect.png');
                }else {
                    $shortstoryButton.attr('src','/img/shortStory.png');
                }
                $mottoimg.hide();
                $longstory.animate({opacity: 'toggle'},500,function(){
                    if($shortstory.is(':hidden')==false){
                        $shortstory.fadeOut();
                    }
                    checkmotto();
                });
            });


            $(".contentIndex").mCustomScrollbar({
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
                    $shortstoryButton.attr('src','/img/shortStory.png')
                    $longstoryButton.attr('src','/img/longStory.png')
                    status_main=1;
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


