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
            width: 500px;
            height: 660px;
            padding: 30px;
            border-radius: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;   
        }
        input, button {
            width: 100%;
            padding: 25px;
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
        .div_label{
            position: relative;
        }
        .labelInput{
            position: absolute;
            top: 20px;
            left:10px;
            pointer-events: none;
            transition: .5s;
        }
        .selct_01:focus~.labelInput,
        .selct_01:valid~.labelInput
        {
            top: -3px;
            font-size:12px ;
            color: rgb(121, 121, 121) ;

        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>

    <div id="div_01">
        <form action="index.php" method="post">
            <legend>Cadastro de Alunos</legend>

            <div class="div_label">
            <input type="text" name="nome"  class="selct_01" required>
            <label for="nome" class="labelInput">Nome</label>
            </div>

            <div class="div_label">
            <input type="email" name="email" class="selct_01" required>
            <label for="email" class="labelInput">Email</label>
            </div>

            <div class="div_label">
            <input type="number" name="telefone"  class="selct_01" required>
            <label for="telefone" class="labelInput">Telefone</label>
            </div> 

            <div class="div_label">
            <input type="text" name="curso" class="selct_01" required>
            <label for="curso" class="labelInput">Curso</label>
            </div>

            
            <input type="date" name="data_nascimento" required>
            

            <button type="submit">Enviar</button>
            <button type="button" style="background-color: rgb(131, 127, 127);"
            onclick="window.location.href='consulta.php'">
            Consulta
            </button>
            

        </form>
            
    </div>
    
</body>
</html>
