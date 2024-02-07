<?php
session_start();
function parse_query($q){
	$o = array();
	$e = explode("&", $q);
	foreach($e as $s){
		$nv = explode("=", $s, 2);
		$name = urldecode($nv[0]);
		$val = isset($nv[1]) ? urldecode($nv[1]) : null;
		$o[$name] = $val;
	}
	return $o;
}
if(!isset($_SESSION["todos"])){
	$_SESSION["todos"] = array();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	array_push($_SESSION["todos"], array("text" => $_POST["task"], "done" => false));
}
if($_SERVER["REQUEST_METHOD"] == "PUT"){
	$putdata = parse_query(file_get_contents("php://input"));
	$putid = $putdata["id"];
	$_SESSION["todos"][$putid]["done"] = !$_SESSION["todos"][$putid]["done"];
}
if($_SERVER["REQUEST_METHOD"] == "DELETE"){
	$deldata = parse_query(file_get_contents("php://input"));
	$delid = $deldata["id"];
	array_splice($_SESSION["todos"], $delid, 1);
}
?>
<div id=topbar>
<button type="button" hx-trigger="click" hx-get="/api/todos/form.php" hx-target="#app" id="newtask">+</button>
</div>
<div class="todolist">
<?php
	foreach($_SESSION["todos"] as $todoid => $todo){
?>
<div class="todo<?php if($todo["done"]){echo " done";}?>">
<div class="todo-text" hx-put="/api/todos/" hx-vals='{"id":<?php echo $todoid;?>}' hx-target="#app"><?php echo $todo["text"];?></div>
<button class="delbutton" type="button" hx-trigger="click" hx-delete="/api/todos/" hx-vals='js:{id:<?php echo $todoid;?>}' hx-target="#app">X</button>
</div>
<?php
}
?></div>
