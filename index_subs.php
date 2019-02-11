<?php

require_once('includes/subscribe.php');

if(isset($_POST['subscribe'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $country = trim($_POST['country']);

    $result = sendForm($fname,$lname,$email,$country);
    $message = $result;
}

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type='text/css' media="screen" href="css/main.css">
    <script src="js/main.js"></script>
</head>
<body>

<?php if(!empty($message)):?>
        <p id="error"><?php echo $message;?></p>
    <?php endif?>
    <form action="index_subs.php" method="POST">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="fname"><br><br>
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="lname"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country"><br><br>
        <button type="submit" name="subscribe">Subscribe</button>

</body>
</html>