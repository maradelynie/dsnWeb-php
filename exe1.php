<?php
$primeironome = 'Mara';
$ultimonome = 'Oliveira';
$nome = $primeironome . " " . $ultimonome;
print $nome;

print strlen($nome);
print '</br>';


$pratinho = 5;
$coca = 2.5;
$chocolate = 1;
$bombom = .5;

$texto = 'O valor total da refeição foi de: R$ ';
$total =  $bombom+$chocolate+$coca+(2*$pratinho);
print $texto.number_format($total,2,",",".");
?>
