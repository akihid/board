require('./bootstrap');

import marked from 'marked';

$(document).on('click', '#test-user-login-btn', function() {
  var login_email = 'test@co.jp';
  var login_password = 'password';

  var login_email_form = document.querySelector('#email');
  var login_password_form = document.querySelector('#password');

  login_email_form.value = login_email;
  login_password_form.value = login_password;

  document.querySelector('#login-btn').click();
  
});


$(function() {
	marked.setOptions({
		langPrefix: '',
		breaks : true,
		sanitize: true,
  });

	$('#markdown_editor_textarea').keyup(function() {
		var html = marked(getHtml($(this).val()));
    $('#markdown_preview').html(html);
    highlight();
  });

  if($('.item-body').length){
    var target = $('.item-body')
    var html = marked(getHtml(target.html()));
    $('.item-body').html(html);
    highlight();
  };

	// 比較演算子が &lt; 等になるので置換
	function getHtml(html) {
		html = html.replace(/&lt;/g, '<');
		html = html.replace(/&gt;/g, '>');
		html = html.replace(/&amp;/g, '&');
		return html;
  }
  
  function highlight() {
    $('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
	}
});