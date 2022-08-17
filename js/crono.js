$(document).ready(function(){

    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var 
    running_time = null;

    $(".start").click(function(){
        if ($(this).text() == 'Partida' || $(this).text() == 'Continuar')
        {
            $(this).text('Pause');
            $(this).parent().addClass('active-btn');         
            
            running_time = setInterval(function(){

            if($("#minutos").val()==04){
                alert("Se ha acabado el tiempo")
                $(this).text('Continuar');
                $(this).parent().removeClass('active-btn');
                
                $("#minutos").text(00);
                tiempo.minuto = 0;

                
                
                    
                if($("#juegos").val()>=0){
                    var sum = parseInt($("#juegos").val());
                    if ($("#juegos").val() == ''){
                        $("#juegos").val(1);
                    }else{
                        $("#juegos").val(sum+1);
                    }
                    
                    $("#minutos").text(00);
                    tiempo.minuto = 0;
                    clearInterval(running_time);
                }


            }
                // Segundos
                tiempo.segundo++;
                if(tiempo.segundo >= 60)
                {
                    tiempo.segundo = 0;
                    tiempo.minuto++;
                }      

                // Minutos
                if(tiempo.minuto >= 60)
                {
                    tiempo.minuto = 0;
                    tiempo.hora++;
                }

                $("#hour").text(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minute").text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#second").text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
                $("#horas").val(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minutos").val(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#segundos").val(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
            }, 1000);
            
        }
        else 
        {
            $(this).text('Continuar');
            $(this).parent().removeClass('active-btn');
            clearInterval(running_time);
        }

    });

    $(".start_libre").click(function(){
        if ($(this).text() == 'Libre' || $(this).text() == 'Continuar')
        {
            $(this).text('Pause');
            $(this).parent().addClass('active-btn');         
            
            running_time = setInterval(function(){

                // Segundos
                tiempo.segundo++;
                if(tiempo.segundo >= 60)
                {
                    tiempo.segundo = 0;
                    tiempo.minuto++;
                }      

                // Minutos
                if(tiempo.minuto >= 60)
                {
                    tiempo.minuto = 0;
                    tiempo.hora++;
                }

                $("#hour").text(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minute").text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#second").text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
                $("#horas").val(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minutos").val(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#segundos").val(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
                $("#juego_libre").val(2);
            }, 1000);
            
        }
        else 
        {
            $(this).text('Continuar');
            $(this).parent().removeClass('active-btn');
            clearInterval(running_time);
        }

    });

    $('.stop').click(function(){
        location.reload();
    });
});