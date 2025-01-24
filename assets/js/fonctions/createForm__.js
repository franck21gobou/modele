const createForm = (title, type, link, id /** form id */, inputs = [] /** formulaire */, appliquer = false /** bouton appliquer? */,valider = "Valider" /** Texte du bouton valider */, reqLog=true, actionValider = "console.log", actionAppliquer = "", payload=null ) => {

    if(actionAppliquer == "") actionAppliquer = actionValider
    
    $(`#form-${id}-title`).html(title)
    let contenu = `<form id="${id}" class="row">`
    inputs.map(input=>{
        let req = {
            style: `<span class="reqField">*</span>`,
            text: `required="required"`
        },
        checked = ` checked="checked" `

        !input.required && (req = {style: "", text: ""})
        !input.checked && (checked = "")

        /////////// ajout champ masqé
        input.type == "hidden" ?
        (contenu = `${contenu}
            <input class="form-control" id="${input.id}" type="hidden"  ${req.text} value="${input.value}">
            `)
        
        /////////// ajout de nombre
        : input.type == "number" ?
        (contenu = `${contenu}
        <div class="form-floating mb-3 col-${input.longueur || '12'}">
            <input class="form-control"  ${req.text} id="${input.id}" type="number" placeholder="${input.text}" min="${input.min}" step="${input.step}" max="${input.max}" value="${input.value}">
            <label  for="${input.id}">${input.text} ${req.style}</label>
        </div>
        
        `)

        /////////// ajout de switch
        : input.type == "switch" ?
        (contenu = `${contenu}
        <div class="form-group row  col-${input.longueur || '12'}">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="${input.id}"   ${input.value == 1 && 'checked'}>
                <label class="form-check-label" for="${input.id}">${input.text}</label>
            </div>
        </div>
        `)

        
        /////////// ajout de select2
       : input.type == "select2" ?
        (contenu = `${contenu}
        <div class="form-floatin mb-3 form-group row col-${input.longueur || '12'}">
        <label class="text-left text-sm-right">${input.text} ${req.style}</label>
        <div class="col-11">
        <select name="${input.id}" class="select2 benef2" id="${input.id}"
        >
        <option value=""></option>
        </select>
            </div>
            <div class="col-1">
                 
                    <div class="icon" style="cursor:pointer; margin-top:12px" onclick="refreshMe('${input.id}', '${input.group}', '${input.defaut}', false, '${input.fdt}')">
                    <i class="fas fa-redo"></i> 
                    </div>
                    <span class="icon-class"></span>
            </div>
        </div>`)
        
        /////////// ajout de date
       : input.type == "date" ?
        (contenu = `${contenu}
        <div class="form-floating mb-3 col-${input.longueur || '12'}">
            <input  class="form-control"  ${req.text} id="${input.id}" type="date" value="${input.value}">
            <label  for="${input.id}">${input.text} ${req.style}</label>
        </div>
        
        `)

        
        /////////// ajout de textarea
       : input.type == "textarea" ?
        (contenu = `${contenu}
        <div class="form-floating mb-3 col-${input.longueur || '12'}">
            <textarea ${req.text} class="form-control" id="${input.id}"  placeholder="Leave a comment here" style="height: 100px">${input.value}</textarea>
            <label for="${input.id}">${input.text} ${req.style}</label>
        </div>
       `)


        /////////// ajout de texte
       : contenu = `${contenu}
       <div class="form-floating mb-3 col-${input.longueur || '12'}">
            <input type="text" class="form-control" id="${input.id}"  placeholder="${input.text}" ${req.text} value="${input.value}">
            <label for="${input.id}"> ${input.text} ${req.style}</label>
        </div>
        `

    })

    //// bouton valider
     contenu = `${contenu}
     <div class=" text-center">
        <p>
            <input type="submit" class="btn btn-space btn-primary" value="${valider}" />
      `

    //// bouton appliquer
    appliquer && 
     (contenu = `${contenu}
     <input type="submit" class="btn btn-space btn-secondary" value="Appliquer" /> 
       `)
     
     
      contenu = `${contenu}</p></div></form>`

      $(`#form-${id}-body`).html(contenu)

      inputs.map(input =>{
        if(input.type == "select2"){
         refreshMe(input.id, input.group, input.defaut, true, input.fdt)
        }

        if(input.type == "textplus"){
            onchangeTextPlus(input.id, input.hidden)
        }
      })



      $(`#${id}`).on("submit", function(e) {
          e.preventDefault();
          fo = inputs.map(input =>{
                if(input.type == "checkbox")
                return {key: input.id, value: $(`#${input.id}`).prop("checked") }
                else
                return {key: input.id, value: $(`#${input.id}`).val() }
          })

          asyncPost(`./api/${link}/${type}`, fo, `${id}`, true, reqLog) 
          .then(reponse =>{
              if(reponse.result){
                  reloadTable()
                  notifyMy(reponse.infos, "green")
                  var submitButton = $(document.activeElement);
                  var buttonValue = submitButton.val();
                  
                if(buttonValue === 'Valider'){ //// bouton valider
                 //   $("#mod-success").modal('hide');
                 eval(actionValider)(payload || reponse)
                }else{
                    inputs.map(input => {
                        if(!input.noreset){
                            if(input.type == "select2")
                            new Choices(`#${input.id}`, {
                                classNames:{
                                    containerOuter: "form-control"
                                }
                            }).removeItemsByValue($(`#${input.id}`).val())
                            else
                            $(`#${input.id}`).val(null)
                        }
                    })
                    eval(actionAppliquer)(payload || reponse)
                }

            }
          })

          
      })

 
}