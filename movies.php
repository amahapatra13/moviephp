<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Movie Name</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Avengers</td>    
                </tr>
                <tr>
                    <td>2</td>
                    <td>Wonder Woman</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Spiderman</td>        
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <label> Location</label>
        <select>
        <?php
            $query="select id, name from location where active='Y'";
            $q=mysqli_query($conn,$query); ?>
            <option value=""> -- Select Location -- </option>
            <?php while($row = mysqli_fetch_assoc($q)) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
        </select> <br/><br />
    </div>
</body>
</html>
<script>
function hello() {
    var x = document.getElementById("movies").value;
    console.log(x)

<?php $name1 = "<script>document.write(x)</script>"?> 
}
</script>