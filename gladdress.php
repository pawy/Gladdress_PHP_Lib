<?php
class GladdressProfile
{
    private $profile;

    /**
     * Gets the profile information from gladdress.com
     * Throws exception if something went wrong
     * @param $gladId
     */
    public function __construct($gladId)
    {
        if(!$this->isGuid($gladId))
            throw new Exception("Given GladId is invalid (not a valid GUID)");

        $request = 'http://gladdress.com/' . urlencode( $gladId) . '.php';
        $response  = $this->UrlGetContents($request);
        try
        {
            $this->profile = @unserialize($response);
            if(!$this->profile)
            {
                throw new Exception($response);
            }
        }
        catch(Exception $e)
        {
            throw new Exception($response);
        }
    }

    /**
     * See http://gladdress.com/Documentation/Fields for a list of available fields
     * @param $field
     * @return mixed
     */
    public function get($field)
    {
        return $this->profile[$field];
    }

    /**
     * Returns an array of available fields for this profile
     * @return array
     */
    public function getFields()
    {
        return array_keys($this->profile);
    }

    private function isGuid($guid)
    {
        return preg_match('/^\{?[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}\}?$/', $guid);
    }

    /**
     * Function is using Curl, and if it is not installed, try file_get_contents directly
     * This function is used for asynchronous requests
     * @param $url
     * @return mixed|string (the content of the url
     */
    private static function UrlGetContents ($url) {
        if (!function_exists('curl_init')){
            return file_get_contents($url);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}

