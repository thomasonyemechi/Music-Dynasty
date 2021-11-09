$('.custom-image input[type=file]').each(function () {

    $(this).on('change', function(){
        $('#editImageShow').hide()
        var fileName = $(this).val().split( '\\' ).pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        label = $(this).prev('label'),
            $label_text = $(this).next('span'),
            labelDefault = $label_text.text();
        //Check successfully selection
        if( fileName ){
            label.css('background-image', 'url(' + tmppath + ')');
            $label_text.text(fileName);
        }
    })
});


