<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Requests;

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
	 *
	 * @param $activation_token
	 * @param $path_to_save
	 *
	 * @return string
	 */
	public function download_latest( $activation_token, $path_to_save ) {
		$url = sprintf( 'wp-json/dlm/v1/software/download/%s?consumer_key=%s&consumer_secret=%s', $activation_token, $this->http->get_consumer_key(), $this->http->get_consumer_secret() );

		return $this->http->download( $url, $path_to_save );
	}

}
