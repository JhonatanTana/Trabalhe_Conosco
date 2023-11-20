function exibirConteudo1() {
  var inputElement = document.getElementById("curso");
  var inputElement2 = document.getElementById("instituicao");
  var h4Element = document.getElementById("formacao");
  h4Element.textContent = inputElement.value + ' - ' + inputElement2.value;
}

function exibirConteudo(numeroFormacao) {
  var inputElement = document.getElementById("curso" + numeroFormacao);
  var inputElement2 = document.getElementById("instituicao" + numeroFormacao);
  var h4Element = document.getElementById("formacao" + numeroFormacao);
  h4Element.textContent = inputElement.value + ' - ' + inputElement2.value;
}

function exibirConteudoExp1() {
  // Função para formatar a data no formato brasileiro
  function formatarData(data) {
    var partes = data.split('-');
    var ano = partes[0];
    var mes = partes[1];
    return mes + '/' + ano;
  }

  // Obtenha os valores dos campos
  var empresa = document.getElementById("empresa").value;
  var cargo = document.getElementById("cargo").value;
  var entrada = document.getElementById("entrada").value;
  var saida = document.getElementById("saida").value;

  // Se a entrada não estiver informada, exiba apenas empresa e cargo
  if (entrada === '') {
    document.getElementById("experiencia").innerText = empresa + ' - ' + cargo;
  } else {
    // Se a saída não estiver informada, exiba "até o momento"
    if (saida === '') {
      document.getElementById("experiencia").innerText = empresa + ' - ' + cargo + ' (' + formatarData(entrada) + ' - até o momento)';
    } else {
      // Calcule a diferença entre a entrada e a saída
      var dataEntrada = new Date(entrada + '-01'); // Adiciona '-01' para garantir o primeiro dia do mês
      var dataSaida = new Date(saida + '-01'); // Adiciona '-01' para garantir o primeiro dia do mês

      // Cria datas para o início e fim dos anos
      var inicioAnoSaida = new Date(dataSaida.getFullYear(), dataEntrada.getMonth(), 1);
      var inicioAnoEntrada = new Date(dataEntrada.getFullYear(), dataEntrada.getMonth(), 1);

      // Calcula a diferença em anos e meses
      var anos = dataSaida.getFullYear() - dataEntrada.getFullYear();
      var meses = dataSaida.getMonth() - dataEntrada.getMonth();

      // Ajuste para o caso de os meses serem negativos
      if (meses < 0) {
        anos--;
        meses = 12 + meses;
      }

      // Verifica se o dia da saída é anterior ao dia da entrada
      if (dataSaida < inicioAnoSaida) {
        anos--;
        meses = 12 + meses;
      }

      // Construa a string de experiência apenas com anos e meses
      var experienciaString = empresa + ' - ' + cargo + ' (';

      if (anos === 1) {
        experienciaString += anos + ' ano';
      } else if (anos > 1) {
        experienciaString += anos + ' anos';
      }

      if (anos > 0 && meses > 0) {
        experienciaString += ' e ' + meses + (meses === 1 ? ' mês' : ' meses');
      } else if (meses > 0) {
        experienciaString += meses + (meses === 1 ? ' mês' : ' meses');
      }

      experienciaString += ')';

      // Exiba o resultado no elemento com o ID "experiencia"
      document.getElementById("experiencia").innerText = experienciaString;
    }
  }
}


function exibirConteudoExp(numeroFormacao) {
  // Função para formatar a data no formato brasileiro
  function formatarData(data) {
    var partes = data.split('-');
    var ano = partes[0];
    var mes = partes[1];
    return mes + '/' + ano;
  }

  // Obtenha os valores dos campos
  var empresa = document.getElementById("empresa" + numeroFormacao).value;
  var cargo = document.getElementById("cargo" + numeroFormacao).value;
  var entrada = document.getElementById("entrada" + numeroFormacao).value;
  var saida = document.getElementById("saida" + numeroFormacao).value;

  // Se a entrada não estiver informada, exiba apenas empresa e cargo
  if (entrada === '') {
    document.getElementById("experiencia" + numeroFormacao).innerText = empresa + ' - ' + cargo;
  } else {
    // Se a saída não estiver informada, exiba "até o momento"
    if (saida === '') {
      document.getElementById("experiencia" + numeroFormacao).innerText = empresa + ' - ' + cargo + ' (' + formatarData(entrada) + ' - até o momento)';
    } else {
      // Calcule a diferença entre a entrada e a saída
      var dataEntrada = new Date(entrada + '-01'); // Adiciona '-01' para garantir o primeiro dia do mês
      var dataSaida = new Date(saida + '-01'); // Adiciona '-01' para garantir o primeiro dia do mês
      var diff = Math.abs(dataSaida - dataEntrada);

      // Calcule anos e meses
      var anos = Math.floor(diff / (365.25 * 24 * 60 * 60 * 1000));
      var meses = Math.floor((diff % (365.25 * 24 * 60 * 60 * 1000)) / (30.44 * 24 * 60 * 60 * 1000));

      // Construa a string de experiência apenas com anos e meses
      var experienciaString = empresa + ' - ' + cargo + ' (';

      if (anos === 1) {
        experienciaString += anos + ' ano';
      } else if (anos > 1) {
        experienciaString += anos + ' anos';
      }

      if (anos > 0 && meses > 0) {
        experienciaString += ' e ' + meses + (meses === 1 ? ' mês' : ' meses');
      } else if (meses > 0) {
        experienciaString += meses + (meses === 1 ? ' mês' : ' meses');
      }

      experienciaString += ')';

      // Exiba o resultado no elemento com o ID "experiencia"
      document.getElementById("experiencia" + numeroFormacao).innerText = experienciaString;
    }
  }
}

function exibirConteudoIdi1() {
  var inputElement = document.getElementById("idioma");
  var inputElement2 = document.getElementById("nivel");
  var h4Element = document.getElementById("idiomas");
  h4Element.textContent = inputElement.value + ' (' + inputElement2.value + ')';
}

function exibirConteudoIdi(numeroFormacao) {
  var inputElement = document.getElementById("idioma" + numeroFormacao);
  var inputElement2 = document.getElementById("nivel" + numeroFormacao);
  var h4Element = document.getElementById("idiomas" + numeroFormacao);
  h4Element.textContent = inputElement.value + ' (' + inputElement2.value + ')';
}
