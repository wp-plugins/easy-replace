/******* Jquery No Conflict Function *******/
window.$ = jQuery.noConflict();

var ERForm = {

  settings:
  {
    formObj  : null,
  },

  post: function(FormId)
  {    
    ERForm.settings.formObj = $(FormId);

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: ERForm.settings.formObj.serialize(),
      success: function(data, status) 
      {
        if (data.status == true) 
        {
          $('.er_success_msg p').html(data.msg);
          $('.er_success_msg').fadeIn(1000).siblings('.er-msg').hide();
          $(FormId)[0].reset();
        } 
        else 
        {
          $('.er_error_msg p').html(data.msg);
          $('.er_error_msg').fadeIn(1000).siblings('.er-msg').hide();
        }
      },
      error: function() 
      {
        $('.er_error_msg p').html(data.msg);
        $('.er_error_msg').fadeIn(1000).siblings('.er-msg').hide();
      }                        
    }); 
  }
};
