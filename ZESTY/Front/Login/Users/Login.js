// function toggleForm(){
//     container= document.querySelector('.container');
//     section= document.querySelector('section');
//     container.classList.toggle('active');
//     section.classList.toggle('active');
// }
// var state=false;
// function showpsdw(){
//     if(state)
//     {
//         document.querySelector(".fa-eye").style.color="rgb(133, 125, 125)";
//         document.getElementById("password").setAttribute("type","password"); 
//         state=false;
//     }
//     else if(!state)
//     {
//         document.querySelector(".fa-eye").style.color="black";
//         document.getElementById("password").setAttribute("type","text");
//         state=true;
//     }
// }
// function showpsdw_signup(){
//     if(state)
//     {
//         document.querySelector(".eye-signup").style.color="rgb(133, 125, 125)";
//         document.getElementById("pwd_signup").setAttribute("type","password"); 
//         state=false;
//     }
//     else if(!state)
//     {
//         document.querySelector(".eye-signup").style.color="black";
//         document.getElementById("pwd_signup").setAttribute("type","text");
//         state=true;
//     }
// }

//    document.forms["signup"].addEventListener("submit",function (e){
//        //inputs
//     cin=document.getElementById("cin_signup");
//     prenom=document.getElementById("prenom_signup");
//     nom=document.getElementById("nom_signup");
//     email=document.getElementById("email_signup");
//     pwd=document.getElementById("pwd_signup");
//     confirm_pwd=document.getElementById("confirm_pwd_signup");
//     date_naissance=document.getElementById("date_naissance_signup");
//     Gender=document.getElementById("gender");
//     //errors
//     ccin=document.getElementById("error_cin");
//     cnom=document.getElementById("error_nom");
//     cemail=document.getElementById("error_email");
//     cpwd=document.getElementById("error_pwd");
//     cconfirm_pwd=document.getElementById("error_confirm_pwd");
//     cdate_naissance=document.getElementById("error_date_naissance");
//     cGender=document.getElementById("error_Gender");
//     cprenom=document.getElementById("error_prenom");
//     //empty error spaces
//     ccin.innerHTML="";
//     cnom.innerHTML="";
//     cemail.innerHTML="";
//     cpwd.innerHTML="";
//     cconfirm_pwd.innerHTML="";
//     cdate_naissance.innerHTML="";
//     cGender.innerHTML="";
//     cprenom.innerHTML="";
//     if(!cin.value){
//         ccin.innerHTML="Missing cin";
//         e.preventDefault();
//     }
//     if(cin.value.length!=8 && cin.value)
//     {
//             ccin.innerHTML="Cin has to be 8 characters";
//            e.preventDefault();
//     }
//     if(!prenom.value){
//         cprenom.innerHTML="Missing First name";
//         e.preventDefault();
//     }
//     var letters = /^[A-Za-z]+$/;
//     if(!prenom.value.match(letters)&&prenom.value)
//     {
//         cprenom.innerHTML="First name has to be letters!";
//         e.preventDefault();
//     }
//     if(!nom.value){
//         cnom.innerHTML="Missing Last name";
//         e.preventDefault();
//     }
//     if(!nom.value.match(letters)&&nom.value)
//     {
//         cnom.innerHTML="Last name has to be letters!";
//         e.preventDefault();
//     }
//     if(!email.value){
//         cemail.innerHTML="Missing email";
//         e.preventDefault();
//     }
//     if(!Gender.value){
//         cGender.innerHTML="Missing Gender";
//         e.preventDefault();
//     }
//     if(!date_naissance.value){
//         cdate_naissance.innerHTML="Missing Birth date";
//         e.preventDefault();
//     }
    
//     if(!pwd.value){
//         cpwd.innerHTML="Missing password";
//         e.preventDefault();
//     }
//     if(pwd.value.length!=8 && pwd.value)
//     {
//         cconfirm_pwd.innerHTML="Password has to be 8 characters";
//         e.preventDefault();
//     }
//     if(!confirm_pwd.value){
//         cconfirm_pwd.innerHTML="Missing confirm password";
//         e.preventDefault();
//     }
//     if(confirm_pwd.value!=pwd.value)
//     {
//         cconfirm_pwd.innerHTML="Passwords don't match";
//         e.preventDefault();
//     }
    
//     });

// function verif(){
    
//         cin=document.getElementById("cin");
//         password=document.getElementById("password");
//         Login_form=document.getElementById("Login_form");
//          ccin=document.getElementById("ccin")
//          ccin.innerHTML=""
//          cpassword=document.getElementById("cpassword")
//          cpassword.innerHTML=""
//         Login_form.addEventListener("submit",function (e){
//             if(!cin.value)
//         {
//             ccin.innerHTML="Missing cin"
//            e.preventDefault();
//         }
//         if(cin.value.length!=8 && cin.value)
//         {
//             ccin.innerHTML="Cin has to be 8 characters";
//            e.preventDefault();
//         }
//         if(!password.value)
//         {
//            e.preventDefault();
//            cpassword.innerHTML="Missing password"
//         }
//         });
    
   
    
// }

// date_naissance=document.getElementById("date_naissance_signup");
// var today=new Date;
//     var dd=String(today.getDate()).padStart(2,'0');
//     var yyyy=String(today.getFullYear()-18);
//     var mm=String(today.getMonth()+1).padStart(2,'0');
//     date_naissance.max=yyyy+"-"+mm+"-"+dd;


