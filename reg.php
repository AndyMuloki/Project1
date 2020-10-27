<?php
    include_once 'user.php';
    include_once 'db.php';
    if(!isset($_SESSION)){session_start(); }

    $con = new DBConnector();
    $pdo = $con->connectToDB();

    if(isset($_POST['register'])){
        $fName = $_POST['fName'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $city_of_residence = $_POST['city_of_residence'];
        $password = $_POST['password'];
        $pic = $_FILES['pic'];        

        $user = new User($userName, $password);
        $user->setFullName($fName);
        $user->setEmail($email);
        $user->setCityOfResidence($city_of_residence);
        $user->setPic($pic);
        echo $user->register($pdo);

        header('Location: login.php');
                
    }

    if(isset($_POST['login'])){
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        $user = new User($userName, $password);
        $user->setUserName($userName);
        $user->setPassword($password);
        $user_details = $user->login($pdo);

        $_SESSION['user_id'] =  $user_details['userID'];
        $_SESSION['user_name'] =  $user_details['fName'];
        $_SESSION['user_email'] =  $user_details['email'];
        $_SESSION['city'] =  $user_details['city_of_residence'];
        $_SESSION['photo'] =  $user_details['pic'];

        header("Location: ../online_food/Homepage/homepage2.php")
    } 

    if (isset($_POST['change-pass'])) {
        $password = password_hash($_POST['current-pass'], PASSWORD_DEFAULT);
        $newPass = password_hash($_POST['new-pass'], PASSWORD_DEFAULT);
        $confirmPass = $_POST['confirm-pass'];

        if (password_verify($confirmPass, $newPass)) {
            # code...
            $user = new User();
            $user->setPassword($password);
            $user->setNewPass($newPass);

            $message = $user->changePassword($pdo);
            echo $message;
        }else{
            echo "Passwords do not match!";
        }
        else{
            echo 
            encrypt->set compact(stretch)
        }
    }

?>

