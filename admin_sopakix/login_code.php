<?php
ob_start();
session_start();
session_regenerate_id(true); //generate cookies new id after refresh

require("common/db_connect.php"); //Database connection

function input_filter($data) // filter input data
{
    $data = trim($data); // remove wide space

    $data = stripslashes($data); // remove backward slash

    $data = htmlspecialchars($data); // remove special characters
    return $data;
}

if (isset($_POST['login_btn'])) {

    $username = input_filter($_POST['username']); //filtering user input data  
    $user_pass = input_filter($_POST['password']); //filtering user input data & encrypt password     $2y$10$4yCOEuBOXpWycMDoxGi4J.rEizYRW/SA1xtRgAYFQC/rsFl.6zPqO

    // prevent sql injection
    $username = mysqli_real_escape_string($con, $username); //escaping special symbols used in sql statement
    $user_pass = mysqli_real_escape_string($con, $user_pass); //escaping special symbols used in sql statement

    // Require Validation

    if (empty($username)) {
        $username_err = "Please enter username";
    }

    if (empty($user_pass)) {
        $user_pass_err = "Please enter password";
    }

    if (empty($username_err) && empty($user_pass_err)) {

        // Prepare a select statement
        $sql = "SELECT * FROM `admin` WHERE username = ?";

        if ($stmt = $con->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {

                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);

                    if ($stmt->fetch()) {

                        if (password_verify($user_pass, $hashed_password)) {

                            // Store data in session variables
                            $_SESSION['logged_in'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;
                            header("location:index.php");

                        } else {
                            // Display an error message if password is not valid
                            $_SESSION['error'] = "The password you entered was not valid.";
                            header("location:login.php");
                            exit(0);
                        }
                    }
                } else {

                    // Display an error message if username doesn't exist
                    $_SESSION['error'] = "No account found with that username.";
                    header("location:login.php");
                    exit(0);
                }
            } else {

                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        } else {

            $_SESSION['error'] = "Oops! Something went wrong. Please try again later.";
            header("location:login.php");
            exit(0);
        }
    } else {
        $_SESSION['user_name'] = $username_err;
        $_SESSION['user_password'] = $user_pass_err;
        header("location:login.php");
        exit(0);
    }

    // Close connection
    $con->close();
}

?>

<!-- login end -->