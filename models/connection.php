<?php

	 class Db 
	{
		private static $instance=NULL;
		
		public function __construct(){}

		private function __clone(){}
		
		public static function getConnect()
		{
			if (!isset(self::$instance))
			{
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
				self::$instance= new PDO('mysql:host=localhost;dbname=marte','socio','socio',$pdo_options);
			}
			
			
			return self::$instance;
			
		}

		public static function cerrar()
		{
			self::$instance = ('mysql_close()');
			$instance=NULL;
		}

 
		
	}

?>