<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Requests;

use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Base as HttpResponse;
use IdeoLogix\DigitalLicenseManagerClient\Http\Requests\Base as BaseRequests;

/**
 * Class Licenses
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Requests
 */
class Licenses extends BaseRequests {

	/**
	 * Return the list of the licenses
	 *
	 * @param array $args
	 *
	 * @return HttpResponse
	 */
	public function get( $args = array() ) {
		return $this->http->get( "wp-json/dlm/v1/licenses", $args );
	}

	/**
	 *  Find license by license key
	 *
	 * @param $license_key
	 *
	 * @return HttpResponse
	 */
	public function find( $license_key ) {
		return $this->http->get( "wp-json/dlm/v1/licenses/{$license_key}" );
	}

	/**
	 * Create license
	 *
	 * @param array $data
	 *
	 * @return HttpResponse
	 */
	public function create( $data = array() ) {
		return $this->http->post( $data );
	}

	/**
	 * Update a license
	 *
	 * @param $license_key
	 * @param array $data
	 *
	 * @return HttpResponse
	 */
	public function update( $license_key, $data = array() ) {

	}

	/**
	 * Activate a license
	 *
	 * @param $license_key
	 *
	 * @return HttpResponse
	 */
	public function activate( $license_key ) {
		return $this->http->get( "wp-json/dlm/v1/licenses/activate/{$license_key}" );
	}

	/**
	 * Deactivate license activation
	 *
	 * @param $token
	 *
	 * @return mixed
	 */
	public function deactivate( $token ) {
		return $this->http->get( "wp-json/dlm/v1/licenses/deactivate/{$token}" );
	}

	/**
	 * Validate license activation
	 *
	 * @param $token
	 *
	 * @return HttpResponse
	 */
	public function validate( $token ) {
		return $this->http->get( "wp-json/dlm/v1/licenses/validate/{$token}" );
	}
}