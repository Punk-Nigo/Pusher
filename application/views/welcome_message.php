<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<!-- pusher -->
	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
	<button type="button" id="showEvent">Show Pusher Event</button>
	<!-- script -->
	<script>
		// pusher
		Pusher.logToConsole = true;
		var pusher = new Pusher('key', {cluster: 'ap3'});
		pusher.subscribe('my-channel')
		.bind('my-event', function(data)
		{
			alert(JSON.stringify(data));
		});

		// http
		document.getElementById("showEvent").addEventListener("click", function()
		{
			var request = new XMLHttpRequest();

			request.onreadystatechange = function()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					console.log(request.responseText);
				}
			}
			request.open("GET", "index.php/event_trigger", true);
			request.send(null);
		});
	</script>
</body>
</html>
