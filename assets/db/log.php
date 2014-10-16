<?php
include 'config.php';
include 'opendb.php';

//Params
$case=array();

$SQL_LOG= 'SELECT c.abr_name, ct.name, cs.action, cs.date, cs.id FROM `cases` as cs, `country` as c, `case_type` as ct WHERE cs.country=c.id AND ct.id=cs.type ORDER BY cs.date DESC';
if($result = mysqli_query($conn, $SQL_LOG) or die ("Mysql access error LOG")){
	$i=0;
	while( $row= mysqli_fetch_row($result)){
		$case['abr_country'][$i]=$row[0];
		$case['type'][$i]=$row[1];
		$case['action'][$i]=$row[2];
		$case['date'][$i]=$row[3];
		$SQL_REF='SELECT u.url, u.title FROM `cases` as cs, `urls`as u WHERE cs.id='.$row[4];
		if($result_ref = mysqli_query($conn, $SQL_REF) or die ("Mysql access error REF")){
			$y=0;
			while( $row_ref= mysqli_fetch_row($result_ref)){
				$case['ref'][$i]['url'][$y]=$row_ref[0];
				$case['ref'][$i]['title'][$y]=$row_ref[1];
				$y++;
			}
		}
		$i++;
	}
}
include 'closedb.php';
?>


