function getEndereco() {
    var cep = document.getElementById('cep-input').value;
    var url = 'https://viacep.com.br/ws/' + cep + '/json/';

    fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        if (!data.erro) {
          document.getElementById('cidade-input').value = data.localidade;
          document.getElementById('estado-input').value = data.uf;
          document.getElementById('logradouro-input').value = data.logradouro;
          document.getElementById('bairro-input').value = data.bairro;
        } else {
          alert('CEP não encontrado. Por favor, verifique o CEP digitado.');
        }
      })
      .catch(function(error) {
        console.log('Ocorreu um erro: ' + error);
      });
  }

  function handleBlur() {
    getEndereco();
  }

  function formatCEP(input) {
    var value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    var formattedValue = value.replace(/(\d{5})(\d{3})/, '$1-$2'); // Adiciona a máscara
    input.value = formattedValue;
  }