<?php


//process_data.php

if (isset($_POST["telefon"])) {
    sleep(3);
    $connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");

    $success = '';

    $telefon = $_POST["telefon"];

    $phone_error = '';


    if (empty($telefon))
        $phone_error = 'Phone is Required';

    if ($phone_error == '') {
        //put insert data code here

        $data = array(
            ':telefon' => $telefon,
        );

        $query = "
		INSERT INTO 'tabela'
		(telefon)
		VALUES (:telefon)
		";

        $statement = $connect->prepare($query);

        $statement->execute($data);

        $success = '<div class="alert alert-success">Data Saved</div>';
    }

    $output = array(
        'success' => $success,
        'phone_error' => $phone_error,
    );

    echo json_encode($output);

}


