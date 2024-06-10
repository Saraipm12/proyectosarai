

    <?php
    if (isset($_POST['calcular'])) {
        // Obtener los valores del formulario
        $P = array_map('intval', explode(',', $_POST['polinomioP']));
        $Q = array_map('intval', explode(',', $_POST['polinomioQ']));
        $x = $_POST['valorX'];

        // Definición de la función racional
        function funcionRacional($x, $P, $Q) {
            // Evaluar P(x) y Q(x)
            $Px = evaluarPolinomio($x, $P);
            $Qx = evaluarPolinomio($x, $Q);

            // Verificar si el denominador es cero
            if ($Qx == 0) {
                return "Error: El denominador es cero en x = $x";
            }

            // Calcular f(x) = P(x) / Q(x)
            return $Px / $Qx;
        }

        // Función para evaluar un polinomio en un valor dado de x
        function evaluarPolinomio($x, $coeficientes) {
            $grado = count($coeficientes) - 1;
            $resultado = 0;
            for ($i = 0; $i <= $grado; $i++) {
                $resultado += $coeficientes[$i] * pow($x, $grado - $i);
            }
            return $resultado;
        }

        // Calcular e imprimir el resultado
        $resultado = funcionRacional($x, $P, $Q);
        echo "<p>El resultado de f($x) es: $resultado</p>";
    }
    ?>
</body>
</html>