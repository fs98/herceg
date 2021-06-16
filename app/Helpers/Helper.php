<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use \DateTime;

use Route;

class Helper
{
    public static function statusValidator($var) {
        if(!in_array($var, config('api.statuses'))) {
            // abort(500);
            return 0;
        } else {
            return 1;
        }
    }
    public static function indexExists($var = null) {
        $exists = false;
    }
    public static function postUrlSlugCreator($post = null) {
        if(!isset($post) || $post === null || $post === '') {
            abort(500);
        }
    }

    public static function dateTimeConstructor($value = null) {
        if($value === null) {
            $currentDateTime = new DateTime;
        } else {
            $currentDateTime = new DateTime($value);
        }
        $currentDateTimeDate = $currentDateTime->format('Y-m-d');
        $currentDateTimeTime = $currentDateTime->format('H:i:s');
        $currentDateTimeMicroseconds = $currentDateTime->format('u');
        $currentDateTimeMicroseconds = substr($currentDateTimeMicroseconds, 0, 3);

        $currentDateTimeFormatV1 = $currentDateTimeDate . "T" . $currentDateTimeTime . "." . $currentDateTimeMicroseconds . "Z";
        $currentDateTimeFormatV2 = str_replace(':', '-', str_replace('.', '-', $currentDateTimeFormatV1));

        $returnValue = [
            'database-format' => $currentDateTimeFormatV1,
            'filename-format' => $currentDateTimeFormatV2
        ];

        return $returnValue;
    }

    public static function isSet($arg = NULL) {
        if(isset($arg) && !is_null($arg) && $arg !== '') {
            return 1;
        } else {
            return 0;
        }
    }

    public static function enToDeDate($input = NULL) {
        $currentDateTimeRaw = new DateTime;
        $currentDateTime = $currentDateTimeRaw->format('d. F Y');

        if(Helper::isSet($input)) {
            $explodedDate = NULL;
            try {
                $explodedDate = explode(' ', $input);
            } catch (Exception $e) {
                $explodedDate = NULL;
            }

            if(!array_key_exists(0, $explodedDate) || !array_key_exists(1, $explodedDate) || !array_key_exists(2, $explodedDate)) {
                return $currentDateTime;
            }

            if(!Helper::isSet($explodedDate) || !Helper::isSet($explodedDate[0]) || !Helper::isSet($explodedDate[1]) || !Helper::isSet($explodedDate[2])) {
                return $currentDateTime;
            }

            switch ($explodedDate[1]) {
                case 'January':
                    $explodedDate[1] = "Januar";
                    break;
                case 'February':
                    $explodedDate[1] = "Februar";
                    break;
                case 'March':
                    $explodedDate[1] = "März";
                    break;
                case 'April':
                    $explodedDate[1] = "April";
                    break;
                case 'May':
                    $explodedDate[1] = "Mai";
                    break;
                case 'June':
                    $explodedDate[1] = "Juni";
                    break;
                case 'July':
                    $explodedDate[1] = "Juli";
                    break;
                case 'August':
                    $explodedDate[1] = "August";
                    break;
                case 'September':
                    $explodedDate[1] = "September";
                    break;
                case 'October':
                    $explodedDate[1] = "Oktober";
                    break;
                case 'November':
                    $explodedDate[1] = "November";
                    break;
                case 'December':
                    $explodedDate[1] = "Dezember";
                    break;
                default:
                    return 0;
                    break;
            }

            $implodedDate = NULL;

            try {
                $implodedDate = implode(' ', $explodedDate);
            } catch (Exception $e) {
                $implodedDate = NULL;
            }

            if(!Helper::isSet($implodedDate)) {
                return $currentDateTime;
            } else {
                return $implodedDate;
            }
        } else {
            return $currentDateTime;
        }
    }

    public static function RouteCrafter($type = NULL) {
        $types = config('api.route-paths');
        $current_route = Route::currentRouteName();
        $final_route = 'default-form';

        if(in_array($type, $types)) {
            if(strpos($current_route, ".")) {
                $exploded_route = explode(".", Route::currentRouteName());
                if(Helper::isSet($exploded_route[0])) {
                    $final_route = $exploded_route[0] . "." . $type . ".form";
                    return $final_route;
                }
            }
        }

        return $final_route;
    }

    public static function RouteCrafterList($type = NULL) {
        $types = config('api.route-paths');
        $current_route = Route::currentRouteName();
        $final_route = 'default-form-';

        if(in_array($type, $types)) {
            if(strpos($current_route, ".")) {
                $exploded_route = explode(".", Route::currentRouteName());
                if(Helper::isSet($exploded_route[0])) {
                    $final_route = $exploded_route[0] . "." . $type . ".form.";
                    return $final_route;
                }
            }
        }

        return $final_route;
    }

    public static function defaultDate($string = NULL) {
        $date = NULL;

        if(Helper::isSet($string)) {
            try {
                $date = (new DateTime($string))->format('Y-m-d');
            } catch (Exception $e) {
                $date = (new DateTime)->format('Y-m-d');
            }
        } else {
            $date = (new DateTime)->format('Y-m-d');
        }

        return $date;
    }

    public static function defaultTimestamp($string = NULL) {
        $timestamp = NULL;

        if(Helper::isSet($string)) {
            try {
                $timestamp = (new DateTime($string))->format('Y-m-d H:i:s');
            } catch (Exception $e) {
                $timestamp = (new DateTime)->format('Y-m-d H:i:s');
            }
        } else {
            $timestamp = (new DateTime)->format('Y-m-d H:i:s');
        }

        return $timestamp;
    }

    public static function filenameTimestamp($string = NULL) {
        $timestamp = NULL;

        if(Helper::isSet($string)) {
            try {
                $timestamp = (new DateTime($string))->format('Y-m-d-H-i-s');
            } catch (Exception $e) {
                $timestamp = (new DateTime)->format('Y-m-d-H-i-s');
            }
        } else {
            $timestamp = (new DateTime)->format('Y-m-d-H-i-s');
        }

        return $timestamp;
    }
}