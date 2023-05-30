<?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $pin = $_POST["pin"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "users");
 
        // mark email as verified
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND pin = '" . $pin . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }
 
        echo "<p>You can login now.</p>";
        exit();
    }
 
?>

<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="pin" placeholder="Enter verification code" required />
 
    <input type="submit" name="verify_email" value="Verify Email">
</form>