$(function(){
 $('.deleteId').click(function(){
   var documentId = $(this).attr('id');
   var formAction = $('#formUrl').attr('action');
   var deleteId = $('.documentId').val(documentId);
   // change form action
   $('#formUrl').attr('action', + formAction + documentId);
   // console.log('id: ' + documentId + ' action: ' + formAction);
   $('#deleteDocument').modal('show');
 });



  $('#formUrl').submit(function(e){
    e.preventDefault();
    var deleteId = $('.documentId').val();
    var formData = $(this).serialize();
    $.ajax({
      url: '/sentdocs/' + deleteId,
      method: 'post',
      data: formData,
      success:function(){
         $('#deleteDocument').modal('hide');
      }
    })
  })


});
