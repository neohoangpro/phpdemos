<?php 
/*
A zero-indexed array A consisting of N different integers is given. The array contains integers in the range [1..(N + 1)], which means that exactly one element is missing.

Your goal is to find that missing element.

Write a function:

class Solution { 
public int solution(int[] A); 
}

that, given a zero-indexed array A, returns the value of the missing element.

For example, given array A such that:

  A[0] = 2
  A[1] = 3
  A[2] = 1
  A[3] = 5

the function should return 4, as it is the missing element.

Assume that:

N is an integer within the range [0..100,000];
the elements of A are all distinct;
each element of array A is an integer within the range [1..(N + 1)].

Complexity:

expected worst-case time complexity is O(N);
expected worst-case space complexity is O(1), beyond input storage (not counting the storage required for input arguments).

Elements of input arrays can be modified.
*/

class Solution
{
	//cach 1
	public function findMissingElement1($A = [])
	{
		$N = count($A);
		for ($i=1; $i < $N+1 ; $i++) {
			$result = 1; 
			for ($j=0; $j < $N; $j++) { 
				if($i == $A[$j]) {
					$result = 0;
					break;
				}
			}
			if($result == 1) {
				$missingElement = $i;
				break;
			}
		}
		return $missingElement;
	}

	//cach 2
	public function findMissingElement2($A) 
	{
        asort($A);
        $A2 = array_values($A);
        $l = count($A2);
        $missing = $l+1;
        if ($l == 0)
        	return $missing = 1;
        for ($i=0; $i<$l; $i++)
        {
            if ($A2[$i] != $i+1) {
             	$missing = $i+1;
             	break;
            }
        }
        return $missing;
    }

	//cach 3
	public function findMissingElement3($A) 
	{
	    $N = count($A);
	    $s = ($N + 2) * ($N + 1) / 2;
	    for ($i = 0; $i < $N; $i++) {
	        $s -= $A[$i];
	    }
	    return intval($s);
	}
}

$test = new Solution;
$A = [1,2,3,5,6,4,7,9,11,8,12,13];

echo 'Missing Element: <br>';
echo 'Cach 1: '.$test->findMissingElement1($A);

echo '<br>Cach 2: ';
echo $test->findMissingElement2($A);

echo '<br>Cach 3: ';
echo $test->findMissingElement3($A);
?>