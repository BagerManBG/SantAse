<?php 

	class RegValidate
	{
		private $username;
		private $email;
		private $password;
		private $passConfirm;
		private $hasError = false;

		public function setData($user, $mail, $pass, $conf)
		{
			$this->username = $user;
			$this->email = $mail;
			$this->password = $pass;
			$this->passConfirm = $conf;
		}

		private function checkUsername()
		{
			if(strlen($this->username) == 0)
			{
				$this->hasError = true;
			}

			if(strlen($this->username) < 4)
			{
				$this->hasError = true;
			}

			if(strlen($this->username) > 20)
			{
				$this->hasError = true;
			}

			if(!preg_match('/^(?=.{4})(?!.{21})[^\W_]*[a-z][^\W_]*$/i', $this->username))
			{
				$this->hasError = true;
			}
		}

		private function checkEmail()
		{
			$regex = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";

			if(strlen($this->email) == 0)
			{
				$this->hasError = true;
			}

			if(!preg_match($regex, $this->email))
			{
				$this->hasError = true;
			}

			if(!preg_match('/^[a-z0-9@._]+$/i', $this->email))
			{
				$this->hasError = true;
			}
		}

		private function checkPassword()
		{
			if(strlen($this->password) == 0)
			{
				$this->hasError = true;
			}

			if(strlen($this->password) < 4)
			{
				$this->hasError = true;
			}

			if(strlen($this->password) > 20)
			{
				$this->hasError = true;
			}

			if(!preg_match('/^[a-z0-9]*$/i', $this->password))
			{
				$this->hasError = true;
			}

			if(strcmp($this->passConfirm, $this->password) != 0)
			{
				$this->hasError = true;
			}
		}

		public function getError()
		{
			$this->checkUsername();
			$this->checkEmail();
			$this->checkPassword();

			return $this->hasError;
		}
	}

	$reg = new RegValidate();
?>