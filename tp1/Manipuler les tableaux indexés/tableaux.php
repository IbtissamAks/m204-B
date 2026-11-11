<?php
declare(strict_types=1);


// Données de départ fournies dans l'énoncé
$notes = [12, 15, 8, 17, 9, 14, 11];
$prenoms = ['Sara', 'Youssef', 'Imane', 'Omar', 'Khadija'];


        // Étape 1 — Lecture et parcours

echo "--- Étape 1 : Lecture et parcours ---" . PHP_EOL;

// 1. Premier et dernier élément sans écrire l'indice en dur
$premier = $notes[0];
$dernier = $notes[array_key_last($notes)]; // ou $notes[count($notes) - 1]
echo "Premier élément : $premier" . PHP_EOL;
echo "Dernier élément : $dernier" . PHP_EOL;

// 2. Nombre de notes
echo "Nombre de notes : " . count($notes) . PHP_EOL;

// 3. Parcours avec une boucle for puis foreach
echo "Parcours avec for : ";
$totalNotes = count($notes);
for ($i = 0; $i < $totalNotes; $i++) {
    echo "Note n°" . ($i + 1) . " : " . $notes[$i] . ($i < $totalNotes - 1 ? ", " : "");
}
echo PHP_EOL;

echo "Parcours avec foreach : ";
$compteur = 1;
foreach ($notes as $note) {
    echo "Note n°$compteur : $note" . ($compteur < $totalNotes ? ", " : "");
    $compteur++;
}
echo PHP_EOL;

// 4. Parcours des prénoms avec foreach ($prenoms as $i => $prenom)
echo "Liste des prénoms : ";
$listeFormattee = [];
foreach ($prenoms as $i => $prenom) {
    $listeFormattee[] = ($i + 1) . ". $prenom";
}
echo implode(", ", $listeFormattee) . PHP_EOL . PHP_EOL;
