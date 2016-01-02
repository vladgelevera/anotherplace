<?php

	class Model_Admin extends Model
	{

		public function hash_equals($str1, $str2) 
		{
			if(strlen($str1) != strlen($str2)) 
			{
				return false;
			} 
			else 
			{
				$res = $str1 ^ $str2;
				$ret = 0;
				for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
					return !$ret;
			}
		}

		public function check_pass($username, $password)
		{	
			$connection = $this->get_connection();
			$query = "SELECT `hash` FROM `admin` WHERE `username` = '$username'";
			$result = mysqli_query($connection, $query);
			$post = mysqli_fetch_assoc($result);
			if ($this->hash_equals($post['hash'], crypt($password, $post['hash'])))
				return true;
			else
				return false;
		}

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

		public function insert($post_number, $post_date, $post_theme, $post_description, $post_content)
		{	
			$connection = $this->get_connection();
			$query = "INSERT INTO `news` (`number`, `date`, `theme`, `description`, `content`) 
			          VALUES ('$post_number', '$post_date', '$post_theme', '$post_description', '$post_content')";
			$result = mysqli_query($connection, $query);
			if ($result)
				return true;
			else
				return false;
		}

		public function update($post_id, $post_number, $post_date, $post_theme, $post_description, $post_content)
		{	
			$connection = $this->get_connection();
			$query = "UPDATE `news` 
			          SET `number` = '$post_number', `date` = '$post_date', `theme` = '$post_theme', `description` = '$post_description', `content`= '$post_content' 
			          WHERE `id` = '$post_id'";
			$result = mysqli_query($connection, $query);
			if ($result)
				return true;
			else
				return false;
		}

		public function delete($post_number)
		{
			$connection = $this->get_connection();
			$query = "DELETE FROM `news` WHERE `number` = '$post_number'";
			$result = mysqli_query($connection, $query);
			if ($result)
				return true;
			else
				return false;
		}

	}

?>