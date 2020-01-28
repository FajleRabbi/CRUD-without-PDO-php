<?php include 'inc/header.php'; ?>

    <!--PHP OOP and MySQLi CRUD Tutorial (Part-04) data update-->
<?php
include 'Database.php';

$db = new Database();
$query = "SELECT * FROM userdata";
$read = $db->select($query);


?>

    <table class="tblone">
        <?php
        if (isset($_GET['msg'])) {
            echo "<span style='color:green;'>" . $_GET['msg'] . "</span>";
        }

        ?>
        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Email</th>
            <th>Skill</th>
            <th>Age</th>
            <th>Action</th>
        </tr>

        <?php if ($read) : $i = 0;
            while ($rows = $read->fetch_assoc()) : $i++; ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['skill']; ?></td>
                    <td><?php echo $rows['age']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $rows['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $rows['id']; ?>" onclick="return confirm('Do you want to delete this data?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; else : echo "Data is not available.."; endif; ?>
    </table>
    <a href="create.php">Create</a>


<?php include 'inc/footer.php'; ?>