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
    if ($type === "register"){ // Cria médico

        // Resgata os dados dos campos do formulário
        $name = filter_input(INPUT_POST, "name");
        $cpf = filter_input(INPUT_POST, "cpf");
        $crm = filter_input(INPUT_POST, "crm");
        $phone = filter_input(INPUT_POST, "phone");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

        // Validação dos dados de registro
        if($name && $cpf && $crm && $phone && $email && $password){

            if($password === $confirmpassword){
                  
                // Verifica se já possui o cpf cadastrado
                if($personDAO->findByCpf($cpf) === false){
                    // Cria a pessoa/médico
                    $person = new Person();
                    $person->id_person_type = 1;
                    $person->name = $name;
                    $person->cpf = $cpf;
                    $personDAO->create($person);
                    // Captura o id da pessoa criada
                    $idPerson = $conn->lastInsertId();
                    // Cria o restante do médico
                    $medic = new Medic();
                    $medicToken = $medic->generateToken();
                    $finalPassword = $medic->generatePassword($password);
                    // Vincula o id da pessoa ao id da pessoa no médico
                    $medic->id_person = $idPerson;
                    $medic->crm = $crm;
                    $medic->phone = $phone;
                    $medic->email = $email;
                    $medic->password = $finalPassword;
                    $medic->token = $medicToken;
                    $auth = true;
                    $medicDAO->create($medic, $auth);

                } else{ // Mensagem de erro caso já exista ocpf
                    $message->setMessage("Cpf já cadastrado, tente novamente.", "error", "back");
                }

            } else{ // Mensagem de erro caso as senhas forem diferentes
                $message->setMessage("As senhas devem ser iguais!", "error", "back");
            }

        } else{
            // Mensagem de erro caso algum dos dados acima esteja vazio
            $message->setMessage("Preencha todos os campos!", "error", "back");
        }

    } else if ($type === "login"){ // Realiza o login

        $cpf = filter_input(INPUT_POST, "cpf");
        $password = filter_input(INPUT_POST, "password");

        if($medicDAO->authenticateMedic($cpf, $password, $personDAO)){
            $message->setMessage("Login realizado com sucesso.", "success", "./");
        } else{ // Mensagem de erro caso e-mail e/ou senha estiverem erradas
            $message->setMessage("CPF e/ou senha incorretos.", "error", "back");
        }

    } else{ // Mensagem de erro geral
        $message->setMessage("Ocorreu um erro no sistema.", "error", "login");
    }
?>