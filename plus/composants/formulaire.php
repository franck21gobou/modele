<?php 
foreach ($elementsInput as $key => $item) {
    $req = "";$dis = "";
    if(isset($item['reste'])) $reste = $item['reste']; else $reste = "";
    if($item['required']=="true") {$required = ' <span class="requiredField">*</span>'; $req=' required="required" ';}else $required ='';
    if($item['disabled']=="true") {$disabled = ' disabled '; $dis=' disabled="disabled" ';} else $disabled ='';


    if($item['type']=="select"){ 
        # select

        echo 
        '
        <!-- champ -->
        <div class="col-lg-'.$item['size'] .'">
            <div class="mb-1 "><label class="form-label" for="'.$item['id'] .'" title="'.$item['libelle'] .'" >'.$item['texte'] .' '.$required .'  </label>
                <select '.$disabled.$req.'  class="form-select  " id="'.$item['id'] .'" size="1" name="'.$item['id'] .'" data-options=\'{"removeItemButton":true,"placeholder":true}\'>
                <option value="">'.$item['libelle'] .'...</option>
                </select>
            </div>
        </div>
        ';
        
    }elseif($item['type']=="number"){ 
        # number

        echo 
        '
        <!-- champ -->
        <div class="col-lg-'.$item['size'] .'">
            <div class="mb-1 "><label class="form-label" for="'.$item['id'] .'" title="'.$item['libelle'] .'" >'.$item['libelle'] .' '.$required .'   </label><input '.$disabled.$req.' class="form-control"  value="'.$item['default'] .'" id="'.$item['id'] .'" type="number" step="'.$item['step'] .'" placeholder="'.$item['libelle'] .' " style="text-align: right;" /></div>
        </div>
        ';
    }elseif($item['type']=="date"){ 
        # date 
        echo 
        '
        <!-- champ -->
        <div class="col-lg-'.$item['size'] .'">
          <div class="mb-1 "><label class="form-label" for="'.$item['id'] .'" title="'.$item['libelle'] .' " >'.$item['texte'] .' '.$required .'   </label><input '.$disabled.$req.' value="'.$item['default'] .'"  class="form-control madate" id="'.$item['id'] .'" type="text" placeholder="'.$item['libelle'] .'" data-options=\'{"disableMobile":true}\' /></div>
        </div>
        ';
    }else{
        #texte
        echo
        '
        
        <!-- champ -->
        <div class="col-lg-'.$item['size'] .'">
          <div class="mb-1 "><label class="form-label" for="'.$item['id'] .'" title="'.$item['libelle'] .'" >'.$item['texte'] .' '.$required .'  </label><input '.$disabled.$req.' value="'.$item['default'] .'" class="form-control" id="'.$item['id'] .'" type="text" placeholder="'.$item['libelle'] .'" /></div>
        </div>
         
    ';
    } 
}