<?php
$server = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'blog';

$conn = @mysqli_connect($server, $username, $password, $database) or die("Connection Error: " . mysqli_connect_error());
if ($conn) {
    mysqli_set_charset($conn, 'utf8');
}
