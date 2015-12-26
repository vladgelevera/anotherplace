<?php

	class Model
	{
		
		/*
			Модель обычно включает методы выборки данных, это могут быть:
				> методы нативных библиотек pgsql или mysql;
				> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
				> методы ORM;
				> методы для работы с NoSQL;
				> и др.
		*/

		// access to database
		public function get_connection()
		{
			return $connection = new mysqli('localhost', 'root', '', 'anotherplace_db');
		}
		
	}

?>