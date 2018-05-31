function privileges(){
    this.hiddenInput=function(){
        $('.stateMark').each(function(){
            var name=$(this).data('name');
            $(this).on('click',function(){
                if($(this).prop('checked')==false){
                    $(this).after('<input type="hidden" name="pivilegeOffSingle'+name+'" value="off"/>');
                }else{

                    $(this).next().remove();
                }
                console.log($(this));
            })
        })
    }
}

//--------------------
$p=new privileges();
$p.hiddenInput();