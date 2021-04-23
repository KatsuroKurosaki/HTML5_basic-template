<?php

namespace Network;

class Curl
{

	const REQUEST_GET = 'GET';
	const REQUEST_POST = 'POST';
	const REQUEST_PUT = 'PUT';
	const REQUEST_DELETE = 'DELETE';
	const DEFAULT_TIMEOUT = 10;

	private $userAgent;
	private $url;
	private $cookieJar;
	private $curl;
	private $responseInfo;
	private $responseHeader;
	private $responseBody;

	public function __construct($url = '')
	{
		$this->url = $url;
		$this->responseHeader = array();

		$curlinfo = curl_version();
		$this->userAgent = 'PHP/' . PHP_VERSION . ' (' . PHP_OS . '; ' . $curlinfo['host'] . ') cURL/' . $curlinfo['version'] . ' ' . $curlinfo['ssl_version'];
		unset($curlinfo);

		$this->curl = curl_init();
		curl_setopt_array($this->curl, [
			CURLOPT_VERBOSE => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => $this->url,
			CURLOPT_HEADERFUNCTION => function ($curl, $header) {
				$len = strlen($header);
				$header = explode(':', $header, 2);
				if (count($header) < 2) {
					return $len;
				}
				$this->responseHeader[strtolower(trim($header[0]))][] = trim($header[1]);

				return $len;
			},
			CURLINFO_HEADER_OUT => true,
			CURLOPT_USERAGENT => $this->userAgent,
			CURLOPT_TIMEOUT => self::DEFAULT_TIMEOUT,
		]);
	}

	public function __destruct()
	{
		$this->close();
		if (isset($this->cookieJar) && file($this->cookieJar)) {
			unlink($this->cookieJar);
		}
	}

	public function close()
	{
		if (is_resource($this->curl))
			curl_close($this->curl);
	}

	public function setParam($option, $value)
	{
		// More info on: http://php.net/manual/en/function.curl-setopt.php
		return curl_setopt($this->curl, $option, $value);
	}

	public function setUrl(string $url)
	{
		$this->url = $url;
		$this->setParam(CURLOPT_URL, $this->url);
	}

	public function setUserAgent(string $userAgent)
	{
		$this->userAgent = $userAgent;
		$this->setParam(CURLOPT_USERAGENT, $this->userAgent);
	}

	public function setTimeout(int $timeout)
	{
		$this->setParam(CURLOPT_TIMEOUT, $timeout);
	}

	public function setSslCheck($value)
	{
		$this->setParam(CURLOPT_SSL_VERIFYPEER, $value);
		$this->setParam(CURLOPT_SSL_VERIFYHOST, $value);
	}

	public function setHttpMethod($value)
	{
		$this->setParam(CURLOPT_CUSTOMREQUEST, $value);
	}

	public function setPostData($value)
	{
		$this->setParam(CURLOPT_POSTFIELDS, $value);
	}

	public function setCookieJar($file)
	{
		$this->_cookieJar = $file;
		$this->setParam(CURLOPT_COOKIEJAR, $this->cookieJar);
		$this->setParam(CURLOPT_COOKIEFILE, $this->cookieJar);
	}

	// - $headers: ['Content-Type: application/json']
	public function setHeaders($headers)
	{
		$this->setParam(CURLOPT_HTTPHEADER, $headers);
	}

	// Proxy types:
	// - CURLPROXY_HTTP
	// - CURLPROXY_SOCKS4
	// - CURLPROXY_SOCKS5
	// - CURLPROXY_SOCKS4A
	// - CURLPROXY_SOCKS5_HOSTNAME
	public function setProxy($proxyType, $proxyURL)
	{
		$this->setParam(CURLOPT_PROXY, $proxyURL);
		$this->setParam(CURLOPT_PROXYTYPE, $proxyType);
	}

	public function getResponseInfo()
	{
		return $this->responseInfo;
	}

	public function getResponseHeaders()
	{
		return $this->responseHeader;
	}

	public function getResponseBody()
	{
		return $this->responseBody;
	}

	public function execute()
	{
		$result = curl_exec($this->curl);
		$this->responseInfo =  curl_getinfo($this->curl);
		$this->responseBody = $result;
	}
}
