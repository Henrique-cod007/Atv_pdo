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
    <title>Document</title>
</head>
<style>
    body {
    margin: 0;
}

#div_01 {
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    width: 50%;
    height: 20%;
    padding: 10%;
}
#form
</style>
<body>
    <div id="div_01">
    <form action="index.php" method="post">
        <input type="text" name="nome" placeholder="nome" required><br>
        <input type="email" name="email" placeholder="email" required><br>
        <input type="number" name="telefone" placeholder="telelfone" required><br>
        <input type="text" name="curso" placeholder="curos" required><br>
        <input type="date" name="data_nascimento" placeholder="" required><br>
        <button type="submit">enviar</button>
    </form>
    </div>
</body>
</html>