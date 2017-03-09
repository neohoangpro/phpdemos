<?php 
//viet ham tinh giai thua binh thuong
//n! = n*(n-1)!;
//vidu: 6! = 6*5*4*3*2*1

$n = 6;
$giaithua = 1;
for ($i=1; $i <= $n; $i++) { 
	$giaithua = $giaithua * $i;
}
echo 'Tinh giai thua theo cach thong thuong: '. $n .'!= ';
echo $giaithua;
//print ('cai lon \n rat to');

//$hello = print("Hello boy");

//echo $hello;

//tra ve gia tri ascii
//echo ord(' ');

// echo trim('   freetuts.neth   ');
// $test = trim('to cai lon','to');
// echo $test;

echo '<br>';

class gt
{
	function giaithua($n)
	{
		if($n <= 1)
			return 1;
		else
			return $n * $this->giaithua($n-1);
	}
}

$n = 6;
$so = new gt;
echo $so->giaithua($n);

?>