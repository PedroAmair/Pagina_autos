(function() {
    document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('mapa').setView([10.061712, -69.318349], 17);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        L.marker([10.061712, -69.318349]).addTo(map)
        .bindPopup('Venta de vehículos nuevos y usados')
        .openPopup()
        .bindTooltip("Nigaro Motors")
        .openTooltip();
    });

})();