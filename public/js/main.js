$(".card").click(function(){
    window.location.reload();
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