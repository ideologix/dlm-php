<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Responses;

/**
 * Class Response
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Responses
 */
abstract class Base {

	protected $data;

	abstract public function is_error();

	public function get_data( $key = null ) {

		if ( is_null( $key ) ) {
			return $this->data;
		}

		return isset( $this->data[ $key ] ) ? $this->data[ $key ] : null;
	}

	/**
	 * Returns the code
	 * @return float|int
	 */
	public function get_code() {
		return null;
	}

	/**
	 * Returns the message
	 * @return string
	 */
	public function get_message() {
		return null;
	}

}
