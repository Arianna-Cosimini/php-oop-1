<?php 

class Movie {
    public $titolo;
    public $genere;
    public $durata;
    public $autore;


    function __construct($_titolo, $_genere, $_durata, $_autore)
    {
        $this->titolo = $_titolo;
        $this->genere = $_genere;
        $this->durata = $_durata;
        $this->autore = $_autore;
    }

    public function getDurataInMinuti() {
        // divido la stringa della durata crteando un array
        $parts = explode(' ', $this->durata);
        
        // ottengo il primo elemento dell'array
        $durataInMinuti = (int)$parts[0];
        
        return $durataInMinuti;
    }

    public function ordinaPerDurata($filmArray) {
        // Ordino l'array di film in base alla durata in minuti
        usort($filmArray, function($a, $b) {
            return $a->getDurataInMinuti() - $b->getDurataInMinuti();
        });
        return $filmArray;
    }
    
   
}




$movie1 = new Movie ("Harry Potter", "Fantasy", "120 minuti", " J. K. Rowling");
$movie2 = new Movie ("Spiderman", "Fantasy", "121 minuti", "John Semper Jr.");
$movie3 = new Movie ("Quasi amici", "commedia/drammatico", "112 minuti", " Olivier Nakache e Éric Toledano.");
$movie4 = new Movie ("La vita è bella", "drammatico", "124 minuti", "Roberto Benigni");



$films = [

    $movie1,
    $movie2,
    $movie3,
    $movie4,

];

$films = $movie1->ordinaPerDurata($films);

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classi PHP</title>
</head>
<body>

<ul>
        <?php
        foreach($films as $film) {

            echo "
            <li>
                " . $film->titolo . ", " . $film->genere . ", " . $film->durata . "<br>
                " . $film->autore . "
            </li>";

        }
        ?>
    </ul>



    
</body>
</html>