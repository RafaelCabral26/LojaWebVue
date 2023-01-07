<script>
import navbarVue from '../components/navbar.vue';
import UserService from '../service/UserService';
export default {
    components: { navbarVue },
    data() {
        return { usuario:{ email:"", senha:""}}
      },
      methods: {
        entrar() {
            UserService.login(this.usuario)
            .then((res) => {
                sessionStorage.setItem("usuario",JSON.stringify(res.data));
                alert("Usuário Logado");
                this.$router.push("/user");
            }
            ).catch((error) => {
                console.log(error);
                alert("Erro ao tenter logar");
            }
            )
            
        }
      }



}


</script>


<template>
<main>
<navbarVue></navbarVue>
<section class="container">
        <h2 class="text-center">Entrar</h2>
        <div class="d-flex flex-column  align-items-stretch justify-content-center">
            <div class="mb-3">
                <label for="staticEmail" class="">Email</label>
                <div class="">
                    <input type="text" class="form-control" id="staticEmail" placeholder="email@example.com"
                        v-model="usuario.email">
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="">Password</label>
                <div class="">
                    <input type="password" class="form-control" id="inputPassword" placeholder="*******"
                        v-model="usuario.senha">
                </div>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-primary" @click="entrar()"> Entrar </button>
            </div>
           
        </div>
    </section>
    

    
</main>
</template>


<style>




</style>