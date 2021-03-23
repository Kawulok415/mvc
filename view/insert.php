<?php
require '../model/sports.php';
session_start();
$sporttb=isset($_SESSION['sporttbl0'])?unserialize($_SESSION['sporttbl0']):new sports();
?>
<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <title>Vytvoření záznamu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=x11cxJnfXnSYNBW9KwDPIq5uJu9o1gmfYXeFx082YLIs-ZLINLrYTxhJZBxIEuA5" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly93d3cuZHdzdHVkaW8uY3ov"/><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Přidání údajů</h2>
                    </div>
                    <p>Vyplňte tento formulář pro přidání dat do databáze.</p>
                    <form action="../index.php?act=add" method="post">
                        <div class="form group <?php echo (!empty($sporttb->category_msg)) ? 'has-error' : ''; ?>">
                            <label>Příjmení</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $sporttb->category; ?>">
                            <span class="help-block"><?php echo $sporttb->category_msg;?></span>
                        </div>
                        <div class="form group <?php echo (!empty($sporttb->name_msg)) ? 'has-error' : ''; ?>">
                            <label>Jméno</label>
                            <input name="name" class="form-control" value="<?php echo $sporttb->name; ?>">
                            <span class="help-block"><?php echo $sporttb->name_msg;?></span>
                        </div>
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Odešli">
                        <a href="../index.php" class="btn btn-default">Zruš</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 