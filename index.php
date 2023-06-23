<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    function esPrimo($numero) {
        if ($numero < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i === 0) {
                return false;
            }
        }
        return true;
    }
    function obtenerSiguientePrimo($numero) {
        $siguientePrimo = $numero + 1;
        while (!esPrimo($siguientePrimo)) {
            $siguientePrimo++;
        }
        return $siguientePrimo;
    }
    function obtenerStepGoldbach($numeroPar) {
        $stepGoldbach = [];
        for ($i = 2; $i <= $numeroPar / 2; $i = obtenerSiguientePrimo($i)) {
            if (esPrimo($numeroPar - $i)) {
                $stepGoldbach[] = $i;
            }
        }
        return $stepGoldbach;
    }
    function calcularStepsGoldbach($numeroPar) {
        $steps = [];
        $num = $numeroPar;
        while ($num !== 1) {
            $step = obtenerStepGoldbach($num);
            $steps[] = $step;
            if (!empty($step)) {
                $num = $step[array_key_last($step)] + 1;
            } else {
                break;
            }
        }
        return $steps;
    }
    $numeroPar = 30;
    $stepsGoldbach = calcularStepsGoldbach($numeroPar);
    foreach ($stepsGoldbach as $stepIndex => $step) {
        echo "Step " . ($stepIndex + 1) . ": ";
        if (!empty($step)) {
            echo implode(" + ", $step) . " = " . $numeroPar . "\n";
            $numeroPar = $step[array_key_last($step)];
        } else {
            break;
        }
    }
    echo "Ciclo cerrado en 1.\n";
?>
</body>
</html>