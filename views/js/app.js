$(document).ready(function(){
    
    function get_filtre_text(text_id){

    $(".product_check").click(function(){
        $("#loader").show();

        var action = 'data';
        var music = get_filter_text('music');
        var cinema = get_filter_text('cinema');
        var sport = get_filter_text('sport');
        var travail = get_filter_text('travail');
        var alimentation = get_filter_text('alimentation');
        var culture = get_filter_text('culture');
        var bar = get_filter_text('bar');
        var festival = get_filter_text('festival');
        var loisir = get_filter_text('loisir');

        $.ajax({
            url:'action.php', 
            method:'POST', 
            data:{action:action,music:music, cinema:cinema, sport:sport, 
                travail:travail, alimentation:alimentation, culture:culture, 
                bar:bar, festival:festival, loisir:loisir},
                succes:function(response){
                    $("#annonces").html(response);
                    $("loader").hide();
                }
        })
    });

    function get_filter_text(text_id){
        var filtreData = [];
        $('#'+text_id+':chehcked').each(function(){
            filtreData.push($(this).val());
        });
        return filtreData;
});