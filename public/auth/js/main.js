$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });

 $('.section').delay(3000).fadeOut('500');

 
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