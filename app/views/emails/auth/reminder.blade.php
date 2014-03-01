<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			To reset your Open Source Collaborative Consumption Marketplace password, click <a href="{{ URL::to('password/reset', array($token)) }}"> here</a>.
			<p>Cheers,</p>
			<p>Open Source Collaborative Consumption Marketplace</p>
		</div>
	</body>
</html>