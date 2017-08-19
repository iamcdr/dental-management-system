<?php

/*** make sure this is set ***/
date_default_timezone_set('Asia/Manila');

/**
 *
 * Get the age of a person in years at a given time
 *
 * @param       int     $dob    Date Of Birth
 * @param       int     $tdate  The Target Date
 * @return      int     The number of years
 *
 */
function getAge( $dob, $tdate )
{
        $finalage = 0;
        while( $tdate > $dob = strtotime('+1 year', $dob))
        {
                ++$finalage;
        }
        return $finalage;
}

/*** a date before 1970 ***/
$dob = strtotime("$birthday");

/*** another date ***/
$tdate = strtotime(date("Y-m-d"));

/*** show the date ***/
$age = getAge( $dob, $tdate );

?>
