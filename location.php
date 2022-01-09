<?php
include('conn.php')
?>
<?php
    $query = mysqli_query($conn, "select id,name from location where active='Y'")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>location</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row= mysqli_fetch_assoc($query)) { 
            ?>
            <tr>
                <td> <?php echo $row['id']?></td>
                <td> <?php echo $row['name']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>