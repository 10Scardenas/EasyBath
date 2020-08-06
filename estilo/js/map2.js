/* mapa */
mapboxgl.accessToken = 'pk.eyJ1IjoiZW5tYXJ0eiIsImEiOiJjanhqdXoyYnUxMzFqM3htdDRjOTRwc2cyIn0.4wMfj3y1xAouXTx4bIcegg';

/* Mapa de Park Hotel */
let map2 = new mapboxgl.Map({
    container:'map2',
    style:'mapbox://styles/mapbox/streets-v11',
    center:[-74.215019,11.242952],
    zoom:15
});