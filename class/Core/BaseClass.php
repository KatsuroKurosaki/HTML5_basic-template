<?php

namespace Core;

class BaseClass extends \Core\BaseObject
{

	protected $id = null;
	protected $key = null;

	/** @var string */
	protected $language = "esp";
	/** @var string */
	protected $defaultLanguage = "esp";

	/**
	 * BaseClass constructor.
	 * @param string $language
	 */
	public function __construct(string $language = "esp")
	{
		$this->__set("language", $language);
	}

	/** Getters **/
	public function getId()
	{
		return $this->__get("id");
	}

	public function getLanguage()
	{
		return $this->__get("language");
	}

	public function getDefaultLanguage()
	{
		return $this->__get("defaultLanguage");
	}

	/** Setters **/
	public function setId(int $value)
	{
		$this->__set("id", $value);
	}

	public function setKey(int $value)
	{
		$this->__set("key", $value);
	}
}
