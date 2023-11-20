<?php

// Estabelecer a conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "", "bd_trabalhe_conosco");

// Verificar a conexão
if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Dados pessoais
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
$interesses = isset($_POST['interesses']) ? $_POST['interesses'] : [];
$interesses_string = implode('/', $interesses);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Experiencias

    $numExperiencias = 10; // Número total de experiências (ajuste conforme necessário)
    $experiencias = array();

    for ($i = 0; $i < $numExperiencias; $i++) {
        if (isset($_POST['Cargo' . $i]) || isset($_POST['Empresa' . $i]) || isset($_POST['Entrada' . $i]) || isset($_POST['Saída' . $i]) || isset($_POST['Descricao' . $i])) {
            $experiencias[$i]['empresa'] = isset($_POST['Empresa' . $i]) ? $_POST['Empresa' . $i] : '';
            $experiencias[$i]['cargo'] = isset($_POST['Cargo' . $i]) ? $_POST['Cargo' . $i] : '';
            $experiencias[$i]['entrada'] = isset($_POST['Entrada' . $i]) ? $_POST['Entrada' . $i] : '';
            $experiencias[$i]['saida'] = isset($_POST['Saída' . $i]) ? $_POST['Saída' . $i] : '';
            $experiencias[$i]['descricao'] = isset($_POST['Descricao' . $i]) ? $_POST['Descricao' . $i] : '';
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

    for ($i = 0; $i < $numIdiomas; $i++) {
        if (isset($_POST['Idioma' . $i]) || isset($_POST['Nivel' . $i])) {
            $idiomas[$i]['idioma'] = isset($_POST['Idioma' . $i]) ? $_POST['Idioma' . $i] : '';
            $idiomas[$i]['nivel'] = isset($_POST['Nivel' . $i]) ? $_POST['Nivel' . $i] : '';
        }
    }

}
// ... (pegue todos os outros campos)

// Inserir os dados pessoais
$sql_dados_pessoais = "INSERT INTO tb_dados_pessoais (Nome, Sobrenome, CPF, DataNascimento, Telefone, Email, Sexo, EstadoCivil, Habilitacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_dados_pessoais = mysqli_prepare($conn, $sql_dados_pessoais);
mysqli_stmt_bind_param($stmt_dados_pessoais, "sssssssss", $nome, $sobrenome, $cpf, $dataNascimento, $telefone, $email, $sexo, $estadoCivil, $habilitacao);
mysqli_stmt_execute($stmt_dados_pessoais);

// Recuperar o ID gerado para os dados pessoais inseridos
$dados_pessoais_id = mysqli_insert_id($conn);

// Inserir informações de endereço
$sql_endereco = "INSERT INTO tb_endereco (CEP, Logradouro, Numero, Bairro, Cidade, Estado, Interesses) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt_endereco = mysqli_prepare($conn, $sql_endereco);
mysqli_stmt_bind_param($stmt_endereco, "sssssss", $cep, $logradouro, $numero, $bairro, $cidade, $estado, $interesses_string);
mysqli_stmt_execute($stmt_endereco);

// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ...

    // Consulta SQL preparada para inserir informações de experiências
    $sql_experiencias = "INSERT INTO tb_experiencias (DadosPessoaisID, empresa, cargo, entrada, saida, descricao) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_experiencias = mysqli_prepare($conn, $sql_experiencias);

    foreach ($experiencias as $experiencia) {
        mysqli_stmt_bind_param($stmt_experiencias, "isssss", $dados_pessoais_id, $experiencia['empresa'], $experiencia['cargo'], $experiencia['entrada'], $experiencia['saida'], $experiencia['descricao']);
        mysqli_stmt_execute($stmt_experiencias);
    }

// Consulta SQL preparada para inserir informações de estudos
    $sql_estudos = "INSERT INTO tb_estudos (DadosPessoaisID, escolaridade, curso, instituicao, inicio, conclusao) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_estudos = mysqli_prepare($conn, $sql_estudos);

// Preparar a declaração uma vez fora do loop
    mysqli_stmt_bind_param($stmt_estudos, "isssss", $dados_pessoais_id, $escolaridade, $curso, $instituicao, $inicio, $conclusao);

    foreach ($estudos as $estudo) {
        $escolaridade = $estudo['escolaridade'];
        $curso = $estudo['curso'];
        $instituicao = $estudo['instituicao'];
        $inicio = $estudo['inicio'];
        $conclusao = $estudo['conclusao'];

        // Executar a declaração preparada
        mysqli_stmt_execute($stmt_estudos);
    }

    // Consulta SQL preparada para inserir informações de idiomas
    $sql_idiomas = "INSERT INTO tb_idiomas (DadosPessoaisID, idioma, nivel) VALUES (?, ?, ?)";
    $stmt_idiomas = mysqli_prepare($conn, $sql_idiomas);

    foreach ($idiomas as $idioma) {
        mysqli_stmt_bind_param($stmt_idiomas, "iss",$dados_pessoais_id, $idioma['idioma'], $idioma['nivel']);
        mysqli_stmt_execute($stmt_idiomas);
    }
}

// Verificar se as inserções foram bem-sucedidas
if (mysqli_stmt_affected_rows($stmt_dados_pessoais) > 0 && mysqli_stmt_affected_rows($stmt_endereco) > 0) {
    header('Location: index.html');
} else {
    echo "Erro ao inserir os dados: " . mysqli_error($conn);
}

// Fechar declarações e conexão
mysqli_stmt_close($stmt_dados_pessoais);
mysqli_stmt_close($stmt_endereco);
mysqli_close($conn);
