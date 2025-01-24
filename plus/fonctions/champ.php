<?php
function champ($id, $titre, $type = "text", $req = false, $longueur = 6, $famille = "", $complements = [])
{


    $complement = champ_ajoutComplements($complements);

    if ($req) {
        $css = '<span style="color:chocolate">*</span>';
        $rr = ' required="required"';
        $sel = '<div id="yx_' . $id . '" class=" text-danger"  role="status"><span class="visually-hidden">...</span></div>';
    } else {
        $css = '';
        $rr = '';
        $sel = '';
    }

    if ($type == "select") {
        echo '<div class="col-lg-' . $longueur . '">
        <div class="form-group mb-15">
        <label for="x_' . $id . '" class="form-label">' . $titre . $css . '</label>
        ' . $sel . '
        <select class="form-control"  id="x_' . $id . '" name="' . $id . '" ' . $complement . ' >
        </select>
        </div>
        </div>
        ';
    } else

        if ($type == "switch") {
            echo '<div class="col-lg-' . $longueur . '">
                <div class="form-group mb-15" style="flex:1; border: solid red 2px;">
                <label for="x_' . $id . '" class="form-label" style="border: solid red 2px;">' . $titre . $css . '</label>
                <input class="form-contrl" id="x_' . $id . '" type="checkbox" name="' . $id . '" placeholder="' . ($titre) . '" ' . $rr . ' ' . $complement . '
                 style="border: solid red 2px;">
                </div>
        </div>
        ';
        } else {
            if ($type == "hidden") {
                echo '<input type="hidden" id="x_' . $id . '"' . $complement . '/>';
            } else {
                echo '<div class="col-lg-' . $longueur . '">
                <div class="form-group mb-15">
                <label for="x_' . $id . '" class="form-label">' . $titre . $css . '</label>
                <input class="form-control" id="x_' . $id . '" type="' . $type . '" name="' . $id . '" placeholder="' . ($titre) . '" ' . $rr . ' ' . $complement . '
                >
                </div>
        </div>';
            }

        }

    if ($req)
        $req = "true";
    else
        $req = "false";

    return ["id" => $id, "titre" => $titre, "type" => $type, "req" => $req, "longueur" => $longueur, "famille" => $famille, "complements" => $complements];
}