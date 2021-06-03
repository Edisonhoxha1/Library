<?php
function trimContent($content, $length){ 

if(!isset($length) || $length==""){
	(int)$length = 50;
}
	if($content != ""){
		$trim_content = substr($content, 0, (int)$length);
		echo $trim_content."...";
	}
}

function discountPrice($price, $discount){

	If($discount == 0 || $discount == ""){

      	echo "<span class='actual-amount'>".$price." Leke</span>";
      	

	}else{

		$discounted_price = $price-($price*$discount/100);
		
		echo '<span class="amount">'.$price.' Leke</span>';
		echo '<span class="actual_amount">'.$discounted_price.' Leke</span>';

	}
}

?>
