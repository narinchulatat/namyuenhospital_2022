<?php
namespace app\components;

use yii\base\Component;
use yii\helpers\Html;
use app\models\PublicHoliday;

class Until extends Component{
	
    public function FiscalStart()
    {
        $month = date('m');
        $date_start = (date('Y')-1).date('-10-01');
        if(($month == '10') || ($month == '11') || ($month == '12'))
        {
            $date_start = date('Y-10-01');   
        }
        
        return $date_start;
    }
    
    public function FiscalEnd()
    {
        $month = date('m');
        $date_end = date('Y-09-30');
        if(($month == '10') || ($month == '11') || ($month == '12'))
        {
            $date_end = (date('Y')+1).date('-m-d');   
        }
        
        return $date_end;
    }
    
    public function DateDiff($strDate1, $strDate2) 
    {
        return (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
    }
    
    public function DateThaiFull($strDate) 
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = Array("", "มกราคม", "กุมพาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay เดือน $strMonthThai  พ.ศ. $strYear";
    }
    
    public function DateThaiFull2($strDate) 
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = Array("", "มกราคม", "กุมพาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    
    public function DateThaiShort2($strDate)
    {
        $strYear = date("Y", $strDate) + 543;
        $strMonth = date("m", $strDate);
        $strDay = date("d", $strDate);
        return $strDay.'/'.$strMonth.'/'.$strYear;
    }
    
    public function DateThaiShort($strDate)
    {
        $list_date_time = explode(" ",$strDate);
        $list_date = explode("-",$list_date_time['0']);
        return $list_date['2'].'/'.$list_date['1'].'/'.($list_date['0']+543);
    }
    
    public function CheckHoliday() 
    {
        $date_start = date('Y-m-01');
        $d = date('m');
        switch ($d) {
            case '01':
            case '03':
            case '05':
            case '07':
            case '08':
            case '10':
            case '12':
                $date_end = date('Y-m-31');
                break;
            case '04':
            case '06':
            case '09':
            case '11':
                $date_end = date('Y-m-30');
                break;
            default:
                $date_end = date('Y-02-28');
                break;
        }
        $working = 0;
        $public_holiday = 0;
        $nomal_holiday = 0;
        $total_day = ((strtotime($date_end) - strtotime($date_start)) / (60 * 60 * 24)) + 1;

        while (strtotime($date_start) <= strtotime($date_end)) {
            $day_of_week = date("w", strtotime($date_start));
            if ($day_of_week == 0 || $day_of_week == 6) {
                $nomal_holiday++;
            } else {
                $model = PublicHoliday::find()->where(['date_day'=>$date_start])->all();
                if (!empty($model)) {
                    $public_holiday++;
                } else {
                    $working++;
                }
            }
            $date_start = date("Y-m-d", strtotime("+1 day", strtotime($date_start)));
        }
        return array("working" => $working, "public_holiday" => $public_holiday, "nomal_holiday" => $nomal_holiday);
    }
    
    public function DateStartEnd($month,$year)
    {
        switch($month)
        {
            case '01':
            case '03':
            case '05':
            case '07':
            case '08':
            case '10':
            case '12':
                $date_start = $year.'-'.$month.'-01';
                $date_end = $year.'-'.$month.'-31';
                break;
            case '04':
            case '06':
            case '09':
            case '11':
                $date_start = $year.'-'.$month.'-01';
                $date_end = $year.'-'.$month.'-30';
                break;
            case '02':
                $date_start = $year.'-'.$month.'-01';
                $date_end = $year.'-'.$month.'-29';
            default:
                $date_start = '0000-00-00';
                $date_end  = '0000-00-00';
        }
        
        return array('date_start' => $date_start,'date_end'=>$date_end);
    }
	
    public function timespan($seconds = 1, $time = '') {
        if (!is_numeric($seconds)) {
            $seconds = 1;
        }

        if (!is_numeric($time)) {
            $time = time();
        }

        if ($time <= $seconds) {
            $seconds = 1;
        } else {
            $seconds = $time - $seconds;
        }

        $str = '';
        $years = floor($seconds / 31536000);

        if ($years > 0) {
            $str .= $years . ' ปี, ';
        }

        $seconds -= $years * 31536000;
        $months = floor($seconds / 2628000);

        if ($years > 0 OR $months > 0) {
            if ($months > 0) {
                $str .= $months . ' เดือน, ';
            }

            $seconds -= $months * 2628000;
        }

        $weeks = floor($seconds / 604800);

        if ($years > 0 OR $months > 0 OR $weeks > 0) {
            if ($weeks > 0) {
                $str .= $weeks . ' สัปดาห์, ';
            }

            $seconds -= $weeks * 604800;
        }

        $days = floor($seconds / 86400);

        if ($months > 0 OR $weeks > 0 OR $days > 0) {
            if ($days > 0) {
                $str .= $days . ' วัน, ';
            }

            $seconds -= $days * 86400;
        }

        $hours = floor($seconds / 3600);

        if ($days > 0 OR $hours > 0) {
            if ($hours > 0) {
                $str .= $hours . ' ชั่วโมง, ';
            }

            $seconds -= $hours * 3600;
        }

        $minutes = floor($seconds / 60);

        if ($days > 0 OR $hours > 0 OR $minutes > 0) {
            if ($minutes > 0) {
                $str .= $minutes . ' นาที, ';
            }

            $seconds -= $minutes * 60;
        }

        if ($str == '') {
            $str .= $seconds . ' วินาที';
        }

        return $years;
    }
    
    public function check_time_period($startTime, $endTime, $chkStartTime, $chkEndTime) 
    {

        if ($chkStartTime > $startTime && $chkEndTime < $endTime) {
            return true;
        } elseif (($chkStartTime > $startTime && $chkStartTime < $endTime) || ($chkEndTime > $startTime && $chkEndTime < $endTime)) {
            return true;
        } elseif ($chkStartTime == $startTime || $chkEndTime == $endTime) {
            return true;
        } elseif ($startTime > $chkStartTime && $endTime < $chkEndTime) {
            return true;
        } else {
            return false;
        }
    }
}
?>
