window.onload = function bien() {
    movies = document.getElementById('movies');
    lugares = document.getElementById('lugares');
    localizaciones = document.getElementById('localizaciones');
    lugares.style.display = "none";
    localizaciones.style.display = "none";
} 


function showPeliculas(){
    movies.style.display = "block";
    lugares.style.display = "none";
    localizaciones.style.display = "none";
}

function showLugares(){
    lugares.style.display = "block";
    movies.style.display = "none";
    localizaciones.style.display = "none";
}

function showLocalizaciones() {
    localizaciones.style.display = "block";
    lugares.style.display = "none";
    movies.style.display = "none";
}