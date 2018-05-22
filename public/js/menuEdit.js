function editMenu(){
  //Removing elements from menu
  this.removeElement=function(){
    $('.removeMenuElement').on('click',function(){
      var parent_=$(this).parent('li');

      //hidden input
      $(this).prev().val('false');
      //List element set to hidden
      parent_.css('display','none');
      //but also if current menu element has subelements then these need to be deactivated as well
      parent_.find('input').val('false');
    })
  }

  //Adding elements to menu
  this.addElement=function(){
    $('.addElemenMenu').on('click',function(){
      var link=$(this).prev();
      var anchor=$(link).prev();

      //adding a number to the next element based on the currently highest number found in menu
      var num=0;
      var menuBuilder=$('.menuActiveElementsAdmin>ol');
      var lastID=menuBuilder.find('input').each(function(){
          if($(this).attr('name')>num){
            num=$(this).attr('name');
          }
      });
      lastID=parseInt(num)+1;


      //add list element into menu and also input so it will be passed via form to the controler
      menuBuilder.append('<li><div>'+anchor.html()+'-'+link.attr('href')
      +'<input type="hidden" value="'+anchor.html()+'" name="'+lastID+'[]" />'
      +'<input type="hidden" value="'+link.attr('href')+'" name="'+lastID+'[]"/></div></li>');
    })
  }

  //changing depth on hidden input so it will be passed to DB
    this.depthChangeOnRelocation=function(element){

    // TODO: need to figure out how to call currently dragged item and add depths

      let currLevel=$(element).find('input').first().attr('name');
      alert(currLevel);
    }
}



//----------------------------
var menu = new editMenu();
menu.removeElement();
menu.addElement();
