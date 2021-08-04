<html>
<head>
    <title>CRUD with PHP & MySQL</title>
</head>

<body>

    <?php
        include('db.php');

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $sql = "SELECT * FROM `myTable` WHERE `id` = $id ";

            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);
            
        ?>

        <form action="update.php?id=<?= $result['id'] ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= $result['name'] ?>">
            <label for="name">Score:</label>
            <input type="text" name="score" value = "<?= $result['score'] ?>">
            <input type="submit" value="Update">
        </form>

    <?php 
        }else{
    ?>

        <form action="insert.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name">
            <label for="name">Score:</label>
            <input type="text" name="score">
            <input type="submit" value="Insert">
        </form>
    <?php
        }
    ?>

    <h1>Your Records in Database</h1>

    <table border="1">
        <thead>
            <tr>
                <td>Serial No</td>
                <td>Name</td>
                <td>Score</td>
            </tr>
        </thead>
        <tbody>
            <?php
                include('db.php');

                $sql = "SELECT * FROM `myTable`";
                $result = mysqli_query($conn, $sql);

                $num=1;

                if($result)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                                
                        echo "<td>$num</td>";
                        echo "<td>$row[name]</td>";
                        echo "<td>$row[score]</td>";
                        echo "<td><a href='index.php?id=$row[id]'>Edit</a></td>";
                        echo "<td><a href='delete.php?id=$row[id]'>Delete</a></td>";
                        echo "</tr>";

                        $num++;
                    }

                }else{
                    echo "<tr><td>No Data Found</td></tr>";
                }

                
            
            
            
            
            ?>


        </tbody>
    </table>

</body>

</html>