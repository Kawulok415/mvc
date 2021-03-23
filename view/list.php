<?php session_unset(); ?>
<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="utf-8">
    <title>Jména</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=x11cxJnfXnSYNBW9KwDPIq5uJu9o1gmfYXeFx082YLIs-ZLINLrYTxhJZBxIEuA5" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly93d3cuZHdzdHVkaW8uY3ov"/><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        .table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toogle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Detaily jmen</h2>
                        <a href="index.php" class="btn btn-success" style="float:left;">Home</a>
                        <a href="view/insert.php" class="btn btn-success" style="float:right;">Přidání údajů</a>
                    </div>
                    <?php
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Příjmení</th>";
                                        echo "<th>Jméno</th>";
                                        echo "<th>Akce</th>";
                                    echo"</tr>";
                                echo "</thead>";
                                echo "</tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['category'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='index.php?act=update&id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>";
                                        echo "<a href='index.php?act=delete&id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            //free result set
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>Žádné záznamy nenalezeny.</em></p>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
