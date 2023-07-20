function displayExercises(exercises) {
    const container = document.getElementById('muscles-container');
    container.innerHTML = '';

    exercises.forEach((exercise) => {
        const exerciseCard = document.createElement('div');
        exerciseCard.classList.add('card-r', 'mb-4', 'col-md-4');

        const exerciseImg = document.createElement('img');
        exerciseImg.classList.add('card-img-top');
        exerciseImg.alt = exercise.name;
        exerciseImg.src = `./images/${exercise.name.toLowerCase()}.png`;

        const exerciseCardBody = document.createElement('div');
        exerciseCardBody.classList.add('card-body');

        const exerciseTitle = document.createElement('h5');
        exerciseTitle.classList.add('card-title');
        exerciseTitle.textContent = exercise.name;

        exerciseCardBody.appendChild(exerciseImg);
        exerciseCardBody.appendChild(exerciseTitle);

        exerciseCard.appendChild(exerciseCardBody);

        // Add event listener to the exercise card
        exerciseCard.addEventListener('click', () => {
            startWorkout(exercise.id);
        });

        container.appendChild(exerciseCard);
    });
}

function startWorkout(exerciseId) {
    window.location.href = `begin_workout.php?exercise_id=${exerciseId}`;
}

function loadExercisesForMuscle(muscle) {
    fetch('get_exercises.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ muscle: muscle }),
    })
        .then((response) => response.json())
        .then((data) => {
            displayExercises(data);
        })
        .catch((error) => {
            console.error('Error fetching exercises:', error);
        });
}

function displayMuscles(data) {
    const musclesArray = data.muscles;

    const container = document.getElementById('muscles-container');

    const row = document.createElement('div');
    row.classList.add('row');
    container.appendChild(row);

    musclesArray.forEach((muscle) => {
        const card = document.createElement('div');
        card.classList.add('card-r', 'mb-4', 'col-md-4');

        const cardImg = document.createElement('img');
        cardImg.classList.add('card-img-top');
        cardImg.alt = muscle;
        cardImg.src = `./images/${muscle.toLowerCase()}.png`; 
        cardImg.style.height = '200px'; 

        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');

        const title = document.createElement('h5');
        title.classList.add('card-title');
        title.textContent = muscle;



        card.appendChild(cardImg);
        cardBody.appendChild(title);

        card.appendChild(cardBody);
        card.addEventListener('click', () => {
            loadExercisesForMuscle(muscle);
        });

        row.appendChild(card);
    });
}



fetch('./data/muscles.json')
    .then((response) => response.json())
    .then((data) => {
        displayMuscles(data);
    })
    .catch((error) => {
        console.error('Error fetching data:', error);
    });
