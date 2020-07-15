$(function(){







    $('.hamburger').click(function () {
        $('.wrapper').toggleClass('collapse-sidebar');

    });

    CKEDITOR.replace('en_description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });


    CKEDITOR.replace('ar_description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });


    $(".li-settings").click(function(){
        $(".card-settings ").toggle();
    });

    $('.pages-data-table').DataTable();

    $('.tabs-list li').on('click',function () {
       $(this).addClass('active').siblings().removeClass('active');
       $('.content-list > div').hide();
       $($(this).data('content')).fadeIn();
    });


    // Customize The Input Field
    $('input[type="file"]').wrap('<div class="custom-file"></div>');

    var inputLabel =$('input[type="file"]').data('content');

    $('.custom-file').prepend('<span>'+inputLabel+'</span>');

    $('.custom-file').append('<i class="fa fa-upload fa-lg"></i>');


    $('input[type="file"]').change(function () {
        $(this).prev('span').text( $(this).val().substr(12));
    });

    $('input[type="file"].book_pdf').change(function (e) {
        $('.container-previewPDF').css('display', 'flex')
        $('.pdf_name').text( $(this).val().substr(12));
    });

    $('input[type="file"].book_img').change(function () {
        $('.container-previewImg').css('display', 'block');
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    });

    $('input[type="file"].edit_book_img').change(function () {
        var file = $("input[type=file].edit_book_img").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $(".edit_previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    });

    $('input[type="file"].edit_news_img').change(function () {
        var file = $("input[type=file].edit_news_img").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#edit_previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    });


    $('input[type="file"].news_img').change(function () {
        $('.container-previewImg').css('display', 'block');
        var file = $("input[type=file].news_img").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);

            }
            reader.readAsDataURL(file);
        }
    });

    //show Message When Delete Item
    $('.form-delete').on('submit',function () {
        if(confirm('Are you sure you want to delete it?')){
            return true;
        }
        else {
            return false;
        }

    });










});
