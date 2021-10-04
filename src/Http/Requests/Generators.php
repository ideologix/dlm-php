<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Requests;

use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Base as HttpResponse;

/**
 * Class Generators
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Requests
 */
class Generators extends Base {

	/**
	 * Return list of resources
	 *
	 * @param array $args
	 *
	 * @return HttpResponse
	 */
	public function get( $args = array() ) {
		return $this->http->get( "wp-json/dlm/v1/generators", $args );
	}

	/**
	 *  Find resource
	 *
	 * @param $license_key
	 *
	 * @return HttpResponse
	 */
	public function find( $generator_id ) {
		return $this->http->get( "wp-json/dlm/v1/generators/{$generator_id}" );
	}

	/**
	 * Create resource
	 *
	 * @param array $data
	 *
	 * @return HttpResponse
	 */
	public function create( $data = array() ) {
		return $this->http->post( "wp-json/dlm/v1/generators", $data );
	}

	/**
	 * Update resource
	 *
	 * @param $generator_id
	 * @param array $data
	 *
	 * @return HttpResponse
	 */
	public function update( $generator_id, $data = array() ) {
		return $this->http->put( "wp-json/dlm/v1/generators/{$generator_id}", $data );
	}

	/**
	 * Delete resource
	 *
	 * @param $generator_id
	 *
	 * @return HttpResponse
	 */
	public function delete( $generator_id ) {
		return $this->http->put( "wp-json/dlm/v1/generators/{$generator_id}" );
	}

	/**
	 * Generate resources
	 *
	 * @param $generator_id
	 * @param array $data
	 *
	 * @return HttpResponse
	 */
	public function generate( $generator_id, $data = array() ) {
		return $this->http->post( "wp-json/dlm/v1/generators/{$generator_id}/generate", $data );
	}

}
