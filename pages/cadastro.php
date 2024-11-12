<?php
    require_once '../Classes/usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>TELA DE CADASTRO DO USUÁRIO</h2>
    <form method="post">
        <label>Nome: </label>
        <br>
        <input type="text" name="nome" placeholder="Digite o nome completo. ">
        <br>
        <label>E-mail: </label>
        <br>
        <input type="email" name="email" placeholder="Digite o E-mail. ">
        <br>
        <label>Telefone: </label>
        <br>
        <input type="tel" name="telefone" placeholder="Digite o número de telefone. ">
        <br>
        <label>Senha: </label>
        <br>
        <input type="password" name="senha" placeholder="Criar uma senha. ">
        <br>
        <label>Confirmar senha: </label>
        <br>
        <input type="password" name="confirmarSenha" placeholder="Confirme a senha. ">
        <br>
        <input type="submit" value="CADASTRAR">

        <p>Já cadastrado? Clique <a href="">aqui</a> para acessar. </p>
        

    </form>

    <?php
        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $email =$_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $confirmarSenha = addslashes($_POST['confirmarSenha']);

            if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confirmarSenha))
            {
                $usuario->conectar("cadastro140","localhost","root","");
                if($usuario->msgErro == "")
                {
                    if($senha == $confirmarSenha)
                    {
                        if($usuario->cadastroUsuario($nome, $email, $telefone, $senha))
                        {
                            ?>
                                <div class="msg-sucesso">
                                    <p>Cadastro realizado com sucesso. </p>
                                    <p>Clique aqui para <a href="login.php">logar.</a></p>
                                </div>

                            <?php
                        }
                        else
                        {
                            ?>
                                <div class="msg-erro">
                                    <p>email já cadastrado. </p>
                                </div>

                             <?php
                        }
                    }
                    else
                    {
                        ?>
                            <div class="msg-erro">
                                <p>Preencha os campos igualmente animal. </p>
                            </div>

                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            <?php echo "Erro. ".$usuario->msgErro; ?>
                        </div>
                    <?php
                }


            }
            else
            {
                ?>
                    <div class="msg-erro">
                        <p>Preencha todos os campos animal. </p>
                    </div>

                <?php

            }
        
        }
    ?>
    
</body>
</html>