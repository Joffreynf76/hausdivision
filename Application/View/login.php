<form method="post" action="<?=PUB_PATH?>/User/login">
    <div>
        <label>Email</label>
        <input type="email" name="emailUser">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="passwordUser">
    </div>
    <div>
        <input type="submit" name="login">
    </div>
    <input type="hidden" name="verifLogin">
</form>

<?php
if(isset($_SESSION['idUser'])){
    ?>
    <a href="<?=PUB_PATH?>/User/logout">Logout</a>
<?php
}
?>
