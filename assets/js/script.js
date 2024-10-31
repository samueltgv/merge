function formularioChamado() {
  location.href = "formularioChamado.php";
}
function funcionarioChamados() {
  const email = document.getElementById('exampleInputEmail1').value;
  const senha = document.getElementById('exampleInputPassword1').value;

  if (email == 'admin' && senha == 'admin') {
    location.href = "funcionarioChamados.php";
  }
  else {
    alert('EMAIL OU SENHA INCORRETOS!');
  }
}
function buscarEndereco() {
  const cep = document.getElementById('cep').value.replace(/\D/g, '');

  const cepValido = /^[0-9]{8}$/.test(cep);

  if (cep !== "") {
    const url = `https://viacep.com.br/ws/${cep}/json/`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        if (!("erro" in data)) {
          document.getElementById('rua').value = data.logradouro;
          document.getElementById('cidade').value = data.localidade;
          document.getElementById('estado').value = data.uf;
        } else {
          alert("CEP não encontrado.");
        }
      })
      .catch(error => {
        console.error("Erro ao buscar o CEP:", error);
        alert("Erro ao buscar o CEP.");
      });
  } else {
    alert("Por favor, insira um CEP válido.");
  }
}