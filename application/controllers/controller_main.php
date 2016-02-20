<?php

	class Controller_Main extends Controller
	{

		function __construct()
		{
			$this->model  = new Model_Main();
			$this->view   = new View();
			$this->detect = new Mobile_Detect();
		}

		function action_index()
		{	
			if (!$this->detect->isMobile() && !$this->detect->isTablet())
				$this->view->generate('main_view.php', 'template_view.php', 'Home');
			else
				$this->view->generate('mobile_main_view.php', 'template_view.php', 'Home Mobile');
		}
	}

?>