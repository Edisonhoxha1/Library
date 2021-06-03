// registered.php
    		function controlPassword(){
    			var password = document.getElementById('password').value;
    			
    			var confirm_password = document.getElementById('confirm_password').value;
    			

    			if(password !== confirm_password){
    				document.getElementById('miss_match_password').innerHTML='<div class="alert alert-danger" role="alert">Password does not match!</div>';
    				document.getElementById('button').disabled=true;
    				
    			}

    		}

    		function validatePassword(){
    			var password = document.getElementById('password').value;
    			var validation=  /^[0-9a-zA-Z]+$/;
    			var n = password.length;

    			if(n<3 || !password.match(validation)){
    				document.getElementById("invalid_password").innerHTML='<div class="alert alert-danger" role="alert">Invalid Password!</div>';
    			}

    			
    		}

    		function manage(txt){
    			var bt = document.getElementById('submit');
    			var ele = document.getElementsByTagName('input'); 
    			

    			for(let i=0; i<ele.length; i++){
    				

    				if(ele[i].type == 'text' && ele[i].value == "" ){
    					bt.disabled = true;
    					return false;
    				}
    				else{
    					bt.disabled = false;
    				}
    			 }
    		}

//     		function invalid(){
//     			var class_div = document.getElementByClassName('invalid-feedback');
//     			var class_input = document.getElementByTagName('input');
// console.log(class_input);
//     			for(let i=0; i<class_input.length; i++){

//     				if(class_input[i].type == 'text' && class_input[i].value == ""){
    					
//     					document.getElementByClassName('invalid-feedback').onkeyup =function(){
//     						replaceClass('valid-feedback');
//     					}
//     			}
//     		}

// homepage_admin.php
  $(document).ready(function(){
        $("#checkAll").click(function(){
            if($(this).is(":checked")){
                $(".checkItem").prop('checked',true);
            }
            else{
                $(".checkItem").prop('checked',false);
            }
        });
    });
