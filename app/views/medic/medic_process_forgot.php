<?php 
    require_once("configuration/connect.php");
    require_once("configuration/globals.php"); 
    require_once("models/Medic.php");
    require_once("models/Person.php");
    require_once("models/Password.php");
    require_once("models/Message.php");
    require_once("dao/MedicDAO.php");
    require_once("dao/PersonDAO.php");
    require_once("dao/PasswordDAO.php");

    $message = new Message($BASE_URL); // Cria o objeto da mensagem passando a url
    $medicDAO = new medicDAO($conn, $BASE_URL); // Objeto do médico passando a conexão e a url
    $personDAO = new personDAO($conn, $BASE_URL);
    $passwordDAO = new passwordDAO($conn, $BASE_URL);

    // Resgata o tipo do formulário
    $type = filter_input(INPUT_POST, "type");

    // Verifica e realiza ações dependendo do tipo do formulário
    if ($type === "forgot"){ // Enviar e-mail com link para recuperar senha

        // Resgata os dados do campo do formulário
        $email = filter_input(INPUT_POST, "email");

        // Validação do dado de registro
        if($email){

            if($medicDAO->findByEmail($email) != false){
                
                $password = new Password();
                $password->email = $email;
                $password->rash = md5(rand());
                $password->status = 0;
                $passwordDAO->create($password);

            } else{
                $message->setMessage("Este e-mail não está cadastrado.", "error", "back");
            }

        } else{
            // Mensagem de erro caso os dado acima esteja vazio
            $message->setMessage("Preencha o campo de e-mail!", "error", "back");
        }

    } elseif($type === "password-recover"){

        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");
        $recover_data = filter_input(INPUT_POST, "recover_data");
        $recover = json_decode($recover_data);

        if($password && $confirmpassword){

            // Resgata dados do médico
            $medicData = $medicDAO->findByEmail($recover->email);
            $id = $medicData->id;

            // Lógica que verifica se as senhas são iguais
            if($password == $confirmpassword){

                // Cria o objeto da pessoa
                $medic = new Medic();

                // Gera uma hash dessa nova senha
                $finalPassword = $medic->generatePassword($password);

                // Atualiza para a nova senha
                $medic->password = $finalPassword;
                $medic->id = $id;
                $medicDAO->changePassword($medic);
                $passwordDAO->destroy($recover->id);

                $message->setMessage("Senha alterada com sucesso, acesse sua conta.", "success", "login");
            } else{

                $message->setMessage("As senhas não são iguais, tente novamente.", "error", "back");
            }

        } else{

            $message->setMessage("Preencha todos os campos da senha", "error", "back");
        }

    } else{ // Mensagem de erro geral
        $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
    }
?>