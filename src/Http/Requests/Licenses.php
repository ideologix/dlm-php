<?php

namespace IdeoLogix\DigitalLicenseManagerClient\Http\Requests;

use IdeoLogix\DigitalLicenseManagerClient\Http\Responses\Base as HttpResponse;
use IdeoLogix\DigitalLicenseManagerClient\Http\Requests\Base as BaseRequest;

/**
 * Class Licenses
 * @package IdeoLogix\DigitalLicenseManagerClient\Http\Requests
 */
class Licenses extends BaseRequest
{
	/**
	 * Enumerator value used for sold licenses.
	 *
	 * @var int
	 */
	const STATUS_SOLD = 1;

	/**
	 * Enumerator value used for delivered licenses.
	 *
	 * @var int
	 */
	const STATUS_DELIVERED = 2;

	/**
	 * Enumerator value used for active licenses.
	 *
	 * @var int
	 */
	const STATUS_ACTIVE = 3;

	/**
	 * Enumerator value used for inactive licenses.
	 *
	 * @var int
	 */
	const STATUS_INACTIVE = 4;

	/**
	 * Enumerator value used for disabled licenses.
	 *
	 * @var int
	 */
	const STATUS_DISABLED = 5;

    /**
     * Return the list of the licenses
     *
     * @param  array  $args
     *
     * @return HttpResponse
     */
    public function get($args = array())
    {
        return $this->http->get("wp-json/dlm/v1/licenses", $args);
    }

    /**
     *  Find license by license key
     *
     * @param $license_key
     *
     * @return HttpResponse
     */
    public function find($license_key)
    {
        return $this->http->get("wp-json/dlm/v1/licenses/{$license_key}");
    }

    /**
     * Create license
     *
     * @param  array  $data
     *
     * @return HttpResponse
     */
    public function create($data = array())
    {
        return $this->http->post("wp-json/dlm/v1/licenses", $data);
    }

	/**
	 * Create license
	 *
	 * @param $lisense_key
	 *
	 * @return HttpResponse
	 */
	public function delete($lisense_key)
	{
		return $this->http->delete("wp-json/dlm/v1/licenses/{$lisense_key}");
	}

    /**
     * Update a license
     *
     * @param $license_key
     * @param  array  $data
     *
     * @return HttpResponse
     */
    public function update($license_key, $data = array())
    {
        return $this->http->put("wp-json/dlm/v1/licenses/{$license_key}", $data);
    }

    /**
     * Activate a license
     *
     * @param $license_key
     * @param  array  $data
     *
     * @return HttpResponse
     */
    public function activate($license_key, $data = array())
    {
        return $this->http->get("wp-json/dlm/v1/licenses/activate/{$license_key}", $data);
    }

    /**
     * Deactivate license activation
     *
     * @param $token
     * @param  array  $data
     *
     * @return mixed
     */
    public function deactivate($token, $data = array())
    {
        return $this->http->get("wp-json/dlm/v1/licenses/deactivate/{$token}", $data);
    }

    /**
     * Validate license activation
     *
     * @param $token
     *
     * @return HttpResponse
     */
    public function validate($token)
    {
        return $this->http->get("wp-json/dlm/v1/licenses/validate/{$token}");
    }
}
