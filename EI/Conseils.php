
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conseils - ECOimpact.tn</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="bodyyx">
    <div class="background-container">


        <a href="Home.php" class="my-buttonnn">
            Revenir au menu
        </a>



            <h1 class="h1">Conseils Éco-Responsables</h1>

        <main>
            <p class="intro">Découvrez des astuces pratiques pour adopter un mode de vie durable et respectueux de l'environnement.</p>

            <div class="categories">
                
                <div class="category">
                    <h3> Recyclage et gestion des déchets</h3>
                    <p>Apprenez à trier vos déchets et à réduire votre empreinte écologique.</p>
                    <button class="my-buttonn" onclick="openModal('recyclage')">En savoir plus</button>
                </div>

                
                <div class="category">
                    <h3> Économie d’énergie et d’eau</h3>
                    <p>Découvrez comment réduire votre consommation d'énergie et d'eau au quotidien.</p>
                    <button class="my-buttonn" onclick="openModal('energie')">En savoir plus</button>
                </div>

                <!-- Consommation responsable -->
                <div class="category">
                    <h3><i class="fas fa-shopping-basket"></i> Consommation responsable</h3>
                    <p>Optez pour des produits durables et respectueux de l'environnement.</p>
                    <button class="my-buttonn" onclick="openModal('consommation')">En savoir plus</button>
                </div>

                <!-- Transport écologique -->
                <div class="category">
                    <h3><i class="fas fa-bicycle"></i> Transport écologique</h3>
                    <p>Explorez des alternatives de transport respectueuses de la planète.</p>
                    <button class="my-buttonn" onclick="openModal('transport')">En savoir plus</button>
                </div>

                <!-- Astuces DIY écologiques -->
                <div class="category">
                    <h3><i class="fas fa-seedling"></i> Astuces DIY écologiques</h3>
                    <p>Créez vos propres produits écologiques à la maison.</p>
                    <button class="my-buttonn" onclick="openModal('diy')">En savoir plus</button>
                </div>

                <!-- Mode de vie durable -->
                <div class="category">
                    <h3><i class="fas fa-leaf"></i> Mode de vie durable</h3>
                    <p>Adoptez des habitudes quotidiennes pour un avenir plus vert.</p>
                    <button class="my-buttonn" onclick="openModal('durable')">En savoir plus</button>
                </div>
            </div>
        </main>
    </div>

   
    <div id="recyclageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('recyclage')">&times;</span>
            <h2> Recyclage et gestion des déchets</h2>
            <img src="https://i0.wp.com/lapresse.tn/wp-content/uploads/2023/08/recyclage.jpg?fit=850%2C491&ssl=1" alt="Recyclage">
            <p>Le recyclage est essentiel pour réduire notre empreinte écologique. Voici quelques étapes pour bien recycler :</p>
            <ul>
                <li>1. Triez vos déchets (plastique, verre, papier, etc.).</li>
                <li>2. Utilisez des poubelles de tri sélectif.</li>
                <li>3. Évitez les emballages inutiles.</li>
            </ul>
        </div>
    </div>

    <!-- Économie d’énergie et d’eau -->
    <div id="energieModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('energie')">&times;</span>
            <h2><i class="fas fa-tint"></i> Économie d’énergie et d’eau</h2>
            <img src="https://www.cieau.com/wp-content/uploads/2014/10/lampe-eau-energie.jpg" alt="Économie d’énergie">
            <p>Voici quelques conseils pour économiser l'énergie et l'eau :</p>
            <ul>
                <li>1. Éteignez les lumières inutiles.</li>
                <li>2. Utilisez des ampoules LED.</li>
                <li>3. Prenez des douches courtes.</li>
            </ul>
        </div>
    </div>

    <!-- Consommation responsable -->
    <div id="consommationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('consommation')">&times;</span>
            <h2><i class="fas fa-shopping-basket"></i> Consommation responsable</h2>
            <img src="https://corporate.bonial.com/hubfs/203-Blog-les%20Franc%CC%A7ais%20et%20le%CC%81cologie-vers%20une%20consommation%20responsable-1.png" alt="Consommation responsable">
            <p>Adoptez une consommation responsable avec ces étapes :</p>
            <ul>
                <li>1. Achetez des produits locaux.</li>
                <li>2. Évitez les produits jetables.</li>
                <li>3. Privilégiez les produits recyclables.</li>
            </ul>
        </div>
    </div>

    <!-- Transport écologique -->
    <div id="transportModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('transport')">&times;</span>
            <h2><i class="fas fa-bicycle"></i> Transport écologique</h2>
            <img src="https://cdn.prod.website-files.com/653b7cef175ee56f7942f29a/6549f514cb69196c0d97fe70_transport.webp" alt="Transport écologique">
            <p>Explorez des alternatives de transport écologiques :</p>
            <ul>
                <li>1. Utilisez le vélo ou la marche.</li>
                <li>2. Prenez les transports en commun.</li>
                <li>3. Optez pour le covoiturage.</li>
            </ul>
        </div>
    </div>

    <!-- Astuces DIY écologiques -->
    <div id="diyModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('diy')">&times;</span>
            <h2><i class="fas fa-seedling"></i> Astuces DIY écologiques</h2>
            <img src="https://images.prismic.io/ekwateur-edito/f6f80a0e-6c9f-49cd-831a-67d2a1e0cb4b_7-diy-reduire-dechets.png?auto=compress,format" alt="DIY écologique">
            <p>Créez vos propres produits écologiques :</p>
            <ul>
                <li>1. Fabriquez vos produits ménagers.</li>
                <li>2. Réutilisez les objets usagés.</li>
                <li>3. Cultivez vos propres légumes.</li>
            </ul>
        </div>
    </div>

    <!-- Mode de vie durable -->
    <div id="durableModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('durable')">&times;</span>
            <h2><i class="fas fa-leaf"></i> Mode de vie durable</h2>
            <img src="https://www.businessnews.com.tn/images/album/IMGBN94727022.jpg" alt="Mode de vie durable">
            <p>Adoptez un mode de vie durable avec ces conseils :</p>
            <ul>
                <li>1. Réduisez votre consommation d'énergie.</li>
                <li>2. Évitez le gaspillage alimentaire.</li>
                <li>3. Plantez des arbres et des plantes.</li>
            </ul>
        </div>
    </div>

    <script>
        
        function openModal(modalId) {
            document.getElementById(`${modalId}Modal`).style.display = 'flex';
        }

        
        function closeModal(modalId) {
            document.getElementById(`${modalId}Modal`).style.display = 'none';
        }

        
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>