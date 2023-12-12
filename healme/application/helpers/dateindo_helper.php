<?php

if(!function_exists('day_month_year_indonesia')){
    function day_month_year_indonesia($date){
        $month = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $date = explode('-', date('d-m-Y', strtotime($date)));
        return $date[0] . ' ' . $month[$date[1] -1] . ' ' . $date[2];
    }
}

if(!function_exists('day_month_year_time_indonesia')){
    function day_month_year_time_indonesia($date1){
        $month = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $date = explode('-', date('d-m-Y', strtotime($date1)));
        return $date[0] . ' ' . $month[$date[1] -1] . ' ' . $date[2] . ' ' . date('H:i:s', strtotime($date1));
    }
}