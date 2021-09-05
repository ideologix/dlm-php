<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Clients;

use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Error;
use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Result;

/**
 * Class CurlClient
 * @package IdeoLogix\DigitalLicenseManagerClient
 */
class Curl extends Base
{

    /**
     * The curl http client
     * @var string
     */
    protected $id = 'cURL';

    /**
     * The current version
     * @var string
     */
    protected $version = '10';

    /**
     * HTTP GET implementation
     *
     * @param $path
     * @param  array  $data
     *
     * @return Error|Result
     */
    public function get($path, $data = array())
    {
        $url = $this->url($path, $data);

        @set_time_limit(450);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_USERPWD, $this->consumer_key.":".$this->consumer_secret);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($ch);
        curl_close($ch);
        $response = $this->json_decode($response);
        if (false === $response) {
            return new Error(curl_errno($ch), curl_error($ch), array());
        }
        if (isset($response['code']) && isset($response['message']) && isset($response['data'])) {
            return new Error($response['code'], $response['message'], $response['data']);
        }

        return $this->result($response);
    }

    /**
     * HTTP POST implementation
     *
     * @param $path
     * @param  array  $data
     * @param  array  $files
     *
     * @return Error|Result
     */
    public function post($path, $data = array(), $files = array())
    {

        @set_time_limit(450);
        $ch = curl_init();

        if ( ! empty($files)) {
            foreach ($files as $key => $file) {
                if (file_exists($file)) {
                    $data[$key] = $this->to_curl_file($file);
                }
            }
        }

        curl_setopt($ch, CURLOPT_URL, $this->url($path));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_USERPWD, $this->consumer_key.":".$this->consumer_secret);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($ch);

        curl_close($ch);
        if (false === $response) {
            return new Error(curl_errno($ch), curl_error($ch));
        }

        $response = $this->json_decode($response);

        return $this->result($response);

    }

    /**
     * HTTP PUT implementation
     *
     * @param $path
     * @param  array  $data
     * @param  array  $files
     *
     * @return Error|Result
     */
    public function put($path, $data = array(), $files = array())
    {

        if ( ! empty($files)) {
            foreach ($files as $key => $file) {
                if (file_exists($file)) {
                    $data[$key] = $this->to_curl_file($file);
                }
            }
        }

        @set_time_limit(450);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url($path));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_USERPWD, $this->consumer_key.":".$this->consumer_secret);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($ch);
        curl_close($ch);
        if (false === $response) {
            return new Error(curl_errno($ch), curl_error($ch));
        }
        $response = $this->json_decode($response);

        return $this->result($response);
    }

    /**
     * HTTP DELETE implementation
     *
     * @param $path
     *
     * @return Error|Result
     */
    public function delete($path)
    {
        @set_time_limit(450);
        $ch = curl_init();

        $url = $this->url($path);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_USERPWD, $this->consumer_key.":".$this->consumer_secret);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($ch);
        curl_close($ch);
        if (false === $response) {
            return new Error(curl_errno($ch), curl_error($ch));
        }

        $response = $this->json_decode($response);

        return $this->result($response);

    }

    /**
     * Download specific url to file path
     *
     * @param $path
     * @param $save_path
     * @param  array  $data
     *
     * @return bool|Error
     */
    public function download($path, $save_path, $data = array())
    {

        $url = $this->url($path, $data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->consumer_key.":".$this->consumer_secret);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept" => "application/json"));
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        $response = curl_exec($ch);
        if (false === $response) {
            $curl_error = curl_error($ch);
            $curl_errno = curl_errno($ch);
            curl_close($ch);

            return new Error($curl_errno, $curl_error);
        } else {
            $fp = fopen($save_path, 'w+');
            fwrite($fp, $response);
            fclose($fp);
            curl_close($ch);

            return true;
        }
    }


    /**
     * Is supported?
     * @return mixed
     */
    public function is_supported()
    {
        return function_exists('curl_version');
    }


    /**
     * Convert $resource to CURLFile, also backwards compatible with
     * version lower than 5.5
     *
     * @param $resource
     *
     * @return \CURLFile|string
     */
    private function to_curl_file($resource)
    {
        if ( ! class_exists('CURLFile')) {
            return '@'.$resource;
        } else {
            return new \CURLFile($resource);
        }
    }


    /**
     * Return formatted result
     *
     * @param  array  $result
     *
     * @return Error|Result
     */
    private function result($result)
    {
        if (isset($result['success'])) {
            $success = (bool) $result['success'];;
            $data = array();
            if (isset($result['data'])) {
                $data = (array) $result['data'];
            }
            return (new Result($success, $data));
        } else {
            $code    = isset($result['code']) ? $result['code'] : 500;
            $message = isset($result['message']) ? $result['message'] : 'Unknown error.';
            $data    = isset($result['data']) ? $result['data'] : array();
            return new Error($code, $message, $data);
        }

    }

}
