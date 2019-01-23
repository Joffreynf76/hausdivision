<?php
$result = $_SESSION["detailCompany"];

?>
<p><?=$result["nameCompany"]?></p>
<p><?=$result["descriptionCompany"]?></p>
<p><?=$result["emailCompany"]?></p>
<p><?=$result["phoneCompany"]?></p>
<p><?=$result["addressCompany"]?></p>
<p><?=$result["lastUpdate"]?></p>
<img src="<?= PUB_PATH?>/public/upload/<?=$result['logoCompany'] ?>" height="300px" width="300px">
<a href="<?=PUB_PATH?>/Company/viewCompany">Back</a>


<form method="post" action="<?=PUB_PATH?>/Company/detailCompany" enctype="multipart/form-data">
    <div>
        <label>Name</label>
        <input type="text" name="nameCompany" value="<?=$result["nameCompany"]?>">
    </div>
    <div>
        <label>Description</label>
        <textarea name="description"><?=$result["descriptionCompany"]?></textarea>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="emailCompany" value="<?=$result["emailCompany"]?>">
    </div>
    <div>
        <label>Phone</label>
        <input type="text" name="phoneCompany" value="<?=$result["phoneCompany"]?>">
    </div>
    <div>
        <label>Address</label>
        <textarea name="address"><?=$result["addressCompany"]?></textarea>
    </div>
    <div>
        <label>Logo</label>
        <input type="file" name="logoCompany">
    </div>
    <input type="submit" name="updateCompany" value="Update">
    <input type="hidden" value="<?=$result["idCompany"]?>" name="id">
</form>
