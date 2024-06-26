<?php
    include 'partials/header.php';

    //fetch user from db
    $current_admin_id = $_SESSION['user-id'];
    $query = "SELECT * FROM users WHERE NOT id =$current_admin_id";
    $users = mysqli_query($connection, $query);
?>


<section class="dashboard">
<?php if(isset($_SESSION['add-user-success'])) : //shows if user was added?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                     ?>
                </p>
        </div>
<?php elseif(isset($_SESSION['edit-user-success'])) : //shows if user was edited?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                     ?>
                </p>
        </div>
<?php elseif(isset($_SESSION['edit-user-success'])) : //shows if user was not edited?>
        <div class="alert__message error container">
                <p>
                    <?= $_SESSION['add-user'];
                        unset($_SESSION['add-user']);
                     ?>
                </p>
        </div>
<?php elseif(isset($_SESSION['delete-user'])) : //shows if user was not deleted?>
        <div class="alert__message error container">
                <p>
                    <?= $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                     ?>
                </p>
        </div>
<?php elseif(isset($_SESSION['delete-user-success'])) : //shows if user was not deleted?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']);
                     ?>
                </p>
        </div>
        <?php endif?>
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>

        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])): ?>
                <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>    
                </li>        
                <li>
                    <a href="manage-users.php" class="active"><i class="uil uil-user-alt"></i>
                        <h5>Manage User</h5>
                    </a>
                </li>    
                <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>    
                <li>
                    <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                        <h5>Manage Category</h5>
                    </a>
                </li>   
                <?php endif ?>
            </ul>
        </aside>

        <main>
            <h2>Manage Users</h2>
            <?php if(mysqli_num_rows($users) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?= "{$user['firstname']} {$user['lastname']}"?></td>
                        <td><?= $user['username']?></td>
                        <td><a href="<?= ROOT_URL?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                        <td><?= $user['is_admin'] ? 'Yes': 'No' ?></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else : ?>
                <div class="alert__message error"><?= "No Users Found"?></div>
                <?php endif?>
        </main>

    </div>
</section>

 <!--Footer-->
 <?php
    include '../partials/footer.php';
?>