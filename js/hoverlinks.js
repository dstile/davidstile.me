// When the DOM is loaded, initilize initPage
DOMAssistant.DOMReady(initPage);
function initPage() {
  
  // Get a reference to the containing div with id='map'
  var map = $$('topicsmap');
  
  if (map) {
     
    // Get all the areas of the imagemap
    var area_list = map.getElementsByTagName('area');
   
    // Loop through all areas
    for (i=0; i<area_list.length; i++) {
      
      $$(area_list[i]).style.display = 'none';
      // Assign an action to the mouseover event
    
      $$(area_list[i]).addEvent('mouseover', function(e) {
        // Get the id from the hovered area
         
        var area_id = this.id;       
    
        // Extract the "area"-part of the id = the id of the list-item
        area_id = area_id.substring(area_id.indexOf('_')+1, area_id.length);
  
        // Set the <li> to "display: inline" = show it
        $$(area_id).setStyle('display', 'inline');
        
      });
      // Assign an action to the mouseout event
      $$(area_list[i]).addEvent('mouseout', function(e)  {
        // Get the id from the hovered area
        var area_id = this.id;
        // Extract the "area"-part of the id = the id of the list-item
        area_id = area_id.substring(area_id.indexOf('_')+1, area_id.length);
        // Set the <li> to "display: none" = hide it
        $$(area_id).setStyle('display', 'none');
      
      });
     
      $$(area_list[i]).addEvent('click', function(e) {
        var area_id = this.id;
        area_id = area_id.substring(area_id.indexOf('_')+1, area_id.length);
        getmenuoptions(area_id, timeclass, seesawoption);
        DOMAssistant.preventDefault(e);
      });
      
      
    }
  }
}

 function getmenuoptions(category, timeclass, seesawoption)
    {
        document.menuform.category.value = category;
        document.menuform.timeclassoption.value = timeclass;
        document.menuform.seesawoption.value = seesawoption;
        document.menuform.submit();
    }
