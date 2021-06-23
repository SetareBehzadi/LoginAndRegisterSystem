<?php
namespace App\Helpers;


use App\Classes\validation\Validate;
use App\Models\Device;
use App\Models\Operator;
use App\Models\Restaurant;
use App\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Datetime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Jalalian;
use function foo\func;

//---------------------------------------------------------------------------//


function serverName()
{
    $servName = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'];
    $serverName = 'http://' . $servName . ':' . $port . '/';
    return $serverName;
}

function miladiToShamsi($time, $hour = null)
{
    $miladi = explode(' ', $time);
    if (count($miladi) < 1) {
        $time = date("Y-m-d H:i:s");
        $miladi = explode(' ', $time);
    }
    $miiladi = $miladi[0];
    $fMiladi = explode('-', $miiladi);
    if (count($fMiladi) < 3) {
        $time = date("Y-m-d H:i:s");
        $miladi = explode(' ', $time);
        $miiladi = $miladi[0];
        $fMiladi = explode('-', $miiladi);
    }
    $fMiladiii = \Morilog\Jalali\CalendarUtils::toJalali($fMiladi[0], $fMiladi[1], $fMiladi[2]);
    if ($fMiladiii[1] < 10) {
        $fMiladiii[1] = '0' . $fMiladiii[1];
    }
    if ($fMiladiii[2] < 10) {
        $fMiladiii[2] = '0' . $fMiladiii[2];
    }
    $shamsi = $fMiladiii[0] . '/' . $fMiladiii[1] . '/' . $fMiladiii[2];
    if ($hour) {
        $hour = $miladi[1];
        $shamsi = $fMiladiii[0] . '/' . $fMiladiii[1] . '/' . $fMiladiii[2] . ' - ' . $hour;
    }


    return $shamsi;

}

function shamsiToMiladi($time, $hour = null)
{

    $shamsi = explode('/', $time);
    if (count($shamsi) < 3) {
        if ($hour) {
            return date("Y-m-d") . ' ' . $hour . ':00.000';
        } else {
            return date("Y-m-d");
        }

    }
    try {
        $time = \Morilog\Jalali\CalendarUtils::toGregorian($shamsi[0], $shamsi[1], $shamsi[2]);
    } catch (\Exception $e) {
        if ($hour) {
            return date("Y-m-d") . ' ' . $hour . ':00.000';
        } else {
            return date("Y-m-d");
        }
    }

    if (count($time) < 3) {
        if ($hour) {
            return date("Y-m-d") . ' ' . $hour . ':00.000';
        } else {
            return date("Y-m-d");
        }
    }
    if ($time[1] < 10) {
        $time[1] = '0' . $time[1];
    }
    if ($time[2] < 10) {
        $time[2] = '0' . $time[2];
    }

    $miladi = $time[0] . '-' . $time[1] . '-' . $time[2];
    if ($hour) {
        $miladi = $time[0] . '-' . $time[1] . '-' . $time[2] . ' ' . $hour . ':00.000';
    }

    /* $date = strtotime($miladi);*/
    /* date('Y-m-d H:i:s', $date)*/

    return $miladi;

}


function weekday()
{

    /*  $DayNames1 = array('شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنجشنبه','جمعه');*/

    return [
        'DayNames' => [
            '0' => '1',
            '1' => '2',
            '2' => '3',
            '3' => '4',
            '4' => '5',
            '5' => '6',
            '6' => '7',
            // etc
        ]
    ];

}

/*__________________________________________ date & weekday _______________________________ */

function weekdays()
{

    if (date('D') == 'Sat')
        $weekday = 'شنبه';
    elseif (date('D') == 'Sun')
        $weekday = 'یکشنبه';
    elseif (date('D') == 'Mon')
        $weekday = 'دوشنبه';
    elseif (date('D') == 'Tue')
        $weekday = 'سه شنبه';
    elseif (date('D') == 'Wed')
        $weekday = 'چهارشنبه';
    elseif (date('D') == 'Thu')
        $weekday = 'پنج شنبه';
    elseif (date('D') == 'Fri')
        $weekday = 'چمعه';

    return $weekday;
}


function dayOweek($day){
    switch ($day) {
        case "شنبه":return "0";
            break;

        case "یکشنبه":return "1";
            break;

        case "دوشنبه":return "2";
            break;

        case "سه شنبه":return "3";
            break;

        case "چهارشنبه":return "4";
            break;

        case "پنج شنبه":return "5";
            break;

        case "جمعه":return "6";
            break;


        default:echo "";
    }
}


