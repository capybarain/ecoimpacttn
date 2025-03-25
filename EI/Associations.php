
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associations Locales</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>
<style> 
.bodyx {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #4e4e78; /* Dark purple background */
  color: #333;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}


.container {
  max-width: 800px; 
  width: 90%;
  margin: 20px auto;
  padding: 30px;
  background-color: white;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.h1x {
  color: #2c3e50; 
  font-size: 2.5rem;
  margin-top: 0;
  margin-bottom: 10px;
}

.subtitle {
  font-size: 1.2rem;
  color: #7f8c8d; 
  margin-bottom: 30px;
}


#map {
  height: 400px;
  width: 100%;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  margin-bottom: 25px;
}

/* Instructions and Button Container */
.instructions-container {
  display: flex;
  flex-direction: column; /* Stack items vertically */
  align-items: flex-end; /* Align items to the right */
  margin-bottom: 25px;
}

/* Instructions Styles */
.instructions {
  font-size: 1rem;
  color: #555;
  margin: 0 0 10px 0; /* Add margin below instructions */
  align-self: flex-start; /* Align instructions to the left */
}

/* Button Styles */
.my-buttonn {
  background-color: #3498db; /* Blue button */
  color: white;
  border: none;
  padding: 12px 24px;
  font-size: 1rem;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.my-buttonn:hover {
  background-color: #2980b9; /* Darker blue on hover */
}

</style> 
<body class="bodyx">
    <div class="container">
        
        <h1 class="h1x">Associations Locales</h1>

        <h2 class="subtitle">Où habitez-vous ? Trouvez des associations locales près de chez vous !</h2>

        
        <div id="map"></div>

        
        <div class="instructions-container">
            <p class="instructions">📍 Cliquez sur la carte pour choisir votre emplacement.</p>
            <div class="button-boxx">
                <a href="Home.php">
                  <button class="my-buttonn">Revenir au menu</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        //  carte centrée sur la Tunisie
        var map = L.map('map').setView([34.0, 9.0], 6);

        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var userMarker = null; // Marqueur de l'utilisateur
        // Fonction pour récupérer les associations proches
        function loadAssociations(lat, lon) {
            var overpassQuery = `
                [out:json];
                (
                    node["amenity"="social_facility"]["social_facility"="environmental"](around:10000, ${lat}, ${lon});
                    node["office"="ngo"](around:10000, ${lat}, ${lon});
                );
                out center;
            `;

            fetch("https://overpass-api.de/api/interpreter?data=" + encodeURIComponent(overpassQuery))
            .then(response => response.json())
            .then(data => {
                if (data.elements.length === 0) {
                    alert("Aucune association trouvée à proximité.");
                } else {
                    data.elements.forEach(element => {
                        if (element.lat && element.lon) {
                            L.marker([element.lat, element.lon])
                            .addTo(map)
                            .bindPopup("Association : " + (element.tags.name || "Nom inconnu"));
                        }
                    });
                }
            })
            .catch(error => console.log("Erreur lors du chargement des données :", error));
        }

        
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lon = e.latlng.lng;

            
            if (userMarker) {
                map.removeLayer(userMarker);
            }

            
            userMarker = L.marker([lat, lon]).addTo(map)
                .bindPopup("Votre position sélectionnée").openPopup();

            
            loadAssociations(lat, lon);
        });
    </script>
</body>
</html>