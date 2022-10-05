<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/index.css">
    <title>CEMEAR</title>
</head>
<body>
    <a class="button btn-back" href="index.php">Back</a>
    <h1>LANÇAMENTO DE PEDIDOS PARA O FINANCEIRO</h1>
    <div class="content">
        <form action="index.php" method="POST">
            <div class="input-box">
                <label for="datahora">data|hora:</label>
                <input class="input" type="text" placeholder="Write a name to client" value="<?= isset($resultData[0]['datahora']) ? $resultData[0]['datahora'] : '' ?>" datahora="datahora" required>
            </div>
            <br><br>
            <div class="input-box">
                <label for="numeronf">numero nf:</label>
                <input class="input" type="text" placeholder="Write a email to client" value="<?= isset($resultData[0]['numeronf']) ? $resultData[0]['numeronf'] : '' ?>" numeronf="numeronf" required>
            </div>
            <br><br>
            <div class="input-box">
                <label for="exped">exped|log</label>
                <input class="input" type="number" placeholder="Write a phone to client" value="<?= isset($resultData[0]['exped']) ? $resultData[0]['exped'] : '' ?>" exped="exped" required>
            </div>
            <br>
            <div class="input-box">
                <label for="quemrecebeu">Phone:</label>
                <input class="input" type="text" placeholder="Write a phone to client" value="<?= isset($resultData[0]['quemrecebeu']) ? $resultData[0]['quemrecebeu'] : '' ?>" quemrecebeu="quemrecebeu" required>
            </div>
            <div class="input-box">
                <label for="statusdep">Phone:</label>
                <input class="input" type="text" placeholder="Write a phone to client" value="<?= isset($resultData[0]['statusdep']) ? $resultData[0]['statusdep'] : '' ?>" statusdep="statusdep" required>
            </div>
            <br><br>
            <input type="hidden" name="a" value="<?= isset($resultData[0]['id']) ? 'edit' : 'new' ?>">
            <input type="hidden" name="id" value="<?= isset($resultData[0]['id']) ? $resultData[0]['id'] : '' ?>">
            <input class="button btn-search" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>