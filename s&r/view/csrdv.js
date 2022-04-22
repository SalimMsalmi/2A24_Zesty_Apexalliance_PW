function verif()
{ 
    let myForm=document.getElementById('myForm')
myForm.addEventListener('submit',function(e){
    var ns=document.getElementById("nsres").value
   var mail=document.getElementById("mailres").value
  

var cns=document.getElementById("error_nsres")
var cmail=document.getElementById("error_mailres")

cns.innerHTML=""
cmail.innerHTML=""



///ns
for (let i=0;i<ns.length;i++)
{
    if (!(ns.charAt(i).toUpperCase()>="A" && ns.charAt(i).toUpperCase()<="Z"))
    { e.preventDefault()
    cns.innerHTML="Nom doit etre chaine!!"
    break
    
    }
}
if(!(ns.charAt(0)>="A" && ns.charAt(0)<="Z"))
{e.preventDefault()
    cns.innerHTML=("Nom commence par majuscule!!")
}

//mail
var aux=mail.substr(mail.indexOf('@'),mail.length)
if (aux!="@esprit.tn")
{e.preventDefault()
cmail.innerHTML="Mail se termine par @esprit.tn!!"}
});





} 