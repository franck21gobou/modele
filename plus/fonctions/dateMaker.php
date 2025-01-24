<?php 
function dateMaker($date, $format = '%A %d %B %Y' /* '%A %d %B %Y, %I:%M' */)
{
    setlocale(LC_TIME,['fr', 'fra', 'fr_FR']);
   // date_default_timezone_set('UTC');
    if($date == '') return "";
    else 
    {//return date($format, strtotime($date));
        
        try {
            $fmt = datefmt_create('fr_FR', IntlDateFormatter::FULL,  IntlDateFormatter::FULL, 'UCT',   IntlDateFormatter::GREGORIAN);
            return datefmt_format($fmt, strtotime($date));
        } catch (\Throwable $th) {
            return utf8_encode(strftime($format, strtotime($date)));
        }
   // 
  }

}