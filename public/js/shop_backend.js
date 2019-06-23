$(document).ready(function () {

    if($("textarea").length > 0){
        $("#description").ckeditor({height:250});
        $(".text").ckeditor({height:400});
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
    $('.edit-button').click(function(){
        $id = $(this).attr('data-id');
        $url = $(this).attr('data-url');
        $status = $(this).attr('data-status');
        //set disabled
        $("#status option").removeAttr('disabled');
        $("#status option[value=" + $status +"]").attr('disabled','true');
        $('.edit-form').attr('action',$url);
    })
    $("#img-update,#image-create").change(function () {
        preview(this);   //if change -> preview img
    })
    $("#mapurl input").change(function(){    
        $("#mapurl iframe").attr('src',$("#mapurl input").val());
        $("#mapurl iframe").css('width','100%').css('height','250');
        if(!$("#mapurl input").val())
            $("#mapurl iframe").css('width','0').css('height','0');
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

