<main>
    <section id="profil">
        <div class="profil2">
            <form method="post" action="<?=PUB_PATH?>/Company/addCompany" enctype="multipart/form-data">
                <div>
                    <label>Name</label>
                    <input type="text" name="nameCompany">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="emailCompany">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="phoneCompany">
                </div>
                <div>
                    <label>Address</label>
                    <textarea name="address"></textarea>
                </div>
                <div>
                    <label>Logo</label>
                    <input type="file" name="logoCompany">
                </div>
                <input type="submit" name="addCompany">
            </form>
        </div>
    </section>
</main>
