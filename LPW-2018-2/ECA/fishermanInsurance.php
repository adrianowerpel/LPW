<?php

require_once "classes/template.php";

require_once "dao/fishermanInsuranceDAO.php";
require_once "classes/fishermanInsurance.php";


$object = new fishermanInsuranceDAO();



$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $str_month = (isset($_POST["str_month"]) && $_POST["str_month"] != null) ? $_POST["str_month"] : "";
    $str_year = (isset($_POST["str_year"]) && $_POST["str_year"] != null) ? $_POST["str_year"] : "";
    $dbl_value = (isset($_POST["dbl_value"]) && $_POST["dbl_value"] != null) ? $_POST["dbl_value"] : "";
    $tb_beneficiaries_id_beneficiaries = (isset($_POST["tb_beneficiaries_id_beneficiaries"]) && $_POST["tb_beneficiaries_id_beneficiaries"] != null) ? $_POST["tb_beneficiaries_id_beneficiaries"] : "";
    $tb_city_id_city = (isset($_POST["tb_city_id_city"]) && $_POST["tb_city_id_city"] != null) ? $_POST["tb_city_id_city"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $str_month = NULL;
    $str_year = NULL;
    $dbl_value = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $fishermanInsurance = new fishermanInsurance($id,'','','','','');

    $resultado = $object->atualizar($fishermanInsurance);
    $str_month = $resultado->getStrMonth();
    $str_year = $resultado->getStrYear();
    $dbl_value = $resultado->getDblValue();
    $tb_beneficiaries_id_beneficiaries = $resultado->getTbBeneficiariesIdBeneficiaries();
    $tb_city_id_city = $resultado->getTbCityIdCity();

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $str_month != "" && $str_year!= "" &&
    $dbl_value!= "" && $tb_beneficiaries_id_beneficiaries!= "" && $tb_city_id_city!= "")
{
    $beneficiaries = new beneficiaries($id, $str_month, $str_year, $dbl_value, $tb_beneficiaries_id_beneficiaries,$tb_city_id_city);
    $msg = $object->salvar($beneficiaries);
    $id = null;
    $str_month = NULL;
    $str_year = NULL;
    $dbl_value = NULL;
    $tb_beneficiaries_id_beneficiaries = NULL;
    $tb_city_id_city = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $fishermanInsurance = new fishermanInsurance($id,'','','','','');
    $msg = $object->remover($fishermanInsurance);
    $id = null;
}

?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Fisherman Insurance</h4>
                        <p class='category'>List of Fisherman Insurance of the system</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&id=" method="POST" name="form1">

                            <input type="hidden" name="id" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            Month:
                            <input class="form-control" type="number" maxlength="2" name="str_month" placeholder="MM" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_month) && ($str_month != null || $str_month != "")) ? $str_month : '';
                            ?>"/>
                            <br/>
                            Year:
                            <input class="form-control" type="number" maxlength="4" name="str_year" placeholder="YYYY" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($str_year) && ($str_year != null || $str_year != "")) ? $str_year : '';
                            ?>"/>
                            <br/>
                            Value:
                            <input class="form-control" type="text" name="dbl_value" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($dbl_value) && ($dbl_value != null || $dbl_value != "")) ? $dbl_value : '';
                            ?>"/>
                            <br/>
                            <!--                            RGP:-->
                            <!--                            <input class="form-control" type="text" maxlength="11" name="int_rgp" placeholder="Enter numbers only" value="--><?php
                            //                            // Preenche o sigla no campo sigla com um valor "value"
                            //                            echo (isset($int_rgp) && ($int_rgp != null || $int_rgp != "")) ? $int_rgp : '';
                            //                            ?><!--"/>-->
                            <br/>
                            <input class="btn btn-success" type="submit" value="REGISTER">
                            <hr>
                        </form>


                        <?php
                        echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';
                        //chamada a paginação
                        $object->tabelapaginada();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$template->footer();
?>
