<?php
	 class Controller_Play extends Controller {

	 	function __construct(){
	 		$this->model = new Model_Play();
	 		$this->view = new View();
	 	}

	 	function action_index()
		{
			$quest_id = intval($_GET['id']);
			if(empty($_COOKIE[$quest_id])){
				$data = $this->model->step($quest_id,1);
			}else{
				$data = $this->model->step($quest_id,$_COOKIE[$quest_id]);
			}
			if($data['step_type']=="END"){
				setcookie($quest_id, 1, time()+36000);	
			}
			$this->view->generate('play_view.php', 'template_view.php', $data);
		}	
	 } 
 ?>