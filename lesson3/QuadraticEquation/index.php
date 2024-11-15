<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadratic Equation Solver</title>
</head>

<body>
    <h2>Quadratic Equation Solver: ax<sup>2</sup> + bx + c = 0</h2>
    <form method="post" action="">
        <label for="a">Enter a:</label>
        <input type="number" name="a" id="a" required step="any"><br><br>

        <label for="b">Enter b:</label>
        <input type="number" name="b" id="b" required step="any"><br><br>

        <label for="c">Enter c:</label>
        <input type="number" name="c" id="c" required step="any"><br><br>

        <button type="submit" name="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];


        if ($a == 0) {
            echo "<p>This is not a quadratic equation (a must not be 0).</p>";
        } else {

            class QuadraticEquation
            {
                private $a;
                private $b;
                private $c;

                public function __construct($a, $b, $c)
                {
                    $this->a = $a;
                    $this->b = $b;
                    $this->c = $c;
                }

                public function getDiscriminant()
                {
                    return pow($this->b, 2) - 4 * $this->a * $this->c;
                }

                public function getRoot1()
                {
                    $delta = $this->getDiscriminant();
                    if ($delta >= 0) {
                        return (-$this->b + sqrt($delta)) / (2 * $this->a);
                    } else {
                        return null;
                    }
                }

                public function getRoot2()
                {
                    $delta = $this->getDiscriminant();
                    if ($delta >= 0) {
                        return (-$this->b - sqrt($delta)) / (2 * $this->a);
                    } else {
                        return null;
                    }
                }
            }


            $equation = new QuadraticEquation($a, $b, $c);
            $delta = $equation->getDiscriminant();

            if ($delta > 0) {
                echo "<p>The equation has two roots: root1 = " . $equation->getRoot1() . ", root2 = " . $equation->getRoot2() . "</p>";
            } elseif ($delta == 0) {
                echo "<p>The equation has one root: root = " . $equation->getRoot1() . "</p>";
            } else {
                echo "<p>The equation has no real roots</p>";
            }
        }
    }
    ?>
</body>

</html>