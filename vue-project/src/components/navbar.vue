<script setup>
import { RouterLink } from 'vue-router';
</script>

<template>
<nav class="navbar navbar-expand-sm bg-dark">
  <div class="container-fluid">
    <RouterLink class="navbar-brand text-light" to="/">Loja Web</RouterLink>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto  mb-lg-0">
        <li class="nav-item">
          <RouterLink to="/login" class="nav-link active text-light" aria-current="page">Login</RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link text-light" to="/cadastro">Cadastro</RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link text-light" to="/listar">Listar Usuarios</RouterLink>
        </li>
      <li class="nav-item">
        <RouterLink class="nav-link text-light" to="/enderecos">Endereços</RouterLink>
      </li>  
      
      </ul>
    </div>
    
  </div>
</nav>

</template>

<style scoped>

</style>