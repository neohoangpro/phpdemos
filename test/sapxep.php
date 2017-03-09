<?php 
//sap xep mot mang theo thu tu tang dan

$a = [21,3,7,18,5,9,12,8,6];
$n = count($a);
for ($i=0; $i <$n ; $i++) { 
	for ($j=$i + 1; $j <= $n-1 ; $j++) { 
		if($a[$j] < $a[$i])
		{
			$tg = $a[$i];
			$a[$i] = $a[$j];
			$a[$j] = $tg;
		}
	}
	echo $a[$i].'<br>';
}

?>