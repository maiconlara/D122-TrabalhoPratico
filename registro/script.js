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