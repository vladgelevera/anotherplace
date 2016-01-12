<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
	class Route
	{

		static function start()
		{
			// контроллер и действие по умолчанию
			$controller_name = 'Main';
			$action_name = 'index';

			if (empty($_GET) && empty($_POST))
				$routes = explode('/', $_SERVER['REQUEST_URI']);
			else
				$routes = explode('/', $_SERVER['REDIRECT_URL']);

			// получаем имя контроллера
			if (!empty($routes[1]))
			{	
				$controller_name = $routes[1];
			}
			
			// получаем имя экшена
			if (!empty($routes[2]))
			{
				$action_name = $routes[2];
			}

			// получаем имя поста для отображения
			if (!empty($routes[3]))
			{
				$post_id = $routes[3];
			}

			// добавляем префиксы
			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'action_'.$action_name;

			
			/*echo "Model: $model_name <br>";
			echo "Controller: $controller_name <br>";
			echo "Action: $action_name <br>";
			echo "Post: $post_id <br>";*/
			

			// подцепляем файл с классом модели (файла модели может и не быть)
			$model_file = strtolower($model_name) . '.php';
			$model_path = "application/models/" . $model_file;
			if(file_exists($model_path))
			{
				include "application/models/" . $model_file;
			}

			// подцепляем файл с классом контроллера
			$controller_file = strtolower($controller_name) . '.php';
			$controller_path = "application/controllers/" . $controller_file;
			if(file_exists($controller_path))
			{
				include "application/controllers/" . $controller_file;
			}
			else
			{
				/*
				правильно было бы кинуть здесь исключение,
				но для упрощения сразу сделаем редирект на страницу 404
				*/
				Route::ErrorPage404();
			}
			
			// создаем контроллер
			$controller = new $controller_name;
			$action = $action_name;
			
			// если в ссылке есть пост для отображения
			if (!empty($post_id))
			{
				if(method_exists($controller, $action))
				{
					// вызываем действие контроллера и передаем как аргумент айди поста для отображения
					$controller->$action($post_id);
				}
				else
				{
					// здесь также разумнее было бы кинуть исключение
					Route::ErrorPage404();
				}
			}
			// если поста нету, то вызываем простое действие
			else
			{
				if(method_exists($controller, $action))
				{
					// вызываем действие контроллера
					$controller->$action();
				}
				else
				{
					// здесь также разумнее было бы кинуть исключение
					Route::ErrorPage404();
				}
			}
		
		}

		static function ErrorPage404()
		{
			$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
			//header('HTTP/1.1 404 Not Found');
			//header("Status: 404 Not Found");
			header('Location:' . $host . '404');
		}
	    
	}

?>