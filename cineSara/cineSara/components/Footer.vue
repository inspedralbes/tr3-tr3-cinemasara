<template>
    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-section">
            <h3>Contacto</h3>
            <p>Dirección: Calle del Cine, 123</p>
            <p>Teléfono: 123-456-789</p>
            <p>Email: info@cine.com</p>
          </div>
          <div class="footer-section">
            <h3>Enlaces rápidos</h3>
            <ul>
              <li><router-link to="/">Inicio</router-link></li>
              <li><router-link to="/peliculas">Peliculas</router-link></li>
              <li><router-link to="/cartelera">Cartelera</router-link></li>
              <!-- Agrega más enlaces según sea necesario -->
            </ul>
          </div>
          <div class="footer-section">
            <h3>Síguenos</h3>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <!-- Agrega más íconos de redes sociales según sea necesario -->
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2024 Cine. Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>
  </template>
  
  <script>
  export default {
    name: 'Footer'
  }
  </script>
  
  <style scoped>
  .footer {
    background-color: #333;
    color: #fff;
    padding: 30px 0;
  }
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }
  
  .footer-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  
  .footer-section {
    flex: 1 1 300px;
    margin-bottom: 20px;
  }
  
  .footer-section h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
  }
  
  .footer-section ul {
    list-style: none;
    padding: 0;
  }
  
  .footer-section ul li {
    margin-bottom: 5px;
  }
  
  .social-icons a {
    color: #fff;
    margin-right: 10px;
    font-size: 1.5rem;
  }
  
  .footer-bottom {
    margin-top: 20px;
    text-align: center;
  }
  </style>
  