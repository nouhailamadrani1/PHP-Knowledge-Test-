<?php

class login
{
    protected $nm;
    function __construct($nm)
    {
        $this->nm = $nm;
    }
    function login()
    {
        if (isset($_POST['btn'])) {
            $name = addslashes(strip_tags($_POST['name']));
            $class = addslashes(strip_tags($_POST['class']));
            if (!empty($name) and !empty($class)) {

                $sql = $this->nm->prepare("SELECT * FROM `user` WHERE name = :name AND class = :class");
                $sql->execute(array('name' => $name, 'class' => $class));

                if ($sql->rowCount()) {
                    $data = $sql->fetch();
                    $_SESSION['id'] = $data['id'];
                    $_Session['id'] = true;

                    header('location:index.php');
                } else {

                    echo "name or class are wrong";
                }
            }
        } else {
            echo "please enter name and class";
        }
    }
}



class signIn
{
    protected $nm;
    function __construct($nm)
    {
        $this->nm = $nm;
    }
    function signIn()
    {

        if (isset($_POST['btn2'])) {
            $name = addslashes(strip_tags($_POST['name']));
            $age = addslashes(strip_tags($_POST['age']));
            $class = addslashes(strip_tags($_POST['class']));

            if (!empty($name) and !empty($class)) {
                $query = $this->nm->prepare("INSERT INTO `user`(`name`, `age`, `class`) VALUES (:name,:age,:class)");
                $query->bindParam(":name", $name);
                $query->bindParam(":age", $age);
                $query->bindParam(":class", $class);


                // Execute the query
                $query->execute();
                header('location:login.php');
            }
        }
    }
}
