<?php 

require_once '../src/bootstrap.php';


$db = getbdd();




// Handle form submission for creating a new user
if (isset($_POST['create_user'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash the password
    $role = $_POST['role'];
    $stmt = $db->prepare("INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role')");
    $stmt->execute();
}

// Handle form submission for updating a user's role
if (isset($_POST['update_role'])) {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];
    $stmt = $db->prepare("UPDATE users SET role = '$role' WHERE id = '$user_id'");
    $stmt->execute();
}

// Handle delete request for a user
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $stmt = $db->prepare("DELETE FROM users WHERE id = $user_id");
    $stmt->execute();
}

// Get a list of all users from the database
$result = $db->query("SELECT id, email, role FROM users");
$users = $result->fetchAll(PDO::FETCH_ASSOC);

?>