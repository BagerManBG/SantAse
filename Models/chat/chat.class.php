<?php 

	class Chat
	{
		private $sender_id;
		private $message;

		public function setData($send, $mess)
		{
			$this->sender_id = $send;
			$this->message = $mess;
			$this->validateMessage();
		}

		public function getSender()
		{
			return $this->sender_id;
		}

		public function getMessage()
		{
			return $this->message;
		}

		private function validateMessage()
		{
			$this->message = trim($this->message);
			$this->message = htmlentities($this->message, ENT_QUOTES);
		}
	}

	$ch = new Chat();
?>