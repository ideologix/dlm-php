<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Clients;

/**
 * Class WPClient
 * @package IdeoLogix\DigitalLicenseManagerClient\Http
 */
class WP extends Base {

	/**
	 * The WP http client
	 * @var string
	 */
	protected $id = 'wp';

	/**
	 * HTTP GET implementation
	 *
	 * @param $path
	 * @param $data
	 *
	 * @return mixed
	 */
	public function get( $path, $data = array() ) {
		// TODO: Implement get() method.
	}

	/**
	 * HTTP POST implementation
	 *
	 * @param $path
	 * @param array $data
	 * @param array $files
	 *
	 * @return mixed
	 */
	public function post( $path, $data = array(), $files = array() ) {
		// TODO: Implement post() method.
	}

	/**
	 * HTTP PUT implementation
	 *
	 * @param $path
	 * @param array $data
	 * @param array $files
	 *
	 * @return mixed
	 */
	public function put( $path, $data = array(), $files = array() ) {
		// TODO: Implement put() method.
	}

	/**
	 * HTTP DELETE implementation
	 *
	 * @param $path
	 *
	 * @return mixed
	 */
	public function delete( $path ) {
		// TODO: Implement delete() method.
	}

	/**
	 * Download specific url to file path
	 *
	 * @param $path
	 * @param $save_path
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function download( $path, $save_path, $data = array() ) {
		// TODO: Implement download() method.
	}

	/**
	 * Is supported?
	 * @return mixed
	 */
	public function is_supported() {
		return function_exists( '\wp_remote_get' );
	}
}