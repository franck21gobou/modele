const createModalCorresp = (title, type, link, id /** form id */, inputs = [] /** formulaire */, appliquer = false /** bouton appliquer? */ ) => {

    $("#titreModal").html(title)
    let contenu = `<form id="${id}">`
    inputs.map(input=>{
        let req = {
            style: `<span class="reqField">*</span>`,
            text: `required="required"`
        }

        !input.required && (req = {style: "", text: ""})

        /////////// ajout champ masqé
        input.type == "hidden" ?
        (contenu = `${contenu}
            <input class="form-control" id="${input.id}" type="hidden"  ${req.text} value="${input.value}">
            `)
        
        /////////// ajout de nombre
        : input.type == "number" ?
        (contenu = `${contenu}
        <div class="form-floating mb-3">
            <input class="form-control"  ${req.text} id="${input.id}" type="number" placeholder="${input.text}" min="${input.min}" step="${input.step}" max="${input.max}" value="${input.value}">
            <label  for="${input.id}">${input.text} ${req.style}</label>
        </div>
        
        `)

        /////////// ajout de switch
        : input.type == "switch" ?
        (contenu = `${contenu}
        <div class="form-group row">
            <div class="col-12 text-center" style="margin-left:40px">
            
                <div class="col-6 text-center">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span>${input.text}</span>
                        <label class="switcher-control switcher-control-lg" style="cursor:pointer"><input type="checkbox" class="switcher-input" checked> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label>
                    </div>
                </div>
            </div>
            
        </div>`)

        
        /////////// ajout de select2
       : input.type == "select2" ?
        (contenu = `${contenu}
        <div class="form-group row">
            <label
                class="col-12 col-sm-3 col-form-label text-left text-sm-right">${input.text}
                ${req.style}</label>
            <div class="col-11 col-sm-8 col-lg-6">
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
        <div class="form-floating mb-3">
            <input  class="form-control"  ${req.text} id="${input.id}" type="date" value="${input.value}">
            <label  for="${input.id}">${input.text} ${req.style}</label>
        </div>
        
        `)

        
        /////////// ajout de textarea
       : input.type == "textarea" ?
        (contenu = `${contenu}
        <div class="form-floating mb-3">
            <textarea ${req.text} class="form-control" id="${input.id}"  placeholder="Leave a comment here" style="height: 100px">${input.value}</textarea>
            <label for="${input.id}">${input.text} ${req.style}</label>
        </div>
       `)


        /////////// ajout de texte
       : contenu = `${contenu}
       <div class="form-floating mb-3">
            <input type="text" class="form-control" id="${input.id}"  placeholder="${input.text}" ${req.text} value="${input.value}">
            <label for="${input.id}"> ${input.text} ${req.style}</label>
        </div>
        `

    })

    //// bouton valider
     contenu = `${contenu}
     <div class=" text-center">
        <p>
            <input type="submit" class="btn btn-space btn-primary" value="Valider" />
      `

    //// bouton appliquer
    appliquer && 
     (contenu = `${contenu}
     <input type="submit" class="btn btn-space btn-secondary" value="Appliquer" /> 
       `)
     
     
      contenu = `${contenu}</p></div></form>`

      $("#contenuModal").html(contenu)
      $("#authentication-modal").modal('show');

      inputs.map(input =>{
        if(input.type == "select2"){
         refreshMe(input.id, input.group, input.defaut, input.fdt)
        }
      })



      $(`#${id}`).on("submit", function(e) {

        e.preventDefault();
          fo = inputs.map(input =>{
            return {key: input.id, value: $(`#${input.id}`).val() }
          })

          asyncPost(`./api/${link}/${type}`, fo, `${id}`, true)
          .then(reponse =>{
            if(reponse.result){
                affiche()
                notifyMy(reponse.infos, "green")
                var submitButton = $(document.activeElement);
                var buttonValue = submitButton.val();

                if(buttonValue === 'Valider'){ //// bouton valider
                    $("#authentication-modal").modal('hide');
                }else{
                    inputs.map(input => {
                        if(!input.noreset){
                            if(input.type == "select2")
                            new Choices(`#${input.id}`, {}).removeItemsByValue($(`#${input.id}`).val())
                            else
                            $(`#${input.id}`).val(null)
                        }
                    })
                }

            }
          })

          
      })

 
}