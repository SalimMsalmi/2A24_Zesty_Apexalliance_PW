function verif() {
    let myForm=document.getElementById('myForm');
  
    myForm.addEventListener('submit', function(e) {
    var nom=document.getElementById("nom").value
  
   
  
    // span condition
  var cmon=document.getElementById("cmon")
  //var ccat=document.getElementById("ccat")
  
  
 
  //initialisation
  cmon.innerHTML=""
  //ccat.innerHTML=""
  //cimg.innerHTML=""
  
  //nom condition   
  var letters = /^[A-Za-z]+$/;
  if(!nom.value.match(letters)&&nom.value)
  {
      cmon.innerHTML="Nom doit etre aziz chaine!";
      e.preventDefault();
  }
  
  
  if(!(nom.charAt(0)>="A" && nom.charAt(0)<="Z"))
  {e.preventDefault()
      cmon.innerHTML=("Nom commence par majuscule!!")
  }
  /*
  //categorie condition
  for (let i=0;i<categorie.length;i++)
  {
      if (!(categorie.charAt(i).toUpperCase()>="A" && categorie.charAt(i).toUpperCase()<="Z"))
      {e.preventDefault()
      ccat.innerHTML="categorie doit etre chaine!!"
      break
      }
  }
  if(!(categorie.charAt(0)>="A" && categorie.charAt(0)<="Z"))
  {e.preventDefault()
      ccat.innerHTML=("categorie commence par majuscule!!")
  }*/
  //mail condition
  
        })
        }