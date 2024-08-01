<?php
session_start();
if ($_SESSION['userName'] == null && $_SESSION['userId'] == null) {
	header('location:../sign_in.php');
}
