<?php 
if (!isset($_GET['id'])){
    $_GET['id'] = $_POST['id'];
}
?>
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Bootstrap -->
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<!-- main -->
<link href="css/main.css" rel="stylesheet">
    <h1 class="site-title text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> TIEMPO JUGADO -- MESA N° <?php echo $_GET['id'];?></h1>


    <div class="separator"></div>

<form name="form" action="liquidar.php?id=<?php echo $_GET['id'];?>" method="POST">
    <input type="hidden" id="horas" name="horas" value="">
    <input type="hidden" id="minutos" name="minutos" value="">
    <input type="hidden" id="segundos" name="segundos" value="">
    <input type="hidden" id="juegos" name="juegos" value="">
    <input type="hidden" id="juego_libre" name="juego_libre" value="">
    
    <table id="content" >
        <tbody class="contador container" style="text-align: center">
            <tr style="font-size: 25px;">
                <th style="border:none;padding-right: 10px;" class="hour-time time text-center"><span style="font-size: 50px;" id="hour" value="00">00</span> <i>Horas</i></th>
                <th style="border:none;padding-right: 10px;" class="minute-time time text-center"><span style="font-size: 50px;" id="minute">00</span> <br><i>Minutos</i></th>
                <th style="border:none;padding-right: 10px;" class="second-time time text-center"><span style="font-size: 50px;" id="second" value="00">00</span> <i>Segundos</i></th>
            </tr>
            <tr class="btn-crono">
                <td class="start-btn start">Partida</td>
                <td class=""><input id="liquidar" type="submit" style="background-color:#f70713 ; font-size: 25px;" value="Liquidar consumo"></td>
                <td class="start-btn start_libre">Libre</td>
            </tr>
        </tbody>
    </table>
</form>
<script src="js/jquery.min.js"></script>
<script src="js/crono.js"></script>
<script src="js/bootstrap.min.js"></script>



<script type="text/javascript">
    $( "#liquidar" ).click(function() {
        var confirmar = confirm("Esta seguro de liquidar la mesa?");
        if (confirmar == true){
            return true;
        }else{
            return false;
        }
   });
</script>


