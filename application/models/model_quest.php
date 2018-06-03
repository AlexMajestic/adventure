<?php
	class Model_Quest extends Model {
		public function get_detail($id){
			return $array = $this->detail($id); 
		}

		private function detail($id){
			include 'sql.php';
			$sql = mysqli_query($link,"SELECT ID,name,timing,image,description,distance,start,schedule,qs_number FROM quest WHERE ID='$id'");
			$result = mysqli_fetch_array($sql);
			$result_image = $this->slider_image($id);
			$result['slider_image'] = $result_image;
			return $result;
		}

		private function slider_image($id){
			include 'sql.php';
			$sql = mysqli_query($link,"SELECT link FROM quest_desc_image WHERE quest_id='$id'");
			$result = array();
			while($r = mysqli_fetch_assoc($sql)){
				$result[] = $r;
			}
			if(!empty($result)){
				return $result;
			}
			return NULL;
		}
	}
?>