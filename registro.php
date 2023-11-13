<?php

    /*Variáveis*/

    $nome = str_replace('#', '-', $_POST['Nome']);
    $sobrenome = str_replace('#', '-', $_POST['Sobrenome']);
    $cpf = str_replace('#', '-', $_POST['CPF']);
    $dataNascimento = str_replace('#', '-', $_POST['Idade']);
    $telefone = str_replace('#', '-', $_POST['Telefone']);
    $email = str_replace('#', '-', $_POST['Email']);
    $sexo = str_replace('#', '-', $_POST['Sexo']);
    $estadoCivil = str_replace('#', '-', $_POST['Estado_Civil']);
    $habilitacao = str_replace('#', '-', $_POST['Habilitação']);
    $cep = str_replace('#', '-', $_POST['CEP']);
    $logradouro = str_replace('#', '-', $_POST['Logradouro']);
    $numero = str_replace('#', '-', $_POST['Numero']);
    $bairro = str_replace('#', '-', $_POST['Bairro']);
    $cidade = str_replace('#', '-', $_POST['Cidade']);
    $estado = str_replace('#', '-', $_POST['Estado']);

    //Interreses

    $interesses = isset($_POST['interesses']) ? $_POST['interesses'] : [];

    // Converta o array em uma string separada por vírgulas
    $interessesStr = implode('/', $interesses);

    //Estudos

    $escolaridade = str_replace('#', '-', $_POST['Escolaridade']);
    $curso = str_replace('#', '-', $_POST['Curso']);
    $instituicao = str_replace('#', '-', $_POST['Instituição']);
    $inicio = str_replace('#', '-', $_POST['Início']);
    $conclusao = str_replace('#', '-', $_POST['Conclusão']);

    $escolaridade1 = str_replace('#', '-', $_POST['Escolaridade1']);
    $curso1 = str_replace('#', '-', $_POST['Curso1']);
    $instituicao1 = str_replace('#', '-', $_POST['Instituição1']);
    $inicio1 = str_replace('#', '-', $_POST['Início1']);
    $conclusao1 = str_replace('#', '-', $_POST['Conclusão1']);

    $escolaridade2 = str_replace('#', '-', $_POST['Escolaridade2']);
    $curso2 = str_replace('#', '-', $_POST['Curso2']);
    $instituicao2 = str_replace('#', '-', $_POST['Instituição2']);
    $inicio2 = str_replace('#', '-', $_POST['Início2']);
    $conclusao2 = str_replace('#', '-', $_POST['Conclusão2']);

    $escolaridade3 = str_replace('#', '-', $_POST['Escolaridade3']);
    $curso3 = str_replace('#', '-', $_POST['Curso3']);
    $instituicao3 = str_replace('#', '-', $_POST['Instituição3']);
    $inicio3 = str_replace('#', '-', $_POST['Início3']);
    $conclusao3 = str_replace('#', '-', $_POST['Conclusão3']);


    /*Experiencias*/

    $cargo = str_replace('#', '-', $_POST['Cargo']);
    $empresa = str_replace('#', '-', $_POST['Empresa']);
    $entrada = str_replace('#', '-', $_POST['Entrada']);
    $saida = str_replace('#', '-', $_POST['Saída']);

    $cargo1 = str_replace('#', '-', $_POST['Cargo1']);
    $empresa1 = str_replace('#', '-', $_POST['Empresa1']);
    $entrada1 = str_replace('#', '-', $_POST['Entrada1']);
    $saida1 = str_replace('#', '-', $_POST['Saída1']);

    $cargo2 = str_replace('#', '-', $_POST['Cargo2']);
    $empresa2 = str_replace('#', '-', $_POST['Empresa2']);
    $entrada2 = str_replace('#', '-', $_POST['Entrada2']);
    $saida2 = str_replace('#', '-', $_POST['Saída2']);

    $cargo3 = str_replace('#', '-', $_POST['Cargo3']);
    $empresa3 = str_replace('#', '-', $_POST['Empresa3']);
    $entrada3 = str_replace('#', '-', $_POST['Entrada3']);
    $saida3 = str_replace('#', '-', $_POST['Saída3']);

    /*Idiomas*/

    $idioma = str_replace('#', '-', $_POST['Idioma']);
    $nivel = str_replace('#', '-', $_POST['Nível']);

    /*Gravador*/

    $texto =
        $nome . '#' . $sobrenome . '#' . $cpf . '#' . $dataNascimento . '#' . $telefone . '#' . $email . '#' . $sexo . '#' .
        $estadoCivil . '#' . $habilitacao . '#' . $cep . '#' . $logradouro . '#' . $numero . '#' . $bairro . '#' . $cidade . '#' .
        $interessesStr . '#' . $estado . '#' . $escolaridade . '#' . $curso . '#' . $instituicao . '#' . $inicio . '#' . $conclusao . '#' .
        $escolaridade1 . '#' . $curso1 . '#' . $instituicao1 . '#' . $inicio1 . '#' . $conclusao1  . '#' . $cargo. '#' . $empresa . '#' .
        $entrada . '#' . $saida . '#' . $cargo1 . '#' . $empresa1 . '#' . $entrada1 . '#' . $saida1 . '#' . $idioma . '#' . $nivel. PHP_EOL;

    $arquivo = fopen('banco.hd', 'a');

    fwrite($arquivo, $texto);
    fclose($arquivo);

    header('Location: index.html');

    //Armazenador das fotos

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $diretorio = 'fotos/';

        $nomeArquivo = $nome . ' '. $sobrenome. '-'. $cpf.'.png';

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nomeArquivo)) {

            echo "Arquivo enviado com sucesso!";
        } else {
            echo "Ocorreu um erro ao enviar o arquivo.";
        }
    } else {
        echo "Ocorreu um erro no envio do arquivo.";
    }
?>
