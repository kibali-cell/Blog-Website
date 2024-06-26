<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    $body = preg_replace("/\r\n|\n|\r/", "<br />", $body);
    $body = trim($body);

    // set is_featured to 0 if unchecked
    $is_featured = $is_featured = 1 ?: 0;

    //validate form data
    if(!$title) {
        $_SESSION['edit-post'] = "Enter Post Title";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Select Post Category";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Enter Post Body";
    } else {
        if($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }
        

        //work on thumbnail
        //rename image
        $time = time();
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        //make sure if file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if(in_array($extension, $allowed_files)) {
            if($thumbnail['size'] < 2_000_000) {
                //upload thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-post'] = "File size too big, Should be less than 2mb";
            }
        } else {
            $_SESSION['add-post'] = "File should be png, jpg or jpeg";
        }
        }
    }

    // Redirect back (With form data) to add page when there is problem
    if(isset($_SESSION['edit-post'])) {
        header('location: ' . ROOT_URL . 'admin/');
        die();
    } else {
        if($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        //set thumbnail name if new one was uploaded, else keep old thumbnail
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        //insert to db
        $query = "UPDATE posts SET title='$title', body = '$body', thumbnail = '$thumbnail_to_insert', category_id = $category_id, is_featured = $is_featured
        WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
    }

    if(!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Post Updated Successfully";
    }
}

header('location: '. ROOT_URL . 'admin/');
die();