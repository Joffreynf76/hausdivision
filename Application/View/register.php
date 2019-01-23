<form method="post" action="<?=PUB_PATH?>/User/register">
    <div>
        <label>Name</label>
        <input type="text" name="nameUser">
    </div>
    <div>
        <label>Firstname</label>
        <input type="text" name="firstnameUser">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="emailUser">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="passwordUser">
    </div>
    <div>
        <input type="submit" name="register">
    </div>
    <input type="hidden" name="verif">
</form>
