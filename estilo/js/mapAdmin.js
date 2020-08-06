/* mapa */
mapboxgl.accessToken = 'pk.eyJ1IjoiZW5tYXJ0eiIsImEiOiJjanhqdXoyYnUxMzFqM3htdDRjOTRwc2cyIn0.4wMfj3y1xAouXTx4bIcegg';

/* Mapa del sitio de desarrollo web */
let mapAdmin = new mapboxgl.Map({
    container:'mapAdmin',
    style:'mapbox://styles/mapbox/streets-v11',
    center:[-73.120091,7.140572],
    zoom:15
});