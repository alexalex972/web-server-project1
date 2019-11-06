<?php
include("auth/auth.php");
$id = $_REQUEST['id'];
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = $conn->prepare("SELECT * FROM Catalogue where pid='" . $id . "'");
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$data = $sql->fetchAll();
if($data) $data = $data[0];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="form">
        <h1>Update Record</h1>
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
            if($conn->query($update)){

                $status = "Record Updated Successfully. </br></br>
                <a href='index.php'>View Updated Record</a>";
                            echo '<p style="color:#FF0000;">' . $status . '</p>';
            } 

           
        } else {
            ?>
            <div>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="id" type="hidden" value="<?php echo $data['pid']; ?>" />
                    <p><input type="text" name="name" placeholder="Name" required value="<?php echo $data['name']; ?>" /></p>
                    <p><input type="text" name="dstart" placeholder="From" required value="<?php echo $data['dstart']; ?>" /></p>
                    <p><input type="text" name="dfinish" placeholder="To" required value="<?php echo $data['dfinish']; ?>" /></p>
                    <p><input type="text" name="tstart" placeholder="Departure Time" required value="<?php echo $data['tstart']; ?>" /></p>
                    <p><input type="text" name="tfinish" placeholder="Arrival time" required value="<?php echo $data['tfinish']; ?>" /></p>
                    <p><input type="text" name="number" placeholder="Number of Tickets" required value="<?php echo $data['number']; ?>" /></p>
                    <p><input type="text" name="price" placeholder="Price" required value="<?php echo $data['price']; ?>" /></p>
                    <p><input type="text" name="desc" placeholder="Description" required value="<?php echo $data['desc']; ?>" /></p>
                    <p><input name="submit" type="submit" value="Update" /></p>
                </form>
            <?php } ?>
            </div>
    </div>
</body>

</html>