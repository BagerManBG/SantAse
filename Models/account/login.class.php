<?php 

	class LogValidate
	{
		private $username;
		private $password;

		public function setLoginData($user, $pass)
		{
			$this->username = $user;
			$this->password = $pass;

			$this->validateUsername();
			$this->validatePassword();
		}

		public function getUsername()
		{
			return $this->username;
		}

		public function getPassword()
		{
			return $this->password;
		}

		private function validateUsername()
		{
			$this->username = str_replace(' ', '-', $this->username);
   			$this->username = preg_replace('/[^A-Za-z0-9._]/', '', $this->username);
		}

		private function validatePassword()
		{
			$this->password = str_replace(' ', '-', $this->password);
   			$this->password = preg_replace('/[^A-Za-z0-9]/', '', $this->password);
   			$this->password = md5($this->password);
		}
	} 

	$log = new LogValidate();
?>