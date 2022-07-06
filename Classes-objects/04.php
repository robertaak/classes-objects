<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getRating(): string
    {
        return $this->rating;
    }
}

function getPG(array $movies): array
{
    $pgMovies = [];
    foreach ($movies as $movie) {
        if($movie->getRating()==='PG'){
            $pgMovies[]= $movie;
        }
    }return $pgMovies;

}

$movies = [
    $casino = new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    $glass = new Movie('Glass', 'Buena Vista International', 'PG13'),
    $spider = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG')
];

var_dump(getPG($movies));
