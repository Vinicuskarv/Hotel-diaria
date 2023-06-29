<?php
$precos = array(0, 65, 85, 70); // preços dos hotéis
$preco = 0;
$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['hotel'], $_GET['chegada'], $_GET['partida'])) {
        $hotel = $_GET['hotel'];
        $chegada = $_GET['chegada'];
        $partida = $_GET['partida'];

        if ($hotel >= 1 && $hotel <= 3 && $chegada && $partida) {
            $data1 = strtotime($chegada);
            $data2 = strtotime($partida);
            $dias = ($data2 - $data1) / 86400;

            $preco = $precos[$hotel];
            $total = $dias * $preco;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Despesas de Viagem</title>
    <style>
        * {
            text-align: center;
            font-family: "Lucida Console", "Courier New", monospace;
        }

        body {
            background-color: #36374b;
        }

        .caixa1 {
            margin-top: 24px;
        }

        h1 {
            font-size: 18px;
            color: #e8d8c8;
            text-decoration: underline;
        }

        #hotel, #lingua {
            font-size: 18px;
            color: #839973;
        }

        .btn.btn-primary {
            font-size: 18px;
            background-color: #839973;
            color: #36374b;
            padding: 10px;
            margin-top: 20px;
        }

        .para-input {
            font-size: 18px;
            color: #e8d8c8;
        }

        #preco-total {
            font-size: 28px;
            color: #e8d8c8;
        }
    </style>
</head>
<body>
    <div class="caixa1">
        <h1>Calcular despesas de viagem</h1>
        <div class="hotel-lingua">
            <form method="GET" action="">
                <select name="hotel" id="hotel" onchange="carregarHotel(this.value);">
                    <option value="0">Selecione um hotel</option>
                    <option value="1">Nome do hotel</option>
                    <option value="2">Nombre del hotel</option>
                    <option value="3">Hotel's name</option>
                </select>
                <input type="text" id="lingua" placeholder="Língua falada" disabled>

                <br><br>
                <p class="para-input">Data de chegada:</p> <input type="date" name="chegada" id="chegada">
                <p class="para-input">Data de partida:</p> <input type="date" name="partida" id="partida"> <br><br>
                <button type="submit" class="btn btn-primary">Calcular</button>
                <p id="preco-total">Preço total: <?php echo $total; ?> €.</p>
            </form>
        </div>
    </div>

    <script>
        function carregarHotel(valor) {
            var v = document.getElementById("hotel");
            var lingua = v.value;
            switch (lingua) {
                case "1":
                    document.getElementById("lingua").value = "Português";
                    document.getElementById("lingua").disabled = false;
                    break;
                case "2":
                    document.getElementById("lingua").value = "Espanhol";
                    document.getElementById("lingua").disabled = false;
                    break;
                case "3":
                    document.getElementById("lingua").value = "Inglês";
                    document.getElementById("lingua").disabled = false;
                    break;
            }
        }
    </script>
</body>
</html>
