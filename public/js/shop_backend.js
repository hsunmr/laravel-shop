$(document).ready(function () {

    if($("textarea").length > 0){
        CKEDITOR.replace( 'text',{
            height:400,
        } );
    }
    if (window.matchMedia('(max-width:768px)').matches) {
        $('#sidebar').addClass('toggled');
    }
    $('#sidebarToggle,#sidebarToggleTop').click(function(){
        $('#sidebar').toggleClass('toggled');
    })
    $('.delete-button').click(function(){
        $id = $(this).attr('data-id');
        $url = $(this).attr('data-url');
        $('.delete-form').attr('action',$url);
    })
    $("#img-update,#image-create").change(function () {
        preview(this);   //if change -> preview img
    })
});

var preview = function(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            // reader onload -> set preview class src to input file src
            reader.onload = function (e) {
                $('.preview').attr('src', e.target.result);
            }
            //validation
            if (!input.files[0].type.match('image.*')) {
                alert("only upload image");
                $(input).val(""); //clear input
                return;
            }
            //read URL
            reader.readAsDataURL(input.files[0]);
        }
}


