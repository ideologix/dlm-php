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
	 * @return string
	 */
	public function download_latest($activation_token) {

	}

}
