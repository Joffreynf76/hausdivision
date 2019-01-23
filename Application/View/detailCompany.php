<?php
$result = $_SESSION["detailCompany"];

?>

<main>
    <section class="sectionContent">
        <div class="contentBox">
            <div class="contentBox_box">
                <div class="result">
                    <div style="display: flex">
                        <div class="logoBox">
                            <div class="logobox__logo">
                                <img src="<?= PUB_PATH?>/public/upload/<?=$result['logoCompany'] ?>" height="100px" width="100px">
                            </div>
                        </div>
                        <div class="nameBox">
                            <div class="namebox__name">
                                <?=$result["nameCompany"]?>
                            </div>
                        </div>
                    </div>
                    <div class="descBox">
                        <div class="descBox__desc">
                            <?=$result["descriptionCompany"]?>
                        </div>
                    </div>
                    <div class="infosBox">
                        <p><?=$result["addressCompany"]?></p>
                        <p><?=$result["phoneCompany"]?></p>
                        <p><?=$result["emailCompany"]?></p>
                        <p><?=$result["lastUpdate"]?></p>
                        <a href="<?=PUB_PATH?>/Company/viewCompany">Back</a>
                    </div>
                </div>
            </div>
            <div class="contentBox_modifier">
                <form method="POST" action="<?=PUB_PATH?>/Company/detailCompany" enctype="multipart/form-data">
                    <input class="formInput" type="text" name="nameCompany" placeholder="Name of the company" value="<?=$result["nameCompany"]?>">
                    <input class="formInput" type="text" name="emailCompany" placeholder="Email" value="<?=$result["emailCompany"]?>">
                    <input class="formInput" type="text" name="phoneCompany" placeholder="Phone" value="<?=$result["phoneCompany"]?>">
                    <textarea class="taInput" name="address"><?=$result["addressCompany"]?></textarea>
                    <textarea class="taInput" name="description"><?=$result["descriptionCompany"]?></textarea>
                    <input type="file" class="formInput" name="logoCompany">
                    <input type="submit" name="updateCompany" class="submitBtn">
                    <input type="hidden" value="<?=$result["idCompany"]?>" name="id">
                </form>
            </div>
        </div>
    </section>
</main>
