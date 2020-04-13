<?php
namespace OpenAPIServer\Api;

class Config
{
    private static $public_key_id = 'AF465A3B3OGMUBTCU35SUEC4';
    private static $private_key = 'certificates/horze_privateKey.pem';
    private static $sandbox  = true;
    private static $region = 'eu';
    public $static_api_key = [
        'Hrz8fjf8#18h!fg8*48Fj0zznn3F#8273%3d@fj#'
    ];
    public $store_id = 'amzn1.application-oa2-client.845c011001fd4da59f84ea54828de9b9';

    public function getAmazonPayConfig()
    {
        return array(
            'public_key_id' => self::$public_key_id,
            'private_key' => self::$private_key,
            'sandbox' => self::$sandbox,
            'region' => self::$region
        );
    }

}