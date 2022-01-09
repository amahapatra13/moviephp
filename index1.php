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
    <h1> Hello World</h1>
    <a href="location.php">Location</a>
    <a href="movies.php">Movies</a>
    <a href="transaction.php">Transaction</a>
    <table>
     <thead>
      <tr>
       <th>movie name</th>
       <th>location</th>
       <th>theatre name</th>
       <th>timings</th>
      </tr>
     </thead>
     <tbody>
        <?php
        $query = "select t.movie_name,t.location,t.timing,t.theatre_name, ti.id, ti.timing as time, th.id, th.value as tname,
        m.id, m.name as movie, l.id,l.name as loc from location l,transaction t, movies m, timing ti, theatre_name th 
        where t.movie_name = m.id and t.location = l.id and t.timing = ti.id and t.theatre_name = th.id and t.active='Y' ";
         $query1 = mysqli_query($conn,$query); 
            while($row = mysqli_fetch_assoc($query1)) { ?>
        <tr>
            <td><?php echo $row['movie']; ?></td>
            <td><?php echo $row['loc'];?></td>
            <td><?php echo $row['tname'];?></td>
            <td><?php echo $row['time']?></td>
        </tr>
<?php }?>
     </tbody>
    </table>
    <p> Hello World 
    <?php
      $query = mysqli_query($conn,"select image from movies where id=1");
      $row = mysqli_fetch_assoc($query); 
    ?>
    <img src='images/<?php echo $row['image'] ?>.jpg'>
    </p>
</body>
</html>