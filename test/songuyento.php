<?php
//số nguyên tố là số chỉ chia hết cho 1 và chính nó

//hàm kiểm tra có phải số nguyên tố hay ko
function isPrime($so)
{
	if($so < 2)
		return false;
	else
	{
		$n = sqrt($so);
		for ($i=2; $i <= $n ; $i++) { 
			if($so % $i == 0) return false;
		}
	}
	return true;
}

function dequyPrime($so, $i=2)
{
	if($so < 2)
		return false;
	else
	{
		$n = sqrt($so);
		if($i <= $n)
		{
			if($so % $i == 0) return false;
			else
				return dequyPrime($so, $i+1);
		}
	}
	return true;
}

for ($i=1; $i < 100 ; $i++) { 
	if(dequyPrime($i)) echo $i.'<br>';
}
?>