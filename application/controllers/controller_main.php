<?php
	 class Controller_Main extends Controller {

	 	function __construct(){
	 		$this->model = new Model_Main();
	 		$this->view = new View();
	 	}

	 	function action_index()
		{
			$data = $this->model->get_quests();
			$this->view->generate('main_view.php', 'template_view.php', $data);
		}	
	 } 
 ?>