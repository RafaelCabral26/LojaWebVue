<script>
import navbarVue from '../components/navbar.vue';
import productsService from "../service/productsService"
export default {
  components: { navbarVue },
  data() {
    return { produtos: [], produto: {} }
  },
  mounted() {
    this.list()
  },
  methods: {
    list() {
      productsService.list()
        .then(res => {
          this.produtos = res.data
        }).catch(error => {
          console.log(error);
          alert("Erro ao pegar a lista de usuário!");
        })
    }
  }

}
</script>

<template>
  <main>
    <navbarVue></navbarVue>
    <section class="container text-center">
      <!-- v-for="produto in produtos" :key="produto"   -->
      <h2 >Produtos</h2>
      <div class="row">

        <div class="card mx-auto" style="width: 18rem;" v-for="produto in produtos" :key="produto">
          <img class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ produto.nome }}</h5>
            <p class="card-text">{{ produto.descricao}}</p>
            <a href="#" class="btn btn-primary">Ver Produto</a>
          </div>
        </div>
        
      </div>
      
      
    </section>
  </main>
</template>
