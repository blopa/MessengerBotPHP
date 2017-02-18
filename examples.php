<?php
	include("Messenger.php");
	$apiKey = "YOUR_API_KEY";

	// Instances the Facebook class
	$facebook = new Messenger($apiKey);

	// Take text and chat_id from the message
	$text = $facebook->Text();
	$chat_id = $facebook->ChatID();
	$message_id = $facebook->EntryID();

	$message = "";
	$result = "";

	if(!is_null($text) && !is_null($chat_id))
	{
		if ($text == "text") // simple text message
		{
			$message = "Hello World";
			$result = $facebook->sendMessage($chat_id, $message);
		}
		else if ($text == "button") // buttons
		{
			$message = "Hello World";
			$button = array(
				array(
					'type' => 'web_url',
					'url' => 'https://google.com',
					'title' => 'Button 1'
				),
				array(
					'type' => 'web_url',
					'url' => 'https://google.com',
					'title' => 'Button 2'
				),
				array(
					'type' => 'web_url',
					'url' => 'https://google.com',
					'title' => 'Button 3'
				)
			);
			$result = $facebook->sendButtonTemplate($chat_id, $message, $button);
		}
		else if ($text == "replies") // quick replies
		{
			$message = "Pick one";
			$replies = array(
				array(
					'content_type' => 'text',
					'title' => 'Option One',
					'payload' => 'PAYLOAD_ONE'
				),
				array(
					'content_type' => 'text',
					'title' => 'Option Two',
					'payload' => 'PAYLOAD_TWO'
				),
				array(
					'content_type' => 'text',
					'title' => 'Option Three',
					'payload' => 'PAYLOAD_THREE'
				)
			);
			$result = $facebook->sendQuickReply($chat_id, $message, $replies);
		}
		else if ($text == "generic") // generic template
		{
			$button = array(
				array(
					'type' => 'web_url',
					'url' => 'https://google.com',
					'title' => 'Button One'
				),
				array(
					'type' => 'web_url',
					'url' => 'https://google.com',
					'title' => 'Button Two'
				)
			);
			$elements = array(
				array(
					'title' => 'Title One',
					'item_url' => 'https://google.com',
					'image_url' => 'http://placehold.it/350x350',
					'subtitle' => 'Item Description Here',
					'buttons' => $button
				),
				array(
					'title' => 'Title Two',
					'item_url' => 'https://google.com',
					'image_url' => 'http://placehold.it/350x350',
					'subtitle' => 'Item Description Here',
					'buttons' => $button
				),
				array(
					'title' => 'Title Three',
					'item_url' => 'https://google.com',
					'image_url' => 'http://placehold.it/350x350',
					'subtitle' => 'Item Description Here',
					'buttons' => $button
				),
				array(
					'title' => 'Title Four',
					'item_url' => 'https://google.com',
					'image_url' => 'http://placehold.it/350x350',
					'subtitle' => 'Item Description Here',
					'buttons' => $button
				),
				array(
					'title' => 'Title Five',
					'item_url' => 'https://google.com',
					'image_url' => 'http://placehold.it/350x350',
					'subtitle' => 'Item Description Here',
					'buttons' => $button
				)
			);
			$result = $facebook->sendGenericTemplate($chat_id, $elements);
		}
	}
?>