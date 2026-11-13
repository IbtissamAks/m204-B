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


        // Étape 2 — Ajouter, retirer, insérer

echo "--- Étape 2 : Ajouter, retirer, insérer ---" . PHP_EOL;

// On travaille sur une copie pour ne pas altérer les données de base
$copieNotes = $notes;

// 1. Ajouter la note 16 à la fin de deux façons
$copieNotes[] = 16;
array_push($copieNotes, 16);
echo "Après ajout de 16 (x2) à la fin : " . implode(", ", $copieNotes) . PHP_EOL;

// 2. Ajouter la note 10 au début
array_unshift($copieNotes, 10);
echo "Après ajout de 10 au début : " . implode(", ", $copieNotes) . PHP_EOL;

// 3. Retirer la dernière puis la première note
$derniere = array_pop($copieNotes);
$premiere = array_shift($copieNotes);
echo "Dernière note retirée : $derniere" . PHP_EOL;
echo "Première note retirée : $premiere" . PHP_EOL;
echo "Tableau actuel : " . implode(", ", $copieNotes) . PHP_EOL;

// 4. Insérer la note 13 à l'indice 2 sans écraser (array_splice)
array_splice($copieNotes, 2, 0, [13]);
echo "Après insertion de 13 à l'indice 2 : " . implode(", ", $copieNotes) . PHP_EOL;

// 5. Supprimer l'indice 1 avec unset() et constater le trou
unset($copieNotes[1]);
echo "Indices avec le trou après unset : " . implode(", ", array_keys($copieNotes)) . PHP_EOL;

// Réindexation avec array_values()
$copieNotes = array_values($copieNotes);
echo "Indices réindexés avec array_values() : " . implode(", ", array_keys($copieNotes)) . PHP_EOL . PHP_EOL;


        // Étape 3 — Recherche

echo "--- Étape 3 : Recherche ---" . PHP_EOL;

// 1. Vérifier si 17 existe
echo "La note 17 existe ? " . (in_array(17, $notes, true) ? "Oui" : "Non") . PHP_EOL;

// 2. Trouver l'indice de la note 9
$indice9 = array_search(9, $notes, true);
if ($indice9 !== false) {
    echo "La note 9 est à l'indice : $indice9" . PHP_EOL;
} else {
    echo "La note 9 n'existe pas." . PHP_EOL;
}

// 3. Vérifier si Omar figure dans la liste
echo "Omar figure dans la liste ? " . (in_array('Omar', $prenoms, true) ? "Oui" : "Non") . PHP_EOL . PHP_EOL;


// Étape 4 — Statistiques

echo "--- Étape 4 : Statistiques ---" . PHP_EOL;

// 1. Somme, moyenne, min, max
$somme = array_sum($notes);
$moyenne = round($somme / count($notes), 2);
$min = min($notes);
$max = max($notes);
echo "Somme : $somme | Moyenne : $moyenne | Min : $min | Max : $max" . PHP_EOL;

// 2. Notes >= 10 avec boucle puis avec array_filter
$admisBoucle = 0;
foreach ($notes as $n) {
    if ($n >= 10) {
        $admisBoucle++;
    }
}
$admisFilter = count(array_filter($notes, fn(int $n): bool => $n >= 10));
echo "Admis (>= 10) avec boucle : $admisBoucle" . PHP_EOL;
echo "Admis (>= 10) avec array_filter : $admisFilter" . PHP_EOL;

// 3. Pourcentage de réussite
$pourcentage = round(($admisFilter / count($notes)) * 100, 2);
echo "Admis (>= 10) : $admisFilter sur " . count($notes) . " ($pourcentage %)" . PHP_EOL;

// 4. Médiane
$notesTri = $notes;
sort($notesTri);
$nbElements = count($notesTri);
if ($nbElements % 2 === 1) {
    $mediane = (float) $notesTri[intdiv($nbElements, 2)];
} else {
    $mediane = ($notesTri[($nbElements / 2) - 1] + $notesTri[$nbElements / 2]) / 2.0;
}
echo "Médiane : $mediane" . PHP_EOL . PHP_EOL;


        // Étape 5 — Tri et extraction

echo "--- Étape 5 : Tri et extraction ---" . PHP_EOL;

$triCroissant = $notes;
sort($triCroissant);
echo "Notes triées croissant : " . implode(", ", $triCroissant) . PHP_EOL;

$triDecroissant = $notes;
rsort($triDecroissant);
echo "Notes triées décroissant : " . implode(", ", $triDecroissant) . PHP_EOL;

// 3 meilleures notes
$top3 = array_slice($triDecroissant, 0, 3);
echo "3 meilleures notes : " . implode(", ", $top3) . PHP_EOL;

// Prénoms triés puis inversés
$prenomsTri = $prenoms;
sort($prenomsTri);
$prenomsInverses = array_reverse($prenomsTri);
echo "Prénoms triés et inversés : " . implode(", ", $prenomsInverses) . PHP_EOL . PHP_EOL;

        // Étape 6 — Transformer avec array_map, array_filter, array_reduce

