function formatCPF(input) {
  var value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  var formattedValue = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4'); // Adiciona a máscara
  input.value = formattedValue;
}

function formatCelular(input) {
  var value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  var formattedValue = value.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, '($1) $2$3-$4'); // Adiciona a máscara
  input.value = formattedValue;
}