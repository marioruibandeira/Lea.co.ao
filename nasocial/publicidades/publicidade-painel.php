<?php
    if($PublicidadesDAO->ValidarEstadoPublicitario($u_fnal) > 0)
    {
        ?>
            <div class="row">
                <div class="col-sm-12 infobox-container" style="padding: 10px 11px 0px 11px;">
                    <div class="infobox infobox-green <?php if(!is_mobile()){ print "caixas";} ?>" >
                        <div class="infobox-icon"> <i class="ace-icon"><svg xmlns="http://www.w3.org/2000/svg" height="34px" viewBox="0 -960 960 960" width="38px" fill="#fff"><path d="M160-80v-240q0-33 23.5-56.5T240-400h480q33 0 56.5 23.5T800-320v240H160Zm80-160h480v-80H240v80Zm240-160L280-680q0-83 58.5-141.5T480-880q83 0 141.5 58.5T680-680L480-400Zm0-112 120-168q0-50-35-85t-85-35q-50 0-85 35t-35 85l120 168Zm0-144Z"/></svg></i> </div>
                        <div class="infobox-data">
                                <span class="infobox-data-number"><?php print $PublicidadesDAO->PublicidadeImpressoes($u_fnal);  ?></span>
                                <div class="infobox-content">Impressões</div>
                            </div>
                        <!--<div class="stat stat-success">0%</div>-->
                        <div class="badge badge-success" style="background:#9ABC32;height: 35%;"> <svg xmlns="http:#6FB3E03.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                    </div>
                        			    
                        <div class="infobox infobox-blue  infobox-blue obile()){ print "caixas";} ?>"> style="backg
                            <div class="infobox-icon"> <i class="ace-icon"><svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -960 960 960" width="38px" fill="#fff"><path d="M468-240q-96-5-162-74t-66-166q0-100 70-170t170-70q97 0 166 66t74 162l-84-25q-13-54-56-88.5T480-640q-66 0-113 47t-47 113q0 57 34.5 100t88.5 56l25 84Zm48 158q-9 2-18 2h-18q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v18q0 9-2 18l-78-24v-12q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h12l24 78Zm305 22L650-231 600-80 480-480l400 120-151 50 171 171-79 79Z"/></svg></i> </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">0</span>
                                <div class="infobox-content">Cliques</div>
                            </div>
                            <!--<div class="badge badge-success"> +0% <i class="ace-icon fa fa-arrow-up"></i> </div>-->
                            <div class="badge infobox-blue" style="background:#6FB3E0;height: 35%;"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                        </div>
                            
                        <div class="infobox infobox-pink <?php if(!is_mobile()){ print "caixas";} ?>">
                            <div class="infobox-icon">
                                <i class="ace-icon"><svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -960 960 960" width="38px" fill="#fff"><path d="M580-120q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T620-240q0-17-11.5-28.5T580-280q-17 0-28.5 11.5T540-240q0 17 11.5 28.5T580-200Zm80-200q-92 0-156-64t-64-156q0-92 64-156t156-64q92 0 156 64t64 156q0 92-64 156t-156 64Zm0-80q59 0 99.5-40.5T800-620q0-59-40.5-99.5T660-760q-59 0-99.5 40.5T520-620q0 59 40.5 99.5T660-480ZM280-240q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T360-400q0-33-23.5-56.5T280-480q-33 0-56.5 23.5T200-400q0 33 23.5 56.5T280-320Zm300 80Zm80-380ZM280-400Z"/></svg></i>
                            </div>
                            <div class="infobox-data">
                                    <span class="infobox-data-number">
                                        <?php 
                                            print (substr(($PublicidadesDAO->PublicidadeImpressoes($u_fnal)/$PublicidadesDAO->PublicidadeMediaImpressoes($u_fnal)), 0, 7));
                                            //$total_numb = strlen(($PublicidadesDAO->PublicidadeImpressoes($u_fnal)/$PublicidadesDAO->PublicidadeMediaImpressoes($u_fnal)));
                                            //print "<br/>".$total_numb;
                        				    //print "<br/>". ;
                                        ?>
                                    </span>
                                    <div class="infobox-content">Média de <?php if(!is_mobile()){ print "impr...";}else{ print "impressões..."; } ?> </div>
                            </div>
                        	<!--<div class="stat stat-important">0%</div>-->
                        	<div class="badge infobox-pink" style="background:#CB6FD7;height: 35%;"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                        </div>
                        
                        <div class="infobox infobox-red <?php if(!is_mobile()){ print "caixas";} ?>">
                            <div class="infobox-icon">
                                <i class="ace-icon"><svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -960 960 960" width="38px" fill="#fff"><path d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm320 0q-33 0-56.5-23.5T480-240q0-33 23.5-56.5T560-320q33 0 56.5 23.5T640-240q0 33-23.5 56.5T560-160ZM400-320q-33 0-56.5-23.5T320-400q0-33 23.5-56.5T400-480q33 0 56.5 23.5T480-400q0 33-23.5 56.5T400-320Zm320 0q-33 0-56.5-23.5T640-400q0-33 23.5-56.5T720-480q33 0 56.5 23.5T800-400q0 33-23.5 56.5T720-320ZM240-480q-33 0-56.5-23.5T160-560q0-33 23.5-56.5T240-640q33 0 56.5 23.5T320-560q0 33-23.5 56.5T240-480Zm320 0q-33 0-56.5-23.5T480-560q0-33 23.5-56.5T560-640q33 0 56.5 23.5T640-560q0 33-23.5 56.5T560-480ZM400-640q-33 0-56.5-23.5T320-720q0-33 23.5-56.5T400-800q33 0 56.5 23.5T480-720q0 33-23.5 56.5T400-640Zm320 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640Z"/></svg></i>
                            </div>
                            <div class="infobox-data">
                        	    <span class="infobox-data-number">0<?php //$inventario->totalDeItens($utilizador);  ?></span>
                                <div class="infobox-content">Média de cliques</div>
                            </div>
                            <div class="badge infobox-pink" style="background:#D53F40;height: 35%;"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                        </div>
                        			
                        <div class="infobox infobox-orange2 <?php if(!is_mobile()){ print "caixas";} ?>">
                            <div class="infobox-icon"> <i class="ace-icon fa fa-eye"></i> </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number"><?php $amigo->totalVisitasUsuario($u_fnal);  ?></span>
                                <div class="infobox-content">Visitas no Perfil</div>
                            </div>
                            <!--<div class="badge badge-success"> 0% <i class="ace-icon fa fa-arrow-up"></i> </div>-->
                            <div class="badge infobox-pink" style="background:#F79263;height: 35%;"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M9.002 2.5a.75.75 0 01.691.464l6.302 15.305 2.56-6.301a.75.75 0 01.695-.468h4a.75.75 0 010 1.5h-3.495l-3.06 7.532a.75.75 0 01-1.389.004L8.997 5.21l-3.054 7.329A.75.75 0 015.25 13H.75a.75.75 0 010-1.5h4l3.558-8.538a.75.75 0 01.694-.462z"></path></svg> </div>
                        </div>
                        <div class="space-6"></div>
                    </div>
                    <div class="vspace-12-sm"></div>
                </div>
                                
                <div class="hr  hr-dotted"></div>
                <h4 class="widget-title lighter"> <i class="ace-icon fa fa-star orange"></i> Detalhes </h4>
                <div class="hr  hr-dotted"></div>
                
                <div class="form-row" style="margin-bottom:30px;"> <?php $PublicidadesDAO->DetalhesDoPublicitarioServico($u_fnal); ?> </div>
                
                <!--<div class="vspace-12-sm"></div>-->
                
                <div class="form-row">
                    <div class="widget-box transparent">
                        <div class="hr  hr-dotted" style="margin-bottom:0px;"></div>
                        <div class="widget-header widget-header-flat">
                            <div style="margin-bottom:0px !important;"></div>
                            <h4 class="widget-title lighter"> <i class="ace-icon fa fa-star orange"></i> Benefícios </h4> 
                            <div class="widget-toolbar"> <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a> </div>
                        </div>
                        
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <table class="table table-bordered table-striped">
                                    <thead class="thin-border-bottom">
                                        <tr>
                                            <th style='width:35px !important;'> <i class="ace-icon fa fa-caret-right blue"></i># </th> 
                                            <th> <i class="ace-icon fa fa-caret-right blue"></i>Serviço </th>
                                            <th <?php if(is_mobile()){ print "style='width:55px !important;'"; } ?> > <i class="ace-icon fa fa-caret-right blue"></i><?php if(is_mobile()) { print "Desc"; }else{  print "Descrição";  } ?> </th>
                                        </tr> 
                                    </thead>
                                    <tbody> <?php $PublicidadesDAO->BeneficiosPublicidade($PublicidadesDAO->ChaveServicoPublicitario($u_fnal)); ?> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php
    }else{
        ?>
            <h4 class="widget-title lighter"> 
                <i class="ace-icon fa fa-star orange"></i> Você ainda não possui um plano publicitário, clique aqui para <a href="https://lea.co.ao/sobre-nos/contactos.php">começar a divulgar.</a> 
            </h4>        
            <!--<div class="hr  hr-dotted"></div>-->
        <?php
    }
?>