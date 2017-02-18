<?php
	/**
	 * Messenger Bot Class.
	 * @author Pablo Montenegro
	 * @about Based on the Telegram API wrapper by Gabriele Grillo <gabry.grillo@alice.it>
	 */
	class Messenger {

		private $bot_id = "";
		private $api_version = "v2.6";
		private $data = array();
		private $updates = array();

		/// Class constructor
		public function __construct($bot_id) {
			$this->bot_id = $bot_id;
			$this->data = $this->getData();
		}

		/// Do requests to Messenger Bot API
		public function endpoint($api, array $content, $post = true) {
			$url = 'https://graph.facebook.com/' . $this->api_version . '/me/messages?access_token=' . $this->bot_id; // . '/' . $api;
			if ($post)
				$reply = $this->sendAPIRequest($url, $content);
			else
				$reply = $this->sendAPIRequest($url, array(), false);
			return json_decode($reply, true);
		}

		public function respondSuccess() {
			http_response_code(200);
			return json_encode(array("status" => "success"));
		}

		// send message
		public function sendMessage(array $content) {
			return $this->endpoint("sendMessage", $content);
		}

		/// Get the text of the current message
		public function Text() {
			return $this->data["entry"][0]["messaging"][0]["message"]["text"];
		}

		/// Get the chat_id of the current message
		public function ChatID() {
			return $this->data['entry'][0]['messaging'][0]['sender']['id'];
		}
		/// Get the message_id of the current message
		public function EntryID() {
			return $this->data["entry"][0]["id"];
		}

		private function sendAPIRequest($url, array $content, $post = true) {
			$ch = curl_init($url);
			if ($post) {
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));
			}
			curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($ch);
			curl_close($ch);
			return $result;
		}

		/// Get the data of the current message
		public function getData() {
			if (empty($this->data)) {
				$rawData = file_get_contents("php://input");
				return json_decode($rawData, true);
			} else {
				return $this->data;
			}
		}
	}

	// Helper for Uploading file using CURL
	if (!function_exists('curl_file_create')) {

		function curl_file_create($filename, $mimetype = '', $postname = '') {
			return "@$filename;filename="
				. ($postname ? : basename($filename))
				. ($mimetype ? ";type=$mimetype" : '');
		}
	}
?>
