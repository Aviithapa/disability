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



/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 2/14/2018
 * Time: 2:17 PM
 */








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