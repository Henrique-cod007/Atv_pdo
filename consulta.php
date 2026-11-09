
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
<body>

    <h2>Lista de Alunos</h2>

    <table border="1" cellpadding="10">
        <thead>
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
