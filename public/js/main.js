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
        $(this).css({
            "background-color" : "rgb("+228+","+228+","+228+")",
            "color" : "black"
        });
    });

    $(this).css({
        "background-color": "rgb("+122+","+0+","+146+")",
        "color" : "white"
    });
});