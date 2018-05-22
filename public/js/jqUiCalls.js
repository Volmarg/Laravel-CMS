function jqInitializers(){
    let menu = new editMenu();

  this.sortableJq=function(){
    $('#menuBuilderBackendSortable').nestedSortable({
      handle: 'div',
      items: 'li',
      toleranceElement: '> div',
        maxLevels:2,
        relocate: function(){
            menu.depthChangeOnRelocation(this);
        }
    });
  }

}


$(document).ready(function(){

  var jqUiInit=new jqInitializers();
  jqUiInit.sortableJq();

});
