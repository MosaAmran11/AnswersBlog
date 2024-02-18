<?php
session_start();
if($_SESSION['adminName'] == null && $_SESSION['adminId'] == null)
{
	header('location:sign_in.php');
}
?>