function jqInitializers(){
    let menu = new editMenu();

    this.sortableJq=function(){

    }

}


$(document).ready(function(){

  var jqUiInit=new jqInitializers();
  jqUiInit.sortableJq();

});
