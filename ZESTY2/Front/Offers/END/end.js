const mostRecent=localStorage.getItem('mostRecent');
const final_score=document.querySelector('#final_score');
const code_promo=document.querySelector('#code_promo');


if(mostRecent==500)
{

    final_score.innerText=mostRecent;
    code_promo.innerText='code promo(gg457895)';
   
  
}
else
{
  final_score.innerText=mostRecent;
  code_promo.innerText='try again';
  
}