function  checkLogin(page){
	var name = '';
	if(name !='') {
		return true;
	} else {
		
		var form = $(document.createElement('form'));
		$(form).attr("action",login_url);
		$(form).attr("method", "POST");

		var input = $("<input>")
		    .attr("type", "text")
		    .attr("name", "page")
		    .val(page );


		$(form).append($(input));

		form.appendTo( document.body )

		$(form).submit();
		
		
		return false;
		
	}
}
	

