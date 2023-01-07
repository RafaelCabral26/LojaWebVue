import { Produtos } from "../model/Products";
import http from "./config";

export default {

    add: function(produto = new Produtos) {
        console.log(produto);
        return http.post("/projetos/lojaweb/api/index.php/produtos/add", produto);
    },
    // list: function(callback) {
    //     try {
    //         const xhttp = new XMLHttpRequest();
    //         xhttp.onload = function() {
    //             console.log(this.responseText);
    //             callback(this.responseText);
    //         }
    //         xhttp.open("GET", "http://localhost:80/projetos/lojaweb/api/index.php/produtos/list", false );
    //         xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
    //         xhttp.setRequestHeader("Content-type", "application/json;charset=utf-8");
    //         xhttp.send();
    //     }catch (error) {
    //         alert("Erro ao listar produtos!" + error)
    //         console.error(error);
    //     }
    // }
    list: function () {
        return http.get("produtos/list");
    }

}