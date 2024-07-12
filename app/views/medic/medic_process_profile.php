<?php 

    require_once("configuration/connect.php");
    require_once("configuration/globals.php"); 
    require_once("models/Medic.php");
    require_once("models/Person.php");
    require_once("models/Message.php");
    require_once("dao/MedicDAO.php");
    require_once("dao/PersonDAO.php");

    $message = new Message($BASE_URL); // Cria o objeto da mensagem passando a url
    $medicDAO = new medicDAO($conn, $BASE_URL); // Objeto do médico passando a conexão e a url
    $personDAO = new personDAO($conn, $BASE_URL);

    // Resgata o tipo do formulário (já que temos dois forms)
    $type = filter_input(INPUT_POST, "type");

    // Verifica e realiza ações dependendo do tipo do formulário
    if ($type === "update"){ // Atualiza os dados básicos do médico

        // Resgata os dados dos campos do formulário
        $name = filter_input(INPUT_POST, "name");
        $cpf = filter_input(INPUT_POST, "cpf");
        $crm = filter_input(INPUT_POST, "crm");
        $phone = filter_input(INPUT_POST, "phone");
        $email = filter_input(INPUT_POST, "email");

        // Validação dos dados de update
        if($name && $cpf && $crm && $phone && $email){

            // Resgata dados do médico
            $medicData = $medicDAO->verifyToken();
            // Resgata dados da pessoa
            $personData = $personDAO->findById($medicData->id_person);

            // Cria um objeto do médico
            $medic= new Medic();
            // Cria um objeto da pessoa
            $person= new Person();

            //Preenche o médico com os dados atualizados
            $medicData->crm = $crm;
            $medicData->phone = $phone;
            $medicData->email = $email;
            //Preenche a pessoa com os dados atualizados
            $personData->name = $name;
            $personData->cpf = $cpf;

        } else{
            // Mensagem de erro caso algum dos dados acima esteja vazio
            $message->setMessage("Preencha todos os campos!", "error", "back");
        }

        // Realiza o update da pessoa
        $personDAO->update($personData);
        // Realiza o update do médico
        $medicDAO->updateMedic($medicData);

    } else if ($type === "update-password"){ // Atualiza a senha do médico

        // Receber dados do formulário
        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

        if($password && $confirmpassword){

            // Resgata dados do médico
            $medicData = $medicDAO->verifyToken();
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

                $message->setMessage("Senha alterada com sucesso.", "success", "back");
            } else{

                $message->setMessage("As senhas não são iguais, tente novamente.", "error", "back");
            }

        } else{

            $message->setMessage("Preencha todos os campos da senha", "error", "back");
        }

    } else{ // Mensagem de erro geral
        $message->setMessage("Ocorreu um erro no sistema.", "error", "back");
    }

?>