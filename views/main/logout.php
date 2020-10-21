<?PHP 
    session_start();
    unset($_SESSION['UserInfo']);
    header('Location: home.php');
?>

