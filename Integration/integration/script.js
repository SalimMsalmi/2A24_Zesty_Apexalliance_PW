const labels_test = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July'
  ];
  const data = {
    labels: labels_test,
    datasets: [{
      label: 'Annual income',
      backgroundColor: 'green',
      borderColor: 'green',
      data: [5, 10,5, 20, 15, 30, 45,70],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
const myChart = new Chart(
    document.getElementById('myChart').getContext("2d"),
    config);
    document.getElementById('myChart').style.width="50%";
    
    document.getElementById('myChart').style.maxWidth="950px";
    document.getElementById('myChart').style.maxHeight="150px";
    document.getElementById('myChart').style.marginLeft="10px";
    
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
    document.getElementById('myChart').style.width="100%";
    document.getElementById('myChart').style.maxWidth="1120px";
    document.getElementById('myChart').style.maxHeight="180px";

    document.getElementById('myyChart').style.width="100%";
    document.getElementById('myyChart').style.maxWidth="1070px";
    document.getElementById('myyChart').style.maxHeight="180px";
    }
    else if(side_bar.classList.value=="sidebar")
    {
        content.style.display=""; 
    document.getElementById('myChart').style.width="100%";
    document.getElementById('myChart').style.maxWidth="950px";
    document.getElementById('myChart').style.maxHeight="150px";
    document.getElementById('myChart').style.marginLeft="10px";

    document.getElementById('myyChart').style.width="100%";
    document.getElementById('myyChart').style.maxWidth="950px";
    document.getElementById('myyChart').style.maxHeight="150px";
    document.getElementById('myyChart').style.marginLeft="10px";
    }
    
}
var cards=document.querySelector(".Cards");
const aux_cards=cards.innerHTML;
function Users(){
  document.querySelector(".Users-interface").classList.remove("hidden");
  document.querySelector(".Users-interface").style.animation="show .5s forwards ease";
  cards.classList.add("hidden");
  document.querySelector(".Products-interface").classList.add("hidden");
  document.querySelector(".Feedback-interface").classList.add("hidden");
  document.getElementById('myPiechart').style.animation="show 2s forwards ease";
  document.querySelector(".services-interface").classList.add("hidden");

}
function dash(){
  document.querySelector(".Products-interface").classList.add("hidden");

  document.querySelector(".Users-interface").classList.add("hidden");
  document.querySelector(".Feedback-interface").classList.add("hidden");
  cards.classList.remove("hidden");
  cards.style.animation="show .5s forwards ease";
  document.querySelector(".services-interface").classList.add("hidden");

}

function Feedback(){
  document.querySelector(".Products-interface").classList.add("hidden");

    document.querySelector(".Feedback-interface").style.animation="show .5s forwards ease";
    cards.classList.add("hidden");
    document.querySelector(".Users-interface").classList.add("hidden");
    document.querySelector(".Feedback-interface").classList.remove("hidden");
    document.querySelector(".services-interface").classList.add("hidden");

  }

  function services(){
    document.querySelector(".Products-interface").classList.add("hidden");

    document.querySelector(".services-interface").style.animation="show .5s forwards ease";
    cards.classList.add("hidden");
    document.querySelector(".Users-interface").classList.add("hidden");
    document.querySelector(".Feedback-interface").classList.add("hidden");
    document.querySelector(".services-interface").classList.remove("hidden");
  }

  function Product(){
    document.querySelector(".Products-interface").classList.remove("hidden");
    document.querySelector(".Products-interface").style.animation="show .5s forwards ease";
    cards.classList.add("hidden");
    document.querySelector(".Users-interface").classList.add("hidden");
      
    document.querySelector(".Feedback-interface").classList.add("hidden");
    document.querySelector(".services-interface").classList.add("hidden");

}

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
//Mariem
const onglets = document.querySelectorAll(".onglets");
const contenu = document.querySelectorAll(".contenu");
let index = 0;

onglets.forEach(onglet => {
  onglet.addEventListener("click", () => {

       if(onglet.classList.contains("active")){
         return ;
       } else {
         onglet.classList.add("active");
       }

       index= onglet.getAttribute("data-anim");
       console.log(index)

       for (i=0; i< onglets.length; i++){
         if(onglets[i].getAttribute("data-anim")!=index){
          onglets[i].classList.remove("active");
         }
       }
       for (j=0; j< contenu.length; j++){
        if(contenu[j].getAttribute("data-anim")==index){
          contenu[j].classList.add("activeContenu");
        }else {
          contenu[j].classList.remove("activeContenu");
      }
    }
  })
});