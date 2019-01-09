<?php

function arrayPrepare($array, $signe) {

	$result = '';

	foreach ($array as $key => $value) {
		if ($key)
			$result .= ', '.$signe.$value.'';
		else
			$result .= ''.$signe.$value.'';
	}

	return $result;
}

function arrayExecute($columnArray, $valueArray)
{
	$newArray = array();

	foreach ($columnArray as $key => $value) {
		$bindParam = '":'.$value.'" => "'.$valueArray[$key].'"';
		array_push($newArray, $bindParam);
	}
	var_dump($newArray);
	return $newArray;
}

function setArrayFct($column, $value)
{
	$array = array();
	if (count($column) === count($value))
	{
		for ($i = count($value) - 1; $i >= 0 ; $i--) { 
			array_push($array, $column[$i].' = "'.$value[$i].'"');
		}
	}
	return $array;
}

function dateActuel($datePost)
{
	$now = strtotime(date("Y-m-d H:i:s"));
	$datePost = strtotime($datePost);	
	$diff = $now - $datePost;

	if ($diff < 60)
		return ($diff.' sec');
	else if ($diff < 3600)
		return (round($diff/60).' min');
	else if ($diff < 86400)
		return (round($diff/3600).' heures');
	else if ($diff < 604800)
		return (round($diff/86400).' jours');
	else if ($diff < 31557600)
		return (round($diff/604800).' semaines');
	else
		return (round($diff/31557600).' annees');
}

?>