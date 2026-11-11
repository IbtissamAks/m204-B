<?php
declare(strict_types=1);

// ==========================================
// Étape 1 — Les quatre opérations
// ==========================================

function additionner(float $a, float $b): float
{
    return $a + $b;
}

function soustraire(float $a, float $b): float
{
    return $a - $b;
}

function multiplier(float $a, float $b): float
{
    return $a * $b;
}

function diviser(float $a, float $b): float
{
    if ($b == 0.0) {
        throw new InvalidArgumentException("Division par zéro impossible");
    }
    return $a / $b;
}

// ==========================================
// Étape 2 — Fonctions logiques
// ==========================================

function estPair(int $n): bool
{
    return $n % 2 === 0;
}

function estPositif(float $n): bool
{
    return $n >= 0;
}

// Maximum بلا max()
function maximum(float $a, float $b, float $c): float
{
    $max = $a;
    if ($b > $max) {
        $max = $b;
    }
    if ($c > $max) {
        $max = $c;
    }
    return $max;
}

// Nombre premier (test de 2 à floor(sqrt(n)))
function estPremier(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    $limite = (int) floor(sqrt($n));
    for ($i = 2; $i <= $limite; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

// ==========================================
// Étape 3 — Calculs commerciaux
// ==========================================

function calculerTTC(float $ht, float $tva = 20.0): float
{
    return $ht * (1 + $tva / 100);
}

function calculerRemise(float $prix, float $pourcentage): float
{
    return round($prix * (1 - $pourcentage / 100), 2);
}

function calculerFacture(float $prixUnitaire, int $quantite, float $remise = 0, float $tva = 20.0): float
{
    $totalBrut = $prixUnitaire * $quantite;
    $totalApresRemise = calculerRemise($totalBrut, $remise);
    return calculerTTC($totalApresRemise, $tva);
}

// ==========================================
// Étape 4 — Statistiques et géométrie
// ==========================================

// Nombre variable d'arguments (variadique)
function moyenne(float ...$notes): float
{
    if (empty($notes)) {
        return 0.0;
    }
    return round(array_sum($notes) / count($notes), 2);
}

function aireCercle(float $rayon): float
{
    return round(M_PI * ($rayon ** 2), 2);
}

function perimetreCercle(float $rayon): float
{
    return round(2 * M_PI * $rayon, 2);
}

function celsiusVersFahrenheit(float $c): float
{
    return $c * (9 / 5) + 32;
}

function fahrenheitVersCelsius(float $f): float
{
    return ($f - 32) * (5 / 9);
}

function convertirDevise(float $montant, float $taux): float
{
    return round($montant * $taux, 2);
}

// ==========================================
// Étape 5 — Fonctions à boucle
// ==========================================

function factorielle(int $n): int
{
    if ($n < 0) {
        throw new InvalidArgumentException("La factorielle n'est pas définie pour les nombres négatifs.");
    }
    $resultat = 1;
    for ($i = 2; $i <= $n; $i++) {
        $resultat *= $i;
    }
    return $resultat;
}

function fibonacci(int $n): array
{
    if ($n <= 0) {
        return [];
    }
    if ($n === 1) {
        return [0];
    }
    $termes = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $termes[] = $termes[$i - 1] + $termes[$i - 2];
    }
    return $termes;
}

// Algorithme d'Euclide
function pgcd(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    while ($b !== 0) {
        $reste = $a % $b;
        $a = $b;
        $b = $reste;
    }
    return $a;
}

// Puissance sans ** ni pow()
function puissance(float $x, int $n): float
{
    if ($n === 0) {
        return 1.0;
    }
    $positif = $n > 0;
    $exp = abs($n);
    $resultat = 1.0;
    for ($i = 0; $i < $exp; $i++) {
        $resultat *= $x;
    }
    return $positif ? $resultat : 1 / $resultat;
}

function puissanceRecursive(float $x, int $n): float
{
    if ($n === 0) {
        return 1.0;
    }
    if ($n < 0) {
        return 1 / puissanceRecursive($x, -$n);
    }
    return $x * puissanceRecursive($x, $n - 1);
}