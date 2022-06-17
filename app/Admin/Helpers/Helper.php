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

if (!function_exists('formatStatusWithdrawn')) {
    function formatStatusWithdrawn($status){
        if($status == 0){
            return '<span class="text-secondary">Chưa xét duyệt</span';
        }elseif($status == 1){
            return '<span class="text-success">Đã chấp nhận</span';
        }elseif($status == 2){
            return '<span class="text-danger">Đã hủy</span';
        }else{
            return '';
        }
    }
}