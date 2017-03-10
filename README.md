# MessengerBotPHP
> A very simple PHP [Messenger Bot API](https://developers.facebook.com/docs/messenger-platform) for sending messages.    
> Based on [Telegram Bot API](https://github.com/Eleirbag89/TelegramBotPHP) by [Eleirbag89](https://github.com/Eleirbag89).

Requirements
---------

* PHP5
* Curl for PHP5 must be enabled.
* Create a Facebook App at [https://developers.facebook.com/apps/](https://developers.facebook.com/apps/)

For the WebHook:
* An SSL certificate (Telegram API requires this). You can use [Cloudflare's Free Flexible SSL](https://www.cloudflare.com/ssl) which crypts the web traffic from end user to their proxies if you're using CloudFlare DNS.    

Installation
---------

* Copy Messenger.php into your server and include it in your new bot script
```php
include("Messenger.php");
$facebook = new Messenger($bot_id);
```

Configuration (WebHook)
---------

Navigate to [https://developers.facebook.com/apps/YOUR_APP_ID/messenger/](https://developers.facebook.com/apps/YOUR_APP_ID/messenger/) and add the webhook.

Examples
---------

```php
$facebook = new Messenger($bot_id);
$text = $facebook->Text();
$chat_id = $facebook->ChatID();
$message_id = $facebook->EntryID();
$message = "Hello World";
$result = $facebook->sendMessage($chat_id, $message);
```

See examples.php for the complete example.

Emoticons
------------
For a list of emoticons to use in your bot messages, please refer to the column Bytes of this table:
http://apps.timwhitlock.info/emoji/tables/unicode

F.A.Q.
------------
**Q: Can you implement <???> function?**

A: I can try. Open a issue and I'll see what I can do.

**Q: Your code is awesome. How can I help?**

A: Thank you! You can help by codding more features, creating pull requests, or donating using Bitcoin: **1BdL9w4SscX21b2qeiP1ApAFNAYhPj5GgG**

License
------------
Free. Don't forget to star :D and send pull requests. :D

**Free Software, Hell Yeah!**