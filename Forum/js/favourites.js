$(document).ready(function() {
    $(".fav").on("click", function() {
    const akapit = $(this);
    
    $.post("../api/guilds/changeFav.php", { guildid: "'" + akapit.data("dzban") + "'"}, function(data) {
    if (data == "sukces") {
    if(akapit.attr("src")=="https://img.redro.pl/plakaty/serce-puste-400-111066273.jpg" ){
        akapit.attr("src","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIQZY1dz_ST9uLGCTmNpxB9VtJkvXoVdwxt-BSvbLhCuXQdlKT3FPv1Tqw_FCxix8v6jM&usqp=CAU");
    }else{
        akapit.attr("src","https://img.redro.pl/plakaty/serce-puste-400-111066273.jpg");
        console.log(term);
    }
    }
    });
    });
   });