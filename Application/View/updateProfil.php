<main>
    <section id="profil">
        <div class="profil2">
            <form method="post" action="<?=PUB_PATH?>/User/updateProfil">
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?=$_SESSION['name']?>">
                </div>
                <div>
                    <label>Firstname</label>
                    <input type="text" name="firstname" value="<?=$_SESSION['firstname']?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?=$_SESSION['email']?>">
                </div>
                <div>
                    <input type="submit" name="update">
                </div>

            </form>
        </div>
    </section>
</main>
