<!DOCTYPE html>
<html lang="fr">


<?php 
include $P_header;
include $P_script;
?>
<script>
  verifConnected(true);
  globalFiltreData = './api/exercice/lire'
</script>
    <body class="">
<?php 
include $P_leftSide;
?>        
     <style>
        .text-right {
            text-align: right;
        }
     </style>   

        <div class="page-wrapper">
<?php 
  include $P_tete;
?>   

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">GESTION DES EXERCICES BUDGETAIRES</h4>
                                         
                                    </div><!--end col k
                                    <div class="col-auto align-self-center">
                                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                            <span class="day-name" id="Day_Name">Aujourd'hui:</span>&nbsp;
                                            <span class="" id="Select_date">Jan 11</span>
                                            <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i data-feather="download" class="align-self-center icon-xs"></i>
                                        </a>
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->

                    <div class="row">
                    <div id="astuces-div"></div>
                        <div class="col-12">
                            <?php include $P_barreButtonNoDate; ?> 
                        </div>
                        <!-- Card body START -->
				<div class="card-body pb-0">
					<!-- Table START -->
					<div class="table-responsive border-0">
					<div>
						<div id="tb1"></div>
					</div>
						
					</div>
					<!-- Table END -->
				</div>
                    </div>
                     


                </div><!-- container -->

                <?php include $P_pied; ?>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        

        <?php 
    $lesFiltres['url-Filtres'] = './api/exercice/filters';
    include $P_c_tableFilters;
    ?>
      
 
        <script>
          initMenu()
          function formatStatut (cell, formatterParams, onRendered){
          if( cell.getValue() != null) return "<span >✅</span>"
          else return ""
          return ""
          }
          $(document).ready(()=>{
            generateurAstuces("Pour chaque exercice il est possible de clôturer des périodes spécifiques");
          })
        </script>
        

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script>
        const formulaire = [
        {id: "code", text: "Code", value: "" , type: "text", required: true},
        {id: "annee", text: "Année", value: moment().format('YYYY'), type: "number", min: moment().format('YYYY'), required: true},
        {id: "description", text: "Description", value: "EXERCICE " +  moment().format('YYYY'), type: "text", required: false},
        {id: "debut", text: "Debut", value: moment().format('YYYY-01-01'), type: "date", required: true},
        {id: "fin", text: "Fin", value: moment().format('YYYY-MM-DD'), type: "date", required: true},
    ]
    const formulaireEdit = [
        {id: "id", text: "_", value: "", type: "hidden", required: true},
        {id: "code", text: "Code", value: "", type: "text", required: true},
        {id: "annee", text: "Année", value: moment().format('YYYY'), type: "number", min: moment().format('YYYY'), required: true},
        {id: "description", text: "Description", value: "EXERCICE " +  moment().format('YYYY'), type: "text", required: false},
        {id: "debut", text: "Debut", value: moment().format('YYYY-01-01'), type: "date", required: true},
        {id: "fin", text: "Fin", value: moment().format('YYYY-MM-DD'), type: "date", required: true},
       
          ]
        const creerExercice = () => {
            createModal(`Ajouter un exercice`, "creer", "exercice", "pForm", formulaire)
        }
        
        const editExercice = (type, main) => {
            asyncPost("./api/"+type+"/solo", [{key: "main", value: main}])
            .then(reponse =>{
                if(reponse.result) {
                    let data = reponse.data;
                    ["id_exercice", "code_exercice", "annee_exercice", "description_exercice", "debut_exercice", "fin_exercice"].map((value, key)=>{
                        formulaireEdit[key].value = data[value] || ""
                    })
                    
                    createModal(`Modifier un exercice`, "edit", "exercice", "pForm", formulaireEdit)
                }
            })
        }

        const deleteExercice = (type, main) =>{
            deleteFunc(type, main)
        }
        
        const editPeriode = (type, main) => {
            window.location.href = "./param-periode/"+main
            
        }
        
        </script>
        
    </body>


</html>