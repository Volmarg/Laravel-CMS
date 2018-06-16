function uploading(){
    this.showName=function(){
        var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
        $('#fileName').html(filename);
    }
}

$('#fileToUpload').on('input',function(){
    var u=new uploading();
    u.showName();
})