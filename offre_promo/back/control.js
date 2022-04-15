document.forms["form"].addEventListener("submit",function(e){
    var inputs=this;
    var error="";
    for(var i=0;i<8;i++)
    {
        if(!inputs[i].value){
            error="Ce champs est requis!!";
        }else if(inputs[i].value){
            error="";
        }
        if(error)
        {
            e.preventDefault();
        }
        document.getElementById("error_"+inputs[i].name).innerHTML=error;
    }
    verif(inputs);
    
});

function verif(inputs){
    //Nom + prenom + nom club
    verif_nom_description(inputs,"nom_offre");
    verif_nom_description(inputs,"description_offre");

   
    if(verif_nom_description(inputs,"nom_offre")&&
    verif_nom_description(inputs,"description_offre")
   )
    return true;
    else return false;
};
function verif_nom_description(inputs,ch){
    if(inputs[ch].value[0]<'A'||inputs[ch].value[0]>'Z')
    {
        document.getElementById("error_"+ch).innerHTML="Nom doit Commencer avec Majuscule!!";
        return false;
    }
    var s=inputs[ch].value;
    var letters = /^[A-Za-z]+$/;
    if(!s.match(letters))
    {
        document.getElementById("error_"+ch).innerHTML="Nom doit etre des alphabets!!";
        return false;
    }
    
};
function verif_mail(inputs,ch){
    var i=0;
    var s=inputs[ch].value;
    while(i<s.length&&s[i]!="@")
    i++;
    if(inputs["mail1"].value!=inputs["mail2"].value)
    {
        document.getElementById("error_mail2").innerHTML="Mails ne sont pas identiques!!";
        return true;
    }
    if(s.substr(i+1,s.length-1)!="esprit.tn")
    {
        document.getElementById("error_"+ch).innerHTML="Mail doit appartenir a @esprit!!";
        return false;
    }
    else return true;
}
