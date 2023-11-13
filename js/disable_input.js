function toggleInput() {
    var meuInput = document.getElementById('meu-input');
    var checkbox = document.getElementById('checkbox');
  
    if (checkbox.checked) {
      meuInput.disabled = true;
    } else {
      meuInput.disabled = false;
    }
}