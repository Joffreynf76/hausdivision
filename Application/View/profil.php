<main>
    <section id="profil">
        <div class="profil2">
        <p>Name : <?=$_SESSION['name']?></p>

        <p>Firstname : <?=$_SESSION['firstname']?></p>

        <p>Email : <?=$_SESSION['email']?></p>

        <a href="<?=PUB_PATH?>/User/updateProfil">Update profil</a><br>
            <a href="<?=PUB_PATH?>/Company/viewCompany">My company</a>
        </div>
    </section>





</main>