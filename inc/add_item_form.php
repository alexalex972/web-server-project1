<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require_once('auth/auth.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nameErr = $destinationFromErr = $destinationToErr = $departureErr = $arrivalErr = $numberErr = $priceErr = $descriptionErr = "";
    $name = $destinationFrom = $destinationTo = $departureTime = $arrivalTime = $number = $price = $description = "";
    $today = date("Y-m-d H:i:s");

    // Check if fields are empty
    // If true display error
    // If false sanitize data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required.";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["destination_from"])) {
            $destinationFromErr = "Destination is required.";
        } else {
            $destinationFrom = test_input($_POST["destination_from"]);
        }

        if (empty($_POST["destination_to"])) {
            $destinationToErr = "Destination is required.";
        } else {
            $destinationTo = test_input($_POST["destination_to"]);
        }

        if (empty($_POST["departure_time"])) {
            $departureErr = "Departure is required.";
        } else {
            $departureTime = date("Y-m-d H:i:s", strtotime($_POST["departure_time"]));
        }

        if (empty($_POST["arrival_time"])) {
            $arrivalErr = "Arrival is required.";
        } else {
            $arrivalTime = date("Y-m-d H:i:s", strtotime($_POST["arrival_time"]));
        }

        if (empty($_POST["number"])) {
            $numberErr = "Number is required.";
        } else {
            $number = test_input($_POST["number"]);
        }

        if (empty($_POST["price"])) {
            $priceErr = "Price is required.";
        } else {
            $price = test_input($_POST["price"]);
        }

        if (empty($_POST["desc"])) {
            $descriptionErr = "Description is required.";
        } else {
            $description = test_input($_POST["desc"]);
        }
    }

    if ($departureTime > $arrivalTime) {
        $departureErr = "Departure time is after arrival time.";
        $departureTime = $arrivalTime = "";
    }

    if (!empty($departureTime) && isset($departureTime)) {
        if ($departureTime < $today) {
            $departureErr = "Departure cannot be set before today.";
            $departureTime = "";
        }
    }

    if (!empty($arrivalTime) && isset($arrivalTime)) {
        if ($arrivalTime < $today) {
            $arrivalErr = "Arrival cannot be set before today.";
            $arrivalTime = "";
        }
    }

    // Create catalogue item
    if (!empty($name) && !empty($destinationFrom) && !empty($destinationTo) && !empty($departureTime) && !empty($arrivalTime) && !empty($number) && !empty($price) && !empty($description)) {

        $sql = "INSERT INTO Catalogue (name, dstart, dfinish, tstart, tfinish, number, price, `desc`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = $conn->prepare($sql);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $destinationFrom);
        $statement->bindValue(3, $destinationTo);
        $statement->bindValue(4, $departureTime);
        $statement->bindValue(5, $arrivalTime);
        $statement->bindValue(6, $number);
        $statement->bindValue(7, $price);
        $statement->bindValue(8, $description);

        $statement->execute();
        $conn = null;
    }

    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;

?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div>
        <table class="form-group" style="margin: 0 auto; min-width: 720px; margin-top: 50px; margin-bottom: 25px;">
            <tr>
                <td>Name:</td>
                <td><input type="text" class="form-control" name="name" class="textInput"><span><?php echo $nameErr; ?></span></td>
            </tr>
            <tr>
                <td>From:</td>
                <td><input type="text" class="form-control" name="destination_from" class="textInput"><span><?php echo $destinationFromErr; ?></span></td>
            </tr>
            <tr>
                <td>To:</td>
                <td><input type="text" class="form-control" name="destination_to" class="textInput"><span><?php echo $destinationToErr; ?></span></td>
            </tr>
            <tr>
                <td>Departure Time: </td>
                <td><input type="datetime-local" class="form-control" name="departure_time" class="form-control"><span><?php echo $departureErr; ?></span></td>
            </tr>
            <tr>
                <td>Arrival Time:</td>
                <td><input type="datetime-local" class="form-control" name="arrival_time" class="form-control"><span><?php echo $arrivalErr; ?></span></td>
            </tr>
            <tr>
                <td>Number:</td>
                <td><input type="number" class="form-control" name="number" class="textInput"><span><?php echo $numberErr; ?></span></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="number" class="form-control" name="price" step="0.01" class="textInput"><span><?php echo $priceErr; ?></span></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type="text" class="form-control" name="desc" class="textInput"><span><?php echo $descriptionErr; ?></span></td>
            </tr>
    </div>
    </table>
    <div align="center" style="margin-bottom: 25px"><input type="submit" name="register_btn" class="textInput btn btn-secondary"></div>
</form>
<hr class="my-4" style="background-color: white">
<p align="center" style="margin-top: 3px;">Web Server Technologies &copy; 2019 | <a href="">Alex</a> x <a href="">Azim</a> x <a href="">Lyubo</a> | All rights reserved &reg;</p>