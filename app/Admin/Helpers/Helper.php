<?php
if (!function_exists('selected')) {
    function selected($value1, $value2){
        if($value1 == $value2){
            return 'selected';
        }
        return;
    }
}

if (!function_exists('checked')) {
    function checked($value1, $value2){
        if($value1 == $value2){
            return 'checked';
        }
        return;
    }
}

if (!function_exists('statusUserLoanAmount')) {
    function statusUserLoanAmount($status){
        if($status == 0){
            return 'Chưa xét duyệt';
        }elseif($status == 1){
            return 'Xét duyệt thành công';
        }elseif($status == 2){
            return 'Xét duyệt không thành công';
        }else{
            return '';
        }
    }
}