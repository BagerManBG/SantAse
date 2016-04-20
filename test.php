<pre>
<?php 

	$arr = array('9_c','10_h','10_s','13_d','10_d','9_d');

	$arr2 = array(
		explode('_', $arr[0]),
		explode('_', $arr[1]),
		explode('_', $arr[2]),
		explode('_', $arr[3]),
		explode('_', $arr[4]),
		explode('_', $arr[5]),);

	foreach ($arr2 as $key => $val) 
	{
		$arr2[$key][1] = ord($val[1]);

		if($arr2[$key][1] == ord('h'))
			{
				$arr2[$key][1] = ord('x');
			}
	}

	for($i = 0; $i <= count($arr2); $i++)
	{
		for($j = 0; $j < count($arr2)-1; $j++)
		{
			if($arr2[$j][1] > $arr2[$j+1][1])
			{
				$swap = $arr2[$j];
				$arr2[$j] = $arr2[$j+1];
				$arr2[$j+1] = $swap;
			}
		}
	}

	for($i = 0; $i <= count($arr2); $i++)
	{
		for($j = 0; $j < count($arr2)-1; $j++)
		{
			if($arr2[$j][0] > $arr2[$j+1][0] && $arr2[$j][1] == $arr2[$j+1][1])
			{
				$swap = $arr2[$j];
				$arr2[$j] = $arr2[$j+1];
				$arr2[$j+1] = $swap;
			}
		}
	}

	foreach ($arr2 as $key => $val) 
	{
		$arr2[$key][1] = chr($val[1]);

		if($arr2[$key][1] == 'x')
			{
				$arr2[$key][1] = 'h';
			}
	}

	$arr1 = array(
		implode('_', $arr2[0]),
		implode('_', $arr2[1]),
		implode('_', $arr2[2]),
		implode('_', $arr2[3]),
		implode('_', $arr2[4]),
		implode('_', $arr2[5]),);

	print_r($arr);
	print_r($arr1);
?>