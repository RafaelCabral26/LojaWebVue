import { Usuario } from "@/model/User";

export default {

    add: function (usuario = new Usuario) {
        try {


            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                alert("Cadastrado!");
            }
                xhttp.open("POST", "http://localhost:80/projetos/LojaWeb/api/index.php/add", false);
                xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
                xhttp.setRequestHeader("Content-type", "application/json;charset=utf-8");
                xhttp.send(JSON.stringify(usuario));
        } catch (error) {
            alert("Erro ao cadastrar!" + error)
            console.error(error);
        }
    },
    list: function (callback) {
            try {
    
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function () {
                    console.log(this.responseText);
                    callback(this.responseText);
                }
                    xhttp.open("GET", "http://localhost:80/projetos/LojaWeb/api/index.php/list", false);
                    xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
                    xhttp.setRequestHeader("Content-type", "application/json;charset=utf-8");
                    xhttp.send();
            } catch (error) {
                alert("Erro ao cadastrar!" + error)
                console.error(error);
            }


        }
    }
