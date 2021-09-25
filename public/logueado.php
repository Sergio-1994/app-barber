<?php

    session_start();
    if(isset($_POST['logout'])){
        unset($_POST['login']);
        header('Location: index.php');
    }

?>

<?php if(isset($_SESSION['login'])){?>


<?php} else{
    

}?>