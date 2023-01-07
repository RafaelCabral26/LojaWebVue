<script>
import { RouterLink } from 'vue-router';
import { Usuario } from "../model/User";
export default {
  data() {
    return { usernav:new Usuario()};
  },
  methods: {
    getUser() {
      try{

        let userjson = JSON.parse(sessionStorage.getItem("usuario"));
        //let usernav = JSON.parse(userjson);
        this.usernav = typeof userjson === null ? '' : userjson.user;
      }catch(error) {
        return console.log('deslogado');
      } 

    },
    sair() {
      sessionStorage.clear();
      this.usernav = null;
      
    }
  },
  mounted() {
    this.getUser();
  }



}
</script>

<template>
<nav class="navbar navbar-expand-sm bg-dark" >
  <div class="container-fluid">
    <RouterLink class="navbar-brand text-light" to="/">Loja Web</RouterLink>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto  mb-lg-0">
       
     
        <li class="nav-item">
          <RouterLink class="nav-link text-light" to="/listar">Listar Usuarios</RouterLink>
        </li>
      <li class="nav-item">
        <RouterLink class="nav-link text-light" to="/enderecos">Endereços </RouterLink>
      </li>  
      
      </ul>
      <!-- Deslogado -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0" v-if="usernav == null">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <RouterLink class="nav-link text-light" aria-current="page" to="/cadastro">Cadastro</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link text-light" aria-current="page" to="/login">Entrar</RouterLink>
                    </li>
                </ul>

                <!-- Logado -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" v-else>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                        <RouterLink class="nav-link text-light" aria-current="page" to="/user">{{ usernav.nome }}
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                      <RouterLink class="nav-link text-light" @click="sair()" to="/">Sair</RouterLink>
                    </li>
                    
                </ul>
    </div>
    
  </div>
</nav>

</template>

<style scoped>

</style>