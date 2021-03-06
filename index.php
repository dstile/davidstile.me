<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php include '_partials/header.php';

require_once 'classes/contentgenerator.php';
//Determines if the Most Recent Entries or a Specific Selection are shown
if(isset($_GET['get_post']) && $_GET['get_post']!='recent') {
    $template = 'individual';
    $post = urldecode($_GET['get_post']); 

}
elseif (isset($_GET['get_post']) && $_GET['get_post']=='recent') {
    $template = 'recent';
    $post = urldecode($_GET['get_post']); 
}
else {
    $post = 'recent'; 
    //If a single blog post has not been posted as a parameter then load most recent
    $template = 'default';
}
?>



<!--Background source is set in Javascript based on day of week-->
<img id="background" class="bg1" alt=""/>

<div class="container-fluid row-fluid">
    <div id = 'corewrap'>
        <br />  
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
                <a href = "http://davidstile.com/nav.php?timeclassoption=present&seesawoption=life&category=technology"><img id='long' title="Long Story Button" class='center inline-block' src='/img/longStory.png'/></a>

                <form name="menuform" method="get" action="nav.php">    
                    <input type="hidden" name="timeclassoption"/>
                    <input type="hidden" name="category"/>
                    <input type="hidden" name="seesawoption" />
                </form>
                <script type="text/javascript">
                var $longstory=$('div #longstory');
                $longstory.hide();
                </script>

                <section id='shortstory' class='transbackground rounded contentIndex center'>
                    <u><i><h1>The Short Story</h1></i></u>
                    <h2 class='center'>About Me</h2>
                    <description>I am a technology enthusiast with a passion for developing and creating unique products.  My ultimate goal is for end users to find true enjoyment and/or utility from my works. My past background and work is diverse and broad in scope. 
                        <br />
                        <br />
                        I studied Mechanical Engineering at the University of Michigan and subsequently performed work in both strategy and execution based consulting roles. Much of this work was focused on Product Lifecycle Management and Supply Chain Management.
                        <br /><br />
                        Fast forward to today and I am an aspiring programmer/software developer with a range of interests spanning interactive media (think Kinect meets sensors meets music meets complete sensory overload), web design, and software development.</description>
                        <div>
                            <br />
                            <a href='http://www.github.com/dstile/' title='github link'><img class='icon center' src='/img/github-icon.png'/></a>
                            <a href='http://www.twitter.com/David_Stile/' title='twitter link'><img class='icon center' src='/img/twitter-icon.png'/></a>
                        </div>
                        <h2 class='center'>About this Website</h2>

                        <description>This website was one of my first personal coding projects.  I made it a point to develop it from scratch.  No Drupal, and no Wordpress. I am not opposed to them but I really just wanted to learn what goes on behind the scenes as much as possible.  It was developed using:</description> 
                        <description>
                            <ul>
                                <li>Javascript (with plenty of jQuery help)</li>
                                <li>PHP</li>
                                <li>mySQL</li>
                                <li>Twitter Boostrap</li>
                                <li>Processing.js(the animated work/life balance seesaw)</li>
                                <li>javascript plugin developed by Brandon Aaron for my scrolling content window.</li>
                            </ul>
                        </description>
                        <description>This site will always be a work in progress.  My latest updates have been integrating Handlebars.js for templating, using more OOO programming to clean up the coding structure for improved modularity, as well as building in more ajax to reduce number of full page refreshes required.</description>
                    </section>
                    <script type="text/javascript">
                    var $shortstory=$('div #shortstory');
                    $shortstory.hide();
                    </script>
                </div>
            </div>
        </div>
<div class='offset2 span10'>
          <bottomTab class='center'>
                Latest Updates
            </bottomTab>
        </div>

        <!--Bottom Tab dynamic content-->
    
           <!-- Like pages fixed block-->
           <!--<div id ='sideBar'class= 'span2' >
            <img src="/img/footlogo.png">
            <div class='quote'><p> My place for sharing works and wisdom</p></div>
            <div class = 'likeButton'><g:plusone class="likeButton"></g:plusone></div>
            <div class = 'likeButton'>
                <a href="https://twitter.com/David_Stile" class="twitter-follow-button" data-show-count="false">Follow @David_Stile</a>
            </div>
            <div class='likeButtonf'><div class="fb-like" data-href="http://www.davidstile.com" data-send="false" data-width="200" data-show-faces="true" data-font="arial"></div></div>
        </div>-->

        <div class ='offset2 span10'>
            <div class = 'recentContainer'>               
                <?php 
                if ($template == 'default' || $template =='recent') {
                    include '_partials/recentposts.php'; 
                } elseif ($template == 'individual') {

                    include '_partials/individualpost.php'; 

                }

                ?>
            </div>
    
    </div>


</div>






<script type="text/javascript">
window.___gcfg = {
    lang: 'en-US'
};
(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

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
            var bottomTab = $('bottomTab'), 
            tabHeight = $(window).height() - bottomTab.height(),
            recentContainer = $('div.recent_container'),
            template = '<?php echo $template ?>';
            $('div#corewrap').css('height', tabHeight);
                      //I do this in hopes that it does not show while other images are loading


                      if (template=="individual" || template=="recent") {

                        $('body').addClass('bodyvis');
                        $('#corewrap').hide();

                        $('img#background.bg2').addClass('bgopacity2');
                        $('#sideBar').show();
                    }

                    

            //if bottom tab is clicked => hide all current information, change the background
            //AND show most recent blog posts
            bottomTab.on('click', function() {  
                $('body').toggleClass('bodyvis');
                $('#corewrap').slideToggle(2000);
                $('#sideBar').fadeToggle(2000);
                $('img#background.bg1').toggleClass('bgopacity1',1000);
                $('img#background.bg2').toggleClass('bgopacity2', 1000);
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
                        $this.attr('src','/img/shortStory.png');
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
                        $this.attr('src','/img/longStory.png');
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
                $longstoryButton.attr('src','/img/longStory.png');
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

            //I do this in hopes that it does not show while other images are loading
            bottomTab.show();
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


