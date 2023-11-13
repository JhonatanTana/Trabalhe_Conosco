var contadorFormacoes = 0;
var contadorExperiencias = 0;
var contadorIdiomas = 0;

function toggleFormacaoMenu(elementId) {
  var contentDiv = document.querySelector('#' + elementId + ' .content');
  contentDiv.style.display = contentDiv.style.display === 'none' ? 'flex' : 'none';
}

function adicionarFormacao() {
    var formacaoContainer = document.getElementById("formacaoContainer");

    var novoFormacao = document.createElement("div");
    novoFormacao.className = "btn-group";

    contadorFormacoes++;

    novoFormacao.innerHTML = `
      <div class="checkbox" id="formacao_menu${contadorFormacoes}">
        <h4 class="toggle-header" onclick="toggleFormacaoMenu('formacao_menu${contadorFormacoes}')" id="formacao${contadorFormacoes}">Formação</h4>
        <label class="remover_container" onclick="removerContainer(this)"><img src="src/lixo.png" alt=""></label>
        <div class="content">
          <div class="sub-container">
            <div class="coolinput">
              <label for="input" class="text">Tipo:</label>
              <select name="Escolaridade${contadorFormacoes}" id="tipo">
                <option value="----"></option>
                <option value="Ensino Medio">Ensino Médio Completo</option>
                <option value="Ensino Medio">Ensino Médio Incompleto</option>
                <option value="Ensino Fundamental">Ensino Fundamental Completo</option>
                <option value="Ensino Fundamental">Ensino Fundamental Incompleto</option>
                <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                <option value="Pós-Graduação">Pós-Graduação</option>
                <option value="Curso Tecnico">Curso Tecnico</option>
              </select>
            </div>
            <div class="coolinput">
              <label for="input" class="text">Curso:</label>
              <input type="text" placeholder="Curso" name="Curso${contadorFormacoes}" class="input" id="curso${contadorFormacoes}" oninput="exibirConteudo(${contadorFormacoes})">
            </div>
            <div class="coolinput">
              <label for="input" class="text">Instituição:</label>
              <input type="text" placeholder="Instituição" name="Instituição${contadorFormacoes}" class="input" id="instituicao${contadorFormacoes}" oninput="exibirConteudo(${contadorFormacoes})">
            </div>
          </div>
          <div class="sub-container">
            <div class="coolinput">
              <label for="input" class="text">Inicio:</label>
              <input type="month" placeholder="Inicio" name="Início${contadorFormacoes}" class="input" >
            </div>
            <div class="coolinput">
              <label for="input" class="text">Conclusão:</label>
              <input type="month" placeholder="Conlusão" name="Conclusão${contadorFormacoes}" class="input" >
            </div>
          </div>
        </div>
      </div>
    `;

    formacaoContainer.appendChild(novoFormacao);
}

function adicionarExperiencia() {
  var formacaoContainer = document.getElementById("experienciaContainer");

  var novoFormacao = document.createElement("div");
  novoFormacao.className = "btn-group";

  contadorExperiencias++;

  novoFormacao.innerHTML = `
    <div class="checkbox" id="experiencia_menu${contadorExperiencias}">
    <h4 class="toggle-header" onclick="toggleFormacaoMenu('experiencia_menu${contadorExperiencias}')" id="experiencia${contadorExperiencias}">Experiência</h4>
    <label class="remover_container" onclick="removerContainer(this)"><img src="src/lixo.png" alt=""></label>
    <div class="content">
      <div class="sub-container">
        <div class="coolinput">
          <label for="input" class="text">Empresa:</label>
          <input type="text" placeholder="Empresa" name="Empresa${contadorExperiencias}" class="input" id="empresa${contadorExperiencias}" oninput="exibirConteudoExp(${contadorExperiencias})" >
        </div>
        <div class="coolinput">
          <label for="input" class="text">Cargo:</label>
          <input type="text" placeholder="Cargo" name="Cargo${contadorExperiencias}" class="input" id="cargo${contadorExperiencias}" oninput="exibirConteudoExp(${contadorExperiencias})">
        </div>
      </div>
      <div class="sub-container">
        <div class="coolinput">
          <label for="input" class="text">Entrada:</label>
          <input type="month" placeholder="Entrada" name="Entrada${contadorExperiencias}" class="input" id="entrada${contadorExperiencias}" onblur="exibirConteudoExp(${contadorExperiencias})">
          </div>
        <div class="coolinput">
          <label for="input" class="text">Saída:</label>
          <input type="month" placeholder="Saída" name="Saída${contadorExperiencias}" class="input" id="saida${contadorExperiencias}" onblur="exibirConteudoExp(${contadorExperiencias})">
          </div>
      </div>
    </div>
  </div>
  `;

  formacaoContainer.appendChild(novoFormacao);
}

function adicionarIdioma() {
  var formacaoContainer = document.getElementById("idiomaContainer");

  var novoFormacao = document.createElement("div");
  novoFormacao.className = "btn-group";

  contadorIdiomas++;

  novoFormacao.innerHTML = `
    <div class="checkbox" id="idiomas_menu${contadorIdiomas}">
      <h4 class="toggle-header" onclick="toggleFormacaoMenu('idiomas_menu${contadorIdiomas}')" id="idiomas${contadorIdiomas}">Idiomas</h4>      
      <label class="remover_container" onclick="removerContainer(this)"><img src="src/lixo.png" alt=""></label>
      <div class="content">
        <div class="sub-container">
          <div class="coolinput">
            <label for="input" class="text">Idioma:</label>
            <input type="text" placeholder="idioma" name="Idioma${contadorIdiomas}" class="input" id="idioma${contadorIdiomas}" oninput="exibirConteudoIdi(${contadorIdiomas})">
          </div>
          <div class="coolinput">
            <label for="input" class="text">Nivel:</label>
            <select name="Nivel${contadorIdiomas}" id="nivel${contadorIdiomas}" oninput="exibirConteudoIdi(${contadorIdiomas})">
              <option name="----"></option>
              <option name="A1 - Iniciante">A1 - Iniciante</option>
              <option name="A2 - Iniciante Avançado">A2 - Iniciante Avançado</option>
              <option name="B1 - Intermediário">B1 - Intermediário</option>
              <option name="B2 - Intermediário Avançado">B2 - Intermediário Avançado</option>
              <option name="C1 - Proficiente">C1 - Proficiente</option>
              <option name="C2 - Proficiente Avançado">C2 - Proficiente Avançado</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  `;

  formacaoContainer.appendChild(novoFormacao);
}

function removerContainer(botao) {
  // Obtém o elemento pai (div.btn-group) do botão
  var divPai = botao.parentNode;

  // Remove o elemento pai (div.btn-group) do container
  divPai.parentNode.removeChild(divPai);
}
