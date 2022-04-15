function verif(){
    let myform=document.getElementById('myform')
    myform.addEventListener('submit',function(e){
        var nom=document.getElementById("username").value
        var cmon=document.getElementById("cmon")
        cmon.innerHTML=""
        
 //nom condition   
for (let i=0;i<nom.length;i++)
{
    if (!(nom.charAt(i).toUpperCase()>="A" && nom.charAt(i).toUpperCase()<="Z"))
    {e.preventDefault()
    cmon.innerHTML="Nom doit etre chaine!!"
    break
    }
}
if(!(nom.charAt(0)>="A" && nom.charAt(0)<="Z"))
{e.preventDefault()
    cmon.innerHTML=("Nom commence par majuscule!!")
}

    })
}