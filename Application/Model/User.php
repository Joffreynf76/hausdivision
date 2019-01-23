<?php


class User
{
    private $idUser;
    private $nameUser;
    private $firstnameUser;
    private $emailUser;
    private $passwordUser;
    private $keyUser;
    private $active;



    public function register(){
        if(isset($_POST['register'])){
            $nameUser = trim($_POST["nameUser"]);
            $firstnameUser = trim($_POST["firstnameUser"]);
            $emailUser = trim($_POST["emailUser"]);
            $passwordUser = trim($_POST["passwordUser"]);
            $hashPassword = password_hash($passwordUser,PASSWORD_DEFAULT);



            $key = random_bytes(5);
            $key2 = bin2hex($key);
            $active = 0;

            try {
                $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



                $stmt = $db->prepare("INSERT INTO user(nameUser,firstnameUser,emailUser,passwordUser,keyUser,active)
            VALUES (:nameUser,:firstnameUser,:emailUser,:passwordUser,:keyUser,:active)");
                $stmt->bindParam(':nameUser', $nameUser);
                $stmt->bindParam(':firstnameUser', $firstnameUser);
                $stmt->bindParam(':emailUser', $emailUser);
                $stmt->bindParam(':passwordUser', $hashPassword);
                $stmt->bindParam(':keyUser', $key2);
                $stmt->bindParam(':active', $active);

                $stmt->execute();
            }
            catch
            (PDOException $e){
                echo $e->getMessage();
            }

            ?>
            <SCRIPT LANGUAGE="JavaScript">
                document.location.href="login"
            </SCRIPT>
            <?php



        }else {
            echo "fill the form";
        }
    }

    public function login(){
        if(isset($_POST['verifLogin'])){
            $email = $_POST["emailUser"];
            $password = $_POST["passwordUser"];

            $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');
            $stmt = $db->prepare("SELECT * FROM user WHERE emailUser=:email");
            $stmt->bindParam(":email",$email);

            $stmt->execute();

            $hash = $stmt->fetchColumn(4);

            if(password_verify($password,$hash)){

                $stmt2 = $db->prepare("SELECT * FROM user WHERE emailUser=:emailUser AND passwordUser=:passwordUser");
                $stmt2->bindParam(":emailUser",$email);
                $stmt2->bindParam("passwordUser",$hash);
                $stmt2->execute();

                $result = $stmt2->fetchAll();

                foreach($result as $value){
                    session_start();
                    $_SESSION["idUser"] = $value["idUser"];
                    $name = $value["nameUser"];
                    $firstname = $value["firstnameUser"];
                    $email = $value["emailUser"];
                }
                ?>
                <SCRIPT LANGUAGE="JavaScript">
                    document.location.href="profil"
                </SCRIPT>
                <?php



            }else {
                echo "Error login/password";
            }
        }
    }

    public function logout(){
        if(isset($_SESSION['idUser'])) {

            session_destroy();

            unset($_SESSION["idUser"]);

            ?>
            <SCRIPT LANGUAGE="JavaScript">
                document.location.href="<?=PUB_PATH?>/Index/home"
            </SCRIPT>

<?php




        }


    }

    public function profil(){
        $id = $_SESSION["idUser"];
        $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');
        $stmt = $db->prepare("SELECT * FROM user WHERE idUser=:id");
        $stmt->bindParam(":id",$id);

        $stmt->execute();

        $user = $stmt->fetch();

        $_SESSION['name'] = $user["nameUser"];
        $_SESSION['firstname'] = $user["firstnameUser"];
        $_SESSION['email'] = $user["emailUser"];
    }

    public function updateProfil(){
        if(isset($_POST['update'])){
            $name = trim($_POST['name']);
            $firstname = trim($_POST['firstname']);
            $email = trim($_POST["email"]);
            $id = $_SESSION["idUser"];
            $db = new PDO('mysql:host=localhost;dbname=hausdivision', 'root', 'root');
            $stmt = $db->prepare("UPDATE user set nameUser=:name,firstnameUser=:firstname,emailUser=:email WHERE idUser=:id");
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":firstname",$firstname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":id",$id);

            $stmt->execute();

            ?>
            <SCRIPT LANGUAGE="JavaScript">
                document.location.href="profil"
            </SCRIPT>
<?php
        }

    }


    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getNameUser()
    {
        return $this->nameUser;
    }

    /**
     * @param mixed $nameUser
     */
    public function setNameUser($nameUser): void
    {
        $this->nameUser = $nameUser;
    }

    /**
     * @return mixed
     */
    public function getFirstnameUser()
    {
        return $this->firstnameUser;
    }

    /**
     * @param mixed $firstnameUser
     */
    public function setFirstnameUser($firstnameUser): void
    {
        $this->firstnameUser = $firstnameUser;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->emailUser;
    }

    /**
     * @param mixed $emailUser
     */
    public function setEmailUser($emailUser): void
    {
        $this->emailUser = $emailUser;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->passwordUser;
    }

    /**
     * @param mixed $passwordUser
     */
    public function setPasswordUser($passwordUser): void
    {
        $this->passwordUser = $passwordUser;
    }

    /**
     * @return mixed
     */
    public function getKeyUser()
    {
        return $this->keyUser;
    }

    /**
     * @param mixed $keyUser
     */
    public function setKeyUser($keyUser): void
    {
        $this->keyUser = $keyUser;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }


}