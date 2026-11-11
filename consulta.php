
<?php
include "conexao.php";

$sql = "SELECT * FROM alunos";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif ;
        
        background-color: #04276c;
        height: 100vh
    }

    table{
        width: 720px;
        border-collapse: collapse;
        margin: auto;
        padding: 10px;
        overflow: hidden;
        border-collapse: collapse;
        border-radius: 15px;
        text-align: center;
    }
    tbody>tr:nth-child(2n){
            background-color: rgba(56, 16, 95, 0.64);
    }
    tr{
        background-color:rgb(135, 180, 240) ;
        border: 1px solid black;
        
    }
    th{
        border: 1px solid black;
        padding: 7px;
    }
    td{
        background-color: rgb(240, 240, 240);
        border: 1px solid black;}
</style>
<body>

    <table  cellpadding="10">
        <thead>
            <tr >
                <th colspan="6"><h3>Lista de Alunos</h3></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Curso</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($alunos as $aluno): ?>

                <tr>
                    <td><?= htmlspecialchars($aluno["id"], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($aluno["nome"], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($aluno["email"], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($aluno["telefone"], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($aluno["curso"], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($aluno["data_nascimento"], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</body>
</html>
