<?php
    require 'config/database.php';

    //signup if button clicked
    if(isset($_POST['submit'])){
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $avatar = $_FILES['avatar'];

        //validate input values
        if(!$firstname) {
            $_SESSION['signup'] = "Please Enter Your First Name";
        } elseif (!$lastname) {
            $_SESSION['signup'] = "Please Enter Your Last Name";
        } elseif (!$username) {
            $_SESSION['signup'] = "Please Enter Your Username";
        } elseif (!$email) {
            $_SESSION['signup'] = "Please Enter a Valid Email";
        } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
            $_SESSION['signup'] = "Password Should be 8+ Characters";
        } elseif (!$avatar['name']) {
            $_SESSION['signup'] = "Please Enter Your Avatar";
        } else {
            //check if password match
            if($createpassword !== $confirmpassword) {
                $_SESSION['signup'] = "Password Doesn't Match";
            } else {
                //hash password
                $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

                //check if usermain/email exists in db
                $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
                $user_check_result = mysqli_query($connection, $user_check_query);
                if(mysqli_num_rows($user_check_result) > 0) {
                    $_SESSION['signup'] = "Username or Email already exists";
                } else {
                    //work on avatar
                    //renaming avatar
                    $time = time(); //make each image using current timestamp
                    $avatar_name = $time . $avatar['name'];
                    $avatar_tmp_name = $avatar['tmp_name'];
                    $avatar_destination_path = 'images/' . $avatar_name;

                    //make sure file is an image
                    $allowed_files = ['png', 'jpg', 'jpeg'];
                    $extention = explode('.', $avatar_name);
                    $extention = end($extention);
                    if(in_array($extention, $allowed_files)) {
                        // make sure image isn't too large (limit 1mb)
                        if($avatar['size'] < 1000000) {
                            //upload avatar
                            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                        } else {
                            $_SESSION['signup'] = 'File Size Too Big. Should be less than 1MB';
                        }

                    } else {
                        $_SESSION['signup'] = "File Should be png, jpg or jpeg";
                    }
                }
            }
        }

        // redirect to signup page if there is error

        if(isset($_SESSION['signup'])){
            $_SESSION['signup-data'] = $_POST;
            header('location: ' . ROOT_URL . 'signup.php');
            die();
        } else {
            $insert_user_query = "INSERT INTO users SET firstname = '$firstname', lastname = '$lastname', username = '$username', 
            email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";

            $insert_user_result = mysqli_query($connection, $insert_user_query);


            if(!mysqli_errno($connection)) {
                $_SESSION['signup-success'] = "Registration Successful. Please Log in!";
                header('location: '. ROOT_URL .'signin.php');
                die();
            }
        }

    } else {
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    }

?>