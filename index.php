<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wendy's</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      color: #333333;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }


    nav {
      background-color: #cc1829;
      padding: 0.8rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 1.2rem;
      flex-wrap: wrap;
    }

    nav a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      transition: color 0.2s ease, transform 0.2s ease;
    }

    nav a:hover {
      color: #ffdae0;
      transform: translateY(-1px);
    }

  
    .nav-auth-btns {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .btn-nav-login {
      background: transparent;
      color: #ffffff;
      border: 2px solid #ffffff;
      padding: 6px 16px;
      border-radius: 20px;
      font-family: inherit;
      font-weight: 600;
      font-size: 0.88rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-nav-login:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    .btn-nav-register {
      background: #ffffff;
      color: #cc1829;
      border: 2px solid #ffffff;
      padding: 6px 16px;
      border-radius: 20px;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.88rem;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-nav-register:hover {
      background: #ffe6e8;
      border-color: #ffe6e8;
      transform: translateY(-1px);
    }


    .hero-banner {
      background: linear-gradient(135deg, #cc1829 0%, #8a0f1b 100%);
      color: #ffffff;
      padding: 50px 20px;
      text-align: center;
      box-shadow: inset 0 -10px 20px rgba(0,0,0,0.1);
    }

    .hero-banner h1 {
      font-size: 2.2rem;
      font-weight: 800;
      margin-bottom: 10px;
    }

    .hero-banner p {
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto 20px;
    }

    .hero-btn {
      display: inline-block;
      background-color: #ffffff;
      color: #cc1829;
      font-weight: 700;
      padding: 10px 24px;
      border-radius: 25px;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      transition: all 0.2s ease;
    }

    .hero-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.25);
    }


    .section-title {
      text-align: center;
      margin: 40px 20px 10px;
      color: #0C0D36;
      font-size: 1.5rem;
      font-weight: 700;
    }

    
    .cartelera {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 25px;
      max-width: 1200px;
      margin: 20px auto 40px;
      padding: 0 20px;
      width: 100%;
    }

    .cartel {
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid #f0f0f0;
    }

    .cartel:hover {
      transform: translateY(-6px);
      box-shadow: 0 14px 32px rgba(0, 0, 0, 0.12);
    }

    .cart-img {
      width: 100%;
      height: 170px;
      object-fit: contain;
      margin-bottom: 15px;
    }

    .cartel h4 {
      font-size: 1.1rem;
      font-weight: 700;
      color: #1a1a1a;
      margin-bottom: 12px;
    }

    .btn-ver {
      display: inline-block;
      background-color: #e6f4f8;
      color: #006080;
      font-weight: 700;
      font-size: 0.85rem;
      padding: 8px 18px;
      border-radius: 20px;
      text-decoration: none;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .btn-ver:hover {
      background-color: #006080;
      color: #ffffff;
    }

   
    .features-section {
      background: #ffffff;
      padding: 40px 20px;
      border-top: 1px solid #eee;
      border-bottom: 1px solid #eee;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      max-width: 1000px;
      margin: 30px auto 0;
      text-align: center;
    }

    .feature-card {
      padding: 20px;
      border-radius: 12px;
      background: #fdfdfd;
      border: 1px solid #f0f0f0;
    }

    .feature-icon {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .feature-card h4 {
      color: #0C0D36;
      margin-bottom: 6px;
      font-size: 1rem;
    }

    .feature-card p {
      font-size: 0.85rem;
      color: #666;
    }

    /* Modal / Formulario Flotante */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.55);
      backdrop-filter: blur(4px);
      z-index: 1000;
      align-items: center;
      justify-content: center;
      padding: 20px;
      animation: fadeIn 0.2s ease-out;
    }

    .modal-overlay.active {
      display: flex;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .auth-container {
      position: relative;
      max-width: 440px;
      width: 100%;
      background: #ffffff;
      border-radius: 20px;
      padding: 32px 28px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .btn-close-modal {
      position: absolute;
      top: 16px;
      right: 20px;
      background: transparent;
      border: none;
      font-size: 1.6rem;
      color: #888888;
      cursor: pointer;
      line-height: 1;
      transition: color 0.2s ease;
    }

    .btn-close-modal:hover {
      color: #cc1829;
    }

    .auth-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .auth-header h3 {
      color: #0C0D36;
      font-size: 1.1rem;
      font-weight: 600;
    }

    .auth-header span {
      color: #cc1829;
      font-size: 1.4rem;
      font-weight: 700;
      display: block;
    }

    .tab-buttons {
      display: flex;
      background: #f1f3f5;
      padding: 4px;
      border-radius: 12px;
      margin-bottom: 20px;
      gap: 5px;
    }

    .tab-btn {
      flex: 1;
      padding: 9px;
      border: none;
      background: transparent;
      font-family: inherit;
      font-weight: 600;
      font-size: 0.9rem;
      color: #666;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .tab-btn.active {
      background: #ffffff;
      color: #cc1829;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .auth-form {
      display: none;
      flex-direction: column;
      gap: 12px;
    }

    .auth-form.active {
      display: flex;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 4px;
      text-align: left;
    }

    .form-group label {
      font-size: 0.82rem;
      font-weight: 600;
      color: #444;
    }

    .form-group input {
      padding: 10px 12px;
      border: 1.5px solid #e0e0e0;
      border-radius: 8px;
      font-family: inherit;
      font-size: 0.9rem;
      outline: none;
      transition: border-color 0.2s ease;
    }

    .form-group input:focus {
      border-color: #cc1829;
    }

    .btn-submit {
      background-color: #cc1829;
      color: white;
      border: none;
      padding: 11px;
      border-radius: 8px;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.95rem;
      cursor: pointer;
      margin-top: 8px;
      transition: background-color 0.2s ease;
    }

    .btn-submit:hover {
      background-color: #b01322;
    }

    /* Footer */
    footer {
      background-color: #1f1f24;
      color: #a0a0a0;
      padding: 25px 20px;
      text-align: center;
      margin-top: auto;
      font-size: 0.9rem;
      line-height: 1.6;
    }

    footer h3 {
      color: #ffffff;
      font-weight: 600;
      font-size: 0.95rem;
    }
  </style>
</head>
<body>

<?php if (isset($_GET['mensaje'])): ?>
    <script>
        window.onload = function() {
            alert("<?php echo addslashes($_GET['mensaje']); ?>");
        };
    </script>
<?php endif; ?>

  <nav>
    <div class="nav-links">
      <a href="index.php">Inicio</a>
      <a href="hamburguesas.html">Hamburguesas</a>
      <a href="complementos.html">Complementos</a>
      <a href="bebidas.html">Bebidas</a>
    </div>

    <div class="nav-auth-btns">
      <button class="btn-nav-login" onclick="openModal('login')">Iniciar Sesión</button>
      <button class="btn-nav-register" onclick="openModal('register')">Registrarse</button>
    </div>
  </nav>


  <header class="hero-banner">
    <h1>¡Calidad Fresca en Cada Bocado!</h1>
    <p>Descubre el sabor auténtico de nuestras hamburguesas hechas con carne 100% de res fresca.</p>
    <button class="hero-btn" onclick="openModal('register')">Únete a Wendy's Rewards</button>
  </header>

  <h2 class="section-title">Explora Nuestro Menú</h2>

  <!-- Cartelera de Categorías -->
  <div class="cartelera">
    <div class="cartel">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVtkH104aBa0r1-RgO5u2n-fYo8qMU-rGUTtTmQHNuTA&s=10" alt="Hamburguesas de Res" class="cart-img">
      <h4>Hamburguesas de Res</h4>
      <a href="hamburguesas.html" class="btn-ver">VER TODO &gt;</a>
    </div>

    <div class="cartel">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzOeCSxvqu4v4BJTflpVQVSFbp0-ANUXo4KjrdP-2xcg&s=10" alt="Hamburguesas de Pollo" class="cart-img">
      <h4>Pollo</h4>
      <a href="hamburguesas.html" class="btn-ver">VER TODO &gt;</a>
    </div>

    <div class="cartel">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Wl_mQvrP98pCTeFwWuX0vSgr6w7sDkrrXeTFpMvAPg&s=10" alt="Papas y Complementos" class="cart-img">
      <h4>Papas y Complementos</h4>
      <a href="complementos.html" class="btn-ver">VER TODO &gt;</a>
    </div>

    <div class="cartel">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuYhgi4kyx6dYKxtVZplq_VKcnkCm7c20dtNKTBgnhVg&s=10" alt="Postres" class="cart-img">
      <h4>Postres</h4>
      <a href="complementos.html" class="btn-ver">VER TODO &gt;</a>
    </div>

    <div class="cartel">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHPouGuWHsdDMOFmIRhSCizys1bjEWz9b3F4q9C_lOPQ&s=10" alt="Bebidas" class="cart-img">
      <h4>Bebidas</h4>
      <a href="bebidas.html" class="btn-ver">VER TODO &gt;</a>
    </div>
  </div>




  <div id="authModal" class="modal-overlay" onclick="closeModalOnOutsideClick(event)">
    <div class="auth-container">
      <button class="btn-close-modal" onclick="closeModal()">&times;</button>
      
      <div class="auth-header">
        <h3>Bienvenido a</h3>
        <span>Wendy's Rewards</span>
      </div>


      <div class="tab-buttons">
        <button type="button" class="tab-btn active" onclick="switchTab('login')">Iniciar Sesión</button>
        <button type="button" class="tab-btn" onclick="switchTab('register')">Registrarse</button>
      </div>


      <form id="form-login" action="login.php" method="POST" class="auth-form active">
        <div class="form-group">
          <label for="correo_login">Correo electrónico</label>
          <input type="email" id="correo_login" name="correo_login" required placeholder="tu@correo.com">
        </div>
        <div class="form-group">
          <label for="password_login">Contraseña</label>
          <input type="password" id="password_login" name="password_login" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn-submit">Iniciar Sesión</button>
      </form>

     
      <form id="form-register" action="guardar.php" method="POST" class="auth-form">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" required placeholder="Tu apellido">
        </div>
        <div class="form-group">
          <label for="celular">Número celular</label>
          <input type="tel" id="celular" name="celular" required placeholder="6561234567">
        </div>
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input type="email" id="correo" name="correo" required placeholder="tu@correo.com">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn-submit">Registrarse</button>
      </form>
    </div>
  </div>

  <footer>
    <h3>Edith Jimena Barraza Reyes</h3>
    <p>5-J | Programación</p>
  </footer>

  <!-- JavaScript para controlar el Modal y las Pestañas -->
  <script>
    function openModal(tab) {
      document.getElementById('authModal').classList.add('active');
      switchTab(tab);
    }

    function closeModal() {
      document.getElementById('authModal').classList.remove('active');
    }

    function closeModalOnOutsideClick(event) {
      if (event.target.id === 'authModal') {
        closeModal();
      }
    }

    function switchTab(tab) {
      const loginForm = document.getElementById('form-login');
      const registerForm = document.getElementById('form-register');
      const buttons = document.querySelectorAll('.tab-btn');

      if (tab === 'login') {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
        buttons[0].classList.add('active');
        buttons[1].classList.remove('active');
      } else {
        registerForm.classList.add('active');
        loginForm.classList.remove('active');
        buttons[1].classList.add('active');
        buttons[0].classList.remove('active');
      }
    }
  </script>

</body>
</html>
