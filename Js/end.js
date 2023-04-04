const url = document.referrer; //on recupere l'url de la page precedente
const url2 = url.substring(url.lastIndexOf('/') + 1); //on recupere le nom de la page precedente
if (url2 != "index.php?page=7") { //si la page precedente n'est pas la page 7 (quizz.php) alors on redirige vers la page d'accueil
    document.location.href = "index.php?page=0";
}
const finalScore = document.getElementById('finalScore');
const mostRecentScore = localStorage.getItem('mostRecentScore');





const finalQuestions = JSON.parse(localStorage.getItem('finalQuestions'));
console.log(finalQuestions);

const check = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='green' class='bi bi-check-lg' viewBox='0 0 16 16'> <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/></svg>"

const questionContainer = document.getElementById('Answers');
const buttonsChoix = document.getElementsByClassName('btn-question');
let previ = 0;





for (let i = 0; i < buttonsChoix.length; i++) {
    // buttonsChoix[previ].classList.add('active-btn');
    buttonsChoix[i].addEventListener('click', function () {
        questionContainer.removeChild(questionContainer.childNodes[2]);
        buttonsChoix[previ].classList.remove('active-btn');
        previ = i;
        buttonsChoix[i].classList.add('active-btn');
        const questionDiv = document.createElement('div');
        questionDiv.classList.add('question');
        questionDiv.innerHTML = `
        <img src="${finalQuestions[i].url}" alt="">
        <div class="question-title">
            <h2>${finalQuestions[i].question}</h2>
        </div>
        <div class="question-answers">
          <div class="answer-choice ${finalQuestions[i].answer[0] == "A" ? 'correct' : null}"><p>A :${finalQuestions[i].choiceA}</p></div>
          <div class="answer-choice ${finalQuestions[i].answer[0] == "B" ? 'correct' : null}"><p>B :${finalQuestions[i].choiceB}</p></div>
            ${finalQuestions[i].choiceC != null ? `<div class="answer-choice ${finalQuestions[i].answer[0] == "C" ? 'correct' : null}"><p>C :${finalQuestions[i].choiceC}</p></div>` : ''}
            ${finalQuestions[i].choiceD != null ? `<div class="answer-choice ${finalQuestions[i].answer[0] == "D" ? 'correct' : null}"><p>D :${finalQuestions[i].choiceD}</p></div>` : ''}
        </div>
        <div class="question-explanation">
            <p>${finalQuestions[i].explication}</p>
        </div>
        `;
        if (finalQuestions[i].subQuestion != null) {
            const subQuestionDiv = document.createElement('div');
            subQuestionDiv.classList.add('subQuestion');
            subQuestionDiv.innerHTML = `
            <div class="subQuestion-title">
                <h2>${finalQuestions[i].subQuestion}</h2>
            </div>
            <div class="subQuestion-answers">
            <div class="subAnswer-choice ${finalQuestions[i].subAnswer[0] == "A" ? 'correct' : null}"><p>A :${finalQuestions[i].subChoixA}</p></div>
            <div class="subAnswer-choice ${finalQuestions[i].subAnswer[0] == "B" ? 'correct' : null}"><p>B :${finalQuestions[i].subChoixB}</p></div>
            ${finalQuestions[i].subChoixC != null ? `<div class="subAnswer-choice ${finalQuestions[i].subAnswer[0] == "C" ? 'correct' : null}"><p>C :${finalQuestions[i].subChoixC}</p></div>` : ''}
            ${finalQuestions[i].subChoixD != null ? `<div class="subAnswer-choice ${finalQuestions[i].subAnswer[0] == "D" ? 'correct' : null}"><p>D :${finalQuestions[i].subChoixD}</p></div>` : ''}
        </div>
            <div class="subQuestion-explanation">
                <p>${finalQuestions[i].subExplication}</p>
            </div>
            `;
            questionDiv.appendChild(subQuestionDiv);
        }
        questionContainer.appendChild(questionDiv);
    });
}
buttonsChoix[0].click();





finalScore.innerText = mostRecentScore + " / 20";

//fonction qui gère l'affichage des confettis si le score est supérieur à 15
window.onload = function () {
    if (mostRecentScore >= 15) {
        var duration = 10 * (mostRecentScore * 17.5);
        var animationEnd = Date.now() + duration;
        var defaults = {
            startVelocity: mostRecentScore ^ 5,
            spread: 360,
            ticks: 1000,
            zIndex: 0
        };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        var interval = setInterval(function () {
            var timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            var particleCount = 50 * (timeLeft / duration);
            // since particles fall down, start a bit higher than random
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: {
                    x: randomInRange(0.1, 0.3),
                    y: Math.random() - 0.2
                }
            }));
            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: {
                    x: randomInRange(0.7, 0.9),
                    y: Math.random() - 0.2
                }
            }));
        }, 150);
    }
};