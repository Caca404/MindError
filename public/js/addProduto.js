$("#nextPageForm").click(function () {
    var formData = new FormData();
    formData.append('nome', $("#nome").val());
    formData.append('preco', $("#preco").val());
    formData.append('tipo', $("#tipo").val());
    formData.append('descricao', $("#descricao").val());

    $("main form").parent().first().attr("id", "drop-area");

    $("#drop-area").on("dragenter dragover dragleave drop", function(e){
        e.preventDefault();
        e.stopPropagation();
    });

    $("#drop-area").on("dragenter dragover", function() {
        $(this).addClass('highlight');
    });
    
    $("#drop-area").on("dragleave drop", function() {
        $(this).removeClass('highlight')
    });

    $("#drop-area").on("drop", function(e) {
        let dt = e.originalEvent.dataTransfer;
        let files = dt.files;
    
        handleFiles(files);
    });

    $.ajax({
        url: "/getImagemInput",
        method: "GET",
        dataType: "html"
    }).done(function (response) {
        console.log(response);
        $("main form").empty();
        $("#titleForm").text("Adicionar Imagens");
        $("main form").append(response);

    }).fail(function (jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    });


    // for (var pair of formData.entries()) {
    //     console.log(pair[0] + ', ' + pair[1]);
    // }
});

function handleFiles(files) {

    $.ajax({
        url: "/getCarrosselImgs",
        method: "GET",
        dataType: "html"
    }).done(function (response) {
        console.log(response);
        var itemCarousel = "";
        var divCarouselItem = "";
        var img = "";

        $("main form").parent().first().attr("id", "");
        $("main form").empty();
        $("main form").append(response);

        $(files).each(function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                divCarouselItem = document.createElement("div");
                $(divCarouselItem).addClass("carousel-item");
                if($(".carousel-inner").children().length == 0) $(divCarouselItem).addClass("active");

                img = document.createElement("img");
                $(img).addClass("d-block w-100");
                $(divCarouselItem).append($(img));
                
                $(img).attr('src', e.target.result);
                $(img).hide();
                $(img).fadeIn(650);

                $(".carousel-inner").append(divCarouselItem);
            }
            reader.readAsDataURL($(this)[0]);
        });

    }).fail(function (jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    });
}

// function handleFiles(files) {
//     ([...files]).forEach(uploadFile)
// }

// function uploadFile(file) {
//     let url = 'YOUR URL HERE'
//     let formData = new FormData()

//     formData.append('file', file)

//     fetch(url, {
//         method: 'POST',
//         body: formData
//     }).then(() => {
//         /* Done. Inform the user */
//     }).catch(() => {
//         /* Error. Inform the user */
//     })
// }

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             $('#imagePreview').css('background-image', 'url('+e.target.result +')');
//             $('#imagePreview').hide();
//             $('#imagePreview').fadeIn(650);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $("#imageUpload").change(function() {
//     readURL(this);
// });