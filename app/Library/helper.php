<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadedAsset')) {
    /**
     * Generates an asset path for the uploads.
     * @param null $path
     * @param null $file_name
     * @return string
     */
    function uploadedAsset($path = null, $file_name = null)
    {
        $path  = Storage::url($path . '/' . $file_name);
        return $path;
    }
}





if (!function_exists('imageNotFound')) {
    /**
     * @param null $type
     * @return string
     */
    function imageNotFound($type = null)
    {
        switch ($type) {
            case 'user':
                return 'https://media.accessiblecms.com.au/uploads/opan/2021/12/200.jpeg';
                break;
            case 'small':
                return 'https://via.placeholder.com/350x150';
                break;
            default:
                return 'dist/img/avatar.png';
                //return asset('images/default.png');

        }
    }
}

function getSiteSetting($name)
{
    if ($name === 'logo_image') {
        return App\Models\Website\SiteSetting::getLogoImage($name);
    }

    return App\Models\Website\SiteSetting::getValue($name);
}





if (!function_exists('getSettingValue')) {
    /**
     * Gets setting value
     *
     * @param $key
     * @return string
     */
    function getSettingValue($key)
    {
        return null;
        /*$service = app(App\Modules\Saurav\Setting\Repositories\SettingRepository::class);
        return $service->getValue($key);*/
    }
}

if (!function_exists('getSettingValueAsArray')) {
    /**
     * Gets setting value
     *
     * @param $key
     * @return array
     */
    function getSettingValueAsArray($key)
    {
        return [];
        /*$service = app(App\Modules\Saurav\Setting\Repositories\SettingRepository::class);
        return $service->getValueAsArray($key);*/
    }
}


if (!function_exists('uploadedAsset')) {
    /**
     * Generates an asset path for the uploads.
     * @param null $path
     * @param null $file_name
     * @return string
     */
    function uploadedAsset($path = null, $file_name = null)
    {
        $path = Storage::url($path . '/' . $file_name);
        return $path;
    }
}


if (!function_exists('imageNotFound')) {
    /**
     * @param null $type
     * @return string
     */
    function imageNotFound($type = null)
    {
        switch ($type) {
            case 'user':
                return '/assets/img/profiles/avatar.jpg';
                break;
            case 'small':
                return 'https://via.placeholder.com/350x150';
                break;
            default:
                return 'https://via.placeholder.com/350x150';
                //return asset('images/default.png');

        }
    }
}


if (!function_exists('str_replace_first')) {
    /**
     * Replace the first occurrence of a string in another string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_first($search, $replace, $subject)
    {
        $pos = strpos($subject, $search);
        if ($pos !== false) {
            return substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }
}


if (!function_exists('generateSlug')) {
    /**
     * Generates the alias equivalent for the provided string
     *
     * @param $string
     * @return mixed|string
     */
    function generateSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(" ", "-", $string);
        $string = str_replace(".", "-", $string);
        $string = str_replace("--", "-", $string);
        $string = str_replace("--", "-", $string);
        $string = str_replace("--", "-", $string);
        $string = str_replace("&", "and", $string);
        $string = str_replace("@", "", $string);
        $string = str_replace("(", "", $string);
        $string = str_replace(")", "", $string);
        $string = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
        return $string;
    }
}
