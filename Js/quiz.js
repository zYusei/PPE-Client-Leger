const question = document.getElementById("question");
const subQuestion = document.getElementById("subQuestion");
const choices = Array.from(document.getElementsByClassName("choice-text"));
const subChoices = Array.from(document.getElementsByClassName("sub-choice-text"));
const img = document.getElementById("img");
const progressText = document.getElementById("progressText");
const scoreText = document.getElementById("score");
const progressBarFull = document.getElementById("progressBarFull");
let currentQuestion = {};
let FinalQuestions = [];
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let finalQuestions = [];
let availableQuestions = [];
let questions;



//Requete Ajax pour récupérer les questions depuis questions_quiz.php qui les récupère depuis la base de données
async function getQuestions() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "questions_quiz.php", false);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      questions = JSON.parse(xhr.responseText);
      questions = Object.entries(questions).map(([key, value]) => value);
      questions.forEach(loadedQuestion => {
        const formattedQuestion = {
          url: loadedQuestion.url,
          question: loadedQuestion.titre,
          choiceA: JSON.parse(loadedQuestion.choix).A,
          choiceB: JSON.parse(loadedQuestion.choix).B,
          choiceC: JSON.parse(loadedQuestion.choix).C,
          choiceD: JSON.parse(loadedQuestion.choix).D,
          answer: Object.keys(JSON.parse(loadedQuestion.reponse)),
          explication: loadedQuestion.explication,
          subQuestion: loadedQuestion.subTitre ? loadedQuestion.subTitre : null,
          subChoixA: loadedQuestion.subChoix != null ? JSON.parse(loadedQuestion.subChoix).A : null,
          subChoixB: loadedQuestion.subChoix != null ? JSON.parse(loadedQuestion.subChoix).B : null,
          subChoixC: loadedQuestion.subChoix != null ? JSON.parse(loadedQuestion.subChoix).C : null,
          subChoixD: loadedQuestion.subChoix != null ? JSON.parse(loadedQuestion.subChoix).D : null,
          subAnswer: loadedQuestion.subReponse != null ? Object.keys(JSON.parse(loadedQuestion.subReponse)) : null,
          subExplication: loadedQuestion.subExplication != null ? loadedQuestion.subExplication : null
        };


        availableQuestions.push(formattedQuestion);
      });
    }
  };
  xhr.send();
}






async function main() {
  await getQuestions();


  //CONSTANTS
  const CORRECT_BONUS = 1;
  const MAX_QUESTIONS = 20;

  startGame = () => {
    questionCounter = 0;
    score = 0;
    getNewQuestion();
  };

  getNewQuestion = () => {
    if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
      localStorage.setItem("mostRecentScore", score);
      //go to the end page
      localStorage.setItem("finalQuestions", JSON.stringify(finalQuestions));
      return document.location.href = "./end.php";
    }

    questionCounter++;
    progressText.innerText = `${questionCounter}/${MAX_QUESTIONS}`;
    //Update the progress bar
    progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    finalQuestions.push(currentQuestion);
    console.log(finalQuestions);
    question.innerText = currentQuestion.question;


    if (availableQuestions[questionIndex].choiceC == null) {
      document.getElementById("C").style.display = "none";
    } else {
      document.getElementById("C").style.display = "flex";
    }

    if (availableQuestions[questionIndex].choiceD == null) {
      document.getElementById("D").style.display = "none";
    } else {
      document.getElementById("D").style.display = "flex";
    }

    if (currentQuestion.subQuestion == null) {
      document.getElementById("sub").style.display = "none";
    } else {
      document.getElementById("sub").style.display = "block";

      subQuestion.innerText = currentQuestion.subQuestion;

      subChoices.forEach(subChoice => {
        const subNumber = subChoice.dataset["number"];
        subChoice.innerText = currentQuestion["subChoix" + subNumber];
      });

      if (availableQuestions[questionIndex].subChoixC == null) {
        document.getElementById("subC").style.display = "none";
      }

      if (availableQuestions[questionIndex].subChoixD == null) {
        document.getElementById("subD").style.display = "none";
      }
    }

    choices.forEach(choice => {
      const number = choice.dataset["number"];
      choice.innerText = currentQuestion["choice" + number];
    });

    availableQuestions.splice(questionIndex, 1);
    acceptingAnswers = true;

    img.src = currentQuestion.url;

  };


  choices.forEach(choice => {
    choice.addEventListener("click", e => {
      if (!acceptingAnswers) return;

      acceptingAnswers = false;
      const selectedChoice = e.target;
      const selectedAnswers = selectedChoice.dataset["number"].split(","); // Récupère les réponses sélectionnées sous forme de tableau

      // Vérifie si les réponses sélectionnées sont correctes
      let isCorrect = true;
      selectedAnswers.forEach(answer => {
        if (!currentQuestion.answer.includes(answer)) {
          isCorrect = false;
        }
      });

      const classToApply = isCorrect ? "correct" : "incorrect";
      selectedChoice.parentElement.classList.add(classToApply);

      // Vérifie si la question a une sous-question
      if (currentQuestion.subQuestion) {
        const onChoiceClick = e => {
          const selectedSubChoice = e.target;
          const selectedSubAnswer = selectedSubChoice.dataset["number"];
          const subClassToApply = selectedSubAnswer == currentQuestion.subAnswer ? "correct" : "incorrect";

          if (isCorrect && subClassToApply === "correct") {
            incrementScore(CORRECT_BONUS);
          }

          selectedSubChoice.parentElement.classList.add(subClassToApply);
          setTimeout(() => {
            subChoices.forEach(subChoice => subChoice.removeEventListener("click", onChoiceClick));
            choices.forEach(choice => choice.parentElement.classList.remove(classToApply));
            subChoices.forEach(subChoice => subChoice.parentElement.classList.remove(subClassToApply));
            getNewQuestion();
          }, 1000);
        };
        // Affiche la sous-question
        document.getElementById("sub").style.display = "block";
        subChoices.forEach(subChoice => {
          subChoice.addEventListener("click", onChoiceClick);
        });
      } else {
        if (isCorrect) {
          incrementScore(CORRECT_BONUS);
        }
        setTimeout(() => {
          selectedChoice.parentElement.classList.remove(classToApply);
          getNewQuestion();
        }, 1000);
      }
    });
  });

  incrementScore = num => {
    score += num;
    scoreText.innerText = score;
  };


  startGame();
}

main();

function sendFinalQuestions() {
  var xhr = new XMLHttpRequest();

  xhr.open("POST", "script.php", true);

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send("FinalQuestions=" + FinalQuestions);
}