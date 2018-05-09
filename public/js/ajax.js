function ajaxRequests(){
  //Changing menu elements
  this.menuUpdate=function(){
    $.get( "/ajaxUpdateMenu", function( data ) {
      alert( data );
    });
  }
}

/* TEST */

var a=new ajaxRequests();
a.menuUpdate();
