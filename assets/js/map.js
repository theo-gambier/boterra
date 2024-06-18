// Création de la carte, vu par défaut au dessus de Paris
var mymap = L.map('mapid').setView([48.3, 4.075], 13);

// Création d'un cluster de point pour un affichage plus clair
let markers = new L.MarkerClusterGroup();

markers.clearLayers();

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

jardins.forEach(jardin => {

    // Récupération des coordonnées de la station
    let longitude = jardin.potager_longitude;
    let latitude = jardin.potager_latitude;

    // Création du marqueur
    let marker = L.marker([latitude, longitude], {
        icon: new L.DivIcon({
            className: 'my-div-icon',
            // Mise en forme des informations sur la vignette du marqueur
            iconAnchor: [25, 50],
            // Décalage de l'ancrage de la vignette pour correspondre aux coordonnées
            html:   '<div class="containerPin">' +
                '<img class="imagePin" src="https://img.icons8.com/ios-filled/50/map-pin.png" alt="map-pin"/>' +
                '<div id="containerInfoPin">' +
                '<div class="infoPin">' +
                '</div>' +
                '<div class="infoPin">' +
                `<p>${jardin.potager_nb_parcelle}</p>` +
                '</div>' +
                '</div>' +
                '</div>'
        })
    });

    let nbParcelles = parcelles[jardin.potager_id].length

    // Mise en forme des informations de la popup
    let popup = L.popup({
        offset: [0, -50]
    }).setContent(
        '<div class="containerPopup">' +
        '<div class="containerBanking">' +
        `<h3 class="dataTitle">${jardin.potager_adresse}</h3>` +
        '</div>' +
        '<div class="containerCapacity">' +
        '<span class="dataTitle">Parcelles :</span>' +
        `<p>${nbParcelles} / ${jardin.potager_nb_parcelle}</p>` +
        '</div>' +
        '<div class="containerLink">' +
        `<a class="mapLink" href='#${jardin.potager_id}'>Voir</a>` +
        '</div>' +
        '</div>')

    // Ajout de la popup au point
    marker.bindPopup(popup);

    // Ajoout du point au cluster de points
    markers.addLayer(marker);
});
// Ajout du cluster à la carte
mymap.addLayer(markers);