function dateDay()
{
    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toJalali(date('Y'), date('m'), date('d'));
//    $arraySdateShamsi=$arraySdateMiladi[0].'/'. $arraySdateMiladi[1].'/'. $arraySdateMiladi[2];
    return $arraySdateMiladi[2];
}


function dateYear()
{

    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toJalali(date('Y'), date('m'), date('d'));

    return $arraySdateMiladi[0];
}


/*__________________________________ change date to shamsi ________________________*/

function toPersianDate($date)
{
    $date1 = (explode(" ", $date));

    $date = $date1[0];
    $arrySDateMiladi = (explode("-", $date));
    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi = $arraySdateMiladi[0] . '/' . $arraySdateMiladi[1] . '/' . $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate = $arraySdateShamsi;

    return $sDate;

}

function jalaliDate($date){

    $dateArr = explode('-', $date);

    $arraySdateMiladi=\Morilog\Jalali\CalendarUtils::toJalali($dateArr[0], $dateArr[1], $dateArr[2]);

    return $arraySdateMiladi;
}

function toPersianDateByJsStore($date)
{

    $arrySDateMiladi = (explode("/", $date));
    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi = $arraySdateMiladi[0] . '/' . $arraySdateMiladi[1] . '/' . $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate = $arraySdateShamsi;

    return $sDate;
}


function dayOfweek($date){
//    $sDate = Jalalian::forge($date)->getDayOfWeek();
    $sqDate = date('w', strtotime($date));
    return $sqDate;
}


function toMiladiDate($date)
{

    $sDateShamsi = $date;
    $arrySDateShamsi = (explode("/", $sDateShamsi));
    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toGregorian($arrySDateShamsi[0], $arrySDateShamsi[1], $arrySDateShamsi[2]);
    $sDateMiladiInClass = $arraySdateMiladi[0] . '/' . $arraySdateMiladi[1] . '/' . $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDateMiladi = new DateTime($arraySdateMiladi[0] . '-' . $arraySdateMiladi[1] . '-' . $arraySdateMiladi[2]);//baraye estefade dar jadvale events

    return $sDateMiladiInClass;
}

function toMiladiDateEvent($date)
{

    $sDateMiladi = $date;
    $arrySDateMiladi = (explode("/", $sDateMiladi));
    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi = $arraySdateMiladi[0] . '/' . $arraySdateMiladi[1] . '/' . $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate = $arraySdateShamsi;

    return $sDate;
}

function miladiDateToShmasi($date)
{
    $arrySDateMiladi = (explode("-", $date));
    return $arrySDateMiladi[0];
    $arraySdateMiladi = \Morilog\Jalali\jDateTime::toJalali($arrySDateMiladi[0], $arrySDateMiladi[1], $arrySDateMiladi[2]);
    $arraySdateShamsi = $arraySdateMiladi[0] . '-' . $arraySdateMiladi[1] . '-' . $arraySdateMiladi[2];//baraye zakhire dakhel Class
    $sDate = $arraySdateShamsi;
    return $sDate;
}


function checkedCard($cardId, $operatorCards)
{
    $checked = '';
    $arrayCardIds = array();

    if (in_array($cardId, $operatorCards)) {
        return 'checked';
    } else {
        return '';
    }

}

function dateFormat($baseDate)
{
    $formatDate = $baseDate->format('Y-m-d');
    return $formatDate;
}

function timeFormat($baseDate)
{
    $formatDate = $baseDate->format('H:i:s');
    return $formatDate;
}

function timeFromTimestamp($baseDate){
    $timestamp = $baseDate;
    $splitTimeStamp = explode(" ",$timestamp);
    $date = $splitTimeStamp[0];
    $time = $splitTimeStamp[1];
    return [$time,$date];
}

function classActivePath($path, $isparent = false)
{
    if ($isparent && (Request::segment(2) == NULL) && Request::is($path))
        return 'class="active"';
    else
        return Request::is($path) ? 'class="active"' : '';



}
function limit($value, $offset = 0, $lenghth = 10 , $end = '...')
{
    $text = implode(' ', array_slice(explode(' ',$value), $offset, $lenghth)).$end;
    return $text;

}

function mediaFormat($mediaName) {
    $format = strtolower(strrchr($mediaName, '.'));
    if ($format == ".jpg" || $format == ".jpeg") {
        $mediaType='image';
    } else {
        $mediaType='video';
    }
    return $mediaType;
}

/*__________________________________ currency ________________________*/

function removeCommaCurrency($value){
    $stringValue = str_replace( ',', '', $value );
    return $stringValue;
}

function currencyFormat($price){
    return number_format($price);

}

