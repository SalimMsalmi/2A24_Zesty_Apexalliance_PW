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
