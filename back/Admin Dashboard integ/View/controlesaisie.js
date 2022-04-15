document.forms["form"].addEventListener("submit",function(e){
    var inputs=this;
    var error="";
    for(var i=0;i<3;i++)
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
    //Name
    verif_nameservice(inputs,"nameservice");
    verif_priceservice(inputs);

    if(verif_nameservice(inputs,"nameservice")&&
    verif_priceservice(inputs))
    return true;
    else return false;
};

function verif_nameservice(inputs,ch){
   /* if(inputs[ch].value[0]<'A'||inputs[ch].value[0]>'Z')
    {
        document.getElementById("error_"+ch).innerHTML="Nom doit Commencer avec Majuscule!!";
        return false;
    }*/
    var s=inputs[ch].value;
    var letters = /^[A-Za-z]+$/;
    if(!s.match(letters))
    {
        document.getElementById("error_"+ch).innerHTML="Nom doit etre des alphabets!!";
        return false;
    }
    
};
