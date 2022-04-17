

function verif()
{ 
    let myForm=document.getElementById('myForm')
myForm.addEventListener('submit',function(e){
    var name=document.getElementById("nameservice").value
   var price=document.getElementById("priceservice").value
   // var n = document.MyForm.priceservice.value;

var cmon=document.getElementById("error_nameservice")
var cprice=document.getElementById("error_priceservice")

cmon.innerHTML=""
cprice.innerHTML=""

for (let i=0;i<price.length;i++)
{
    if(isNaN(price))
    {
        e.preventDefault()
        cprice.innerHTML="Nom doit etre numerique!!"
       // break   
      }
    }

///name
for (let i=0;i<name.length;i++)
{
    if (!(name.charAt(i).toUpperCase()>="A" && name.charAt(i).toUpperCase()<="Z"))
    { e.preventDefault()
    cmon.innerHTML="Nom doit etre chaine!!"
    break
    
    }
}
if(!(name.charAt(0)>="A" && name.charAt(0)<="Z"))
{e.preventDefault()
    cmon.innerHTML=("Nom commence par majuscule!!")
}});

} 
