<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CurlAPI {

	private $api_url;
	private $api_auth_userid;
	private $api_key;
	private $xpub_key;

	function __construct() {
		$CI =& get_instance();
		$this->api_url = 'https://api.blockchain.info/v2/';
		$this->api_auth_userid = 'http://lemexit.com';
		$this->api_key = '69244662-c51c-496d-838b-bc6c25159417';
		$this->xpub_key  = 'xpub6BhWSzBt9FCM8rpWR3uH6z4yYZf69sGqGtjoumzFQyUpHTPjrqJkATWopXTyTSv1NKoRjMWhdoC98krHcEPWLkcqtJam7veKmask8GMYezW';
	}

	private function call($url, $is_post = false, $data = false, $headers = array()) {
		ini_set('MAX_EXECUTION_TIME', 0);
		set_time_limit(0);

		### Makes an HTTP POST with JSON data
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, $is_post);
		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 0);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		if (count($headers) > 0) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}

		if ($is_post) {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}

		# Make the request
		$result = curl_exec($ch);
		$info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$error = curl_error($ch);

		curl_close($ch);

		return $result;
	}

	public function paymentsReceiving($callback){

		$url = $this->api_url."receive?xpub=%s&callback=%s&key=%s";
		$url = sprintf($url, $this->xpub_key, urlencode($this->api_auth_userid.$callback), $this->api_key);
		$result = $this->call($url);

		if ($result) {
			return json_decode($result, true);
		}

		return false;

	}

	public function paymentsDebug(){

		$url = $this->api_url."receive/callback_log?callback=%s&key=%s&";
		$url = sprintf($url, $this->api_auth_userid, $this->api_key);
		$result = $this->call($url);

		if ($result) {
			return json_decode($result, true);
		}

		return false;

	}

	public function modifyPrivacyProtection($data){

		$url = $this->api_url."domains/modify-privacy-protection.json?auth-userid=%s&api-key=%s&";
		$url = sprintf($url, $this->api_auth_userid, $this->api_key);
		$url .= http_build_query($data);
		$result = $this->call($url);

		if ($result) {
			return json_decode($result, true);
		}

		return false;

	}

}