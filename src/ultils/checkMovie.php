<?php
function checkMovie($id)
{
    $apiGetMovies = "http://localhost/book_movie_ticket_be/api/movie/get";
    $responseMovies = file_get_contents($apiGetMovies);
    $dataMovies = (object)json_decode($responseMovies, true);
    foreach ($dataMovies->data as $movie) {
        if ($movie['id'] === $id) {
            return $movie['title'];
        }
    }
}
