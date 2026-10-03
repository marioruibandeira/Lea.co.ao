<?php
    class PagarNasocial
    {
        private $encomendado_pago_header_id;
        function getEncomendado_pago_header_id() {
            return $this->encomendado_pago_header_id;
        }
        function setEncomendado_pago_header_id($encomendado_pago_header_id) {
            $this->encomendado_pago_header_id = $encomendado_pago_header_id;
        }
        
        private $comprador_id;
        function getComprador_id() {
            return $this->comprador_id;
        }
        function setComprador_id($comprador_id) {
            $this->comprador_id = $comprador_id;
        }
        
        private $vendedor_id;
        function getVendedor_id() {
            return $this->vendedor_id;
        }
        function setVendedor_id($vendedor_id) {
            $this->vendedor_id = $vendedor_id;
        }
        
        private $pagamento_flag;
        function getPagamento_flag() {
            return $this->pagamento_flag;
        }
        function setPagamento_flag($pagamento_flag) {
            $this->pagamento_flag = $pagamento_flag;
        }
        
        private $total_pago;
        function getTotal_pago() {
            return $this->total_pago;
        }
        function setTotal_pago($total_pago) {
            $this->total_pago = $total_pago;
        }
        
        private $ce_encomenda;
        function getCe_encomenda() {
            return $this->ce_encomenda;
        }
        function setCe_encomenda($ce_encomenda) {
            $this->ce_encomenda = $ce_encomenda;
        }
        
        private $chave_pagamento;
        function getChave_pagamento() {
            return $this->chave_pagamento;
        }
        function setChave_pagamento($chave_pagamento) {
            $this->chave_pagamento = $chave_pagamento;
        }
        
        private $flag_entrega;
        function getFlag_entrega() {
            return $this->flag_entrega;
        }
        function setFlag_entrega($flag_entrega) {
            $this->flag_entrega = $flag_entrega;
        }
        
    }
?>