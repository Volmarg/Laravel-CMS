function jqInitializers(){
    let menu = new editMenu();

  this.sortableJq=function(){
    $('#menuBuilderBackendSortable').nestedSortable({
      handle: 'div',
      items: 'li',
      toleranceElement: '> div',
        maxLevels:2,
        change: function(){
            menu.depthChangeOnRelocation(event);
        }
    });
  }

}


$(document).ready(function(){

  var jqUiInit=new jqInitializers();
  jqUiInit.sortableJq();

});
