<?php 
   $erro_user = false;
   $erro_mail = false;
   $erro_senha = false;
   $erro_confirm_senha = false;

   if($_POST){
        
        if(empty($_POST['nome'])){
            $erro_user = true;
        };
        
        if(empty($_POST['email'])){
            $erro_mail = true;
        };
        
        if (strlen($_POST['senha']) < 6) {
            return $erro_senha = true;
        };
        
        if(($_POST['senha']) !== ($_POST['confirmSenha'])){
            return $erro_confirm_senha = true;
        }; 

   };
?>