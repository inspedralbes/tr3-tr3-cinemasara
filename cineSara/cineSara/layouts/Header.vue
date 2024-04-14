<template>
  <header class="header">
    <nav class="navbar">
      <div class="container">
        <router-link to="/" class="navbar-brand">
          <img src="../public/logo.jpg" alt="CineSaras Logo" class="logo">
          <h1>CineSara</h1>
        </router-link>
        <ul class="navbar-nav">

          <li class="nav-item">
            <router-link to="/login" class="nav-link">Login</router-link>
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
* {
  margin: 0;
  padding: 0;
}

.header {
  background-color: #1a1a1a; /* Color oscuro */
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
  display: flex;
  align-items: center;
}

.logo {
 width: 9vw;
 border-radius: 50%;
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
