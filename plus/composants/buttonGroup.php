    <?php 
    $bttt ='<div class="btn-group btn-space mr-2">';

    foreach ($btnGroupElts as $key => $value) {
        # code...
        $bttt .= 
        '
        <button '.$value['plus'].' class="btn btn-secondary '.$value['class'].' " type="button" title="'.$value['title'].'"><i class="icon mdi mdi-'.$value['icon'].'"></i></button>
        ';
    }
     $bttt .= '</div>';
     echo supprimerBr($bttt);
    ?>