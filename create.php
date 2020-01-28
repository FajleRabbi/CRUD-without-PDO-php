<?php include 'inc/header.php'; ?>

    <!--PHP OOP and MySQLi CRUD Bangla Tutorial (Part-03)-->
<?php
include 'Database.php';

$db = new Database();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    $age = $_POST['age'];
    if (empty($name) || empty($email) || empty($skill) || empty($age)) {
        echo "<span style='color:red;'>Field must not be empty...</span>";
    } else {
        $query = "INSERT INTO userdata(name, email, skill, age) VALUES('$name', '$email', '$skill', '$age')";
        $insertData = $db->insertData($query);

    }

}


?>
    <form action="create.php" method="post">
        <table class="tbltwo">
            <tr>
                <td>Name:</td>
                <td><input type="text" placeholder="Name" name="name"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" placeholder="Email" name="email"></td>
            </tr>
            <tr>
                <td>Skill:</td>
                <td><input type="text" placeholder="Skill" name="skill"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="text" placeholder="Age" name="age"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="submit">
                    <input type="reset" name="reset" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <br>
    <br>
    <a href="index.php">Go Back</a>


<?php include 'inc/footer.php'; ?>