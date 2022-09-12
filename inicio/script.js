function mostrar() {
  var dropdown = document.getElementById('conta-options');

  if(dropdown.style.display == '' || dropdown.style.display == 'none'){
    dropdown.style.display = 'block';
  } else if(dropdown.style.display == 'block'){
    dropdown.style.display = 'none';
  }
}
