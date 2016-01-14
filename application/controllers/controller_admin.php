<?php

	class Controller_Admin extends Controller
	{

		function __construct()
		{
			$this->model = new Model_Admin();
			$this->view = new View();
		}

		function action_index()
		{	
			if (!isset($_COOKIE['admin']))
				$this->view->generate('login_view.php', 'template_view.php', 'Login');
			else
			{
				$data = $this->model->get_posts_all();
				$this->view->generate('cp_view.php', 'template_view.php', 'Control panel', $data);
			}
		}

		function action_edit($post_id = NULL)
		{
			if (!empty($post_id))
			{
				$post = $this->model->get_post($post_id);
				$this->view->generate('edit_view.php', 'template_view.php', 'Edit - ' . $post['theme'], $post);
			}
			else
			{
				$this->view->generate('edit_view.php', 'template_view.php', 'Add new post');
			}
		}

		function action_insert()
		{
			if (isset($_COOKIE['admin']))
			{
				$this->model->insert($_POST['number'], $_POST['date'], $_POST['theme'], $_POST['description'], $_POST['content']);
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . 'admin');
			}
			else
			{
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . '404');
			}
		}

		function action_update()
		{
			if (isset($_COOKIE['admin']))
			{
				$this->model->update($_POST['id'], $_POST['number'], $_POST['date'], $_POST['theme'], $_POST['description'], $_POST['content']);
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . 'admin');
			}
			else
			{
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . '404');
			}
		}

		function action_delete($post_number)
		{
			if (isset($_COOKIE['admin']))
			{
				$this->model->delete($post_number);
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . 'admin');
			}
			else
			{
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . '404');
			}
		}

		function action_login()
		{
			if ($this->model->check_pass($_GET['username'], $_GET['password']))
			{
				setcookie('admin', 'admin', strtotime('+30 days'), '/');
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . 'admin');
			}
			else
			{
				$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
				header('Location:' . $host . 'admin');
			}
		}

		function action_logout()
		{
			setcookie('admin', 'admin', 1, '/');
			$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
			header('Location:' . $host . '');
		}

	}

?>