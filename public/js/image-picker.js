// image-picker plugin initializer
var imageLink='';
$("#modalImagePicker").imagepicker({
    'clicked':function (select) {
        imageLink=handlePickedImages(select);
    },
    'initialized':function(){

    }
});

//function for handling picked images urls

function handlePickedImages(select){
    var pickedImage=select['option'][0]['dataset']['imgSrc'];
    return pickedImage;
}

// kills currently opened modal, and sets images into textarea
function kill_n_set(){

    this.get=function(){

    };

    this.set=function(){

    };

    let target=tinyMCE.get('textAreaTinyMce2'); //creating panel
    if(target==undefined || target==null){
        target=tinyMCE.get('textAreaTinyMce');  //editing panel
    }

    let currVal=target.getContent();
    let newVal=currVal+'<img src="'+imageLink+'"/>';

    target.setContent(newVal);

}


//when user closes the modal via X button
var targetModal='#imagePickerModal';
$(targetModal+' .add').on('click',function(){
    kill_n_set();
    $(targetModal).find('.close').trigger('click');
});