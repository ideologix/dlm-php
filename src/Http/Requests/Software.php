<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Requests;
use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Base as BaseResponse;
use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Error;

/**
 * Class Software
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Requests
 */
class Software extends Base {

	/**
	 * Find a software item in the database
	 *
	 * @param $software_id
	 *
	 * @return \IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Base
	 */
	public function find( $software_id ) {
		return $this->http->get( "wp-json/dlm/v1/software/{$software_id}" );
	}

	/**
	 * Retrieve the contents of a software file from the licensing server
	 * @return bool|Error
	 */
	public function download_latest( $token, $save_path ) {
		$url = sprintf('wp-json/dlm/v1/software/download/%s?consumer_key=%s&consumer_secret=%s', $token, $this->http->get_consumer_key(), $this->http->get_consumer_secret());
		return $this->http->download($url, $save_path);
	}

}
