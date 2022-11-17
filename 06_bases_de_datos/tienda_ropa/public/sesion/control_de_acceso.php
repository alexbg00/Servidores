<?php
            session_start();
            if(!isset($_SESSION["usuario"])){
                header("location:login.php");
            }else{
                echo "<p>Has iniciado con: " . $_SESSION["usuario"] . "</p>";
            }
            ?>