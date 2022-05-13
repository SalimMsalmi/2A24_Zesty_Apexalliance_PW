<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ</title>
    <link rel="stylesheet"href="..\stylesss.css">
    <link rel="stylesheet"href="stylesss.css">
    <link rel="icon" href="https://www.rcrcmagazine.org/wp-content/themes/rcrcmagazine/img/logo.png">
</head>
<body>
    <div class="container">
        <div id="game" class="justify-center flex-column">
            <div id="hud">
                <div class="hud-item">
                    <p id="progresstext" class="hud-prefix">
Question
                    </p>
                    <div id="progressbar">
                        <div id="progressbar_full"></div>
                    </div>
                </div>
                <div class="hud-item">
                    <p class="hud-prefix">
                       Score
                    </p>
                   <h1 class="hud-main-text"id="score">
                       0
                   </h1>
                </div>
            </div>
            <h1 id="question">This is a question</h1>
                <div class="choice-container">
                    <p class="choice-prefix">A</p>
                    <p class="choice-text"data-number="1">This</p>
                </div>
                <div class="choice-container">
                    <p class="choice-prefix">B</p>
                    <p class="choice-text"data-number="2">This</p>
                </div>
                <div class="choice-container">
                    <p class="choice-prefix">C</p>
                    <p class="choice-text"data-number="3">This</p>
                </div>
                <div class="choice-container">
                    <p class="choice-prefix">D</p>
                    <p class="choice-text"data-number="4">This</p>
                </div>
        </div>
        
    </div>
    
    <script>
        const question=document.querySelector('#question');
const choices=Array.from(document.querySelectorAll('.choice-text'));
const scoretext=document.querySelector('#score');
const progresstext=document.querySelector('#progresstext');
const progressbar_full=document.querySelector('#progressbar_full');

let current_question={};
let accepting_answers=true;
let score=0;
let available_question=[];

let questions=[
    {
        question: 'What is the name of our platforme? ',
        choice1: 'Zesty',
        choice2: 'chanel',
        choice3: 'The Look.',
        choice4: 'Sweet Pixie Salon',
        answer:1,
    },
    {
        question: 'Which symbol is used in our Logo?',
        choice1: 'An attractive man',
        choice2: 'Elegant Woman',
         choice3: 'Red Star',
         choice4: 'Red Triangle',
        answer:2,
    },
    {
        question: 'Who are the founders of zesty?',
        choice1: 'Webmakers',
        choice2: 'Soft Square',
         choice3: 'Apex Alliance',
         choice4: 'G-makers',
        answer:3,
    },
    {
        question: 'Which symbol is used in our Logo?',
        choice1: 'An attractive man',
        choice2: 'Elegant Woman',
         choice3: 'Red Star',
         choice4: 'Red Triangle',
        answer:2,
    },
    {
        question: 'Which symbol is used in our Logo?',
        choice1: 'An attractive man',
        choice2: 'Elegant Woman',
         choice3: 'Red Star',
         choice4: 'Red Triangle',
        answer:2,
    }
    
    
]

const POINTS=100;
const N_QUESTIONS=5;

start_game=()=>{
    question_counter=0
    score=0
    available_question=[...questions]
    get_new_question()
}

get_new_question=()=>{
    if(question_counter>N_QUESTIONS||available_question.length===0)
    {
        localStorage.setItem('mostRecent',score);
        return window.location.assign('../END/end.php');
    }
    question_counter++;
   progresstext.innerText=`Question ${question_counter} of ${N_QUESTIONS}`
   progressbar_full.style.width=`${(question_counter/N_QUESTIONS)*100}%`
   const questionIndex=Math.floor(Math.random()*available_question.length)
   current_question=available_question[questionIndex]
   question.innerText=current_question.question
   choices.forEach(choice=>{
       const number=choice.dataset['number']
       choice.innerText=current_question['choice'+number]
   })
   available_question.splice(questionIndex,1)
   accepting_answers=true;
}
choices.forEach(choice=>{
    choice.addEventListener('click',e=>{
        if(!accepting_answers)
        return

        accepting_answers=false
        const selected_choice=e.target
        const selected_answer=selected_choice.dataset['number']

        let class_to_apply= selected_answer == current_question.answer ? 'correct' : 'incorrect'
        if (class_to_apply==='correct')
        {
            increment_score(POINTS)
        }
        selected_choice.parentElement.classList.add(class_to_apply)
        setTimeout(()=>{
            selected_choice.parentElement.classList.remove(class_to_apply)
            get_new_question()
        },1000)
    })
})

increment_score=num=>{
score+=num;
scoretext.innerText=score
}
start_game()
    </script>
</body>
</html>