
//------------------------------------------------------
//------------------------------------------------------ VERSION 2
//------------------------------------------------------

// Sortable external plugin
Sortable.create(A, {
    animation: 200,
    group: {
        name: "shared",
        pull: "clone",
        revertClone: true,
    },
    sort: true
});

function setSortables(){
    //count all containers
    var allContainers=$('.singleContainer').length;

    //invoke sortable on each container
    for(var x=1;x<=allContainers;x++){

        let target=$('#a'+x)[0];
        let editableList1=Sortable.create(target, {
            filter: '.js-remove',
            onFilter: function (evt) {
                var el = editableList1.closest(evt.item); // get dragged item
                el && el.parentNode.removeChild(el);
                createJson(evt);
            },
            onSort:function(evt){
                $('.singleContainer').find('.containerAdder').remove();
                let dragged = evt.item;
                if($(dragged).has('.js-remove').length == 0){
                    $(dragged).append('<i class="js-remove">✖</i>');
                }

                createJson(evt);

            },
            group: "shared",
            sort: false
        });
    }

}


//My Code

function addContainer(ev){
    //get elements and data
    var element=$(ev.target).parent().find('.copy').clone();
    var containers=$('.allContainersWrapper');
    var nextNum=$('.singleContainer').last().data('num')+1;
    //change cloned element
    element.find('.containerAdder').remove();
    element.find('.js-remove').remove();

    //set element new parameters
    var divWrapper=$('<div>');
    var boxName=$('<b>');
    boxName.append(element.text());
    boxName.addClass('containerName');

    divWrapper.addClass('singleContainer');
    divWrapper.data('num',nextNum);
    divWrapper.attr('id','a'+nextNum);
    divWrapper.append(boxName); // here is the span being added inside box


    containers.append(divWrapper);
    setSortables();
}

function createJson(evt){
    var allContainers=$('.singleContainer');
    var arr={};
    var lvl2Data={};
    var num=0;
    var linkStruct={};

    allContainers.each(function(){
        var lvl1Name=$(this).find('.containerName').text();
        var copyCount=0;
        var that=this;

        $(that).find('.copy').each(function(){
            linkStruct[0]=$(this).find('.postName').text();
            linkStruct[1]=$(this).find('.postLink').text();
            lvl2Data[copyCount]=linkStruct;
            console.log(lvl2Data);
            copyCount++;
            linkStruct={};
        });

        arr[num]=[lvl1Name,lvl2Data];
        lvl2Data={};
        lvl1Name='';
        num++;
    });
    var parsed=JSON.stringify(arr,null, 2);
    console.log(parsed);
    $('.jsonHolder').val(parsed);

}
setSortables();
$('.containerAdder').on('click',function(event){
    addContainer(event);
})

