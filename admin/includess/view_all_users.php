<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>



    </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM users";
    $select_comments = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_comments)){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];

        echo "<tr>";
        echo "<td>$user_id </td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_firstname</td>";


//        $query = "SELECT * FROM catagories WHERE cat_id={$comment_post_id}";
//        $select_from_catagories = mysqli_query($connection, $query);
//
//        while ($row = mysqli_fetch_assoc($select_from_catagories)) {
//            $cat_id = $row['cat_id'];
//            $cat_title = $row['cat_title'];
//
//
//        }
        echo "<td>$user_lastname</td>";


        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";

//        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
//
//        $some_title = mysqli_query($connection, $query);
//
//        while ($row = mysqli_fetch_assoc($some_title)) {
//            $post_id = $row['post_id'];
//            $post_title = $row['post_title'];
//
//            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//        }


//        echo "<td>$comment_date</td>";
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
//        echo "</tr>";

    }

    ?>

    </tbody>
</table>


<?php

if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $the_user_id";
    $user_role_update = mysqli_query($connection, $query);
    header("Location: users.php");
}

?>
<!---->
<!---->
<?php

if(isset($_GET['change_to_subscriber'])){
    $the_user_id = $_GET['change_to_subscriber'];
    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id";
    $user_role_update = mysqli_query($connection, $query);
    header("Location: users.php");
}

?>





<?php

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id ={$the_user_id}";
    $delete_user = mysqli_query($connection, $query);
    header("Location: users.php");
}

//?>