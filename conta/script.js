function mostrar() {
  var dropdown = document.getElementById('conta-options');

  if(dropdown.style.display == '' || dropdown.style.display == 'none'){
    dropdown.style.display = 'block';
  } else if(dropdown.style.display == 'block'){
    dropdown.style.display = 'none';
  }
}


function mostrar2() {
  var modal = document.getElementById('delete-modal');

  if(modal.style.display == '' || modal.style.display == 'none'){
    modal.style.display = 'block';
  } else if(modal.style.display == 'block'){
    modal.style.display = 'none';
  }
}




document.getElementById("senha-1").oninput = function(){
  let pass = document.getElementById("senha-1").value;
  let valpass = document.getElementById('senha-conf').value;
  let button = document.getElementById('registro-btn');
  if(pass && valpass != ""){
    if( pass == valpass) {
      document.getElementById('val-senha').innerHTML = 'As senhas conferem ✓';
      document.getElementById("val-senha").style.color="#34ad34";
      button.disabled = false;
  } else{
      document.getElementById('val-senha').innerHTML = 'As senhas não conferem ✕';
      document.getElementById("val-senha").style.color="#ad3434";
      button.disabled = true;
  } 
  } else{
    document.getElementById('val-senha').innerHTML = '';
    button.disabled = true;
  }
}


document.getElementById("senha-conf").oninput = function(){
  let pass = document.getElementById("senha-1").value;
  let valpass = document.getElementById('senha-conf').value;
  let button = document.getElementById('registro-btn');
  if(pass && valpass != ""){
    if( pass == valpass) {
      document.getElementById('val-senha').innerHTML = 'As senhas conferem ✓';
      document.getElementById("val-senha").style.color="#34ad34";
      button.disabled = false;
  } else{
      document.getElementById('val-senha').innerHTML = 'As senhas não conferem ✕';
      document.getElementById("val-senha").style.color="#ad3434";  
      button.disabled = true;
  }
  } else {
    document.getElementById('val-senha').innerHTML = '';
    button.disabled = true;
  }
}