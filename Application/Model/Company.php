<?php

class Company
{
    private $idCompany;
    private $nameCompany;
    private $descriptionCompany;
    private $emailCompany;
    private $phoneCompany;
    private $logoCompany;
    private $addressCompany;
    private $lastupdate;
    private $user_idUser;


    public function addCompany(){
        if(isset($_POST['addCompany'])){
            $name = trim($_POST["nameCompany"]);
            $description = trim($_POST['description']);
            $email = trim($_POST['emailCompany']);
            $phone = trim($_POST['phoneCompany']);
            $address = trim($_POST['address']);
            $logo = $_POST['logoCompany'];
            $directory = ROOT.'public/upload/';

            $file = basename($_FILES['logoCompany']['name']);
            $ext = array('jpg', 'gif', 'png', 'jpeg');
            $fileExt = pathinfo($_FILES['logoCompany']['name'], PATHINFO_EXTENSION);

            $id = $_SESSION["idUser"];
            $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');

            $stmt = $db->prepare("INSERT INTO company(nameCompany,descriptionCompany,emailCompany,phoneCompany,logoCompany,addressCompany,lastUpdate,user_idUser)
                    VALUES (:name,:description,:email,:phone,:logo,:address,NOW(),:idUser)");
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":description",$description);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":phone",$phone);
            $stmt->bindParam(":logo",$_FILES['logoCompany']['name']);
            $stmt->bindParam(":address",$address);
            $stmt->bindParam(":idUser",$id);

            $stmt->execute();

            if(in_array(strtolower($fileExt),$ext)){

                if(move_uploaded_file($_FILES['logoCompany']['tmp_name'], $directory . $file)){
                    echo "Upload ok<br>";
                }else{
                    echo "fail";
                }
            }else{
                echo 'erreur extension';
            }

            ?>
            <SCRIPT LANGUAGE="JavaScript">
                document.location.href="<?=PUB_PATH?>/Company/viewCompany"
            </SCRIPT>
            <?php

        }
    }

    public function viewCompany(){
        $id = $_SESSION["idUser"];
        $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');

        $stmt = $db->prepare("SELECT * FROM company WHERE user_idUser=:id");
        $stmt->bindParam(":id",$id);

        $stmt->execute();

        $data = $stmt->fetchAll();

        $_SESSION['company'] = $data;
    }

    public function detailCompany(){
        if(isset($_POST["company"])){
            $idCompany = $_POST["idCompany"];

            $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');

            $stmt = $db->prepare("SELECT * FROM company WHERE idCompany=:id");
            $stmt->bindParam(":id",$idCompany);

            $stmt->execute();

            $data = $stmt->fetch();

            $_SESSION["detailCompany"] = $data;

        }

        if(isset($_POST["updateCompany"])){
            $idCompany = $_POST["id"];
            $name = trim($_POST["nameCompany"]);
            $description = trim($_POST['description']);
            $email = trim($_POST['emailCompany']);
            $phone = trim($_POST['phoneCompany']);
            $address = trim($_POST['address']);
            $logo = $_POST['logoCompany'];
            $directory = ROOT.'public/upload/';

            $file = basename($_FILES['logoCompany']['name']);
            $ext = array('jpg', 'gif', 'png', 'jpeg');
            $fileExt = pathinfo($_FILES['logoCompany']['name'], PATHINFO_EXTENSION);

            $id = $_SESSION["idUser"];
            $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');

            $stmt = $db->prepare("UPDATE company SET nameCompany=:name,descriptionCompany=:description,emailCompany=:email,phoneCompany=:phone,logoCompany=:logo,addressCompany=:address,lastUpdate=NOW() WHERE idCompany=:idCompany");
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":description",$description);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":phone",$phone);
            $stmt->bindParam("logo",$_FILES['logoCompany']['name']);
            $stmt->bindParam(":address",$address);
            $stmt->bindParam(":idCompany",$idCompany);
            $stmt->execute();

            if(in_array(strtolower($fileExt),$ext)){

                if(move_uploaded_file($_FILES['logoCompany']['tmp_name'], $directory . $file)){
                    echo "Upload ok<br>";
                }else{
                    echo "fail";
                }
            }else{
                echo 'erreur extension';
            }



            ?>
            <SCRIPT LANGUAGE="JavaScript">
                document.location.href="<?=PUB_PATH?>/Company/viewCompany"
            </SCRIPT>
<?php

        }
    }

    /**
     * @return mixed
     */
    public function getIdCompany()
    {
        return $this->idCompany;
    }

    /**
     * @param mixed $idCompany
     */
    public function setIdCompany($idCompany): void
    {
        $this->idCompany = $idCompany;
    }

    /**
     * @return mixed
     */
    public function getNameCompany()
    {
        return $this->nameCompany;
    }

    /**
     * @param mixed $nameCompany
     */
    public function setNameCompany($nameCompany): void
    {
        $this->nameCompany = $nameCompany;
    }

    /**
     * @return mixed
     */
    public function getDescriptionCompany()
    {
        return $this->descriptionCompany;
    }

    /**
     * @param mixed $descriptionCompany
     */
    public function setDescriptionCompany($descriptionCompany): void
    {
        $this->descriptionCompany = $descriptionCompany;
    }

    /**
     * @return mixed
     */
    public function getEmailCompany()
    {
        return $this->emailCompany;
    }

    /**
     * @param mixed $emailCompany
     */
    public function setEmailCompany($emailCompany): void
    {
        $this->emailCompany = $emailCompany;
    }

    /**
     * @return mixed
     */
    public function getPhoneCompany()
    {
        return $this->phoneCompany;
    }

    /**
     * @param mixed $phoneCompany
     */
    public function setPhoneCompany($phoneCompany): void
    {
        $this->phoneCompany = $phoneCompany;
    }

    /**
     * @return mixed
     */
    public function getLogoCompany()
    {
        return $this->logoCompany;
    }

    /**
     * @param mixed $logoCompany
     */
    public function setLogoCompany($logoCompany): void
    {
        $this->logoCompany = $logoCompany;
    }

    /**
     * @return mixed
     */
    public function getAddressCompany()
    {
        return $this->addressCompany;
    }

    /**
     * @param mixed $addressCompany
     */
    public function setAddressCompany($addressCompany): void
    {
        $this->addressCompany = $addressCompany;
    }

    /**
     * @return mixed
     */
    public function getLastupdate()
    {
        return $this->lastupdate;
    }

    /**
     * @param mixed $lastupdate
     */
    public function setLastupdate($lastupdate): void
    {
        $this->lastupdate = $lastupdate;
    }

    /**
     * @return mixed
     */
    public function getUserIdUser()
    {
        return $this->user_idUser;
    }

    /**
     * @param mixed $user_idUser
     */
    public function setUserIdUser($user_idUser): void
    {
        $this->user_idUser = $user_idUser;
    }



}