echo "--- Étape 6 : Transformation (map, filter, reduce) ---" . PHP_EOL;

// 1. Bonus +1 sans dépasser 20
$notesBonus = array_map(fn(int $n): int => min(20, $n + 1), $notes);
echo "Avec bonus : " . implode(", ", $notesBonus) . PHP_EOL;

// 2. Notes >= 10 réindexées
$notesAdmises = array_values(array_filter($notes, fn(int $n): bool => $n >= 10));
echo "Notes admises réindexées : " . implode(", ", $notesAdmises) . PHP_EOL;

// 3. Somme avec array_reduce
$totalReduce = array_reduce($notes, fn(int $cumul, int $n): int => $cumul + $n, 0);
echo "Total (avec array_reduce) : $totalReduce" . PHP_EOL;

// 4. Prénoms en majuscules
$prenomsMaj = array_map('strtoupper', $prenoms);
echo "Prénoms en majuscules : " . implode(", ", $prenomsMaj) . PHP_EOL;

// 5. Mentions
$mentions = array_map(function (int $n): string {
    if ($n < 10) {
        $mention = "Ajourné";
    } elseif ($n < 14) {
        $mention = "Passable";
    } elseif ($n < 16) {
        $mention = "Assez bien";
    } else {
        $mention = "Bien";
    }
    return "$n → $mention";
}, $notes);
echo "Mentions :" . PHP_EOL . "  " . implode(PHP_EOL . "  ", $mentions) . PHP_EOL . PHP_EOL;

        // Étape 7 — Chaînes, fusion et ensembles

echo "--- Étape 7 : Chaînes, fusion et ensembles ---" . PHP_EOL;

// 1. Implode
echo "Prénoms séparés par virgules : " . implode(", ", $prenoms) . PHP_EOL;

// 2. Explode et array_unique
$chaine = "php,js,sql,php,html,js";
$langages = array_values(array_unique(explode(",", $chaine)));
echo "Langages dédoublonnés : " . implode(", ", $langages) . PHP_EOL;

// 3. Fusion et dédoublonnage
$fusion = array_values(array_unique(array_merge(["php", "sql"], ["js", "sql"])));
echo "Fusion dédoublonnée : " . implode(", ", $fusion) . PHP_EOL;

// 4. Intersect et diff
$a = ["php", "js", "sql"];
$b = ["js", "html", "sql"];
echo "Éléments communs (intersect) : " . implode(", ", array_values(array_intersect($a, $b))) . PHP_EOL;
echo "Uniquement dans A (diff) : " . implode(", ", array_values(array_diff($a, $b))) . PHP_EOL;

// 5. Array chunk
$paquets = array_chunk(range(1, 10), 3);
echo "Paquets de 3 : ";
foreach ($paquets as $p) {
    echo "[" . implode(",", $p) . "] ";
}
echo PHP_EOL . PHP_EOL;


        // Étape 8 — Mini-problème : le carnet de notes

echo "--- Étape 8 : Mini-problème : le carnet de notes ---" . PHP_EOL;

function carnetMoyenne(array $listeNotes): float
{
    if (empty($listeNotes)) {
        return 0.0;
    }
    return round(array_sum($listeNotes) / count($listeNotes), 2);
}

function carnetMediane(array $listeNotes): float
{
    if (empty($listeNotes)) {
        return 0.0;
    }
    $copie = $listeNotes;
    sort($copie);
    $n = count($copie);
    if ($n % 2 === 1) {
        return (float) $copie[intdiv($n, 2)];
    }
    return ($copie[($n / 2) - 1] + $copie[$n / 2]) / 2.0;
}

function carnetAdmis(array $listeNotes, float $seuil = 10.0): array
{
    return array_values(array_filter($listeNotes, fn(float|int $n): bool => $n >= $seuil));
}

function carnetMeilleures(array $listeNotes, int $n = 3): array
{
    if (empty($listeNotes)) {
        return [];
    }
    $copie = $listeNotes;
    rsort($copie);
    return array_slice($copie, 0, $n);
}

function carnetHistogramme(array $listeNotes): void
{
    if (empty($listeNotes)) {
        echo "(Tableau vide)" . PHP_EOL;
        return;
    }
    foreach ($listeNotes as $index => $note) {
        $etoiles = str_repeat("*", (int) $note);
        printf("Note %d (%02d) : %s\n", $index + 1, $note, $etoiles);
    }
}

        // Tests avec les notes
echo "Moyenne carnet : " . carnetMoyenne($notes) . PHP_EOL;
echo "Médiane carnet : " . carnetMediane($notes) . PHP_EOL;
echo "Admis carnet : " . implode(", ", carnetAdmis($notes)) . PHP_EOL;
echo "3 meilleures : " . implode(", ", carnetMeilleures($notes, 3)) . PHP_EOL;
echo "Histogramme :" . PHP_EOL;
carnetHistogramme($notes);