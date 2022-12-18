import { Endereco } from "../model/Address";
import http from "./config";
export default {

    add: function(endereco = new Endereco) {
        console.log(endereco);
        return http.post("/projetos/LojaWeb/api/index.php/endereco/add", endereco);
    },
    get: function(cep) {
        return http.get("/projetos/LojaWeb/api/index.php/endereco/get", cep);
    },
    list: function(callback) {
        try {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                console.log(this.responseText);
                callback(this.responseText);
            }
            xhttp.open("GET", "http://localhost:80/projetos/LojaWeb/api/index.php/endereco/list", false );
            xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
            xhttp.setRequestHeader("Content-type", "application/json;charset=utf-8");
            xhttp.send();

        }catch (error) {
            alert("Erro ao listar endereços!" + error)
            console.error(error);
        }

    }



}