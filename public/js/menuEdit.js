function editMenu(){

  //Removing elements from menu
  this.removeElement=function(){
    $('.removeMenuElement').on('click',function(){
      var parent_=$(this).parent('li');

      //hidden input
      parent_.next().val('false');
      //List element
      parent_.remove();
    })
  }

  //Adding elements to menu
  this.addElement=function(){
    $('.addElemenMenu').on('click',function(){
      var link=$(this).prev();
      var menuBuilder=$('.menuActiveElementsAdmin>ul');

      menuBuilder.append('<li>test</li>');
    })
  }
}



//----------------------------
var menu = new editMenu();
menu.removeElement();
menu.addElement();
