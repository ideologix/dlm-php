<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Responses;

/**
 * Class Response
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Responses
 */
abstract class Base {

	protected $data;

	abstract public function is_error();

	public function get_data() {
		return $this->data;
	}
}