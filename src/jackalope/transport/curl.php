<?php
/**
 * Wrapper class to abstract the curl* PHP userland functions.
 *
 * @license http://www.apache.org/licenses Apache License Version 2.0, January 2004
 *
 * @package jackalope
 * @subpackage transport
 */

namespace jackalope\transport;

/**
 * Capsulate curl as an object
 *
 * @todo: TODO: Write phpt tests
 *
 * @package jackalope
 * @subpackage transport
 */
class curl {

    /**
     * Contains a connection resource to a curl session.
     * @var resource
     */
    protected $curl;

    /**
     * Handles the initialization of a curl session.
     *
     * @param string $url If provided, sets the CURLOPT_URL
     *
     * @see curl_init
     */
    public function __construct($url = null) {
        $this->curl = curl_init($url);
    }

    /**
     * Sets the options to be used for the request.
     *
     * @param int $option
     * @param mixed $value
     *
     * @see curl_setopt
     */
    public function setopt($option, $value) {
        return curl_setopt($this->curl, $option, $value);
    }

    /**
     * Sets multiple options to be used for a request.
     *
     * @param array $options
     *
     * @see curl_setopt_array
     */
    public function setopt_array($options) {
        return curl_setopt_array($this->curl, $options);
    }

    /**
     * Performs a cUrl session.
     *
     * @return bool FALSE on failure otherwise TRUE or string (if CURLOPT_RETURNTRANSFER option is set)
     *
     * @see curl_exec
     */
    public function exec() {
        return curl_exec($this->curl);
    }

    /**
     * Gets the last error for the current cUrl session.
     *
     * @return string
     *
     * @see curl_error
     */
    public function error() {
        return curl_error($this->curl);
    }

    /**
     * Gets the number representation of the last error for the current cUrl session.
     *
     * @return int
     *
     * @see curl_errno
     */
    public function errno() {
        return curl_errno($this->curl);
    }

    /**
     * Gets information regarding a specific transfer.
     *
     * @param int $option {@link http://ch.php.net/manual/en/function.curl-getinfo.php} to find a list of possible options.
     * @return string|array Returns a string if options is given otherwise associative array
     *
     * @see curl_getinfo
     */
    public function getinfo($option = null) {
        return curl_getinfo($this->curl, $option);
    }

    /**
     * Closes the current cUrl session.
     *
     * @return void
     *
     * @see curl_close
     */
    public function close() {
        return curl_close($this->curl);
    }
}
