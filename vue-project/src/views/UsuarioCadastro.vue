<script>
import navbarVue from '../components/navbar.vue';
import { Usuario } from "../model/User.js"
import UserService from "../service/UserService"
var usuario = new Usuario();
export default {
    components: { navbarVue },
    data() {
        return {
            usuario
        }
    },
        methods: { cadastro() {
            UserService.add(this.usuario);
           }
        }
};
</script>
<template>
<navbarVue></navbarVue>
<section class="container w-25">
    <h2>Cadastro</h2>
        <div class="form-group">
            <label for="helpName">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="" aria-describedby="helpName" v-model="usuario.nome" />
            <small id="helpName" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="helpEmail">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="" aria-describedby="helpEmail" v-model="usuario.email"/>
            <small id="helpEmail" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="helpPass">Senha</label>
            <input type="password" name="senha" class=" form-control" placeholder="" aria-describedby="helpPass" v-model="usuario.senha" />
            <small id="helpPass" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="helpDate">Data Nasc.</label>
            <input type="date" name="data_nasc" class="form-control" placeholder="" aria-describedby="helpDate" v-model="usuario.data_nasc" />
            <small id="helpDate" class="text-muted"></small>
        </div>
        <div class="form-group">
            <label for="helpTel">Tel</label>
            <input type="tel" name="tel" class="form-control" placeholder="" aria-describedby="helpTel" v-model="usuario.telefone" />
            <small id="helpTel" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="helpCPF">CPF</label>
            <input type="number" name="cpf" class="form-control" placeholder="" aria-describedby="helpCPF"
                max="99999999999" min="00000000000" v-model="usuario.cpf" />
            <small id="helpCPF" class="text-muted"></small>
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-primary mx-1" @click="cadastro()">
                Cadastrar
            </button>
            <button type="button" class="btn btn-danger">
                Sair
            </button>
        </div>
    </section>
</template>
 <style>

</style>