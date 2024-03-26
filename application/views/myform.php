<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
    <h1>Form</h1>

    <form action="<?php echo site_url('form/showform');?>" method="post">
        name : <input type="text" name="name" required placeholder="name">
        <br>
        lname : <input type="text" name="lname" required placeholder="lastname">
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
