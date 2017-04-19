<?php
    class BookUser{
        public function __construct()
        {
            session_start();
            try{
                $this->db=new PDO('mysql:host=localhost;dbname=Booking','root','root');
            }catch (PDOException $e){
                die("Database Connection failed");
            }

        }

        public function register($userName,$email,$passWord){


            $canReg=$this->db->query("SELECT * FROM users WHERE name='$userName'" );
            $q=$canReg->fetch(PDO::FETCH_ASSOC);

            if(!$q['name']) {

                $encyptPassword = md5($passWord);
                $query = "INSERT INTO users(name,email,password,created_date) VALUES ('$userName','$email','$encyptPassword',now())";
                $result = $this->db->query($query);

                if ($result) {
                    echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Signup success</li>";
                }
            }
            else{

                echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>User name is already existed.</li>";

            }
        }

        public function login($loginName,$loginPassword){

            $canLogin=$this->db->query("SELECT * FROM users WHERE name='$loginName'");
            $loginquery=$canLogin->fetch(PDO::FETCH_ASSOC);


            if($loginquery){

                $encyptLoginpw=md5($loginPassword);

                if($encyptLoginpw==$loginquery['password']){


                    $_SESSION['login']=true;


                    echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span>Success!</li>";




                }
                else{

                    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>Login failed!</li>";

                }

            }



        }
    }