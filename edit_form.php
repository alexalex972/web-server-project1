<?php
include("auth/auth.php");
$id = $_REQUEST['id'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $conn->prepare("SELECT * FROM Catalogue where pid='" . $id . "'");
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$data = $sql->fetchAll();
if ($data) $data = $data[0];

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    require_once('inc/head.php');
    ?>
</head>

<body style="background-color: gainsboro">
    <div class="form" style="max-width: 500px; 
    margin: 0 auto;">
        <?php
        $status = "";
        if (isset($_POST['new']) && $_POST['new'] == 1) {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $dstart = $_REQUEST['dstart'];
            $dfinish = $_REQUEST['dfinish'];
            $tstart = $_REQUEST['tstart'];
            $tfinish = $_REQUEST['tfinish'];
            $number = $_REQUEST['number'];
            $price = $_REQUEST['price'];
            $desc = $_REQUEST['desc'];
            $update = "UPDATE Catalogue SET name='" . $name . "', dstart='" . $dstart . "', dfinish='" . $dfinish . "',
            tstart='" . $tstart . "', tfinish='" . $tfinish . "', number='" . $number . "', price='" . $price . "', 
            `desc`='" . $desc . "' WHERE pid='" . $id . "'";

            $conn->query($update);
            if ($conn->query($update)) {

                $status = "Record Updated Successfully. </br></br>
                <a href='index.php'>View Updated Record</a>";
                echo '<p style="color: green; margin-top:30px">' . $status . '</p>';
            }
        } else {
            ?> <h1 align="center" style="margin-top: 20px">UPDATE RECORD #<?php echo $data['pid']; ?></h1>
            <hr class="my-4">
            <form name="form" method="post" action="">
                <div class="form-group" style="margin: 0 auto">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $data['pid']; ?>" />
                    <label>Name:</label>
                    <p><input type="text" class="form-control" name="name" placeholder="Name" required value="<?php echo $data['name']; ?>" /></p>
                    <label>From:</label>
                    <p><input type="text" class="form-control" name="dstart" placeholder="From" required value="<?php echo $data['dstart']; ?>" /></p>
                    <label>To:</label>
                    <p><input type="text" class="form-control" name="dfinish" placeholder="To" required value="<?php echo $data['dfinish']; ?>" /></p>
                    <label>Departure Time:</label>
                    <p><input type="datetime-local" class="form-control" name="tstart" placeholder="Departure Time" required value="<?php echo $data['tstart']; ?>" /></p>
                    <label>Arrival time:</label>
                    <p><input type="datetime-local" class="form-control" name="tfinish" placeholder="Arrival time" required value="<?php echo $data['tfinish']; ?>" /></p>
                    <label>Number of Tickets Left:</label>
                    <p><input type="number" class="form-control" name="number" placeholder="Number of Tickets" required value="<?php echo $data['number']; ?>" /></p>
                    <label>Price:</label>
                    <p><input type="number" class="form-control" name="price" placeholder="Price" required value="<?php echo $data['price']; ?>" /></p>
                    <label>Description:</label>
                    <p><input type="text" class="form-control" name="desc" placeholder="Description" required value="<?php echo $data['desc']; ?>" /></p>
                    <p><input name="submit" class="form-control btn btn-secondary" type="submit" value="Update" /></p>
                </div>
            </form>
            <p><button onclick="history.go(-1);" name="back" class="form-control btn btn-secondary">Back</button>
            <?php } ?>
    </div>
    <hr class="my-4" style="background-color: white">
    <p align="center" style="margin-top: 3px;">Web Server Technologies &copy; 2019 | <a href="">Alex</a> x <a href="">Azim</a> x <a href="">Lyubo</a> | All rights reserved &reg;</p>
</body>

</html>