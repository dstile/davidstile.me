
//Table Header Generator
function generatecontent(template, projinfoArrayjs){
 //Template[0]=category,template[1]=seesawoption,template[2]=timeclass
 
   
    var projContentID = document.getElementById('project-content'),
    container = document.createElement('container'),
    header1 = document.createElement('div');
    container.appendChild(header1);
    header1.setAttribute('class',"section_header");
    projContentID.appendChild(container);
    $("#project-content").slideDown("slow"); 
    if(template[0] == "life"){
       
        var dbArray = new Array("posthead","datesequence","picture","description", "media");
        
        if(template[1]=="music"){
            $('#Logo').attr("src","/img/Logoguitar.png");
            $('#topicsimg').attr("src","/img/topiclogos-music.png");
            header1.innerHTML = '<h3>Music contained in this section is all original composition using computer, guitar and keyboard.  Enjoy!</h3>';
           
        }
        if(template[1]=="technology"){
            
            $('#topicsimg').attr("src","/img/topiclogos-design.png"); 
            header1.innerHTML = '<h3>The things I Create, Design and Engineer</h3>';
        }
         if(template[1]=="activities"){
            
            $('#topicsimg').attr("src","/img/topiclogos-activities.png"); 
            header1.innerHTML = '<h3>The organizations and activities where I am involved'
        }
        
         if(template[1]=="inspiration"){
           
            $('#topicsimg').attr("src","/img/topiclogos-inspirations.png"); 
            header1.innerHTML = '<h3>All the people/projects/things that are interesting, creative, inspiring.</h3>';
        }

        popRows();
    }
    

    if(template[0] == "work"){
        header1.innerHTML = '<h3>Things I do to make a living.</h3>';
        
        if(template[2]=="future")
        {
            var dbArray = new Array("posthead", "picture","description", "media");
            popRows();
        }

        else{
        var dbArray = new Array("worklogo","companyname","position","role","timeframe");
        var titleArray = new Array("Logo","Company","Position","Role","Timeframe");
        //Row container
       
        var titlecontainer = document.createElement('container');
        titlecontainer.className = 'titleRow';
        titlecontainer.innerHTML = '';
        container.appendChild(titlecontainer);
     
        var col=[];
        for(i=0;i<titleArray.length;i++){
            col[i] = document.createElement(dbArray[i]);
            col[i].className = "colw"+i;
            //Table Row Content	
            titlecontainer.appendChild(col[i]);
            x=document.getElementById("project-content").getElementsByTagName(dbArray[i]);
            x[0].innerHTML=titleArray[i];
        }
        
        for(j=0;j<(projinfoArrayjs.length);j++)
        {
            containerRow = document.createElement('container');
            containerRow.className = 'newRow';
            containerRow.innerHTML = '';
            projContentID.appendChild(containerRow);
            
            for(i=0;i<dbArray.length;i++){
                col[i] = document.createElement(dbArray[i]);
                col[i].className = "colw"+i;
                containerRow.appendChild(col[i]);
                //Table Row Content	
               
               x=document.getElementById("project-content").getElementsByTagName(dbArray[i]);
               x[j+1].innerHTML=projinfoArrayjs[j][dbArray[i]];
            }
        }
    }
}

function popRows(){

       //Row container for all website entries
        for(j=0;j<(projinfoArrayjs.length);j++)
        {
            container = document.createElement('container');
            container.className = 'newRow';
            container.innerHTML = '';
            projContentID.appendChild(container);
            var lineitem=[];
            for(i=0;i<dbArray.length;i++){
                lineitem[i] = document.createElement(dbArray[i]);
                container.appendChild(lineitem[i]);
                //Table Row Content 
               var x=document.getElementById("project-content").getElementsByTagName(dbArray[i]);
               x[j].innerHTML=projinfoArrayjs[j][dbArray[i]]+"<br />";    
            }
        }

};


}