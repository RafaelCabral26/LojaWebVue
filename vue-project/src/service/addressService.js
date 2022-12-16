import { Endereco } from "../model/Address";
import http from "./config";
export default {

    add: function(endereco = new Endereco) {
        console.log(endereco);
        return http.post("/projetos/LojaWeb/api/index.php/endereco/add", endereco);
    },
    list: function () {
        return http.get("/projetos/LojaWeb/api/index.php/endereco/list");
    },
    get: function(cep) {
        return http.get("/projetos/LojaWeb/api/index.php/endereco/get", cep);
    }



}