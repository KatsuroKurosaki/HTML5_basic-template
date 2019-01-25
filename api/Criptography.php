<?php

class Criptography{

	// SSL encription
	const OPEN_SSL_METHOD = "aes-256-cbc";
	const OPEN_SSL_KEY = 'ChangeMePlease!!1';

	public static function encryptSSL($data){
		$encryption_key = base64_decode(self::OPEN_SSL_KEY);
		$iv = random_bytes(openssl_cipher_iv_length(self::OPEN_SSL_METHOD));
		$encrypted = openssl_encrypt($data, self::OPEN_SSL_METHOD, $encryption_key, 0, $iv);
		return bin2hex($iv) . $encrypted;
	}

	public static function decryptSSL($data){
		$encryption_key = base64_decode(self::OPEN_SSL_KEY);
		$ivsize = openssl_cipher_iv_length(self::OPEN_SSL_METHOD) * 2;
		$iv = hex2bin(substr($data, 0, $ivsize));
		$encrypted_data = substr($data, $ivsize);
		return openssl_decrypt($encrypted_data, self::OPEN_SSL_METHOD, $encryption_key, 0, $iv);
	}

	public static function hashPassword($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public static function checkPassword($password, $hash){
		return password_verify($password, $hash);
	}

	public static function passwordRehash($hash){
		return password_needs_rehash($hash, PASSWORD_DEFAULT);
	}
}
