<?php

require_once "classes/template.php";

require_once "dao/familyBagDAO.php";
require_once "classes/familyBag.php";

$object = new familyBagDAO();

$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();

// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $str_mes_comp = (isset($_POST["str_mes_comp"]) && $_POST["str_mes_comp"] != null) ? $_POST["str_mes_comp"] : "";
    $str_ano_comp = (isset($_POST["str_ano_comp"]) && $_POST["str_ano_comp"] != null) ? $_POST["str_ano_comp"] : "";
    $str_mes_ref = (isset($_POST["str_mes_ref"]) && $_POST["str_mes_ref"] != null) ? $_POST["str_mes_ref"] : "";
    $str_ano_ref = (isset($_POST["str_ano_ref"]) && $_POST["str_ano_ref"] != null) ? $_POST["str_ano_ref"] : "";
    $dbl_data_saque = (isset($_POST["dbl_data_saque"]) && $_POST["dbl_data_saque"] != null) ? $_POST["dbl_data_saque"] : "";
    $dbl_valor_saque = (isset($_POST["dbl_valor_saque"]) && $_POST["dbl_valor_saque"] != null) ? $_POST["dbl_valor_saque"] : "";
    $tb_beneficiaries_id_beneficiaries = (isset($_POST["tb_beneficiaries_id_beneficiaries"]) && $_POST["tb_beneficiaries_id_beneficiaries"] != null) ? $_POST["tb_beneficiaries_id_beneficiaries"] : "";
    $tb_city_id_city = (isset($_POST["tb_city_id_city"]) && $_POST["tb_city_id_city"] != null) ? $_POST["tb_city_id_city"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $str_mes_comp = NULL;
    $str_ano_comp = NULL;
    $str_mes_ref = NULL;
    $str_ano_ref = NULL;
    $dbl_data_saque = NULL;
    $dbl_valor_saque = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $familyBag = new familyBag($id,'','','','','','','','');

    $resultado = $object->atualizar($familyBag);
    $str_mes_comp = $resultado->getStrMesComp();
    $str_ano_comp = $resultado->getStrAnoComp();
    $str_mes_ref = $resultado->getStrMesRef();
    $str_ano_ref = $resultado->getStrAnoRef();
    $dbl_data_saque = $resultado->getDblDataSaque();
    $dbl_valor_saque = $resultado->getDblValorSaque();
    $tb_beneficiaries_id_beneficiaries = $resultado->getTbBeneficiariesIdBeneficiaries();
    $tb_city_id_city = $resultado->getTbCityIdCity();

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $str_mes_comp != "" && $str_ano_comp!= "" && $str_mes_ref != "" && $str_ano_ref!= "" &&
    $dbl_data_saque!= "" && $dbl_valor_saque!= "" && $tb_beneficiaries_id_beneficiaries!= "" && $tb_city_id_city!= "")
{
    $familyBag = new familyBag($id, $str_mes_comp, $str_ano_comp, $str_mes_ref, $str_ano_ref, $dbl_data_saque, $dbl_valor_saque, $tb_beneficiaries_id_beneficiaries,$tb_city_id_city);
    $msg = $object->salvar($familyBag);
    $id = null;
    $str_mes_comp = NULL;
    $str_ano_comp = NULL;
    $str_mes_ref = NULL;
    $str_ano_ref = NULL;
    $dbl_data_saque = NULL;
    $dbl_valor_saque = NULL;
    $tb_beneficiaries_id_beneficiaries = NULL;
    $tb_city_id_city = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $familyBag = new familyBag($id,'','','','','','','','');
    $msg = $object->remover($familyBag);
    $id = null;
}

?>


    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Family Bag</h4>
                            <p class='category'>List of Family Bag of the system</p>

                        </div>
                        <div class='content table-responsive'>

                            <form action="?act=save&id=" method="POST" name="form1">

                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                ?>"/>
                                Month Competence:
                                <input class="form-control" type="number" maxlength="2" min="1" max="12" name="str_mes_comp" placeholder="MM" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($str_mes_comp) && ($str_mes_comp != null || $str_mes_comp != "")) ? $str_mes_comp : '';
                                ?>"/>
                                <br/>
                                Year Competence:
                                <input class="form-control" type="number" maxlength="4" max="<?php echo date("Y")?>" name="str_ano_comp" placeholder="YYYY" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($str_ano_comp) && ($str_ano_comp != null || $str_ano_comp != "")) ? $str_ano_comp : '';
                                ?>"/>
                                <br/>
                                Month Reference:
                                <input class="form-control" type="number" maxlength="2" min="1" max="12" name="str_mes_ref" placeholder="MM" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($str_mes_ref) && ($str_mes_ref != null || $str_mes_ref != "")) ? $str_mes_ref : '';
                                ?>"/>
                                <br/>
                                Year Reference:
                                <input class="form-control" type="number" maxlength="4" max="<?php echo date("Y")?>" name="str_ano_ref" placeholder="YYYY" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($str_ano_ref) && ($str_ano_ref != null || $str_ano_ref != "")) ? $str_ano_ref : '';
                                ?>"/>
                                <br/>
                                Draw Month:
                                <input class="form-control" type="number" min="1" max="12" name="dbl_data_saque" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($dbl_data_saque) && ($dbl_data_saque != null || $dbl_data_saque != "")) ? $dbl_data_saque : '';
                                ?>"/>
                                <br/>
                                Draw Value:
                                <input class="form-control" type="number" name="dbl_valor_saque" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($dbl_valor_saque) && ($dbl_valor_saque != null || $dbl_valor_saque != "")) ? $dbl_valor_saque : '';
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