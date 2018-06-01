<button class="btn btn-info" style="" id="myBtn"><img src="http://localhost:8000/img/media-icon-dashboard.png"/></button>

<!-- The Modal -->
<div id="imagePickerModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" >&times;</span>
            <h2>Modal Header</h2>
        </div>
        <section class="mediaLibrary">
            <section class="gallery">


                <select id="modalImagePicker">
                    @foreach ($smallImages as $num=>$oneImage)
                        <option
                                data-img-src='{!! url(str_replace('public/images/', 'storage/images/', $oneImage)) !!}'
                                value='s_{{$num}}'
                        >s_{{$num}}</option>
                    @endforeach

                @foreach ($bigImages as $num=>$oneImage)
                    <option
                            data-img-src='{!! url(str_replace('public/images/', 'storage/images/', $oneImage)) !!}'
                            value='b_{{$num}}'
                    >b_{{$num}}</option>
                 @endforeach

                </select>


            </section>
        </section>
    </div>

</div>

<!-- The Modal Script !-->
<script>
    var m=new modals();
    m.imagePicker();
</script>