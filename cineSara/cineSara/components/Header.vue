<template>
    <header class="header">
      <nav class="navbar">
        <div class="container">
            <h1>CineSaras</h1>
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/peliculas" class="nav-link">Peliculas</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/cartelera" class="nav-link">Sesines</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  </template>
  
  <script>
  export default {
    name: 'Header',
  }
  </script>
  
  <style scoped>
  .header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
  }
  
  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .navbar-brand {
    text-decoration: none;
    color: #fff;
    font-size: 1.5rem;
  }
  
  .logo {
    width: 100px;
  }
  
  .navbar-nav {
    list-style: none;
    display: flex;
  }
  
  .nav-item {
    margin-right: 20px;
  }
  
  .nav-link {
    text-decoration: none;
    color: #fff;
    font-size: 1rem;
  }
  
  .nav-link:hover {
    text-decoration: underline;
  }
  </style>
  