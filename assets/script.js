let opened = false;
document.addEventListener("DOMContentLoaded", function() {
    const firstPlan = document.querySelector(".plan");
    bottom =  firstPlan.querySelector('.plan_bottom');
    firstPlan.style.cursor = 'pointer';
    firstPlan.addEventListener("click", function() {
        if (!opened)
        {
            opened = true;
            firstPlan.style.height = '600px'
            bottom.style.height = '400px';
            const planDetails = document.createElement("div");
            planDetails.classList.add("plan_details");
            const form = document.createElement("form");
            form.action = "http://se.shenkar.ac.il/students/2022-2023/web1/dev_223/workout.php";
            form.method = "POST";

            const nestedDiv = document.createElement("div");
            nestedDiv.classList.add("plan_text_holder");
            const nestedDiv1 = document.createElement("div");
            nestedDiv1.classList.add("plan_text_div");
            const nestedDiv2 = document.createElement("div");
            nestedDiv2.classList.add("plan_text_div");
            const nestedDiv3 = document.createElement("div");
            nestedDiv3.classList.add("plan_text_div");
            const nestedDiv1P1 = document.createElement("p");
            const nestedDiv2P1 = document.createElement("p");
            const nestedDiv3P1 = document.createElement("p");
            const nestedDiv1P2 = document.createElement("p");
            const nestedDiv2P2 = document.createElement("p");
            const nestedDiv3P2 = document.createElement("p");
            nestedDiv1P1.innerText = "Duration";
            nestedDiv1P2.innerText = "40 minutes";
            nestedDiv2P1.innerText = "Difficulty";
            nestedDiv2P2.innerText = "Begginers";
            nestedDiv3P1.innerText = "Division";
            nestedDiv3P2.innerText = "No";
            const decorator = document.createElement("div");
            decorator.classList.add("text_decorator");
            nestedDiv1.appendChild(nestedDiv1P1);
            nestedDiv1.appendChild(nestedDiv1P2);
            nestedDiv2.appendChild(nestedDiv2P1);
            nestedDiv2.appendChild(nestedDiv2P2);
            nestedDiv3.appendChild(nestedDiv3P1);
            nestedDiv3.appendChild(nestedDiv3P2);
            nestedDiv1.appendChild(decorator);
            nestedDiv2.appendChild(decorator.cloneNode(true));
            nestedDiv3.appendChild(decorator.cloneNode(true));
            nestedDiv.appendChild(nestedDiv1);
            nestedDiv.appendChild(nestedDiv2);
            nestedDiv.appendChild(nestedDiv3);

            const exercisesList = ["Barbell Bench Press", "Machine Pull Downs", "Dumbbells Shoulder Press", "Squats", "Hamstring Curls", "Plank"]
            const nestedDiv4 = document.createElement("div");
            nestedDiv4.classList.add("exercises_list_div")
            const exercisesTitle = document.createElement("h2");
            exercisesTitle.textContent = "Exercises in plan";
            const exercisesListElement = document.createElement("ul");
            exercisesInnerHTML = ``;
            for (const x of exercisesList)
            {
                exercisesInnerHTML += `<li>${x}</li>`;
            }
            exercisesListElement.innerHTML = exercisesInnerHTML;
            nestedDiv4.appendChild(exercisesTitle);
            nestedDiv4.appendChild(exercisesListElement);

            const nestedDiv5 = document.createElement("div");
            nestedDiv5.classList.add("button_div");
            const submitButton = document.createElement("button");
            submitButton.type = "submit";
            submitButton.textContent = "Begin Workout!";
            submitButton.classList.add("submit_button");
            submitButton.addEventListener("click", function(event) {
                event.stopPropagation();
            });
            nestedDiv5.appendChild(submitButton);

            planDetails.appendChild(nestedDiv);
            planDetails.appendChild(nestedDiv4);
            planDetails.appendChild(nestedDiv5);

            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "exercises[]";
            hiddenInput.value = exercisesList;
            form.appendChild(hiddenInput);

            form.appendChild(planDetails);

            bottom.appendChild(form);
        }
        else
        {
            opened = false;
            firstPlan.style.height = '310px'
            bottom.style.height = '94px';

            planTitle =  bottom.querySelector('.plan_title');
            let nextSibling = planTitle.nextSibling;
            while (nextSibling) {
                const currentSibling = nextSibling;
                nextSibling = currentSibling.nextSibling;
                bottom.removeChild(currentSibling);
            }
        }
    })
})