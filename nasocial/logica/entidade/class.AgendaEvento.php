<?php
/**
 * Esta Class visa gerir todas as accoes da gestão da agenda no systema
 *
 * @author Mário Bandeira
 * Data de Criação : 23/12/2018
 * Última Actualização : 01/05/2023
 * @copyright (c) 2019, Lés Corporation
 * @version 0.2
 */
class AgendaEvento 
{
    
    
    private $ce_agenda_estoque;
    public function getCe_agenda_estoque() {      
        return $this->ce_agenda_estoque;    
    }
    public function setCe_agenda_estoque($ce_agenda_estoque) {
        $this->ce_agenda_estoque = $ce_agenda_estoque;
    }
    
    private $is_Promocao;
    public function getIs_Promocao() {      
        return $this->is_Promocao;    
    }
    public function setIs_Promocao($is_Promocao) {
        $this->is_Promocao = $is_Promocao;
    }
    
    private $perido_promocional;
    public function getPerido_promocional() {      
        return $this->perido_promocional;    
    }
    public function setPerido_promocional($perido_promocional) {
        $this->perido_promocional = $perido_promocional;
    }
    
    private $preco_promocional;
    public function getPreco_promocional() {      
        return $this->preco_promocional;    
    }
    public function setPreco_promocional($preco_promocional) {
        $this->preco_promocional = $preco_promocional;
    }
    
    private $estado_produto;
    public function getEstado_produto() {      
        return $this->estado_produto;    
    }
    public function setEstado_produto($estado_produto) {
        $this->estado_produto = $estado_produto;
    }
    
    private $opcao_download;
    public function getOpcao_download() {      
        return $this->opcao_download;    
    }
    public function setOpcao_download($opcao_download) {
        $this->opcao_download = $opcao_download;
    }
    
    private $encontro_publico;
    public function getEncontro_publico() {      
        return $this->encontro_publico;    
    }
    public function setEncontro_publico($encontro_publico) {
        $this->encontro_publico = $encontro_publico;
    }
    
    private $pegar_na_porta;
    public function getPegar_na_porta() {      
        return $this->pegar_na_porta;    
    }
    public function setPegar_na_porta($pegar_na_porta) {
        $this->pegar_na_porta = $pegar_na_porta;
    }
    
    private $entregar_na_porta;
    public function getEntregar_na_porta() {      
        return $this->entregar_na_porta;    
    }
    public function setEntregar_na_porta($entregar_na_porta) {
        $this->entregar_na_porta = $entregar_na_porta;
    }
    
    private $descricao;
    public function getDescricao() {      
        return $this->descricao;    
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    private $accao;
    public function getAccao() {      
        return $this->accao;    
    }
    public function setAccao($accao) {
        $this->accao = $accao;
    }
    // 
    
    //
    //
    private $id_agenda_evento;
    public function getId_agenda_evento() {      
        return $this->id_agenda_evento;    
    }
    
    public function setId_agenda_evento($id_agenda_evento) {
        $this->id_agenda_evento = $id_agenda_evento;
    }
    public function setName($id_agenda_evento) {      
        if(!is_string($id_agenda_evento) || strlen($id_agenda_evento) == 0) {        
            throw new Exception("Invalid name value!");      
        }          
        $this->id_agenda_evento = $id_agenda_evento;        
    } 
    private $titulo_evento;
    public function getTitulo_evento(){
        return $this->titulo_evento;
    }
    public function setTitulo_evento($titulo_evento) {
//        if(!is_string($titulo_evento || strlen($titulo_evento) == 0)){
//           throw new Exception("Titulo Invalido"); 
//        }
        $this->titulo_evento = $titulo_evento;
    }
    private $data_evento;
    public function getData_evento() {
        return $this->data_evento;
    }
    public function setData_evento($data_evento) {
        $this->data_evento = $data_evento;
    }
    
    private $hora_evento;
    public function getHora_evento() {
        return $this->hora_evento;
    }
    public function setHora_evento($hora_evento) {
        $this->hora_evento = $hora_evento;
    }
    private $local_evento;
    public function getLocal_evento() {
        return $this->local_evento;
    }
    public function setLocal_evento($local_evento) {
        $this->local_evento = $local_evento;
    }
    private $ce_provincia;
    public function getCe_provincia() {
        return $this->ce_provincia;
    }
    public function setCe_provincia($ce_provincia) {
        if(!is_integer($ce_provincia || strlen($ce_provincia) == 0)){
           throw new Exception("chave da provincia invalido"); 
        }
        $this->ce_provincia = $ce_provincia;
    }
    private $preco_agenda;
    public function getPreco_agenda() {
        return $this->preco_agenda;
    }
    public function setPreco_agenda($preco_agenda) {
//        if(!is_double($preco_agenda) || strlen($preco_agenda)){
//            throw new Exception("o preço é invalido");
//        }
        $this->preco_agenda = $preco_agenda;
    }
    private $descricao_agenda;
    public function getDescricao_agenda() {
        return $this->descricao_agenda;
    }
    public function setDescricao_agenda($descricao_agenda) {
//        if(!is_string($descricao_agenda) || strlen($descricao_agenda)){
//            throw new Exception("Descricao invalida");
//        }
        $this->descricao_agenda = $descricao_agenda;
    }
    private $imagem_agenda;
    public function getImagem_agenda() {
        return $this->imagem_agenda;
    }
    public function setImagem_agenda($imagem_agenda) {
        if(!is_string($imagem_agenda) || strlen($imagem_agenda)){
            throw new Exception("Imagem invalida");
        }
        $this->$imagem_agenda = $imagem_agenda;
    }
    private $ce_usuario;
    public function getCe_usuario() {
        return $this->ce_usuario;
    }
    public function setCe_usuario($ce_usuario) {
        if(!is_integer($ce_usuario) || strlen($ce_usuario)){
            throw new Exception("chave do usuario invalida");
        }
        $this->ce_usuario = $ce_usuario;
    }
    
    private $fk_usuario;
    public function getFK_usuario() {
        return $this->fk_usuario;
    }
    public function setFK_usuario($fk_usuario) {
        $this->fk_usuario = $fk_usuario;
    }
    
    
    private $ce_vendedor;
    public function getCe_vendedor() {
        return $this->ce_vendedor;
    }
    public function setCe_vendedor($ce_vendedor) {
        /*if(!is_integer($ce_vendedor) || strlen($ce_vendedor)){
            throw new Exception("chave do vendedor invalida");
        }*/
        $this->ce_vendedor = $ce_vendedor;
    }
    
    private $preco;
    public function getPreco() {
        return $this->preco;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
    }
    
    private $quantidade;
        public function getQuantidade() {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    
    private $id;
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    private $categoria;
    public function getCategoria() {
        return $this->categoria;
    }
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    private $ceEncomenda;
    public function getCeEncomenda(){ return $this->ceEncomenda; }
    public function setCeEncomenda($ceEncomenda){ $this->ceEncomenda = $ceEncomenda; }
}
