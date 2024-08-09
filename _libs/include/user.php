<?php
require_once "database.php";
class User{
    public static function signup($user, $pass){
        $conn = Database::getConnection();
        
        $sql = $conn->prepare("INSERT INTO `users` (`username`, `pass_word`)
        VALUES (?, ?);");

        if (!$sql) {
            return "Error in preparing SQL statement: " . $conn->error;
        }
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql->bind_param("ss",$user, $pass);
        $error = false;
        try {
            // Execute the INSERT query
            if ($sql->execute() === true) {
                $error = false;
            } else {
                // Handle the duplicate entry error
                if ($conn->errno === 1062) {
                    $error = "Username already taken. Please choose a different username.";
                } else {
                    $error = $sql->error;
                }
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        $sql->close();
        $conn->close();
        return $error;
    }
    public static function signin($username, $password){
        $conn = Database::getConnection();
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, username, pass_word, privilege FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();  // Fetch user data as an associative array
            // Verify password using password_verify() for secure hashing
            if (password_verify($password, $user['pass_word'])) {
                // Login successful
                session_start();  // Start session for user authentication
                $_SESSION['user_id'] = $user['id'];  // Store user ID in session
                $_SESSION['username'] = $username;  // Store username in session (optional)
                $_SESSION['privilege'] = $user['privilege'];
                mysqli_close($conn);
                return true;  // Indicate successful login
            } else {
                // Incorrect password
                mysqli_close($conn);
                return false;  // Indicate failed login (incorrect password)
            }
            } else {
            // Username not found
            mysqli_close($conn);
            return false;  // Indicate failed login (username not found)
        }
        }
}


?>