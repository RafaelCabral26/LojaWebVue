<script>
import navbarVue from '../components/navbar.vue';
//import { Usuario } from "../model/User.js"
import UserService from "../service/UserService"

export default {
    components: { navbarVue },
    data() {
        return { usuarios: [], usuario: {}}
    },
    mounted() {
        this.listar();
    },
    methods: {
        listarOld() {
            UserService.list(dados => {
                this.usuarios = JSON.parse(dados);
            })},
            listar() {
                UserService.listar()
                .then(res => {
                    console.log(res);
                    this.usuarios = res.data
                }).catch(error => {
                    console.log(error);
                    alert("Erro ao pegar a lista de usuário!");
                })
            }
           
        }

    }

</script>
<template>
    <navbarVue></navbarVue>
    <section class="container">
        <h2>Usuários</h2>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Data Nasc.</th>
                <th>Tel.</th>
                <th>Ativo</th>
            </thead>
            <tbody>
                <tr v-for="usuario in usuarios" :key="usuario">
                    <td>{{ usuario.id_usuario }}</td>
                    <td>{{ usuario.nome }}</td>
                    <td>{{ usuario.cpf }}</td>
                    <td>{{ usuario.email }}</td>
                    <td>{{ usuario.data_nasc }}</td>
                    <td>{{ usuario.telefone }}</td>
                    <td>{{ usuario.active }}</td>
                </tr>
            </tbody>
        </table>

    </section>

</template>

<style>

</style>