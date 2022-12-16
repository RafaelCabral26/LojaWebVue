
export class Usuario {
    constructor(
        id_usuario = null,
        nome ="",
        email = "",
        data_nasc = null,
        senha = "",
        telefone = "",
        cpf = "",
        active = true
    ) {
        this.id_usuario = id_usuario;
        this.nome = nome;
        this.email = email;
        this.data_nasc = data_nasc;
        this.cpf = cpf;
        this.senha = senha;
        this.telefone = telefone;
        this.active = active;
    }
};