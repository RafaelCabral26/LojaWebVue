
export class Produtos {
    constructor(
        nome = "",
        descricao = "",
        quant = "",
        data_alteracao = "",
        valor = "",
        largura = "",
        altura = "",
        comprimento = "",
        peso = "",
        fotos = "",
        ativo = true
    ) 
    {

        this.nome = nome;
        this.descricao = descricao;
        this.quant = quant;
        this.data_alteracao = data_alteracao;
        this.valor = valor;
        this.largura = largura;
        this.altura = altura;
        this.comprimento = comprimento;
        this.peso = peso;
        this.fotos = fotos;
        this.ativo = ativo;
    }
}