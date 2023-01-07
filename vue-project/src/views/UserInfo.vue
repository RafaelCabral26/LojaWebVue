<script>
import navbarVue from '../components/navbar.vue';
export default {
    components: { navbarVue },
    data() {
        return {usuario: {}}
        },
    methods:
     {
    mostrar() {
        let u = JSON.parse(sessionStorage.getItem("usuario"));
        this.usuario = u.user;
        }
        },
    mounted()  {
        this.mostrar();
       }
}
</script>

<template>
<navbarVue></navbarVue>
<table class="table table-striped">
<thead>
    <tr>
        <td>Nome</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>Data Nascimento</td>
    </tr>
</thead>

<tbody>
<tr>
    <td>{{ usuario.nome }}</td>
    <td>{{ usuario.email }}</td>
    <td>{{ usuario.telefone }}</td>
    <td>{{ usuario.data_nasc }}</td>
</tr>



</tbody>

</table>
</template>


<style>



</style>