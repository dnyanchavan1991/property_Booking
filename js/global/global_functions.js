function  checkLogin(page){
 
		
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

function  checkLogout(page){
	 
	if(confirm("Do you want to Logout?")){
		var form = $(document.createElement('form'));
		$(form).attr("action",logout_url);
		$(form).attr("method", "POST");

		form.appendTo( document.body )

		$(form).submit();
		
		
		return false;

	} else {
		
		return false;
	}
	 
}
	

