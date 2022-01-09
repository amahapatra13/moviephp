<?php 
include('conn.php')
?>
<?php 
if(isset($_POST['submit'])){
    $movie = $_POST['movie'];
    $location = $_POST['location'];
    $theatre_name = $_POST['theatre_name'];
    $timing = $_POST['timing'];

    $val = "select id, movie, timing, location, theatre_name from tickets where movie = $movie and timing = $timing
            and location = $location and theatre_name = $theatre_name and active = 'Y' ";
    $valreturn = mysqli_query($conn, $val);
    $row = mysqli_fetch_assoc($valreturn);
    if($row){
        $tickets_id = $row['id'];
        $query_trans = "insert into transaction (movie_name, location, timing, theatre_name, tickets_id)
                        values ($movie,$location,$theatre_name,$timing,$tickets_id)";
        echo $query_trans;
    
        $retval = mysqli_query($conn,$query_trans);
        if (!$retval)
        echo "<script type ='text/javascript'> alert('Please try again'); </script>";
        else
        echo "<script type ='text/javascript'> alert('Data entry succesful'); window.location.href='index.php';</script>";
    }else{
        echo "<script type ='text/javascript'> alert('Movie not available at that time or location or theatre '); </script>";
    }

}
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
        <form method="POST"> 
        <label> Movie Name</label>
        <select name="movie" id="movie">
            <?php 
                $query = "select id, name from movies where active='Y'";
                $q = mysqli_query($conn,$query);
            ?>
            <option value="">--select Movie name--</option>
            <?php while($row= mysqli_fetch_assoc($q)) { ?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
            <?php }?>
        </select><br /><br />

        <label> Location</label>
        <select name="location" id="location">
            <?php 
                $query = "select id, name from location where active='Y'";
                $q = mysqli_query($conn,$query);
            ?>
            <option value="Delhi">--Select Location--</option>
            <?php while($row= mysqli_fetch_assoc($q)) { ?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
            <?php }?>
        </select><br /><br />

        <label> Theatre Name</label>
        <select name="theatre_name" id="theatre_name">
            <?php 
                $query = "select id, value from theatre_name where active='Y'";
                $q = mysqli_query($conn,$query);
            ?>
            <option value="PVR">--Select Location--</option>
            <?php while($row= mysqli_fetch_assoc($q)) { ?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['value']?></option>
            <?php }?>
        </select><br /><br />

        <label> Timings </label>
        <select name="timing" id="timing">
            <?php 
                $query = "select id, timing from timing where active='Y'";
                $q = mysqli_query($conn,$query);
            ?>
            <option value="9:30">--Select Location--</option>
            <?php while($row= mysqli_fetch_assoc($q)) { ?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['timing']?></option>
            <?php }?>
        </select><br /><br />
        <button name="submit" id="submit">Book</button>
        </form>
    <div>
</body>
</html>