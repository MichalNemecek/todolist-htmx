<?php session_start(); ?>
<!doctype html>
<html>

<head>
	<title>PHP + HTMX to-do list</title>
	<meta charset="utf-8" />
	<script src="https://unpkg.com/htmx.org/dist/htmx.min.js"></script>
<link rel="stylesheet" href="/css/out.css">
</head>

<body>
	<div class="title">HTMX + PHP to-do list</div>
	<div id="app" hx-trigger="load" hx-get="/api/todos/">

	</div>
</body>

</html>
