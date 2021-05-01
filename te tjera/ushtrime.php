<!DOCTYPE html>
<html>

<head>
	
	<script type="text/javascript">





		
		// function myfunction1(fjala,shkronja){

		// 	let count=0;
		// 	for(let i=0; i<fjala.length; i++){
		// 		if(fjala[i]==shkronja){
		// 			count++;
		// 		}

		// 	}
		// 	document.getElementById("result").innerHTML=count;
		// }

		// function myfunction(myarray, numri){
           
  //        var str=myarray.toString();
  //        console.log(str);
  //        var clear_str=str.replace('1' , 'a');
  //        console.log(clear_str);



		// 	let count=0;
		// 	for(let i=0; i<myarray.length; i++){
		// 		if(myarray[i]==numri){
		// 			count++;
		// 		}

		// 	}
		// 	document.getElementById("result").innerHTML=count;
		// }




// function manage(text){
//     			var btn = document.getElementById('button');
//     			var ele = document.getElementsByTagName('input');
//for ne array
    			// const array=["a","b","c","d"];
    			// for(let i=0; i<array.length; i++){
    			// 	let element=array[i];

    			// 	console.log(element);

    			// }

//nr nga 0 ne 10
    			// for(let i=0; i<11; i++){

    			// 	console.log(i);
    			// }

//nr cift
    			// for(let i=0; i<10; i++){
    			// 	if(i % 2 == 0){
    			// 		console.log(i)
    			// 	}
    			// }

//kusht cift
    			// for(let i=0; i<11; i=i+2){
    			// 	console.log(i);
    			// }

//tek
    			// for(let i=1; i<11;i= i+2){
    			// 	console.log(i);
    			// }
// shkronjat e emrit
//     			let emri="edison";
//     			for(let i=0; i<emri.length; i++){
//     				console.log(emri[i]);
//     			}






// emri mbrapsht
// 		let emri="edison";
// 		for(let i=emri.length-1; i>=0; i-- ){
// 			console.log(emri[i]);
// 		}	


	// shfaq shkronjen a	
	// 	let emer="tavolina";
	// 	for(let i=0; i<emer.length; i++ ){

	// 		if(emer[i]=="a"){
	// 			console.log(emer[i]);
	// 		}


	// 	}



		// let emer="tavolina";
		// let count=0;
		// for(i=0; i<emer.length; i++){
		// 	if(emer[i]=="a"){
		// 		count ++;
				

		// 	}

		// }

  //   		}

    	
  function insert(){
  	var input = document.getElementById('list').value;

  		if(input.length != 0){
  			var ul = document.getElementById('ul');
  			var li = document.createElement('li');
  			// var child = ul.children;
  			// if((child.length % 3) == 2){
  			// 	li.setAttribute('style', 'color:red');
  			// }


  		}

  		ul.appendChild(document.createTextNode(input));
  		ul.appendChild(li);

  	// document.getElementById("test").innerHTML = inp;
  }



	</script>
</head>
<body>
	<ul id="ul"> </ul>
<input type="text" name="list" id="list"  />
<input type="button" name="insert"  onclick="insert()" value="insert" />
</html>




