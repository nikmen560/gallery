<?php require_once("init.php"); ?>

<?php 
if($session->get_is_signed_in()) {
    redirect('index.php');
}
if(isset($_POST['submit'])) {

}

?>