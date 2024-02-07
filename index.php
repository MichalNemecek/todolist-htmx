<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<title>PHP + HTMX to-do list</title>
		<meta charset="utf-8" />
		<script src="https://cdn.tailwindcss.com/"></script>
		<script src="https://unpkg.com/htmx.org/dist/htmx.min.js"></script>
		<style type="text/tailwindcss">
body {
	@apply bg-stone-700 text-xl text-stone-300;
}
#app {
	@apply w-96 bg-stone-800 rounded-lg mx-auto mt-3 p-3 grid gap-y-3;
}
#topbar {
	@apply grid grid-cols-8;

}
#newtask {
	@apply aspect-square bg-stone-600 text-stone-300 rounded-lg col-start-8;
}
#form {
	@apply grid grid-cols-8 gap-3;
}
#inputfield {
	@apply rounded-lg bg-stone-600 text-stone-300 p-3 col-span-6;
}
#submitbtn {
	@apply rounded-lg bg-stone-500 text-stone-200 p-3 col-span-2;
}
.todolist {
	@apply grid gap-3;
}
.todo {
	@apply bg-stone-600 p-3 rounded-lg flex justify-between;
}
.todo.done .todo-text{
	@apply line-through text-stone-500;
}
.todo-text {
	@apply text-left align-bottom flex-grow;
}
.delbutton {
	@apply bg-stone-800 text-center rounded-lg col-start-4 aspect-square px-2;
}
.title {
	@apply w-96 bg-stone-900 text-2xl mx-auto mt-3 p-3 text-center rounded-l rounded-lg;
}

		</style>
	</head>
	<body>
		<div class="title">HTMX + PHP to-do list</div>
		<div id="app" hx-trigger="load" hx-get="/api/todos/">

		</div>
	</body>
</html>
