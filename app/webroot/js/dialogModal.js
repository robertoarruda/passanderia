$('document').ready(function(){
  $('#modalDialog').on('show', function(){
      $('.modal-body:first').css({
        'overflow': 'visible',
        'width': 'auto',
        'height': 'auto',
        'max-width': '100%',
        'max-height': '100%'
       });
  });
  $('#modalDialog').on('hidden', function(){
     $(this).removeData('modal');
     $('.modal-body', this).html('');
  });
});