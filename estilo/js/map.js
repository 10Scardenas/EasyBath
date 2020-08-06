/* mapa */
mapboxgl.accessToken = 'pk.eyJ1IjoiZW5tYXJ0eiIsImEiOiJjanhqdXoyYnUxMzFqM3htdDRjOTRwc2cyIn0.4wMfj3y1xAouXTx4bIcegg';

/* Mapa de Santa Marta */
let map = new mapboxgl.Map({
    container:'map',
    style:'mapbox://styles/mapbox/streets-v11',
    center:[-74.200752,11.231970],
    zoom:9
});
