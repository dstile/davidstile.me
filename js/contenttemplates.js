
//Table Header Generator
function generatecontent(template, projinfoArrayjs){
 //Template[0]=category,template[1]=seesawoption,template[2]=timeclass
 
    var projContentID = $('#project-content'),
    container = $('<container>'),
    header1 = $('<h3>'),
    topicsimg = $('#topicsimg');
    header1.addClass('section_header');
    container.appendTo(projContentID),
    header1.appendTo(container),
    projContentID.slideDown("slow"); 
    console.log(projinfoArrayjs);
    if(template[0] == "life"){
       
        var dbArray = new Array("posthead","datesequence","picture","description", "media"),
        headers = new Array();
        headers[0]= new Array('technology','/img/Logo.png', '/img/topiclogos-design.png','The things I Create, Design and Engineer.');
        headers[1] = new Array('music','/img/Logoguitar.png','/img/topiclogos-music.png', 'Music contained in this section is all original composition using computer, guitar and keyboard.  Enjoy!');
        headers[2] = new Array('activities','/img/Logo.png', '/img/topiclogos-activities.png', 'The organizations and activities where I am involved.');
        headers[3]= new Array('inspiration','/img/Logo.png','/img/topiclogos-inspirations.png', 'All the people/projects/things that are interesting, creative, inspiring.');
        //Populates the template headers for each category
    
            for(var j=0;j<headers[0].length;j++){
              
                if(headers[j][0]==template[1]){
                    $('#Logo').attr('src', headers[j][1]);
                    topicsimg.attr('src', headers[j][2]);
                    header1.text(headers[j][3]);
                    popRows(projinfoArrayjs);
                    
                }
                
            }
        }
    

    if(template[0] == "work"){
        header1.text('Things I do to make a living.');
        
        if(template[2]=="future")
        {
            var dbArray = new Array("posthead", "picture","description", "media");
            popRows(projinfoArrayjs);
        }

        else{
        var dbArray = new Array("worklogo","companyname","position","role","timeframe"),
        titleArray = new Array("Logo","Company","Position","Role","Timeframe"),
        //Row container
        titlecontainer = $('<container>');
        col=[];
        titlecontainer.addClass('titleRow');
        titlecontainer.text('');
        titlecontainer.appendTo(container);
     
        
        for(i=0;i<titleArray.length;i++){
            col[i] = $('<'+dbArray[i]+'>');
            col[i].addClass('colw'+i);
            //Table Row Content	
            col[i].appendTo(titlecontainer).html(titleArray[i]);
        }
        
        for(j=0;j<(projinfoArrayjs.length);j++)
        {
            containerRow = $('<container>').addClass('newRow').text('').appendTo(projContentID);
            for(i=0;i<dbArray.length;i++){
                col[i] = $('<'+dbArray[i]+'>').addClass('colw'+i).appendTo(containerRow)
                .html(projinfoArrayjs[j][dbArray[i]]);
            }
        }
    }
}

function popRows(projinfoArrayjs){
    
      
       //Row container for all website entries
        
        for(var j=0;j<projinfoArrayjs.length;j++){
            
            var container = $('<container>'),
            lineitem=[],
            x;
            container.addClass('newRow').text("").appendTo(projContentID);
           for(var i=0;i<dbArray.length;i++){
                lineitem[i] = $('<'+dbArray[i]+'>').appendTo(container)
                    .html(projinfoArrayjs[j][dbArray[i]]+'<br />');  
            }
        }

};


};

