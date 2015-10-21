
$(".redirectionButton").on("click",function(event){

  	var redirection_id = $(this).attr('data-id'); // Extract info from data-* attributes

	$.getJSON( "ajax/goRedirection/"+redirection_id);

});