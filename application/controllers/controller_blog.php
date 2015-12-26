<?php

	class Controller_Blog extends Controller
	{

		function __construct()
		{
			$this->model = new Model_Blog();
			$this->view = new View();
		}

		function action_index()
		{
			$data = $this->model->get_posts_all();
			$this->view->generate('blog_view.php', 'template_view.php', 'Blog', $data);
		}

		function action_view($post_id)
		{	
			$post = $this->model->get_post($post_id);
			$this->view->generate('post_view.php', 'template_view.php', $post['theme'], $post);
		}
	}

?>