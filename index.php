<?php session_start();if(!isset($_SESSION['user'])){header("Location: login.php");}else include "config/modul/html.class.php";include "config/modul/db.class.php";$html=new html();$db=new db();$db->opendb();$_GET['mod'] = !isset($_GET['mod']) ? null :$_GET['mod'];$_GET['temp'] = !isset($_GET['temp']) ? null :$_GET['temp'];$_GET['st'] = !isset($_GET['st']) ? null :$_GET['st'];$_GET['mode'] = !isset($_GET['mode']) ? null :$_GET['mode'];$_GET['token']= !isset($_GET['token']) ? null :$_GET['token'];$_GET['hal']= !isset($_GET['hal']) ? null :$_GET['hal'];$_GET['whereF']= !isset($_GET['whereF']) ? null :$_GET['whereF'];$_GET['where']= !isset($_GET['where']) ? null :$_GET['where'];$_GET['order']= !isset($_GET['order']) ? null :$_GET['order'];$_GET['asc']= !isset($_GET['asc']) ? null :$_GET['asc'];$_GET['id']= !isset($_GET['id']) ? null :$_GET['id'];$_GET['tpu']= !isset($_GET['tpu']) ? null :$_GET['tpu'];if($_GET['mode']=='logout'){	session_unset();	header("Location: login.php");	}include_once "pages/header.php";include_once "pages/main.php";include_once "pages/footer.php"  ?>