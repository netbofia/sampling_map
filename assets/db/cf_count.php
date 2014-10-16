<?php
include 'config.php';
include 'opendb.php';

//Params
$europe_confirmed=0;
$america_confirmed=0;


$SQL_COUNT_EUROPE= 'SELECT (SUM(IF(c.type=2,1,0)) + SUM( IF(c.type=5,-1,0)) + SUM( IF(c.type=4,1,0)) + SUM( IF(c.type=6,-1,0)) + SUM( IF(c.type=3,-1,0))) as Confirmed  FROM `cases` as c, `continent` as ct WHERE ct.name="Europe" AND ct.country=c.country';
if($result = mysqli_query($conn, $SQL_COUNT_EUROPE) or die ("Mysql access error COUNT CONFIRMED EU")){
	while( $row= mysqli_fetch_row($result)){
		$europe_confirmed = $row[0];
	}
}
$SQL_COUNT_AMERICA= 'SELECT (SUM(IF(c.type=2,1,0)) + SUM( IF(c.type=5,-1,0)) + SUM( IF(c.type=4,1,0)) + SUM( IF(c.type=6,-1,0)) + SUM( IF(c.type=3,-1,0))) as Confirmed  FROM `cases` as c, `continent` as ct WHERE ct.name="America" AND ct.country=c.country';
if($result = mysqli_query($conn, $SQL_COUNT_AMERICA) or die ("Mysql access error COUNT CONFIRMED US")){
        while( $row= mysqli_fetch_row($result)){
                $america_confirmed = $row[0];
        }
}
include 'closedb.php';
?>


