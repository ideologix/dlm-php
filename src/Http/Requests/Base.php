<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Requests;

use IdeoLogix\DigitalLicenseManagerClient\Http\Clients\Base as BaseClient;

/**
 * Class Base
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Requests
 */
abstract class Base {

	protected $http;

	/**
	 * Base constructor.
	 *
	 * @param BaseClient $httpClient
	 */
	public function __construct( $httpClient ) {
		$this->http = $httpClient;
	}

}