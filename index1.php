<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pgina Wendy's</title>
</head>
<body>

<style>
  .cartelera {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    align-items: stretch; 
    justify-content: center;
    padding: 20px;
  }

  .cartel {
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    padding: 16px;
    width: 280px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .cart-img {
    width: 100%;
    height: 220px;
    object-fit: contain; 
    display: block;
  }

  h1 {
    margin: 0;
    background-color: #2e2e35;
    color: #ffffff;
    font-size: 2rem;
    padding: 18px;
    text-align: center;
  }

  nav a {
    color: white;
    text-decoration: none;
    font-weight: bold;
  }

  nav a:hover {
    color: #ffcccc;
  }

  footer {
    background-color: #2e2e35;
    color: white;
    padding: 20px;
    text-align: center;
    margin-top: 30px;
  }
</style>


<?php if (isset($_GET['mensaje'])): ?>
    <script>
        window.onload = function() {
            alert("<?php echo addslashes($_GET['mensaje']); ?>");
        };
    </script>
<?php endif; ?>


<nav style="background-color: #cc1829; color: white; padding: 1.8rem 2rem; display: flex; align-items: center; gap: 2rem;">
  <a href="index.php">MENÚ</a>
  <a href="#">LO QUE VALORAMOS</a>
  <a href="#">QUIENES SOMOS</a>
  <a href="#">ENCONTRAR TRABAJOS</a>
  <a href="#Sesión">
    <img src="https://cdn-icons-png.flaticon.com/512/10985/10985667.png" width="30" alt="Sesión">
  </a>
</nav>


<header>
  <h1>NUESTRO MENÚ</h1>
</header>

<div class="cartelera">

  <div class="cartel">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVtkH104aBa0r1-RgO5u2n-fYo8qMU-rGUTtTmQHNuTA&s=10" alt="Hamburguesas" class="cart-img">
    <h4><b>Hamburguesas</b></h4>
    <h4 style="color: #006080;">VER TODO ></h4>
  </div>

  <div class="cartel">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzOeCSxvqu4v4BJTflpVQVSFbp0-ANUXo4KjrdP-2xcg&s=10" alt="Pollo" class="cart-img">
    <h4><b>Pollo</b></h4>
    <h4 style="color: #006080;">VER TODO ></h4>
  </div>

  <div class="cartel">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSk-m-e0_76mZ9bmAUfeZ4BXEPyxc78VD03zmy37DqwjA&s=10" alt="Ensaladas" class="cart-img">
    <h4><b>Ensaladas</b></h4>
    <h4 style="color: #006080;">VER TODO ></h4>
  </div>

  <div class="cartel">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Wl_mQvrP98pCTeFwWuX0vSgr6w7sDkrrXeTFpMvAPg&s=10" alt="Papas y Complementos" class="cart-img">
    <h4><b>Papas y Complementos</b></h4>
    <h4 style="color: #006080;">VER TODO ></h4>
  </div>

  <div class="cartel">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuYhgi4kyx6dYKxtVZplq_VKcnkCm7c20dtNKTBgnhVg&s=10" alt="Postres" class="cart-img">
    <h4><b>Postres</b></h4>
    <h4 style="color: #006080;">VER TODO ></h4>
  </div>

  <div class="cartel">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-zlLumud0CEOrkRlMgJHtdQKVG0kGMoTl9Yb3Y--dhw&s=10" alt="Promociones" class="cart-img">
    <h4><b>Promociones</b></h4>
    <h4 style="color: #006080;">VER TODO ></h4>
  </div>

</div>

<center>
  <section id="Sesión">
    <h4 style="color: #0C0D36;">Inicia o Crea una cuenta en</h4>
    <h4 style="color: #cc1829;">Wendy's Rewards</h4>
    
   <h4 style="color: #0C0D36;">Si ya cuentas con cuenta ingresa tu correo electrónico:</h4>
    <form action="login.php" method="POST">
      <input type="email" name="correo_login" required>
      <button type="submit">Iniciar Sesión</button>
    </form>

    <br><hr><br>


    <h4 style="color: #0C0D36;">Si no cuentas con una cuenta, ingresa los siguientes datos:</h4>
    <form action="guardar.php" method="POST">
      Ingresa tu correo:
      <input type="email" name="correo" required>
      <br><br>

      Ingresa tu nombre:
      <input type="text" name="nombre" required>
      <br><br>

      Ingresa tu apellido:
      <input type="text" name="apellido" required>
      <br><br>

      Fecha de nacimiento:
      <input type="date" name="fecha_nacimiento">
      <br><br>

      Género:
      <br>
      <input type="radio" name="genero" value="Mujer"> Mujer <br>
      <input type="radio" name="genero" value="Hombre"> Hombre <br>
      <input type="radio" name="genero" value="desconocido"> Prefiero no decirlo<br>
      <br>

      Código postal:
      <input type="text" name="codigo_postal">
      <br><br>

      Número celular:
      <input type="tel" name="celular">
      <br><br>

      <button type="submit">Registrarse</button>
    </form>
  </section>
</center>


<footer>
  <h3>
    Edith Jimena Barraza Reyes<br>
    5-J<br>
    Programación<br>
  </h3>
</footer>

</body>
</html>