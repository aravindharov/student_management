function readURL(input,filetype,identifier,addClass='',removeClass='',src='') {
  	if (input.files && input.files[0]) {
		var inarray=$.inArray(input.files[0].type,filetype);
  		if (inarray>=0) {	
    		var reader = new FileReader();
    		reader.onload = function(e) {
     			$(identifier).attr('src', e.target.result);
      			$(identifier).removeClass(removeClass);
  			}
    		reader.readAsDataURL(input.files[0]);
    	}
    	else
    	{
    		swal.fire('Select valid File extension', "", "error").then(function(result){
           		if (result.value) {
           		  $(identifier).attr('src', src);
      				  $(identifier).addClass(addClass);
           	 	}
             })
      }
  }
  else{
  	 $(identifier).attr('src', src);
      $(identifier).addClass(addClass);
  }

}