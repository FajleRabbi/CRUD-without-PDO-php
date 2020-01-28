<?php include 'inc/header.php'; ?>

    <!--PHP OOP and MySQLi CRUD Bangla Tutorial (Part-03)-->
<?php
include 'Database.php';

$db = new Database();

$id = $_GET['id'];

$query = "SELECT * FROM userdata  WHERE id=$id";
$readById = $db->select($query)->fetch_assoc();


if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    $age = $_POST['age'];
    if (empty($name) || empty($email) || empty($skill) || empty($age)) {
        echo "<span style='color:red;'>Field must not be empty...</span>";
    } else {
        $query = "UPDATE userdata SET name='$name', email='$email', skill='$skill', age='$age' WHERE id=$id";
        $updateData = $db->updateData($query);
    }

}


if(isset($_POST['delete'])) {
    $deleteID = $readById['id'];
    header('Location: delete.php?id='.$deleteID);
}

?>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <table class="tbltwo">
            <tr>
                <td>Name:</td>
                <td><input type="text" value="<?php echo $readById['name']; ?>" name="name"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" value="<?php echo $readById['email']; ?>" name="email"></td>
            </tr>
            <tr>
                <td>Skill:</td>
                <td><input type="text" value="<?php echo $readById['skill']; ?>" name="skill"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="text" value="<?php echo $readById['age']; ?>" name="age"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="update" value="Update">
                    <input type="reset" name="reset" value="Cancel">
                    <input type="submit" name="delete" value="Delete" onclick="return confirm('Do you want to delete this data??')">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <br>
    <br>
    <a href="index.php">Go Back</a>


<?php include 'inc/footer.php'; ?>