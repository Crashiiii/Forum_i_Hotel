$(document).ready(function() {
   $.fn.cache_clear();
   setInterval(function(){
      $.fn.cache_clear()},5000);
   });
   $.fn.cache_clear = function(){
      $.get("../api/report/getreport.php", function(data){
      $('#result').html(data);
   });
}
   
