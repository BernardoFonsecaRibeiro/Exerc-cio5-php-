<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jokenPo.css">
    <title>Jo-Ken-Pô</title>
</head>
<body>
<?php
$resultado = "";
$jogadorNome = "";
$pcNome = "";
$gif = "";

function comparar($jogador, $pc)
{
    if ($jogador == $pc) {
        return "Empate";
    }

    if (
        ($jogador == 1 && $pc == 3) || // Pedra ganha de Tesoura
        ($jogador == 2 && $pc == 1) || // Papel ganha de Pedra
        ($jogador == 3 && $pc == 2)    // Tesoura ganha de Papel
    ) {
        return "Jogador venceu";
    } else {
        return "Computador venceu";
    }
}

function nomeOpcao($num)
{
    switch ($num) {
        case 1:
            return "Pedra";
        case 2:
            return "Papel";
        case 3:
            return "Tesoura";
    }
}

if (isset($_POST["jogada"])) {

    $jogador = $_POST["jogada"];
    $pc = rand(1, 3);

    $resultado = comparar($jogador, $pc);

    $jogadorNome = nomeOpcao($jogador);
    $pcNome = nomeOpcao($pc);

    if ($resultado == "Jogador venceu") {
        $gif = "https://media.giphy.com/media/v1.Y2lkPWVjZjA1ZTQ3cWtxeXVrcHBkN3g1d3F4NzQ2bG5zOXBjOXljczdxZWU1ZDBxMmZhMSZlcD12MV9naWZzX3RyZW5kaW5nJmN0PWc/joSNxeswxuc74Juo8X/giphy.gif";
    } elseif ($resultado == "Computador venceu") {
        $gif = "https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExc2RmMnJkZWZuZ2pxMGVubG84cjQ5Mnd2a3ZwdDl3aWVvd29ua2o5dCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/WRQBXSCnEFJIuxktnw/giphy.gif";
    } else {
        $gif = "https://media.giphy.com/media/v1.Y2lkPWVjZjA1ZTQ3dWMzb28yd3dqNnZwOWk3dGNzYmdmbXMyYmp2dTluMG5jejEzcXV2YSZlcD12MV9naWZzX3RyZW5kaW5nJmN0PWc/oBYB0gqUy3xxBf89aT/giphy.gif";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Jo-Ken-Pô</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <h1>🎮 Jo-Ken-Pô</h1>

        <form method="POST">

            <button type="submit" name="jogada" value="1">🪨 Pedra</button>
            <button type="submit" name="jogada" value="2">📄 Papel</button>
            <button type="submit" name="jogada" value="3">✂️ Tesoura</button>

        </form>

        <div class="resultado">

            <?php if ($resultado != "") { ?>

                <p><b>Você escolheu:</b> <?php echo $jogadorNome; ?></p>

                <p><b>Computador escolheu:</b> <?php echo $pcNome; ?></p>

                <h2><?php echo $resultado; ?></h2>

                <img src="<?php echo $gif; ?>">

                <br><br>


            <?php } ?>
            

    </div>

</body>

</html>
</body>
</html>