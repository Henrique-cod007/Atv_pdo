<?php
include "conexao.php"; 

$nome = '';
$email = ''; 
$telefone = '';
$curso = '';
$data_nascimento = '';
$mensagem = "";

if  ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];  
    $telefone = $_POST['telefone'];
    $curso = $_POST['curso'];
    $data_nascimento = $_POST['data_nascimento'];

    if($nome === "" || $email === '' || $telefone === '' || $curso === '' ||$data_nascimento === '' ){
        $mensagem = "preencha todo os campos";
    }else{
    $sql = "SELECT * FROM alunos WHERE email = :email";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'email'=>$email
    ]);

    if($stmt->fetch()){
        $mensagem = 'não é possivel cadastra esse email, utilize outro';
    }else{

    $sql = "INSERT INTO alunos

    (nome, email,telefone,curso,data_nascimento)

    VALUES (:nome,:email, :telefone, :curso, :data_nascimento)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
    'nome' => $nome,

    'email' => $email,

    'telefone'=> $telefone,

    'curso'=> $curso,

    'data_nascimento'=> $data_nascimento
    ]);
    echo "Aluno cadastrado!";
    $nome = '';
    $email = ''; 
    $telefone = '';
    $curso = '';
    $data_nascimento = '';
    }}}

    $sql = "SELECT * FROM alunos";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($alunos as $aluno) {
    htmlspecialchars($aluno["id"], ENT_QUOTES, 'UTF-8');
    htmlspecialchars($aluno["nome"], ENT_QUOTES, 'UTF-8');
    htmlspecialchars($aluno["email"], ENT_QUOTES, 'UTF-8');
    htmlspecialchars($aluno["telefone"], ENT_QUOTES, 'UTF-8');
    htmlspecialchars($aluno["curso"], ENT_QUOTES, 'UTF-8');


    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #04276c;
        }

        #div_01 {
            background-color: #ffffff;
            width: 300px;
            padding: 30px;
            border-radius: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        input{
            border-bottom: 2px solid black;
        }
        input, button {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: none;
            outline: none;
        }
    input{
            border-bottom: 1px solid black;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        legend {
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div id="div_01">
        <form action="index.php" method="post">
            <legend>Cadastro de Alunos</legend>

            <input type="text" name="nome" placeholder="Nome" required>

            <input type="email" name="email" placeholder="E-mail" required>

            <input type="tel" name="telefone" placeholder="Telefone" required>

            <input type="text" name="curso" placeholder="Curso" required>

            <input type="date" name="data_nascimento" required>

            <button type="submit">Enviar</button>

        </form>

    </div>

</body>
</html>
