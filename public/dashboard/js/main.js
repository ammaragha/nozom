// // Delete bottom confirm
// $('#confirm').confirm({
//     title: 'Delete user?',
//     autoClose: 'Cancel|8000',
//     buttons: {
//         confirm: function () {
//             alert('here');
//                 $(this).parents('form:first').submit();
                
//             },
//         Cancel: function () {
//             $.alert('action is canceled');
//         }
//     }
// });
// $('.myForm').submit(function (e) {
//     var form = $(this);    // reference to the current scope


//     var dd = $.confirm({
//         autoClose: 'cancel|8000',
//         message: 'Do you really want to submit the form?',
//         confirm: function() {

//             return true;
//         },
//         cancel: function() {}
//     });

//     if(!dd){
//         return false;
//     }



// });


$('.confirm').click(function () {
    return confirm('are You sure you?');
})

// Alert fade action
$(document).ready(function() {
  $(".alert").fadeTo(2000, 500).slideUp(500, function() {
      $(".alert").slideUp(500);
    });
});


//match passwords
function match() {
    var pass = $('#pass').val();
    var rePass = $('#rePass').val();

    if(pass != rePass){
        $("#match").show().html('Not matched');
    }else{
        $('#match').hide();
    }
 }

 $(document).ready(function () {
    $("#rePass").keyup(match);
    
})


// check if email exists
// function checkEmail(element){
//     var email = $(element).val();
//     $.ajax({
//         type: "POST",
//         url: '{{ url('\dash\checkemail') }}',
//         data: {email: email},
//         dataType: "json",
//         success: function(res) {
//             if(res.exists){
//                 alert('true');
//             }else{
//                 alert('false');
//             }
//         },
//         error: function (jqXHR, exception) {

//         }
//     });
// }


$(document).ready(function() {
    $('.disl').prop("disabled", true);

    $('#pass').blur(function()
    {
        if( $.trim(this.value).length ) {
              $('.disl').prop("disabled", false);
        }else{
            $('.disl').prop("disabled", true);
        }
    }); 
});

