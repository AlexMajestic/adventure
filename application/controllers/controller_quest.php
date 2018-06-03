<?php
	 class Controller_Quest extends Controller {

	 	function __construct(){
	 		$this->model = new Model_Quest();
	 		$this->view = new View();
	 	}

	 	function action_index()
		{
			$quest_id = intval($_GET['id']);
			$data = $this->model->get_detail($quest_id);
			$this->view->generate('quest_view.php', 'template_view.php', $data);
		}	
	 } 
 ?>