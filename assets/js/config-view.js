
$('#editRedirection').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var redirection_id = button.data('id'); // Extract info from data-* attributes
  var modal = $(this);
  
  $.getJSON( "ajax/redirection/"+redirection_id, function( data ) {
  	
  	redirection = data[0];

  	modal.find('.modal-title').text('Editar ' + redirection["config_name"]);
  	modal.find('.modal-body #nameEditInput').val(redirection["config_name"]); 	
  	modal.find('.modal-body #descriptionEditInput').val(redirection["config_description"]);
  	modal.find('.modal-body #portEditInput').val(redirection["config_value"]);
  	if(redirection["config_type"] == "redirection_ssl")
  	{
  		modal.find('.modal-body #sslEditCheckbox').prop('checked', true);
  	}else
  	{
  		modal.find('.modal-body #sslEditCheckbox').prop('checked', false);
  	}


  });
});