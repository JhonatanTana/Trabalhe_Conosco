// Função para exibir a pré-visualização da imagem quando o usuário seleciona um arquivo
document.getElementById('imageInput').addEventListener('change', function (e) {
var imagePreview = document.getElementById('imagePreview');
  if (e.target.files.length > 0) {
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function (event) {
      imagePreview.src = event.target.result;
      imagePreview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    imagePreview.style.display = 'none';
  }
});
document.getElementById('selectImageButton').addEventListener('click', function () {
    document.getElementById('imageInput').click();
});
document.getElementById('imageInput').addEventListener('change', function (e) {
    var imagePreview = document.getElementById('imagePreview');
    if (e.target.files.length > 0) {
        var file = e.target.files[0];
        var reader = new FileReader();
    
        reader.onload = function (event) {
            imagePreview.src = event.target.result;
            imagePreview.style.display = 'block';
        };
      
        reader.readAsDataURL(file);
    } else {
        imagePreview.style.display = 'none';
    }
});