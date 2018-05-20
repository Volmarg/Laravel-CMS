function jqInitializers(){
/*
  this.sortableJq=function(){
    $( function() {
      $( "#menuBuilderBackendSortable" ).sortable();
      $( "#menuBuilderBackendSortable" ).disableSelection();
    } );
  }
  */
}


$(document).ready(function(){

  $('.sortable').nestedSortable({
    handle: 'div',
    items: 'li',
    toleranceElement: '> div'
  });

  $('#menuBuilderBackendSortable').nestedSortable({
    handle: 'div',
    items: 'li',
    toleranceElement: '> div'
  });

});
