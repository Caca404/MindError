$(".carousel-inner, .card-body, .cardImgDefault").click(function(){
    var id = $(this).closest(".card").attr("data-id");
    location.href = "/produto/"+id;
});

$(".dropdown-toggle").mouseenter(function(){
    $(".dropdown-toggle").each(function(){
        (new bootstrap.Dropdown($(this))).hide();
    });
    (new bootstrap.Dropdown($(this))).show();
    $(this).css('outline', 'none');
});

$(".tamanhos div").click(function(){
    $(".tamanhos div").each(function(){
        if($(this).hasClass('clicked')) $(this).removeClass('clicked');
    });

    $(this).addClass('clicked');
});