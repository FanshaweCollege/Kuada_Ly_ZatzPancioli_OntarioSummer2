<?php

function sendForm($fname,$lname,$email,$country){
    include('connect.php');

    //check is email exists
    $check_email_query = 'SELECT subs_email FROM tbl_subs WHERE subs_email = :subs_email';
    $email_set = $pdo->prepare($check_email_query);
    $email_set -> execute(
        array(
            ':subs_email' => $email
        )
    );

    //if email already exists send message, if not add to database
    if($email_set -> fetch() > 0){
        $message = 'Email already in use';
        return $message;
    }else{
        $create_subs_query = 'INSERT INTO tbl_subs(subs_fname,subs_lname,subs_email,subs_country)';
        $create_subs_query .= ' VALUES(:fname,:lname,:email,:country)';
        $create_subs_set = $pdo->prepare($create_subs_query);
        $create_subs_set->execute(
            array(
                ':fname'=>$fname,
                ':lname'=>$lname,
                ':email'=>$email,
                ':country'=>$country
            )
        );
    }

}

?>