<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbmerge";

// Criar o objeto de conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Tratamento de exceção de falha de conexão
if ($conexao->connect_error) {
    die("Falha de conexão com o banco: " . $conexao->connect_error);
}

// Deletar chamado se o ID for passado
if (isset($_POST['delete_id'])) {
    $id_chamado = $_POST['delete_id'];
    $delete_sql = "DELETE FROM chamado WHERE id_chamado = ?";
    $stmt = $conexao->prepare($delete_sql);
    $stmt->bind_param("i", $id_chamado);
    $stmt->execute();
    $stmt->close();
}

// Consulta ao banco de dados
$sql = "SELECT id_chamado, nome_user, titulo, cnpj, email, rua, numero, estado, cidade, tipo, descricao 
        FROM chamado cha 
        LEFT JOIN endereco ende ON ende.id_endereco = cha.id_endereco;";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" aria-label="Título da tabela de resultados dos chamados">Resultados dos Chamados
                </h5>
            </div>
            <div class="card-body">
                <table class="search-results table card-table table-hover table-striped"
                    aria-label="Tabela de resultados de chamados">
                    <thead>
                        <tr>
                            <th scope="col" aria-label="ID do Chamado">ID</th>
                            <th scope="col" aria-label="Nome do Usuário">Nome do Usuário</th>
                            <th scope="col" aria-label="CNPJ">CNPJ</th>
                            <th scope="col" aria-label="Email">Email</th>
                            <th scope="col" aria-label="Rua">Rua</th>
                            <th scope="col" aria-label="Número">Número</th>
                            <th scope="col" aria-label="Estado">Estado</th>
                            <th scope="col" aria-label="Cidade">Cidade</th>
                            <th scope="col" aria-label="Tipo do Chamado">Tipo</th>
                            <th scope="col" aria-label="Descrição do Chamado">Descrição</th>
                            <th scope="col" aria-label="Finalizar Chamado">Finalizar Chamado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td aria-label='ID do Chamado'>" . htmlspecialchars($row['id_chamado']) . "</td>";
                                echo "<td aria-label='Nome do Usuário'>" . htmlspecialchars($row['nome_user']) . "</td>";
                                echo "<td aria-label='CNPJ'>" . htmlspecialchars($row['cnpj']) . "</td>";
                                echo "<td aria-label='Email'>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td aria-label='Rua'>" . htmlspecialchars($row['rua']) . "</td>";
                                echo "<td aria-label='Número'>" . htmlspecialchars($row['numero']) . "</td>";
                                echo "<td aria-label='Estado'>" . htmlspecialchars($row['estado']) . "</td>";
                                echo "<td aria-label='Cidade'>" . htmlspecialchars($row['cidade']) . "</td>";
                                echo "<td aria-label='Tipo do Chamado'>" . htmlspecialchars($row['tipo']) . "</td>";
                                echo "<td aria-label='Descrição do Chamado'>" . htmlspecialchars($row['descricao']) . "</td>";
                                echo "<td aria-label='Finalizar Chamado'>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='delete_id' value='" . htmlspecialchars($row['id_chamado']) . "'>
                                        <button type='submit' class='btn btn-danger'><i class='fa-solid fa-xmark'></i></button>
                                    </form>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' aria-label='Nenhum resultado encontrado'>Nenhum resultado encontrado.</td></tr>";
                        }
                        $conexao->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>