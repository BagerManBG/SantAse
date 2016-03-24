<?php 

	class Chat
	{
		private $sender_id;
		private $message;

		public function setData($send, $mess)
		{
			$this->sender_id = $send;
			$this->message = $mess;
		}

		public function getSender()
		{
			return $this->sender_id;
		}

		public function getMessage()
		{
			return $this->message;
		}
	}

	$ch = new Chat();
?>