/*__________________________________filtering ___________________*/

function filterItems($requestFilter,$card){

    $orderItem = array();
    switch ($requestFilter) {
        /* Note the isolation of break; statements and the fact that default: is at the top */

        case $requestFilter == "visitCount":
            return $orderItem[] = ['type' =>'desc','field'=>'visitCount'];
        case $requestFilter == "shoppingCount":
            return $orderItem[] = ['type' =>'desc','field'=>'shoppingCount'];

        case $requestFilter == "expensive":
            return $orderItem[] = ['type' =>'desc','field'=>'price'];

        case $requestFilter == "cheapest":
            return $orderItem[] = ['type' =>'asc','field'=>'price'];
        default:
            return $card;
    }
}


function iconItems($name){
    switch ($name) {

        case $name == "official":
            return 'fa-group';

        case $name == "death":
            return 'fa-bullhorn';

        case $name == "birth":
            return 'fa-birthday-cake';

        case $name == "wedding":
            return 'fa-gift';
        default:
            return $name;
    }

}

function likeProduct($productArray,$productId){
    if(in_array($productId,$productArray)){

        return 'fa-heart';
    }else{
        return 'fa-heart-o';
    }
}

function moreItem($items){

//    $count = count($items);
    if ($items <= 12){
        return 'none';
    }else{
        return '';
    }

}

function selected($itemId, $allItems) {
    if(in_array($itemId, $allItems->pluck('id')->toArray())){
        return 'selected';
    }
}


function restaurant(){
    $userObj = new User();
    $operatorObj = new Operator();
    $user = $userObj->currentUser();
    $shopInfoObj = new Restaurant();

    $operator = $operatorObj->findOperator($user['id']);
    $operatorRestaurant = $operator->restaurants->first();

    if (!$operatorRestaurant){
         return -1;

    }else{
        return $operatorRestaurant['id'];
    }

}

function countCommentNotSeen($productId){
    $commentObj = new Comment();
    $commentsNumber = $commentObj->countCommentNotSeen($productId);
    return $commentsNumber;
}


function typeOfFood($typeOfFood){
    switch ($typeOfFood) {
        case "meal":echo "وعده غذایی";
            break;

        case "appetizer" :echo "پیش غذا";
            break;

        case "dessert" :echo "دسر";
            break;

        case "beverages" :echo "نوشیدنی";
            break;

        default:echo "";
    }

}


function farsinum($str)
{
    if (strlen($str) == 1)
        $str = "0".$str;
    $out = "";
    for ($i = 0; $i < strlen($str); ++$i) {
        $c = substr($str, $i, 1);
        $out .= pack("C*", 0xDB, 0xB0 + $c);
    }
    return $out;
}

