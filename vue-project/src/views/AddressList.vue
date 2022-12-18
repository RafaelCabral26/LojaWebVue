<script>
import navbarVue from '../components/navbar.vue';
import addressService from '../service/addressService';
export default {
components: {navbarVue},
data() {
    return { enderecos: [], endereco: {}}
},
mounted() {
    this.listarAddress();
},
methods: {
    listarAddress()
    {
        addressService.list(dados => {
            this.enderecos = JSON.parse(dados);
        }
        )


    }
}


}
</script>
<template>
<navbarVue></navbarVue>
<section class="container">
<h2>Endereços</h2>
<table class="table">
<thead>
    <th>Cep</th>
    <th>Logradouro</th>
    <th>Bairro</th>
    <th>Cidade</th>
    <th>UF</th>
</thead>
<tbody>
<tr v-for="endereco in enderecos" :key="endereco">
<td>{{ endereco.cep}}</td>
<td>{{ endereco.logradouro}}</td>
<td>{{ endereco.bairro}}</td>
<td>{{ endereco.cidade}}</td>
<td>{{ endereco.uf}}</td>
</tr>    



</tbody>


</table>



</section>


</template>

<style>




</style>