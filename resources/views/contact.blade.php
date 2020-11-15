@Include('layouts/header')
<body>
    <div class="container">    
       <br />
       <h3 style="text-align: left; color:#BAB5B4;">Liste des contacts</h3>
       <th>
          <hr color="#BAB5B4">
       <div style="text-align: left">
        <button type="button" name="create_record" id="create_record" class="btn  btn-sm"><i class="material-icons" >add</i>| Ajouter un contact</button>
       </div>
       <br />
     <div class="table-responsive">
         <!-- datatable -->
      <table id="user_table" class="table table-bordered table-striped">
       <thead >
        
                    <tr>
                        <th> Civilité</th>
                        <th> Prénom</th>
                        <th> Nom</th>
                        <th> Téléphone</th>
                        <th> E-mail</th>
                        <th> Société</th>
                        <th> Ville</th>
                        <th style="text-align: right"> <span class="material-icons">
                            view_headline
                            </span></th>
                    </tr>
                    </thead>
                </table>
               </div>
               
              </div>
             </body>
            </html>

            <!--    Modal  d'ajout et d'editer un contact-->
    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog " style="width: 1041px;">
        <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Add New Record</h4>
                   </div>
                   <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">
                     @csrf
                     <div Class="col-md-6 addblock" >
                        <div class="form-group col-md-12">
                            <label class=" col-md-12 labeltext" for="civilite" >Civilité </label>
                            <div class="col-md-8">
                                <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="civilite" value="madamme" checked> <span class="iconify" data-icon="mdi-human-female-female" data-inline="false"></span>&nbsp; Madamme &nbsp;
                                </label>
                                <label class="btn btn-info" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="civilite" value="monsieur"> Monsieur
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label class=" col-md-12 labeltext" for="prenom">Prénom  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="prenom" id="prenom" class="form-control"  required/>
                            </div>
                        </div>
                        <div class="form-group  col-md-6 ">
                            <label class=" col-md-12 labeltext" for="nom">Nom  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="nom" id="nom" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="fonction">Fonction  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="fonction" id="fonction" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="service">Service  </label>
                            <br>
                            <div class="col-md-12">
                                <input type="text" name="service" id="service" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class=" col-md-12 labeltext" for="email">E-mail  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="telephone">Téléphone  </label>
                            <br>
                            <div class="col-md-12 ">
                                <input type="text" name="telephone" id="telephone" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="date_naissonce">Date de Naissonce  </label>
                            <div class="col-md-12">
                                <input  name="date_naissonce" id="date_naissonce" class="form-control" autocomplete="off"/>
                            </div>
                        </div>
                   </div>
       
                   <div  Class="col-md-6 addblock" >
                       <h3 >Sociéte</h3>
                       <br>
                            <div class="form-group col-md-12">
                                <label class=" col-md-12 labeltext" for="nom_societe">Nom: </label>
                                <div class="col-md-12">
                                    <input type="text" name="nom_societe" id="nom_societe" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class=" col-md-12 labeltext" for="address">Adress: </label>
                                <div class="col-md-12">
                                    <textarea type="texteara" name="address" id="address" class="form-control" rols="30"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" col-md-12 labeltext" for="code_postal">Code Postale: </label>
                                <div class="col-md-12">
                                    <input type="text" name="code_postal" id="code_postal" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" col-md-12 labeltext" for="ville">Ville: </label>
                                <div class="col-md-12">
                                    <input type="text" name="ville" id="ville" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" col-md-12 labeltext" for="tele_societe">Telephone: </label>
                                <div class="col-md-12">
                                    <input type="text" name="tele_societe" id="tele_societe" class="form-control" />
                                </div>
                            </div>
                           <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext labeltext" for="site_web">Site Web: </label>
                            <div class="col-md-12">
                               <input type="text" name="site_web" id="site_web" class="form-control" />
                           </div>
                           </div>
                    </div>
                

                 <br />
                 <div class="form-group" >
                     
                  <input type="hidden" name="action" id="action" value="Add" />
                  <input type="hidden" name="hidden_id" id="hidden_id" />
                  <input type="submit" name="action_button" id="action_button" class="btn btn-success" value="Add" />
                  <button type="button" class="btn btshow"  id="console_button"  data-dismiss="modal"><span class="material-icons">
                    view_module
                    </span>| Retour a la liste des contacts </button>
                 </div>
            </form>
         </div>
        </div>
        </div>
    </div>
