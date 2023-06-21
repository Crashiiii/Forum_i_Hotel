$(document).ready(function() {
    $( "#Formchatbox" ).submit(function( event ) {
        event.preventDefault();
        let $form = $( this );
        let term = $form.find( "textarea[name='text']" ).val();
        let guildid=null;
        guildid = $('#guildid').text();
        if(guildid == ""){
          guildid=null;
        }
        $.post( "../api/chatbox/insertchatbox.php", { text: term, guildid: guildid } );
        console.log(guildid + "aaa");
        $('textarea').val('');
      });
   });
