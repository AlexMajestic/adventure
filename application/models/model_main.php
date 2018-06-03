<?php
	class Model_Main extends Model {
		public function get_quests(){
			return $array = $this->quests(); 
		}

		private function quests(){
			include 'sql.php';
			$sql = mysqli_query($link,'SELECT ID,name,timing,image FROM quest');
			$result = array();
			while ($r = mysqli_fetch_assoc($sql)) {
			    $result[] = $r;
			}
			return $result;
		}
	}
?>