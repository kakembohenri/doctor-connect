
	$(function(){
		
		$password2 = $("#password2");
        $password1 = $("#password1");
        $form = $("#form");


        $form.on("submit",ev=>{
            if($password1.val()!=$password2.val()){
                ev.preventDefault();
                swal("Passwords Must be Equal");
            }
        });

		$password2.on("input",ev=>{
           
			value = ev.target.value;

            if(value!==$password1.val()){
                $password2.css({
                    "border":"1px solid red"
                });

                console.log($password1.val())
            }else{
                $password2.css({
                    "border":"none"
                });

               
            }
		});

        
	
	});
