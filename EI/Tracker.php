<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker - ECOimpact.tn</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .centered-title {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .button-boxx {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .card {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body class="bodyyy">
    <div class="background-container">

        <div class="button-boxx">
            <a href="Home.php" class="my-buttonn">
                <i class="fas fa-arrow-left"></i> Revenir au menu
            </a>
        </div>

        <h1 class="centered-title">Sustainable Tracker</h1>

  
        <main>
            <div class="container">
 
                <div class="card">
                    <h2> Calculateur d’empreinte carbone</h2>
                    <input type="number" id="electricity" placeholder="Consommation d'électricité (kWh)">
                    <input type="number" id="transport" placeholder="Transport (km)">
                    <button onclick="calculateCarbon()">Calculer</button>
                    <p id="carbon-result"></p>
                </div>

                
                <div class="card">
                    <h2><i class="fas fa-tasks"></i> Choisissez votre objectif durable</h2>
                    <form id="goalForm">
                        <label>
                            <input type="radio" name="goal" value="Reduce Plastic Usage"> Réduire l'utilisation du plastique
                        </label><br>
                        <label>
                            <input type="radio" name="goal" value="Use Public Transport"> Utiliser les transports en commun
                        </label><br>
                        <label>
                            <input type="radio" name="goal" value="Save Water"> Économiser l'eau
                        </label><br>
                        <label>
                            <input type="radio" name="goal" value="Switch to Renewable Energy"> Passer aux énergies renouvelables
                        </label><br>
                        <label>
                            <input type="radio" name="goal" value="Plant Trees"> Planter des arbres
                        </label><br>
                        <button type="button" onclick="submitGoal()">Définir l'objectif</button>
                    </form>
                </div>

                <!-- Display Statistics -->
                <div class="card">
                    <h2><i class="fas fa-chart-bar"></i> Statistiques des objectifs</h2>
                    <ul id="goalStats"></ul>
                </div>
            </div>
        </main>
    </div>

    <script>
        
        function calculateCarbon() {
            const electricity = parseFloat(document.getElementById('electricity').value) || 0;
            const transport = parseFloat(document.getElementById('transport').value) || 0;
            const carbonFootprint = (electricity * 0.85) + (transport * 0.2); 
            document.getElementById('carbon-result').textContent = `Votre empreinte carbone : ${carbonFootprint.toFixed(2)} kg CO2`;
        }

        // Function to submit the selected goal
        function submitGoal() {
    const selectedGoal = document.querySelector('input[name="goal"]:checked');
    if (!selectedGoal) {
        alert("Veuillez sélectionner un objectif !");
        return;
    }

    const goal = selectedGoal.value;
    console.log("Selected Goal:", goal); // Debug: Log the selected goal

    // Send the goal to the server
    fetch('save_goal.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ goal: goal })
    })
    .then(response => {
        console.log("Response Status:", response.status); // Debug: Log the response status
        return response.json();
    })
    .then(data => {
        console.log("Response Data:", data); // Debug: Log the response data
        if (data.success) {
            alert("Objectif enregistré avec succès !");
            loadStatistics(); // Refresh statistics
        } else {
            alert("Échec de l'enregistrement de l'objectif.");
        }
    })
    .catch(error => {
        console.error("Error:", error); // Debug: Log any errors
    });
}

function loadStatistics() {
    fetch('get_statistics.php')
        .then(response => {
            console.log("Statistics Response Status:", response.status); // Debug: Log the response status
            return response.json();
        })
        .then(data => {
            console.log("Statistics Data:", data); // Debug: Log the statistics data
            const statsList = document.getElementById('goalStats');
            statsList.innerHTML = ''; // Clear previous stats

            data.forEach(stat => {
                const listItem = document.createElement('li');
                listItem.textContent = `${stat.goal}: ${stat.percentage}% of people chose this goal`;
                statsList.appendChild(listItem);
            });
        })
        .catch(error => {
            console.error("Error:", error); // Debug: Log any errors
        });
}
function submitGoal() {
    const selectedGoal = document.querySelector('input[name="goal"]:checked');
    if (!selectedGoal) {
        alert("Please select a goal!");
        return;
    }

    const goal = selectedGoal.value;
    console.log("Selected Goal:", goal); // Debug: Log the selected goal

    // Send the goal to the server
    fetch('save_goal.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ goal: goal })
    })
    .then(response => {
        console.log("Response Status:", response.status); // Debug: Log the response status
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(data => {
        console.log("Response Data:", data); // Debug: Log the response data
        if (data.success) {
            alert("Goal set successfully!");
            loadStatistics(); // Refresh statistics
        } else {
            alert("Failed to set goal: " + (data.message || "Unknown error"));
        }
    })
    .catch(error => {
        console.error("Error:", error); // Debug: Log any errors
        alert("An error occurred. Check the console for details.");
    });
}
        // Function to load and display statistics

    </script>
</body>
</html>