<?php

include_once "class.php";

// crate instance!
$viggen = new Jakt(2000, 3500, 6000, "Viggen", 6);

$b52 = new Bomber(1000, 5000, 1000, "B52", 20);

print_r("
    <pre>
        {$viggen->warning()}
        {$viggen->bingo()}
    </pre>
");
print_r('<pre> viggen: </pre>');
print_r("<pre> $viggen->speed </pre>");
print_r("<pre> $viggen->range </pre>");
print_r("<pre> $viggen->payload </pre>");
print_r("<pre> $viggen->id </pre>");
print_r("<pre> $viggen->missiles </pre>");


?>