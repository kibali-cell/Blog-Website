<?php
    require 'config/database.php';

    //if submit button clicked
    if(isset($_POST['submit'])){
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
        $avatar = $_FILES['avatar']; 

        //validate input values
        if(!$firstname) {
            $_SESSION['add-user'] = "Please Enter First Name";
        } elseif (!$lastname) {
            $_SESSION['add-user'] = "Please Enter Last Name";
        } elseif (!$username) {
            $_SESSION['add-user'] = "Please Enter Username";
        } elseif (!$email) {
            $_SESSION['add-user'] = "Please Enter a Valid Email";
        }  elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
            $_SESSION['add-user'] = "Password Should be 8+ Characters";
        } elseif (!$avatar['name']) {
            $_SESSION['add-user'] = "Please Enter Your Avatar";
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
                    $_SESSION['add-user'] = "Username or Email already exists";
                } else {
                    //work on avatar
                    //renaming avatar
                    $time = time(); //make each image using current timestamp
                    $avatar_name = $time . $avatar['name'];
                    $avatar_tmp_name = $avatar['tmp_name'];
                    $avatar_destination_path = '../images/' . $avatar_name;

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
                            $_SESSION['add-user'] = 'File Size Too Big. Should be less than 1MB';
                        }

                    } else {
                        $_SESSION['add-user'] = "File Should be png, jpg or jpeg";
                    }
                }
            }
        }

        // redirect to signup page if there is error

        if(isset($_SESSION['add-user'])){
            $_SESSION['add-user-data'] = $_POST;
            header('location: ' . ROOT_URL . '/admin/add-user.php');
            die();
        } else {
            $insert_user_query = "INSERT INTO users SET firstname = '$firstname', lastname = '$lastname', username = '$username', 
            email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";

            $insert_user_result = mysqli_query($connection, $insert_user_query);


            if(!mysqli_errno($connection)) {
                $_SESSION['ad-user-success'] = "New User $firstname $lastname Added Successful!";
                header('location: '. ROOT_URL .'admin/manage-users.php');
                die();
            }
        }

    } else {
        header('location: ' . ROOT_URL . 'admin/add-user.php');
        die();
    }

?>