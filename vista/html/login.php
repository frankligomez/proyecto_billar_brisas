<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Iniciar - Billiards Control</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-ico" href="img/billar.ico">
    
</head>
<body>
	<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
        <h2>Billiards Control</h2>
        <img src="img/logo.png">
        <input type="text" name="usuario" placeholder="Usuario" class="bordes" required autofocus/>
        <input type="password" name="password" placeholder="Contraseña" required class="bordes"/>
        
        
                        
        <input type="submit" value="Ingresar"/>
       
            
                <?php  if(!empty($errores)): ?>
          <ul>
              <?php echo $errores; ?>
          </ul>
        <?php  endif; ?>
      </form>
</body>
</html>