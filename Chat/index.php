<?php
function getShoutBoxContent() {
	// URL to the chat directory:
	if(!defined('AJAX_CHAT_URL')) {
		define('AJAX_CHAT_URL', './chat/');
	}
	
	// Path to the chat directory:
	if(!defined('AJAX_CHAT_PATH')) {
		define('AJAX_CHAT_PATH', realpath(dirname($_SERVER['SCRIPT_FILENAME']).'/chat').'/');
	}
	
	// Validate the path to the chat:
	if(is_file(AJAX_CHAT_PATH.'lib/classes.php')) {
		
		// Include Class libraries:
		require_once(AJAX_CHAT_PATH.'lib/classes.php');
		
		// Initialize the shoutbox:
		$ajaxChat = new CustomAJAXChatShoutBox();
		
		// Parse and return the shoutbox template content:
		return $ajaxChat->getShoutBoxContent();
	}
	
	return null;
}

function getChatInterface() {
	static $ajaxChat;
	
	if(!$ajaxChat) {
		// URL to the chat directory:
		if(!defined('AJAX_CHAT_URL')) {
			define('AJAX_CHAT_URL', './chat/');
		}
		
		// Path to the chat directory:
		if(!defined('AJAX_CHAT_PATH')) {
			define('AJAX_CHAT_PATH', realpath(dirname($_SERVER['SCRIPT_FILENAME']).'/chat').'/');
		}
		
		// Validate the path to the chat:
		if(is_file(AJAX_CHAT_PATH.'lib/classes.php')) {
			
			// Include Class libraries:
			require_once(AJAX_CHAT_PATH.'lib/classes.php');
			
			// Initialize the chat interface:
			$ajaxChat = new CustomAJAXChatInterface();
		}
	}
	
	return $ajaxChat;
}

function getChatOnlineUsers() {
	return ($chatInterface = getChatInterface()) ? $chatInterface->getOnlineUsers() : array();
}

function getChatOnlineUserIDs() {
	return ($chatInterface = getChatInterface()) ? $chatInterface->getOnlineUserIDs() : array();
}

function getChatOnlineUsersData() {
	return ($chatInterface = getChatInterface()) ? $chatInterface->getOnlineUsersData() : array();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en" dir="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>AJAX Chat</title>
	<link rel="stylesheet" type="text/css" href="./chat/css/shoutbox.css" title="AJAX Chat Shoutbox Style"/>
</head>

<body>
	<div style="width:200px;"><?php echo getShoutBoxContent(); ?></div>
	<div><?php
		echo '<pre>';
		print_r(getChatOnlineUsers());
		print_r(getChatOnlineUserIDs());
		print_r(getChatOnlineUsersData());
		echo '</pre>';
	?></div>
</body>

</html>