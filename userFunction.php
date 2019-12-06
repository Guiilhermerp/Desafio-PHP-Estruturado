<?php 
    function pegaUsuario(){
        $json_usuarios = file_get_contents('./database/usuarios.json');
        return json_decode($json_usuarios, true);
    };
    
    function guardaUsuario($usuario){
        $usuarios = pegaUsuario();
        if (empty($usuarios)){
            $usuarios = [];
            $usuario['id'] = 1;
            } else {
            $usuario['id'] = ++end($usuarios)['id'];    
        }
        array_push($usuarios, $usuario);
        $json_usuarios = json_encode($usuarios);
        return file_put_contents('./database/usuarios.json', $json_usuarios);
    };

    function procuraUsuario($id) {
        $usuarios = pegaUsuario();
        foreach($usuarios as $usuario)
          if ($usuario['id'] == $id)
            return $usuario;
        
        return false;
    };
    
    function deleteUsuario($id) {
        $usuarios = pegaUsuario();
        foreach($usuarios as $index => $usuario)
          if ($usuario['id'] == $id) {
            array_splice($usuarios, $index, 1);
            $json_usuarios = json_encode($usuarios);
            return file_put_contents('./database/usuarios.json', $json_usuarios);
          }
        
        return false;
      };

    function editaUsuario($edicao) {
      $usuarios = pegaUsuario();
      foreach($usuarios as $index => $usuario) {
        if ($usuario['id'] == $edicao['id']) {
          $usuarios[$index] = $edicao;
      
          $json_usuarios = json_encode($usuarios);
          return file_put_contents('./database/usuarios.json', $json_usuarios);
        }
      }
      return false;
    };

    function pesquisaUsuario($email, $senha){
      $usuarios = pegaUsuario();
      foreach($usuarios as $usuario) {
        if ($usuario['email'] == $email 
        && password_verify($senha, $usuario['senha'])) {
          return $usuario;
        }   
      }
      return false;
    };
?>