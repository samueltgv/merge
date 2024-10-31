<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Abertura de Chamados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="/assets/css/bootstrap.css" />
  <link rel="stylesheet" href="/assets/css/style.css" />
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</head>

<body>
  <div class="home d-flex align-items-center">
    <div class="container-fluid w-75">
      <div class="row">
        <div class="d-flex justify-content-center">
          <img src="assets/imgs/Red and Beige Bold Typography Cosmetic Brand Logo.png" alt="Logo da empresa"
            class="img-fluid custom-img-size-logo mt-4 custom-img-border" />
        </div>
      </div>
      <h4 class="mb-3 mt-3" aria-label="Título da seção: Novo Chamado">Novo Chamado</h4>
      <form class="needs-validation" action="" novalidate method="post">
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="nome" class="form-label" aria-label="Nome completo">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" value="" required aria-required="true"
              aria-label="Digite seu nome completo" />
            <div class="invalid-feedback">Insira um nome.</div>
          </div>
          <div class="col-sm-6">
            <label for="cnpj" class="form-label" aria-label="CNPJ">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" value=""
              required aria-required="true" aria-label="Digite o CNPJ da empresa" />
            <div class="invalid-feedback">Insira um CNPJ válido.</div>
          </div>
          <div class="col-12">
            <label for="email" class="form-label" aria-label="Email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" value=""
              required aria-required="true" aria-label="Digite seu email" />
          </div>
          <div class="col-md-6">
            <label for="rua" class="form-label" aria-label="Rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" required aria-required="true"
              aria-label="Digite o nome da rua" />
            <div class="invalid-feedback">Por favor, insira uma rua válida.</div>
          </div>
          <div class="col-md-6">
            <label for="numero" class="form-label" aria-label="Número">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" required aria-required="true"
              aria-label="Digite o número da residência ou prédio" />
            <div class="invalid-feedback">Por favor, insira um número.</div>
          </div>
          <div class="col-md-5">
            <label for="estado" class="form-label" aria-label="Estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required aria-required="true"
              aria-label="Digite o nome do estado" />
            <div class="invalid-feedback">Por favor, insira um Estado válido.</div>
          </div>
          <div class="col-md-4">
            <label for="cidade" class="form-label" aria-label="Cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required aria-required="true"
              aria-label="Digite o nome da cidade" />
            <div class="invalid-feedback">Por favor, insira uma cidade válida.</div>
          </div>
          <div class="col-md-3">
            <label for="cep" class="form-label" aria-label="CEP">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000"
              onblur="buscarEndereco()" required aria-required="true" aria-label="Digite o CEP" />
            <div class="invalid-feedback">Insira um CEP válido.</div>
          </div>
        </div>

        <hr class="my-4" />

        <div class="my-3">
          <label for="tipo" class="form-label" aria-label="Tipo de chamado">Tipo</label>
          <select class="form-select" id="tipo" name="tipo" required aria-required="true"
            aria-label="Selecione o tipo de chamado">
            <option selected value="requisicao" aria-label="Opção: Requisição">Requisição</option>
            <option value="incidente" aria-label="Opção: Incidente">Incidente</option>
          </select>
          <div class="invalid-feedback">Por favor, selecione uma opção válida.</div>
        </div>
        <div class="col-12">
          <label for="titulo" class="form-label" aria-label="Título do Chamado">Título do Chamado</label>
          <input type="text" class="form-control" id="titulo" name="titulo" required aria-required="true"
            aria-label="Digite o título do chamado" />
          <div class="invalid-feedback">Por favor, insira um título ao chamado.</div>
        </div>
        <div class="col-12">
          <label for="descricao" class="form-label" aria-label="Descrição do Chamado">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" required aria-required="true"
            aria-label="Digite a descrição do chamado"></textarea>
          <div class="invalid-feedback">Por favor, insira uma descrição ao chamado.</div>
        </div>

        <hr class="my-4" />

        <button class="w-100 btn btn-primary btn-lg custom-button-color btn-hover-custom mb-5" type="submit"
          aria-label="Enviar o formulário de abertura de chamado">Enviar</button>
      </form>
      <!-- Modal de Sucesso -->
      <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="successModalLabel"
                aria-label="Mensagem de sucesso: O chamado foi enviado com sucesso">Sucesso</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body" aria-label="O chamado foi enviado com sucesso">
              O chamado foi enviado com sucesso!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                aria-label="Fechar modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>

<?php

//armazenar as variaveis de validação para conectar no banco
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbmerge";

//criar o objeto de conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

//tratamento de exceção de falha de conexão
if ($conexao->connect_error) {
  die("Falha de conexão com o banco" . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  // Pega os dados do formulário
  $nome = htmlspecialchars($_POST['nome']);
  $cnpj = htmlspecialchars($_POST['cnpj']);
  $email = htmlspecialchars($_POST['email']);
  $rua = htmlspecialchars($_POST['rua']);
  $numero = htmlspecialchars($_POST['numero']);
  $estado = htmlspecialchars($_POST['estado']);
  $cidade = htmlspecialchars($_POST['cidade']);
  $cep = htmlspecialchars($_POST['cep']);
  $tipo = htmlspecialchars($_POST['tipo']);
  $titulo = htmlspecialchars($_POST['titulo']);
  $descricao = htmlspecialchars($_POST['descricao']);

  //prepara a query para enviar para o banco
  $sqlInsertEndereco = "insert into endereco(rua,numero,estado,cidade,cep) values(?, ?,?, ?, ?);";

  //usa o prepared statement para evitar sql injection
  if ($stmt = $conexao->prepare($sqlInsertEndereco)) {
    $stmt->bind_param("sissi", $rua, $numero, $estado, $cidade, $cep);

    if ($stmt->execute()) {
    } else {
      echo "Erro na inserção de dados" . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Erro na preparação da query" . $conexao->error;
  }

  $sqlRecebeIdEndereco = "select id_endereco from endereco order by id_endereco desc limit 1;";

  if ($resultadoQueryIdEndereco = $conexao->query($sqlRecebeIdEndereco)) {
    if ($resultadoQueryIdEndereco->num_rows == 1) {
      $arrayDoResultado = $resultadoQueryIdEndereco->fetch_assoc();
      $resultadoIdEnderecoInt = (int) $arrayDoResultado['id_endereco'];
    } else {
      echo "nenhum id encontrado";
    }
  } else {
    echo "erro na consulta" . $conexao->error;
  }

  $sqlInsertChamado = "insert into chamado(nome_user, cnpj, email, id_endereco, tipo, titulo, descricao) values(?,?,?,?,?,?,?);";
  $insercaoBemSucedida = false;

  //usa o prepared statement para evitar sql injection
  if ($stmt = $conexao->prepare($sqlInsertChamado)) {
    $stmt->bind_param("sssisss", $nome, $cnpj, $email, $resultadoIdEnderecoInt, $tipo, $titulo, $descricao);

    if ($stmt->execute()) {
      $insercaoBemSucedida = true;
    } else {
      echo "erro na inserção do chamado" . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "erro na preparação da query do chamado" . $conexao->error;
  }

  $conexao->close();

  if ($insercaoBemSucedida) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
              var successModal = new bootstrap.Modal(document.getElementById('successModal'));
              successModal.show();
            });
          </script>";
  }
}
?>