
<script>
   var defaultValues = $.localStorage('_defaultCheqI') || {}
   
    $('#debutDate').val(moment().subtract(defaultValues.periode || 30, 'days').format('YYYY-MM-DD'))
    $('#finDate').val(moment().format('YYYY-MM-DD'))
    var tabulator = new Tabulator("#tb1", {
        columnDefaults:{
            tooltip:true,         //show tool tips on cells
        },
        pagination:"local",       //paginate the data
        paginationSize: 15,         //allow 15 rows per page of data
        paginationCounter:"rows", //display count of paginated rows in footer
        paginationSizeSelector:[10, 20, 30, 50],
        dataTree:true,
        dataTreeStartExpanded:true,
        movableColumns:true,
        layout:"fitColumns",
        rowFormatter:function(row){
            if(row.getData().sens == "E") row.getElement().style.backgroundColor = "rgb(165,251,184,0.2)"
            if(row.getData().sens == "D") row.getElement().style.backgroundColor = "rgba(254,147,147,0.2)"
        },
        printHeader:`<?= $moi_meme['nom'] ?> || <?= $moi_meme['titre'] ?>`,
        columns:[],
        data:[], //assign data to table
        //height: 500,
    });

    asyncPost('<?= $lesFiltres['url-Filtres'] ?>',)
    .then(r =>{
        const formatterAction = (cell, param) => {
            let act = ""
         r.data.action.map(action=>{
            act = `${act} 
            <button onclick="${action.onclick}('${r.data.page}' , '${cell.getValue()}')" class="btn btn-${action.class} btn-sm" type="button" title="${action.title}">
                <i class="icon fa fa-${action.icon}"></i>
            </button>`
         })

         return act
    }

        var btn = r.data.boutons,
            entetes = r.data.entetes,
            columns = [{formatter:"rowSelection", titleFormatter:"rowSelection", titleFormatterParams: { rowRange:"active"}, hozAlign:"center", headerSort:false, width: 75, frozen: true, print : false, download:false}], 
            initialSort = []

        btn.map(bouton =>{
            let show = ""
            bouton.hide && (show = " disabled = 'disabled' ")
            bouton.dropdown ?  
            ($('#addBtn').append(`
            <button id="${bouton.id}" ${show} class="btn btn-${bouton.class} dropdown-toggle" type="button" data-bs-toggle="dropdown">${bouton.text} ◾ <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                      <div class="dropdown-menu" role="menu">
                      ${bouton.dropdown.map(dr => (`
                        <a class="dropdown-item" href="${dr.action}">${dr.text}</a>`))}
                      </div>
                      
                      
                      `))
            
            :($('#addBtn').append(`
            <button id="${bouton.id}" ${show} class="btn btn-space btn-${bouton.class}" onclick="${bouton.action}('${bouton.var}')">
                ${bouton.text} ◾
            </button>`))

        })

        
        entetes.map(entete => {
             if(entete.formatter == "formatInt") {
                align = "right", search = minMaxFilterEditor, filter = minMaxFilterFunction, accessor = false
             }  else {
                if(entete.formatter == "formatDate") {
                    align = "left", search = minMaxFilterEditorDate, filter = minMaxFilterFunctionDate, accessor = dateAccessor
                } else {
                    align = "left", search = "input", filter  = false, accessor = false
                }
             }
             if(entete.width) width = entete.width; else width = null; 
             if(entete.editor) editor = entete.editor; else editor = null; 
             
              

            columns.push({title:entete.title, field:entete.field, formatter: eval(entete.formatter), headerFilter: search, headerFilterFunc: filter, hozAlign: align, topCalc: eval(entete.calc), accessorDownload: accessor, width: width,editor: editor
            })

            filterGroup.push(entete)
        })

        columns.push( {title:"Actions", field:r.data.id, hozAlign: "right", formatter: formatterAction, tooltip: false , print : false, headerSort:false, download:false },)

        tabulator.setColumns(columns)
        entetes.length > 0 && tabulator.setSort([{column: r.data.initialSort.column, dir: r.data.initialSort.dir}]);

        reloadTable()
      
        tabulator.on("rowDblClick", function(e, row){
            if(r.data.action.length){
                eval(r.data.action[0].onclick)(r.data.page, row.getData()[r.data.id])
            }
        });

        
    })



    $('#barrePeriode').submit((e)=>{
        e.preventDefault()
        reloadTable()
    })
    
</script>