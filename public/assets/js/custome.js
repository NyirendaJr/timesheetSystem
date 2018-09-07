$(document).ready(function(){
  $('.deleteId').click(function(){
    var documentId = $('.deleteId').attr('id');
    var deleteId = $('#documentId').val(documentId);
    var docFormAction = $("#docFormUrl").attr("action");
    // set form action
    $('#docFormUrl').attr('action', docFormAction + documentId);
    $('#deleteDocument').modal('show');
  });
});
