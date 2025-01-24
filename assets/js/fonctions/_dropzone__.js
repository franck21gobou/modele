const modalUploadTemplate = ( e, titre, url, inputId = "demo-upload") => {
    var startedFiles = []
    $("#modal-body").html(`<div id="dropzone">
                            <form class="dropzone needsclick" id="${inputId}" action="./api/${url}">
                                <div class="dz-message needsclick">    
                                   Télécharger des documents<br>
                                    <span class="note needsclick"> 
                                    Clic ou glisser-deposer <i class="mdi mdi-attachment"></i>
                                    </span>
                                </div>
                            </form>
                        </div>`);
    $("#modal-title").html(titre);
    var formDataget = [{key: "detail", value: e}]
    asyncPost(`./api/${url}/get`, formDataget).then(rep => {

        startedFiles = rep.data
        if(rep.result){ 
        $("#mod-success").modal('show');
        //* })

        var dropzone = new Dropzone(`#${inputId}`, {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 2,
            thumbnailHeight: 120,
            thumbnailWidth: 120,
            addRemoveLinks: true,
            // maxFiles: 1,
            removedfile: function(file) {
                var name = file.name;
                var formDataRemove = [{key: "detail", value: e},{key: "fichier", value: name}];
                if(confirm("Supprimer?"))
                asyncPost(`./api/${url}/remove`, formDataRemove).then(rep => {
                    if (rep.result) {
                        notifyMy(rep.infos, "green")
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref
                            .parentNode
                            .removeChild(file
                                .previewElement) : void 0;
                    } else {
                        console.log(rep)
                    }
                })

            },
            maxFilesize: 10,
            filesizeBase: 1000,
            url: `./api/${url}/`,
            autoProcessQueue: true,
            thumbnail: function(file, dataUrl) {
                
                if (file.previewElement) {
                    
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll(
                        "[data-dz-thumbnail]");
                    var liens = file.previewElement.querySelectorAll(
                        "[data-dz-link]");
                    for (var i = 0; i < images.length; i++) {
                       $(liens[i]).attr("href", dataUrl)
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                        
                     }
                    setTimeout(function() {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }

                
            }

        });
        // dropzone.displayExistingFile(mockFile, './assets/img/t her.jpg');
        // Now  file upload, 

        startedFiles.map(fic => {
            dropzone.options.addedfile.call(dropzone, fic);
            dropzone.options.thumbnail.call(dropzone, fic,
                fic.file);
        })

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;

        dropzone.uploadFiles = function(files) {
            var self = this;

            for (var i = 0; i < files.length; i++) {

                var file = files[i];

                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size /
                    bytesPerStep)));

                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function(file, totalSteps, step) {
                        return function() {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };

                            self.emit('uploadprogress', file, file.upload.progress,
                                file
                                .upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                                //document.getElementsByClassName("dz-success-mark").style.opacity = "1";

                                var formDatas =[{key: "detail", value: e},{key: "fichier", value: file}];

                                axx(`./api/${url}/files`, formDatas)

                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }

        }
        }
    }) //** */
    //dropzone.destroy()
}