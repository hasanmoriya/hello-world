$(document).ready(function(){

$("#fr").validate({
	 rules:{

				'name':{
					required: true,
					minlength: 5
					},
				'email':{
					required:true,
					email:true
					// remote:{
					// 	url:"reg.php",
					// 	type: "post"
					// }	
					},

				'phone':{
					required: true,
					minlength: 10
					},

				 'file':{
                required: true
            	}  
				

		   	},
	message:{
			    'name':{
					required: "The name field is mandatory!",
					minlength: "Choose a username of at least 1 letters!",
					},
				'email':{
					required:"The Email is required!",
					email:"Please enter a valid email address!"
					//remote: "The email is already in use by another user!"
						},
				'file':{
               required: 'Please select the image!'  
            	}
			}
	});
});