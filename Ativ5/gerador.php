<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gerador.css">
    <title>Gerador de Rifas</title>
</head>

</style>

</head>

<body>

<div class="container">

<h2>Gerador de Bilhetes de Rifa</h2>

<form method="POST">

<label>Nome da campanha ou título da rifa:</label>
<input type="text" name="campanha" placeholder="Nome da campanha / rifa" required>

<label>Nome do(s) prêmio(s) que será Rifado:</label>
<textarea name="premios" placeholder="Nome do(s) prêmio(s)" required></textarea>

<label>Valor do bilhete (R$):</label>
<input type="number" step="0.01" name="valor" placeholder="Valor do bilhete (R$)" required>

<label>Quantidade de bilhetes:</label>
<input type="number" name="quantidade" placeholder="Quantidade de bilhetes" required>

<label>Data do sorteio:</label>
<input type="date" name="data" required>

<br>
<button type="submit">Gerar Bilhetes</button>

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$campanha = $_POST["campanha"];
$premios = $_POST["premios"];
$valor = $_POST["valor"];
$qtd = $_POST["quantidade"];
$data = $_POST["data"];

echo "<h2>$campanha</h2>";
echo "<p><b>Prêmios:</b> $premios</p>";
echo "<p><b>Valor:</b> R$ $valor</p>";
echo "<p><b>Data do Sorteio:</b> $data</p>";

echo '<button class="imprimir" onclick="window.print()">Imprimir Bilhetes</button>';

echo '<div class="bilhetes">';

for ($i = 1; $i <= $qtd; $i++) {

$numero = str_pad($i, 3, "0", STR_PAD_LEFT);

echo "

<div class='bilhete'>

<div class='canhoto'>

<b>Nº $numero</b>

<br><br>

Nome:<br>
_________________

<br><br>

Telefone:<br>
_________________

</div>

<div class='direito'>

<h3>$campanha</h3>

<p><b>Prêmio:</b> $premios</p>

<p><b>Data do Sorteio:</b> $data</p>

<p><b>Valor:</b> R$ $valor</p>

<div class='numero'>Nº $numero</div>



</div>

</div>

";

}

echo '</div>';

}

?>

</div>

</body>
</html>