<?php
	class Model_Play extends Model {
		public function step($quest_id,$step_id){
			$correct = $this->check_answer($quest_id,$step_id,$_POST['answer']);
			$this->check_step($quest_id,$step_id,$correct);
			$array = $this->get_step($quest_id,$step_id); 
			$array['result'] = $correct;
			return $array;
		}


		private function get_step($quest_id,$step_id){
			include 'sql.php';
			$sql = mysqli_query($link,"SELECT * FROM steps WHERE quest_id='$quest_id' AND step_number = '$step_id'");
			$result = mysqli_fetch_array($sql);
			$sql = mysqli_query($link,"SELECT qs_number FROM quest WHERE ID='$quest_id'");
			$result['steps'] = mysqli_fetch_array($sql);
			return $result;
		}

		private function check_answer($quest_id,$step_id,$answer){
			include 'sql.php';
			$sql = mysqli_query($link,"SELECT correct FROM steps WHERE quest_id='$quest_id' AND step_number = '$step_id'");
			$result = mysqli_fetch_array($sql);
			$correct = explode("%",$result['correct']);
			if($result['correct']!=NULL){
				foreach ($correct as $key => $value) {
					$value = str_replace(" ","",$value);
					$answer = str_replace(" ","",$answer);
					if(mb_strtolower($value)==mb_strtolower($answer)){
						return true;
					}
				}
			}
			return false;
		}

		private function check_step($quest_id,$step_id,$correct){
			if($correct == true){
				include 'sql.php';
				$sql = mysqli_query($link,"SELECT next_step FROM steps WHERE quest_id='$quest_id' AND step_number = '$step_id'");
				$result = mysqli_fetch_array($sql);
				setcookie($quest_id, $result['next_step'], time()+36000);
				session_start();
				unset($_SESSION['variants']);
				unset($_POST);
				ob_end_clean();
				header ("Location: /play?id=$quest_id");
			}
			session_start();
			$_SESSION['variants'].= " " . $_POST['answer'];
			unset($_POST);
			return;
		}
	}
?>