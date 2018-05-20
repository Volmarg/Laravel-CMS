function jqInitializers(){

  this.sortableJq=function(){
    $( function() {
      $( "#menuBuilderBackendSortable" ).sortable();
      $( "#menuBuilderBackendSortable" ).disableSelection();
    } );
  }
}
