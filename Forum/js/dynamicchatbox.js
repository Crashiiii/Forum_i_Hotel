$(document).ready(function() {
    $.fn.cache_clear();
    setInterval(function(){
       $.fn.cache_clear()},5000);
    });
    let guildid=null;
    guildid = $('#guildid').text();
    if(guildid == ""){
      guildid=null;
    }
    console.log(guildid);
    $.fn.cache_clear = function(){
       $.get("../api/chatbox/getchatbox.php?guildid=" + guildid, function(data){
       $('#result').html(data);
    });
 }
    
 