function farsimonth($jmonth)
{
    switch ($jmonth) {
        case "01":
            return "فروردین";
        case "02":
            return "اردیبهشت";
        case "03":
            return "خرداد";
        case "04":
            return "تیر";
        case "05":
            return "مرداد";
        case "06":
            return "شهریور";
        case "07":
            return "مهر";
        case "08":
            return "آبان";
        case "09":
            return "آذر";
        case "10":
            return "دی";
        case "11":
            return "بهمن";
        case "12":
            return "اسفند";
    }
}
function monthStartEnd($num){
//    $now = date('Y-m-d' , strtotime(now()." +1 month"));
    $now = date('Y-m-d' , strtotime(now()));

    $dateArray = explode("/", miladiToShamsi($now));
    $currentMonth=$dateArray[1];
    $currentYear=$dateArray[0];


    $monthDates = array();

    for($i=0;$i<$num;$i++) {
        if($i == 0){
            $jalali_start = (new Jalalian((int)$currentYear, (int)$currentMonth, 1))->format('Y/m/d');
        } else {
            $jalali_start = (new Jalalian((int)$currentYear, (int)$currentMonth, 1))->subMonths($i)->format('Y/m/d');
        }


        $getMonthDays = (new Jalalian((int)$currentYear, (int)$currentMonth, 1))->getMonthDays();

        $dateArray = explode("/", $jalali_start);

        $month=$dateArray[1];
        $year=$dateArray[0];
        $jalali_end = (new Jalalian((int)$year, (int)$month, 1))->addDays($getMonthDays)->format('Y/m/d');

        $start=shamsiToMiladi($jalali_start);
        $end=shamsiToMiladi($jalali_end);

        array_push($monthDates , array("start"=>$start,"end"=>$end));


        /*$sYear= ($month - 1 == 0 ? $year - 1 : $year);
        $sMonth= $month - 1;
        $sMonth =($sMonth == 0 ? 12 : $sMonth);

        $eYear=($month == 0 ? $year - 1 : $year);
        $eMonth=($month == 0 ? 12 : $month);


        $start = date("Y-m-d", strtotime(jalali_to_gregorian($sYear, $sMonth, 1, "-")));
        $end = date("Y-m-d", strtotime(jalali_to_gregorian($eYear, $eMonth, 1, "-")));
        array_push($monthDates , array("start"=>$start,"end"=>$end));
        $now = new Carbon($monthDates[$i]['start']);
        $now = $now->addDay(10)->format("Y-m-d");*/
    }
    return $monthDates;
}
function jalali_to_gregorian($jy, $jm, $jd, $mod = '')
{
    if ($jy > 979) {
        $gy = 1600;
        $jy -= 979;
    } else {
        $gy = 621;
    }

    $days = (365 * $jy) + (((int)($jy / 33)) * 8) + ((int)((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
    $gy += 400 * ((int)($days / 146097));
    $days %= 146097;
    if ($days > 36524) {
        $gy += 100 * ((int)(--$days / 36524));
        $days %= 36524;
        if ($days >= 365) $days++;
    }
    $gy += 4 * ((int)(($days) / 1461));
    $days %= 1461;
    $gy += (int)(($days - 1) / 365);
    if ($days > 365) $days = ($days - 1) % 365;
    $gd = $days + 1;
    foreach (array(0, 31, ((($gy % 4 == 0) and ($gy % 100 != 0)) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
        if ($gd <= $v) break;
        $gd -= $v;
    }

    return ($mod === '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
}
function farsiDay($day){
    switch ($day) {
        case "Sat":
            return "شنبه";
        case "Sun":
            return "یکشنبه";
        case "Mon":
            return "دوشنبه";
        case "Tue":
            return "سه شنبه";
        case "Wed":
            return "چهارشنبه";
        case "Thu":
            return "پنجشنبه";
        case "Fri":
            return "جمعه";
    }
}

function filter($mainObj, $attr, $val, $attr2=null, $val2=null) {
    $res =null;

    if($mainObj) {
        $res = $mainObj->filter(function($item) use ($attr, $val, $attr2, $val2) {
            if($attr2 && $val2){

                return $item[$attr] == $val && $item[$attr2] == $val2 ;
            } else {
                return $item[$attr] == $val;
            }

        })->first();
    }
    $results[$val] = $res;

    return $res;
}

function userActionCode($action){
    switch ($action){
        case 'add':
            $actionCode = 31;
            return $actionCode;
            break;
        case 'delete':
            $actionCode = 21;
            return $actionCode;
            break;
        case 'update':
            $actionCode = 11;
            return $actionCode;
            break;
        default:
            return $actionCode =31;
    }
}


function deviceStatusUpdate($device) {


    $date1 = strtotime($device['lastUpdate']);
    $date2 =  Carbon::now('Asia/Tehran')->format('Y-m-d H:i:s.v');
    $date3 = strtotime($date2);
//    $date4 = date('Y-m-d H:i:s');
//    $date1 = strtotime("2018-09-21 22:44:00.000");
//    $date2 = strtotime("2018-09-21 22:45:01.000");
    $diff = abs($date3 - $date1);

    if($diff > 60) {

        return false;
    } else {
        return true;
    }
}

function daysAgo($day){
    return miladiToShamsi(date('Y-m-d', strtotime($day.' day')));

}

function uploadFile($request, $imagePath, $currentFiled, $requestFile, $currentModel = null)
{
//dd($currentModel);
    if ($request->hasFile($requestFile)) {

        if (!is_dir(public_path($imagePath))) {
            mkdir(public_path($imagePath), 0777, true);
        }

        if ($currentModel[$currentFiled]) {
            $image_path = public_path($imagePath) . '/' . $currentModel[$currentFiled];

            if (file_exists($image_path)) {
                unlink($image_path);
            }

        }

        $file = $request->file($requestFile);

        $date = date("h_i_sa");
        $fileNameHash = $file->hashName();
        $format = strtolower(strrchr($fileNameHash, '.'));
        $info = pathinfo($fileNameHash);
        $file_name = basename($fileNameHash, '.' . $info['extension']);
        $fileName = "$file_name" . "_" . "$date" . "$format";
        $file->move(public_path($imagePath), $fileName);

        return $fileName;

    }
    return null;
}

function generateUserCodeBasedOnUserId($lastUserId){
    $userCode = '10'.($lastUserId + 1) ;
    return $userCode;
}

function findDateByDayOfWeek($startTime, $endTime, $dayOfWeek){
    $endTime = date('Y-m-d', strtotime('+1 day', strtotime($endTime)));
    $period = new \DatePeriod(
        new \DateTime($startTime),
        new \DateInterval('P1D'),
        new \DateTime($endTime)
    );
    foreach ($period as $key => $value) {
        $date = $value->format('Y-m-d');
        if(dayOfweek($date) == $dayOfWeek){
            return $date;
        }
    }
    return null;

}

function validateDatTime($request){
    $request['start_date_val'] = $request['start_date'];
    $request['end_date_val'] = $request['end_date'];
    $request['start_date'] = \App\Helpers\shamsiToMiladi($request['start_date']);
    $request['end_date'] = \App\Helpers\shamsiToMiladi($request['end_date']);

    if($request['is_open']==1){
        $validator = Validate::apiValidateTimeAndDate($request);
    }else{
        $validator = Validate::apiValidateDate($request);
    }

    return $validator;
}

function satisfaction($satisfactionNumber,$field){

    switch ($satisfactionNumber){
 /*       case ($satisfactionNumber >= 1 && $satisfactionNumber <= 2):
            return "$field بین یک تا دو ستاره " ;
            break;*/
        case ( $satisfactionNumber < 3):
            return "" ;
            break;
        case ($satisfactionNumber >= 3 && $satisfactionNumber < 4):
//            return "$field بین سه تا چهار ستاره " ;
            return "$field بین سه تا چهار ستاره " ;
            break;
        case ($satisfactionNumber >= 4 && $satisfactionNumber <= 4.5):
            return "$field بین چهار تا چهار و نیم ستاره " ;
            break;
        case ($satisfactionNumber >= 4.5 && $satisfactionNumber <= 5):
            return "$field بین چهار و نیم تا پنج ستاره " ;
            break;
        default:
            return "" ;
    }
}

function Totalsatisfaction($satisfactionNumber){
    switch ($satisfactionNumber){
//        case ($satisfactionNumber >= 1 && $satisfactionNumber <= 2):
//            return " بین یک تا دو ستاره " ;
//            break;
//        case ($satisfactionNumber >2 && $satisfactionNumber <= 3):
//            return " بین دو تا سه ستاره " ;
//            break;
        case($satisfactionNumber<=3):
            return "";
        break;
        case ($satisfactionNumber > 3 && $satisfactionNumber <= 4.5):
            return (($satisfactionNumber*20)."%")." بین چهار تا چهار و نیم ستاره " ;
            break;
        case ($satisfactionNumber >= 4.5 && $satisfactionNumber <= 5):
            return (($satisfactionNumber*20)."%")." بین چهار و نیم تا پنج ستاره " ;
            break;
        default:
            return "100% حجم غذا بین چهار و نیم تا پنج ستاره" ;
    }
}

function myTrailGroupBy($array) {
    $return = array();
    $x=0;

    foreach($array as $key=>$item) {
        if($key==0){
            $return[$x]['restaurant_id']=$item->restaurant_id;
            $return[$x]['restaurant']=$item->restaurant_name;
            $return[$x]['data'][]=$item;
        }
        if($key!=0){
            if($array[$key-1]->restaurant_name == $item->restaurant_name){
                $return[$x]['restaurant']=$item->restaurant_name;
                $return[$x]['restaurant_id']=$item->restaurant_id;
                $return[$x]['data'][]=$item;
            }
            if($array[$key-1]->restaurant_name != $item->restaurant_name){
                $x++;
                $return[$x]['restaurant']=$item->restaurant_name;
                $return[$x]['restaurant_id']=$item->restaurant_id;
                $return[$x]['data'][]=$item;
            }

        }
    }
    return $return;
}

function getDaysOfAMonthAndYear($date){
    $data = \Morilog\Jalali\CalendarUtils::createCarbonFromFormat('Y-m-d', $date)->format('Y-m-d');
    return $data;
}

function smsTokenFormat($title){
   $token= str_replace(" ","_",$title);
    return $token;
}


function jDiffDays($date2, $date1){
    //$date2 as greater than date1
//    $jNow=Jalalian::now()->format('Y/m/d') ;
//    $jMonthAgo=Jalalian::now()->subMonths(1)->format('Y/m/d');

    $date2 = \App\Helpers\shamsiToMiladi($date2);
    $date1 = \App\Helpers\shamsiToMiladi($date1);

    $dateDiff = strtotime($date2) - strtotime($date1);
    $dayDiff= round($dateDiff / (60 * 60 * 24));

    return $dayDiff;
}