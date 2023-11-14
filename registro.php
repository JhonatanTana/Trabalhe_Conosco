<?php

    /*Variáveis*/

    $nome = $_POST['Nome'];
    $sobrenome = $_POST['Sobrenome'];
    $cpf = $_POST['CPF'];
    $dataNascimento = $_POST['Idade'];
    $telefone = $_POST['Telefone'];
    $email = $_POST['Email'];
    $sexo = $_POST['Sexo'];
    $estadoCivil = $_POST['Estado_Civil'];
    $habilitacao = $_POST['Habilitação'];
    $cep = $_POST['CEP'];
    $logradouro = $_POST['Logradouro'];
    $numero = $_POST['Numero'];
    $bairro = $_POST['Bairro'];
    $cidade = $_POST['Cidade'];
    $estado = $_POST['Estado'];

    //Armazenador das fotos

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $diretorio = 'fotos/';

        $nomeArquivo = $nome . ' '. $sobrenome. '-'. $cpf.'.png';

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nomeArquivo)) {
            // Se você quiser salvar o nome do arquivo no banco de dados, você pode fazê-lo aqui

            echo "";
        } else {
            echo "";
        }
    } else {
        echo "";
    }

    //Interreses

    $interesses = isset($_POST['interesses']) ? $_POST['interesses'] : [];

    // Converta o array em uma string separada por vírgulas
    $interesses_prt = implode('/', $interesses);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Experiencias

        $numExperiencias = 10; // Número total de experiências (ajuste conforme necessário)
        $experiencias = array();

        for ($i = 0; $i < $numExperiencias; $i++) {
            if (isset($_POST['Cargo' . $i]) || isset($_POST['Empresa' . $i]) || isset($_POST['Entrada' . $i]) || isset($_POST['Saída' . $i])) {
                $experiencias[$i]['cargo'] = isset($_POST['Cargo' . $i]) ? $_POST['Cargo' . $i] : '';
                $experiencias[$i]['empresa'] = isset($_POST['Empresa' . $i]) ? $_POST['Empresa' . $i] : '';
                $experiencias[$i]['entrada'] = isset($_POST['Entrada' . $i]) ? $_POST['Entrada' . $i] : '';
                $experiencias[$i]['saida'] = isset($_POST['Saída' . $i]) ? $_POST['Saída' . $i] : '';
            }
        }

        //Estudos

        $numEstudos = 10;
        $estudos = array();

        for ($i = 0; $i < $numEstudos; $i++) {
            if (isset($_POST['Escolaridade' . $i]) || isset($_POST['Curso' . $i]) || isset($_POST['Instituição' . $i]) || isset($_POST['Início' . $i])|| isset($_POST['Conclusão' . $i])) {
                $estudos[$i]['escolaridade'] = isset($_POST['Escolaridade' . $i]) ? $_POST['Escolaridade' . $i] : '';
                $estudos[$i]['curso'] = isset($_POST['Curso' . $i]) ? $_POST['Curso' . $i] : '';
                $estudos[$i]['instituicao'] = isset($_POST['Instituição' . $i]) ? $_POST['Instituição' . $i] : '';
                $estudos[$i]['inicio'] = isset($_POST['Início' . $i]) ? $_POST['Início' . $i] : '';
                $estudos[$i]['conclusao'] = isset($_POST['Conclusão' . $i]) ? $_POST['Conclusão' . $i] : '';
            }
        }

        //Idiomas

        $numIdiomas = 10;
        $idiomas = array();

        for ($i = 0; $i < $numEstudos; $i++) {
            if (isset($_POST['Idioma' . $i]) || isset($_POST['Nivel' . $i])) {
                $idiomas[$i]['idioma'] = isset($_POST['Idioma' . $i]) ? $_POST['Idioma' . $i] : '';
                $idiomas[$i]['nivel'] = isset($_POST['Nivel' . $i]) ? $_POST['Nivel' . $i] : '';
            }
        }

    }

    $experiencia_prt = '';
    foreach ($experiencias as $experiencia) {
        $experiencia_prt .= implode('#', $experiencia). '#';
    }
    
    $estudos_prt = '';
    foreach ($estudos as $estudo) {
        $estudos_prt .= implode('#', $estudo). '#';
    }
    
    $idiomas_prt = '';
    foreach ($idiomas as $idioma) {
        $idiomas_prt .= implode('#', $idioma). '#';
    }
    
    $arquivo = fopen('banco.hd', 'a');
    
    $texto =
        $nome . '#' . $sobrenome . '#' . $cpf . '#' . $dataNascimento . '#' . $telefone . '#' . $email . '#' . $sexo . '#' .
        $estadoCivil . '#' . $habilitacao . '#' . $cep . '#' . $logradouro . '#' . $numero . '#' . $bairro . '#' . $cidade . '#' .
        $interesses_prt . '#' . $estado . '#' . $experiencia_prt . $estudos_prt .  $idiomas_prt .  PHP_EOL;
    
    fwrite($arquivo, $texto);
    
    fclose($arquivo);

    echo '<script>alert("Formulário enviado com sucesso!");</script>';
    header('Location:index.html');

?>
