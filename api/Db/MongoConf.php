<?php

namespace Db;

class MongoConf{
	//inicializador
	public function __construct(){ }
	
	//Bd data
	const DB_HOST = '127.0.0.1:27017';
	const DB_USER = 'user';
	const DB_PASS = 'pass';
	const DB_DDBB = 'ddbb';
	const DB_AUTH = 'admin';
	const DB_TIMEOUT = 3000;
	
}
