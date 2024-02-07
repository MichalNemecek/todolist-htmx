<?php session_start(); ?>
<div id="form">
<input type="text" id="inputfield" name="task" placeholder="Task description"/>
<button type="button" hx-trigger="click" hx-post="/api/todos/" hx-target="#app" hx-include="#inputfield" id="submitbtn">Add</button>
</div>
