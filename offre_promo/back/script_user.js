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
document.querySelector(".Users-interface").style.animation="show .5s forwards ease";
let pie=document.getElementById("myPiechart").getContext('2d');
let labels_gender=["Male","Female"];
let color_pie_gender=["#08b3e9","pink"];
let Gender_Pie=new Chart(pie,{
  type:"pie",
  data: {
    datasets:[{
      data:[14,55],
      backgroundColor: color_pie_gender
    }],
    labels:labels_gender
  },
  options:{
    responsive:true,
    plugins:{
      tooltip: {enabled: true}
    }
  },
  // plugins:[ChartDataLabels]
  
});
 
      document.getElementById('myPiechart').style.maxHeight="180px"; 

      var form = document.getElementById("form-modif");

      document.getElementById("modif-btn").addEventListener("click", function () {
        form.submit();
      });