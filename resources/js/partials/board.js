$(function() {
  $('#search_title_text').focus(function(){
    $('.searchclear').removeClass("d-none");
  });

	$('.searchclear').click(function(){
    $('#search_title_text').val('');
    $('.searchclear').addClass("d-none");
  });
})