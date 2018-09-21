<?php

require_once "classes/template.php";

require_once "dao/peclDAO.php";
require_once "classes/pecl.php";

$object = new peclDAO();

$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $str_month = (isset($_POST["str_month"]) && $_POST["str_month"] != null) ? $_POST["str_month"] : "";
    $str_year = (isset($_POST["str_year"]) && $_POST["str_year"] != null) ? $_POST["str_year"] : "";
    $str_situation = (isset($_POST["str_situation"]) && $_POST["str_situation"] != null) ? $_POST["str_situation"] : "";
    $dbl_value = (isset($_POST["dbl_value"]) && $_POST["dbl_value"] != null) ? $_POST["dbl_value"] : "";
    $tb_beneficiaries_id_beneficiaries = (isset($_POST["tb_beneficiaries_id_beneficiaries"]) && $_POST["tb_beneficiaries_id_beneficiaries"] != null) ? $_POST["tb_beneficiaries_id_beneficiaries"] : "";
    $tb_city_id_city = (isset($_POST["tb_city_id_city"]) && $_POST["tb_city_id_city"] != null) ? $_POST["tb_city_id_city"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $str_month = NULL;
    $str_year = NULL;
    $str_situation = NULL;
    $dbl_value = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $pecl = new pecl($id,'','','','','','');

    $resultado = $object->atualizar($pecl);
    $str_month = $resultado->getStrMonth();
    $str_year = $resultado->getStrYear();
    $str_situation = $resultado->getStrSituation();
    $dbl_value = $resultado->getDblValue();
    $tb_beneficiaries_id_beneficiaries = $resultado->getTbBeneficiariesIdBeneficiaries();
    $tb_city_id_city = $resultado->getTbCityIdCity();

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $str_month != "" && $str_year!= "" && $str_situation != "" && $dbl_value!= "" &&
                                                             $tb_beneficiaries_id_beneficiaries!= "" && $tb_city_id_city!= "")
{
    $pecl = new pecl($id, $str_month, $str_year, $str_situation, $dbl_value, $tb_beneficiaries_id_beneficiaries,$tb_city_id_city);
    $msg = $object->salvar($pecl);
    $id = null;
    $str_month = NULL;
    $str_year = NULL;
    $str_situation = NULL;
    $dbl_value = NULL;
    $tb_beneficiaries_id_beneficiaries = NULL;
    $tb_city_id_city = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $pecl = new pecl($id,'','','','','','');
    $msg = $object->remover($pecl);
    $id = null;
}

?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Program for the Erradication of Child Labor</h4>
                        <p class='category'>List of PECL of the system</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&id=" method="POST" name="form1">

                            <input type="hidden" name="id" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            Month:
                            <input class="form-control" type="number" maxlength="2" min="1" max="12" name="str_month" placeholder="MM" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_month) && ($str_month != null || $str_month != "")) ? $str_month : '';
                            ?>"/>
                            <br/>
                            Year:
                            <input class="form-control" type="number" maxlength="4" max="<?php echo date("Y")?>" name="str_year" placeholder="YYYY" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($str_year) && ($str_year != null || $str_year != "")) ? $str_year : '';
                            ?>"/>
                            <br/>
                            Situation:
                            <select class="form-control" name="str_situation">
                                <option value='Sacado' selected>Sacado</option>
                                <option value='Não Sacado'>Não Sacado</option>
                            </select>
                            <br/>
                            Value:
                            <input class="form-control" type="number" name="dbl_value" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($dbl_value) && ($dbl_value != null || $dbl_value != "")) ? $dbl_value : '';
                            ?>"/>
                            <br/>
                            Beneficiarie:
                            <select class="form-control" name="tb_beneficiaries_id_beneficiaries">
                                <?php
                                $query = "SELECT * FROM tb_beneficiaries order by str_name_person;";
                                $statement = $pdo->prepare($query);
                                if ($statement->execute()) {
                                    $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($result as $rs) {
                                        if ($rs->id_beneficiaries == $tb_beneficiaries_id_beneficiaries) {
                                            echo "<option value='$rs->id_beneficiaries' selected>$rs->str_name_person</option>";
                                        } else {
                                            echo "<option value='$rs->id_beneficiaries'>$rs->str_name_person</option>";
                                        }
                                    }
                                } else {
                                    throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
                                }
                                ?>
                            </select>
                            City:
                            <select class="form-control" name="tb_city_id_city">
                                <?php
                                $query = "SELECT * FROM tb_city order by str_name_city;";
                                $statement = $pdo->prepare($query);
                                if ($statement->execute()) {
                                    $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($result as $rs) {
                                        if ($rs->id_city == $tb_city_id_city) {
                                            echo "<option value='$rs->id_city' selected>$rs->str_name_city</option>";
                                        } else {
                                            echo "<option value='$rs->id_city'>$rs->str_name_city</option>";
                                        }
                                    }
                                } else {
                                    throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
                                }
                                ?>
                            </select>
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
