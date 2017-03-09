<?php
//fibonacci là dãy số mà các phần tử bắt đầu từ 0 1, các phần tử tiếp theo sẽ có giá trị bằng tổng của 2 phần tử phía trước nó
//in ra day so fibonaccy nho hon n
$n = 1000;

//luu vao mang
function fibonacci1($n)
{
	$fibonacci = [0,1];
	$key = 1;
	
	//last values of day fibonacci
	$last1 = 0;
	$last2 = 1;
	$value = 1;
	$n = $n - 2;
	while($value <= $n)
	{ 
		$value = $last1 + $last2;
		// if($value >= $n)
		// 	break;
		$key++;
		$fibonacci[$key] = $value;
		
		//reset last values
		$last1 = $last2;
		$last2 = $value;
	}
	unset($fibonacci[$key]);
	return $fibonacci;
}
//echo 'Luu vao mang: <br>';
// echo '<pre>';
// print_r(fibonacci1($n));
// echo '</pre>';


//in ra trực tiếp
function fibonacci2($n)
{
	$last1 = 0;
	$last2 = 1;
	// $value = 1;
	echo $last1.'<br>'.$last2.'<br>';
	do {
		$value = $last1 + $last2;
		$last1 = $last2;
		$last2 = $value;
		if($value <= $n)
		echo $value.'<br>';
	} while ($value <= $n);
}


//recursive, phải chạy từ dưới lên, từ trên xuống sẽ tốn bộ nhớ, giảm hiệu năng
function fibo($want, $a = array()) {
    // Set first levels if not set.
    if(!isset($a[0]) || $a[0] != 0) $a[0] = 0;
    if(!isset($a[1]) || $a[1] != 1) $a[1] = 1;
    
    // count levels
    $t = count($a);

    // Add last two numbers - the Fibonacci ratio
    $a[] = $a[$t-1] + $a[$t-2];

    // See if we've reached the level we want
    if($want >= count($a)) return fibo($want, $a);
    return $a;
   }

// $f = fibo(10);
// print_r($f);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fibonacci</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					Luu vao mang roi in ra:<br>
					<?php 
						echo '<pre>';
						print_r(fibonacci1($n));
						echo '</pre>';
						// printf("xuong dong \n test");
						echo "xuong\ndong";
					?>
				</div>
				<div class="col-sm-4">
					In ra truc tiep<br>
					<?php fibonacci2($n); ?>
				</div>
				<div class="col-sm-4">
					De quy:<br>
					<?php
					echo '<pre>';
					print_r(fibo(20));
					echo '<pre>';
					?>
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>