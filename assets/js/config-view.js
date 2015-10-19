
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


  }).done(function(){

    modal.find('.modal-footer #buttonEdit').on("click",function(){
        
        if(modal.find(".modal-body #sslEditCheckbox").is(":checked"))
          ssl = true;
        else
          ssl = false;

        var data = {
            id: redirection_id,
            name: modal.find(".modal-body #nameEditInput").val(),
            description: modal.find(".modal-body #descriptionEditInput").val(),
            port: modal.find(".modal-body #portEditInput").val(),
            ssl: ssl};
        
        $.post( "ajax/updateRedirection", data)
          .done( function(){
            location.reload();
          })
          .fail( function(){
            alert("Create error");
          });        

    });

  }).fail(function(){
    alert("Error on load redirection data");
  });

});


$('#deleteRedirection').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var redirection_id = button.data('id'); // Extract info from data-* attributes
  var modal = $(this);
  
  modal.find('.modal-footer #buttonDelete').on("click",function(){

    $.getJSON( "ajax/deleteRedirection/"+redirection_id)
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Delete error");
        });
  }); 

});


$('#newRedirection').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var modal = $(this);

  var error = "";
  
  modal.find('.modal-footer #buttonCreate').on("click",function(){
      
      if(modal.find(".modal-body #sslEditCheckbox").is(":checked"))
        ssl = true;
      else
        ssl = false;

      var data = {
          name: modal.find(".modal-body #nameEditInput").val(),
          description: modal.find(".modal-body #descriptionEditInput").val(),
          port: modal.find(".modal-body #portEditInput").val(),
          ssl: ssl};
      
      $.post( "ajax/createRedirection", data)
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Create error");
        });     
  });
});

$('#changeIp').on('show.bs.modal', function (event) {

  var modal = $(this);

  modal.find('.modal-footer #buttonChangeIp').on("click",function(){
      
      var data = {
          ip: modal.find(".modal-body #addressIp").val(),
      };
      
      $.post( "ajax/forceIp", data)
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Change error");
        });     
  });
  

});

$('#updateIp').on('show.bs.modal', function (event) {

  var modal = $(this);

  modal.find('.modal-footer #buttonUpdateIp').on("click",function(){      
      
      $.getJSON( "ajax/updateIp/")
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Update error");
        });
  });

  

});

$("#changeIpButtonForm").on("click", function(e) {
    e.preventDefault();
});
$("#updateIpButtonForm").on("click", function(e) {
    e.preventDefault();
});