$('#newApikey').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var modal = $(this);

  var error = "";
  
  modal.find('.modal-footer #buttonCreate').on("click",function(){
      
      
      var data = {
          name: modal.find(".modal-body #nameApikey").val(),
      };
      
      $.post( "ajax/createApikey", data)
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Create error");
        });     
  });
});

$('#deleteApikey').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var api_id = button.data('id'); // Extract info from data-* attributes
  var modal = $(this);

  modal.find('.modal-footer #buttonDelete').on("click",function(){

    $.getJSON( "ajax/deleteApikey/"+api_id)
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Delete error");
        });
  }); 
}); 

$('#regenerateApikey').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var api_id = button.data('id'); // Extract info from data-* attributes
  var modal = $(this);

  modal.find('.modal-footer #buttonUpdate').on("click",function(){

    $.getJSON( "ajax/regenerateApikey/"+api_id)
        .done( function(){
          location.reload();
        })
        .fail( function(){
          alert("Delete error");
        });
  }); 

  

});