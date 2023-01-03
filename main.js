    // Select Elements
            let countSpan = document.querySelector(" .count span");
            let bulletsSpan = document.querySelector(" .bullets .spans");
            let quizArea = document.querySelector(".quiz-area");
            let answersArea = document.querySelector(".answers-area");
            let buttonSubmit = document.querySelector(".submit-button");
            let time = document.querySelector(".countdown");
            let divBullets = document.querySelector(".bullets");
            let result = document.querySelector(".results");
            let countdown = document.querySelector(".countdown");
            let currentIndex = 0;
            let rightAnswers = 0;
            let countdownInterval;
            let currentScore = document.getElementById('currentScore');
            let submitScore = document.getElementById('submitScore');


           
    // create the ajax request
    function getQuestions() {

    let myRequest = new XMLHttpRequest();

    myRequest.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

        let questionObject = JSON.parse(this.responseText);

        let questionsCont = questionObject.length;

        // create Bullets +set questions Count
        createBullets(questionsCont);
        // add questions  data
        questionObject.sort(function(){return Math.random() - 0.5})
        // console.log(currentIndex)
       
         addQuestionData(questionObject[currentIndex], questionsCont);


        // contDown
        countdownFunction(5, questionsCont);
        // click on submit
        buttonSubmit.onclick = function () {

            // get right answer
            let theRightAnswer = questionObject[currentIndex].right_answer;
            // console.log(theRightAnswer);
            currentIndex++;
            // check the answer
            checkAnswer(theRightAnswer, questionsCont);
            // questionObject.splice(currentIndex,1);
            // Remove Previous Question
            quizArea.innerHTML = "";
            answersArea.innerHTML = "";
            // add questions  data
                // currentIndex = Math.floor(Math.random() * questionsCont) + 1;
        // console.log(currentIndex)
        // questionObject.sort(function(){return Math.random() - 0.5})
         addQuestionData(questionObject[currentIndex], questionsCont);
            clearInterval(countdownInterval);
            // contDown
        countdownFunction(5, questionsCont);
          // handle Bullets Class
            handleBullets();
            // show results
            showResults(questionsCont);
        };
        }
    };
    myRequest.open("GET", "connect.php", true);
    myRequest.send();
    }

    getQuestions();

    function createBullets(num) {
    countSpan.innerHTML = num;
    // create bullet
    for (let i = 0; i < num; i++) {
        // Create Span
        let theBullet = document.createElement("span");
        // Check if its first span
        bulletsSpan.appendChild(theBullet);
        if (i === 0) {
        theBullet.className = "on";
        }
    }
    }
    function addQuestionData(obj, count) {
        console.log(obj);

       
        for(let i =0 ; i<count ;i++){
            if(i == currentIndex){
        // Create h2 QUESTION title
        let questionTitle = document.createElement("h2");
        // Create h2 QUESTION text
        let questionText = document.createTextNode(obj["question"]);
        // append text to h2
        questionTitle.appendChild(questionText);
        // append the h2 to quiz aer
        quizArea.appendChild(questionTitle);
        //  create the answers
        for (let i = 0; i < 4; i++) {
        // CREATE main answer div
        let mainDiv = document.createElement("div");
        // add class to main div
        mainDiv.className = "answer";
        // create radio input
        let radioInput = document.createElement("input");
        //  add type + name + id + DATA attribute
        radioInput.name = "question";
        radioInput.type = "radio";
        radioInput.id = `answer_${i}`;
        radioInput.dataset.answer = obj[`answer_${i}`];
        // create label
        let theLabel = document.createElement("label");
        // add for attribute
        theLabel.htmlFor = `answer_${i}`;
        // create label text
        let theLabelText = document.createTextNode(obj[`answer_${i}`]);
        // add the Text to label
        theLabel.appendChild(theLabelText);
        // add input + label to main div
        mainDiv.appendChild(radioInput);
        mainDiv.appendChild(theLabel);
        // append all div to answers area
        answersArea.appendChild(mainDiv);
        }
    }
}
    }



    function checkAnswer(gAnswer, count) {
    let answers = document.getElementsByName("question");
    let theChosenAnswer;
    for (let i = 0; i < answers.length; i++) {
        if (answers[i].checked) {
          
        theChosenAnswer = answers[i].dataset.answer;


        }
    }
    if (gAnswer === theChosenAnswer) {
        rightAnswers++;

        

    }
    }




    function handleBullets() {
        
    let bulletsSpan = document.querySelectorAll(".bullets .spans span");
    let arrayOfSpans = Array.from(bulletsSpan);
    arrayOfSpans.forEach((span, index) => {
        if (currentIndex === index) {
        span.className = "on";
        }
    });
    }


   
    // let formScore = document.getElementById('formScore');


    function showResults(count) {
    let theResult;
    if (currentIndex === count) {
        console.log("finish");
        answersArea.remove();
        buttonSubmit.remove();
        bulletsSpan.remove();
        divBullets.remove();
        
        

        
        if (rightAnswers > count / 2 && rightAnswers < count) {
        theResult = `<span class="good">Good</span> , ${rightAnswers} form ${count} is good`;
        } else if (rightAnswers === count) {
        theResult = `<span class="perfect">perfect</span> , ${rightAnswers} form ${count}`;
        } else {
        theResult = `<span class="bad">bad</span> , ${rightAnswers} form ${count} is good`;
        }
        result.innerHTML = theResult;
        
        //  currentScore.setAttribute('value',rightAnswers);
        //  console.log(currentScore.getAttribute("value"));
        //  submitScore.style.display="block";
        
        
        // submitScore.onclick();
        // formScore.submit();
        let xhr = new XMLHttpRequest();
        xhr.open("GET",`function.php?score=${rightAnswers}`, true);
        xhr.onreadystatechange = ()=>{
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log("success");
            }
        }
        xhr.send();
    }
   
    }
   
   



    function countdownFunction(duration, count) {
    if (currentIndex < count) {
        let minutes, seconds;
        countdownInterval = setInterval(function () {
        minutes = parseInt(duration / 60);
        seconds = parseInt(duration % 60);
        minutes = minutes < 10 ? `0${minutes}` : minutes;
        seconds = seconds < 10 ? `0${seconds}` : seconds;
        countdown.innerHTML = `${minutes} : ${seconds}`;
        if (--duration < 0) {
            clearInterval(countdownInterval);
            buttonSubmit.onclick();
            
        }
        }, 1000);
    }
    }
    
    
