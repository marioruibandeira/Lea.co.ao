        <?php 
        
            $carteira = 0;
            $recebimentos = 0;
            
            if($carteira > 0)
            {
                ?> 
                    <a href="https://www.lea.co.ao/nasocial/loja/carteir-digital.php" style="color:#fff;">
                        <span class="label label-success" style="width:100%;border-radius:5px;text-align:right;height:30%;color:#fff;margin-bottom:10px;">
                            Carteira Digital <span class="badge"><?php print $carteira; ?></span>
                        </span>
                    </a>
                <?php
            } else { 
                ?> 
                    <a href="https://www.lea.co.ao/nasocial/loja/carteir-digital.php" style="color:#fff;">
                        <span class="label label-danger" style="width:100%;border-radius:5px;text-align:right;height:30%;color:#fff;margin-bottom:10px;"> Carteira Digital <span class="badge"><?php print $carteira; ?></span> </span>
                    </a>
                <?php
            } 
            
            if($recebimentos > 0)
            {
                ?> 
                    <span class="label label-success" style="width:100%;border-radius:5px;text-align:right;height:30%;color:#fff;margin-bottom:10px;">
                        <a href="#" style="color:#fff;">Valores Recebidos <span class="badge"><?php print $recebimentos; ?></span></a>
                    </span>
                <?php
            } else { 
                ?> 
                    <span class="label label-danger" style="width:100%;border-radius:5px;text-align:right;height:30%;color:#fff;margin-bottom:10px;">
                        <a href="#" style="color:#fff;">Valores Recebidos <span class="badge"><?php print $recebimentos; ?></span></a>
                    </span>
                <?php
            } 
        ?>
        
        <div class="tabbable">
            
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                <li class="active"> 
                    <a data-toggle="tab" href="#Vendas" style="padding:12px 10px 0px 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/></svg>
                    </a> 
                </li>
                <li> <a data-toggle="tab" href="#Compras">Compras</a> 	</li>
                <li> <a data-toggle="tab" href="#Balanco">Balanço</a> </li>
            </ul>
            
            <div class="tab-content" style="padding-left:0px; padding-right:0px;padding-bottom:0px;">
                
                <div id="Vendas" class="tab-pane in active">
                    <div class="tab-content no-border no-padding">
                        <div id="inbox" class="tab-pane in active">
                            <div class="message-container">
                                <div id="id-message-list-navbar" class="message-navbar clearfix">
                                    <div class="message-bar" style="min-height: 26px;">
                                        <div class="message-infobar" id="id-message-infobar">
                                            <span class="blue bigger-150">Encomendas Recebidas</span>
                                            <span class="grey bigger-110">(<?php print $CatalogoDAO->ContarEncomendasPorEntregar($usuario_final); ?>)</span>
                                        </div>
                                    </div>
                                <div>
                            </div>
                        </div>
                                    				
                        <div class="message-list-container">
                            <div class="message-list" id="message-list"> <?php $CatalogoDAO->EncomendasPorEntregar($usuario_final); ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                    
                <div id="Compras" class="tab-pane">
                    <div class="tab-content no-border no-padding">
                        <div id="inbox" class="tab-pane in active">
                            <div class="message-container">
                                <div id="id-message-list-navbar" class="message-navbar clearfix">
                                    <div class="message-bar" style="min-height: 26px;">
                                        <div class="message-infobar" id="id-message-infobar">
                                            <span class="blue bigger-150">Pagamentos por Efectuar</span>
                                            <span class="grey bigger-110">(<?php $CatalogoDAO->EncomendasPorPagarTotal($usuario_final); ?>)</span>
                                        </div>																
                                    </div>
                                </div>
                                            						
                                <div class="message-list-container">
                                    <div class="message-list" id="message-list"> <?php $CatalogoDAO->EncomendasPorPagar($usuario_final); ?> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                            
                <div id="Balanco" class="tab-pane">
            <h5 style="padding-left:10px;"><b>Recebimentos</b></h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Data</th>
                        <th >Cliente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><?php $CatalogoDAO->Recebimentos($usuario_final); ?></tr>
                </tbody>
            </table>
                                    			    
            <hr/>
            
            <h5 style="padding-left:10px;"><b>Pagamentos</b></h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Data</th>
                        <th>Fornecedor</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><?php $CatalogoDAO->Pagamentos($usuario_final); ?></tr>
                </tbody>
            </table>
                                                
        </div>
                                        
            </div>
        </div>
<br/>
<a href="https://www.lea.co.ao/nasocial/loja/kitanda-dos-outros.php" class="btn btn-default" type="button" style="width:100%; border-radius:5px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
    </svg> Kitanda Dos Outros 
</a>