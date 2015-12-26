<?php

	class Model_Blog extends Model
	{

		public function get_posts_all()
		{	
			$connection = $this->get_connection();
			$query = "SELECT * FROM news  ORDER BY `number` DESC";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result))
				$posts[] = $row;
			return $posts;
		}
		
		public function get_post($post_id)
		{	
			$connection = $this->get_connection();
			$query = "SELECT * FROM `news` WHERE `number` = '$post_id'";
			$result = mysqli_query($connection, $query);
			$post = mysqli_fetch_assoc($result);
			return $post;
		}

	}

?>