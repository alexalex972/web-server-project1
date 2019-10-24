<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trainsystem";

try {
    // Create connection to db
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $emailErr = $passwordErr = $passwordRepeatErr = $addressErr = "";
    $email = $password = $passwordRepeat = $address = "";

    // Check if fields are empty
    // If true display error
    // If false sanitize data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required.";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required.";
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["password_repeat"])) {
            $passwordRepeatErr = "Password is required.";
        } else {
            $passwordRepeat = test_input($_POST["password_repeat"]);
        }

        if (empty($_POST["address"])) {
            $addressErr = "Address is required.";
        } else {
            $address = test_input($_POST["address"]);
        }
    }

    // Check if passwords match
    if ( (!empty($password) && !empty($passwordRepeat)) && ($password != $passwordRepeat) ) {
        $passwordRepeatErr = "Passwords must match.";
    }

    // Check if email is already in use
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $duplicateEmailQuery = $conn->query($sql);
    
    if( $duplicateEmailQuery->rowCount()!=0 ){
        $emailErr = 'Email already in use';
    }

    // Register user
    if ( $duplicateEmailQuery->rowCount() == 0 && !empty($password) && !empty($passwordRepeat) && !empty($email) && !empty($address) && ($password == $passwordRepeat) ) {
        $sql = "INSERT INTO users (email, password, address) VALUES (?, ?, ?)";

        $statement = $conn->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->bindvalue(2, md5($password));
        $statement->bindValue(3, $address);
        
        $statement->execute();
        $conn = null;
    }

    $conn = null;

    } 
catch(PDOException $e) 
    {
    echo "Connection failed: " . $e->getMessage();
    }

$conn = null;
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" class="textInput"><span><?php echo $emailErr; ?></span></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput"><span><?php echo $passwordErr; ?></span></td>
        </tr>
        <tr>
            <td>Password again::</td>
            <td><input type="password" name="password_repeat" class="textInput"><span><?php echo $passwordRepeatErr; ?></span></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type="text" name="address" class="textInput"><span><?php echo $addressErr; ?></span></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="register_btn" class="textInput"></td>
        </tr>
    </table>
</form>