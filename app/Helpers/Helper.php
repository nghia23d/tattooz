<?php 
namespace App\Helpers;
use Config;
use Illuminate\Support\Facades\Storage;

class Helper {
    public static function formatDateTime($dateTime)
    {
        return date_format(date_create($dateTime), config('tattoo.format.long_time'));
    }

    public static function showButtonStatus($value,$prefix,$id,$typeStatus = null)
    {
        if($typeStatus == 'status-contact')
            $tmplStatus         = config('tattoo.btn_status_contact');
        else
            $tmplStatus         = config('tattoo.btn_status');
        $value                  = array_key_exists($value, $tmplStatus ) ? $value : 'default';
        $currentTemplateStatus  = $tmplStatus[$value];
        
        $xhtml = sprintf(
            '<button data-value="%s" data-module="%s" data-id="%s" type="button" class="btn btn-round %s">%s</button>',$value,$prefix,$id, $currentTemplateStatus['class'], $currentTemplateStatus['name']  
        );
        return $xhtml;
    }

}