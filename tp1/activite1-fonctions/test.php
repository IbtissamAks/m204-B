<?php
declare(strict_types=1);

require_once __DIR__ . '/fonctions.php';

// Test 1: Les opérations + division par zéro avec try/catch
echo "12 + 8 = " . additionner(12, 8) . PHP_EOL;
try {
    echo diviser(10, 0);
} catch (InvalidArgumentException $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}

// Test 2: Logique
echo "7 est pair ? " . (estPair(7) ? "oui" : "non") . PHP_EOL;

// Test 3: Commercial
$facture = calculerFacture(100, 10, 10, 20.0);
echo "Facture : " . number_format($facture, 2, ",", " ") . " MAD" . PHP_EOL;

// Test 4: Boucles
echo "5! = " . factorielle(5) . PHP_EOL;
echo "Fibonacci(8) : " . implode(", ", fibonacci(8)) . PHP_EOL;
echo "PGCD(48, 18) = " . pgcd(48, 18) . PHP_EOL;