<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



if (!function_exists('returnResponse')) {

    function returnResponse($status = 1, $message = "", $data = false)

    {

        return array(

            'status' => $status,

            'message' => $message,

            'data' => $data

        );

    }

}

if (!function_exists('dateFormatter')) {

    function dateFormatter($date, $fromFormat = 'Y-m-d', $toFormat = 'd-m-Y')

    {

        $date   = str_replace(array(

            'AM',

            'PM'

        ), '', $date);

        $format = str_replace('A', '', $fromFormat);



        $d      = DateTime::createFromFormat($format, $date);

        if ($d && $d->format($format) == $date) {

            return $d->format($toFormat);

        } else {

            return FALSE;

        }

    }

}

if(!function_exists('cleanData'))

{

    function cleanData($string, $size, $append ="",$appendType = "SUFFIX")

    {

            $cleanData = trim($string);

            $cleanData = substr($cleanData,0,$size);

        

       

        if ($append!=='') {

            if($appendType=="SUFFIX")

            {

                $cleanData = str_pad($cleanData,$size,$append,STR_PAD_RIGHT);

            }

            else

            {

                $cleanData = str_pad($cleanData,$size,$append,STR_PAD_LEFT);

            }

        }

            return $cleanData;

    }

}
