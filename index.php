<?php
include_once "crud/crud.php";

$crud = new \PhpMysqlCrud\Crud\Crud();


if (isset($_POST['submit'])) {
    $addUser = $crud->addUser($_POST);
}
if (isset($_POST['update'])) {
    $addUser = $crud->updateUser($_POST);
}
if (isset($_POST['delete'])) {
    $addUser = $crud->deleteUser($_POST);
}

$getUser = $crud->getAllUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mysql OOP Crud</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="name" placeholder="Name">
        <button type="submit" name="submit">Save</button>
    </form>

    <?php
    if (!empty($getUser)) {
        while ($row = mysqli_fetch_assoc($getUser)) {
    ?>
            <form method="post">
                <p style="padding:5px">
                    <input type="text" name="update_name" value="<?php echo $row['name'] ?>">
                    <input type="text" name="update_id" value="<?php echo $row['id'] ?>" hidden>
                    <button style="margin-left:30px" type="submit" name="update">Update</button>
                    <button style="margin-left:5px" type="submit" name="delete">Delete</button>
                </p>
            </form>
    <?php
        }
    }

    ?>
</body>

</html>