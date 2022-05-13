    var side_bar_c= document.querySelector(".content");
    var aux=side_bar_c;
function hide_sidebar(){
    var side_bar= document.querySelector(".sidebar");
    var elements=document.querySelector(".elements");
    var content= document.querySelector(".content");
    side_bar.classList.toggle("closed");
    elements.classList.toggle("closed");
    if(side_bar.classList.value=="sidebar closed")
    {
        content.style.display="none"; 
    
    }
    else if(side_bar.classList.value=="sidebar")
    {
        content.style.display=""; 
   
    }
    
}



