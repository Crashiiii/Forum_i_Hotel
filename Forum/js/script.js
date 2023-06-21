$(document).ready(function() {
    $( "#FormZgl" ).submit(function( event ) {
        event.preventDefault();
        let $form = $( this ),
        term = $form.find( "textarea[name='contents']" ).val();
        $.post( "../api/report/insertreport.php", { contents: term } );
        console.log(term);
        $('textarea').val('');
      });
   });
