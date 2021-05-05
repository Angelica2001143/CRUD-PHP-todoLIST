<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "to-do-list";

    //Create connection
    $conn = new mysqli ($servername,$username,$password,$dbname);

    //Check connection

    if($conn->connect_error){
        die("Connect failed: ".$conn->connect_error);
    }
    // echo "Connected Successfully";


    //add data
    if (isset($_POST["create"])){
        $list=$_POST['inputList'];
        $sql = "INSERT INTO `list` (`list-to-do`) VALUES ('$list') ";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    //update data

    if (isset($_POST["update"])){
        $listUpdate = $_POST['task'];
        $id = $_POST['id'];
        
        $sql= "UPDATE `list` SET `list-to-do`='$listUpdate' WHERE id = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    //delete
    if(isset($_GET['id_delete'])){
        $id = $_GET['id_delete'];
        $conn->query("INSERT INTO `trash`   (`list-to-do`) SELECT `list-to-do` FROM `list` WHERE id = '$id'");
        $conn->query("DELETE FROM list WHERE id='$id'");


        
    }

    //restore/retrieve
    if (isset($_GET['restore'])){
         $id = $_GET['restore'];
        $conn->query("INSERT INTO `list`  (`list-to-do`) SELECT `list-to-do` FROM `trash` WHERE id = '$id'");
        $conn->query("DELETE FROM trash WHERE id='$id'");
    }

    //permanently delete
    if(isset($_GET['deleteTask'])){
        $id = $_GET['deleteTask'];
        $conn->query("DELETE FROM trash WHERE id='$id'");
    }

?>