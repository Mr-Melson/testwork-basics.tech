document.addEventListener("DOMContentLoaded", function(event) {
    var frame;
    document.querySelector('.upload_button_img').addEventListener('click', function (){
    
        event.preventDefault();
        
        // Create a new media frame
        frame = wp.media({
            title: 'Выберите или загрузите изображения',
            button_img: {
                text: 'Use this Image'
            },
            multiple: true
        });
        
        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
        }
    
        let input = document.querySelector('#thumb_of_realty');
    
        // When an image is selected in the media frame...
        frame.on( 'select', function() {
    
            // Get media attachment details from the frame state
            var attachments = frame.state().get('selection').models;
            var imagesurl = '';
    
            attachments.forEach(function( element, idx, array ){
                imagesurl = imagesurl + element.attributes.url;
                if (idx != array.length - 1){
                    imagesurl = imagesurl + ', ';
                }
            });
    
            console.log(imagesurl);
            input.value = imagesurl;
            document.querySelector('#result').innerHTML = 'Изображения загружены';
        });
    });
})