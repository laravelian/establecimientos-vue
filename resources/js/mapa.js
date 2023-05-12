import '/node_modules/leaflet/dist/leaflet.css'
import '/node_modules/leaflet/dist/leaflet.js'
import '/node_modules/esri-leaflet/dist/esri-leaflet.js'
import '/node_modules/esri-leaflet-vector/dist/esri-leaflet-vector.js'
import '/node_modules/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css'
import '/node_modules/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.js'
document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#mapa")) {
        const apiKey =
            "AAPK9d30587ade2944afb0365d331d9b8d95GUwXm3oymR9fcA3EfKDy69kpRiXkIHrFJcQLJJjIB7gajSLWkBIewgrfneT6FfUR";
        const basemapEnum = "ArcGIS:Navigation";

        const map = L.map("mapa", {
            minZoom: 2,
        });

        let lat =
            document.querySelector("#lat").value === ""
                ? 10.483280829137874
                : document.querySelector("#lat").value;
        let lng =
            document.querySelector("#lng").value === ""
                ? -66.86191232470564
                : document.querySelector("#lng").value;

        map.setView([lat, lng], 16); // Paris

        L.esri.Vector.vectorBasemapLayer(basemapEnum, {
            apiKey: apiKey,
        }).addTo(map);

        let marker;

        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true,
        }).addTo(map);

        //Detectar movimiento del marker
        marker.on("moveend", function (e) {
            //Reasignar marker
            marker = e.target;

            const posicion = marker.getLatLng();

            //Centrar automaticamente
            map.panTo(new L.LatLng(posicion.lat, posicion.lng));

            //Reverse Geocoding
            L.esri.Geocoding.reverseGeocode({
                apikey: apiKey,
            })
                .latlng(posicion, 16)
                .run(function (error, resultado) {
                    if (resultado) {
                        marker.bindPopup(resultado.address.LongLabel);
                        marker.openPopup();

                        //Llenar input
                        llenarInput(resultado);
                    }
                });

            function llenarInput(resultado) {
                document.querySelector("#direccion").value =
                    resultado.address.Address;
                document.querySelector("#colonia").value =
                    resultado.address.City;
                document.querySelector("#lat").value = resultado.latlng.lat;
                document.querySelector("#lng").value = resultado.latlng.lng;
            }
        });
    }
});