<!--    Modal  d'affichage les information d'un contact-->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog " style="width: 1041px;">
        <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Détail Contact</h4>
                   </div>
                   <div class="modal-body">
                    <span id="form_show"></span>
                    
                     @csrf
                     <div Class="col-md-6 addblock" >
                        <div class="form-group col-md-12">
                            <label class=" col-md-12 labeltext" for="scivilite" >Civilité </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="scivilite" id="scivilite" class="form-control"  required/>
                            </div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label class=" col-md-12 labeltext" for="sprenom">Prénom  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="sprenom" id="sprenom" class="form-control"  required/>
                            </div>
                        </div>
                        <div class="form-group  col-md-6 ">
                            <label class=" col-md-12 labeltext" for="snom">Nom  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="snom" id="snom" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="sfonction">Fonction  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="text" name="sfonction" id="sfonction" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="sservice">Service  </label>
                            <br>
                            <div class="col-md-12">
                                <input type="text" name="sservice" id="sservice" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class=" col-md-12 labeltext" for="semail">E-mail  </label>
                            <br>
                            <div class="col-md-12">
                            <input type="email" name="semail" id="semail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="stelephone">Téléphone  </label>
                            <br>
                            <div class="col-md-12 ">
                                <input type="text" name="stelephone" id="stelephone" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext" for="sdate_naissonce">Date de Naissonce  </label>
                            <div class="col-md-12">
                                <input  name="sdate_naissonce" id="sdate_naissonce" class="form-control"  autocomplete= "off" />
                            </div>
                        </div>
                   </div>
       
                   <div  Class="col-md-6 addblock" >
                       <h3 >Sociéte</h3>
                       <br>
                            <div class="form-group col-md-12">
                                <label class=" col-md-12 labeltext" for="snom_societe">Nom: </label>
                                <div class="col-md-12">
                                    <input type="text" name="snom_societe" id="snom_societe" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class=" col-md-12 labeltext" for="saddress">Adress: </label>
                                <div class="col-md-12">
                                    <textarea type="texteara" name="saddress" id="saddress" class="form-control" rols="30" ></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" col-md-12 labeltext" for="scode_postal">Code Postale: </label>
                                <div class="col-md-12">
                                    <input type="text" name="scode_postal" id="scode_postal" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" col-md-12 labeltext" for="sville">Ville: </label>
                                <div class="col-md-12">
                                    <input type="text" name="sville" id="sville" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" col-md-12 labeltext" for="stele_societe">Telephone: </label>
                                <div class="col-md-12">
                                    <input type="text" name="stele_societe" id="stele_societe" class="form-control" />
                                </div>
                            </div>
                           <div class="form-group col-md-6">
                            <label class=" col-md-12 labeltext labeltext" for="ssite_web">Site Web: </label>
                            <div class="col-md-12">
                               <input type="text" name="ssite_web" id="ssite_web" class="form-control" />
                           </div>
                           </div>
                    </div>
                

                 <br />
                 <div class="form-group" >
                    <button type="button" class="btn btshow"  id="console_button"  data-dismiss="modal"><span class="material-icons">
                        view_module
                        </span>| Retour a la liste des contacts </button>
                </div>
         
         </div>
        </div>
        </div>
    </div>

<!--    Modal de supprimer un contact-->
 
 <div id="confirmModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content" style="height: 222px;">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h2 class="modal-title">Confirmation</h2>
             </div>
             <div class="modal-body">
                 <h4  style="margin:0;">Are you sure you want to remove this Contact</h4>
             </div>
             <div class="modal-footer">
              <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>
 
 @Include('layouts/footer')
 

