<?php
if(isset($_SESSION['idUser'])){
    $result = $_SESSION['company'];

    foreach($result as $value){
        ?>
        <p><?=$value["nameCompany"]?></p>
        <form method="post" action="<?=PUB_PATH?>/Company/detailCompany">
            <input type="hidden" value="<?=$value["idCompany"]?>" name="idCompany">
            <input type="submit" name="company" value="Detail">
        </form>
<?php
    }
}else {
    echo "Please Login";
}
