<?php

require_once "db/connection.php";
require_once "classes/familyBag.php";

class familyBagDAO
{
    public function remover($familyBag){
        global $pdo;
        try {
            $statement = $pdo->prepare("DELETE FROM tb_family_bag WHERE id_family_bag = :id");
            $statement->bindValue(":id", $familyBag->getIdFamilyBag());
            if ($statement->execute()) {
                return "<script> alert('Registo foi excluído com êxito !'); </script>";
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: ".$erro->getMessage();
        }
    }

    public function salvar($familyBag){
        global $pdo;
        try {
            if ($familyBag->getIdFamilyBag() != "") {
                $statement = $pdo->prepare("UPDATE tb_family_bag SET str_mes_comp=:str_mes_comp, str_ano_comp=:str_ano_comp, str_mes_ref=:str_mes_ref,
                                                    str_ano_ref=:str_ano_ref, dbl_data_saque=:dbl_data_saque, dbl_valor_saque=:dbl_valor_saque, tb_city_id_city=:tb_city_id_city,
                                                     tb_beneficiaries_id_beneficiaries=:tb_beneficiaries_id_beneficiaries WHERE id_family_bag = :id;");
                $statement->bindValue(":id", $familyBag->getIdFamilyBag());
            } else {
                $statement = $pdo->prepare("INSERT INTO tb_family_bag (str_mes_comp, str_ano_comp, str_mes_ref, str_ano_ref, dbl_data_saque, dbl_valor_saque,
                                                                  tb_city_id_city, tb_beneficiaries_id_beneficiaries)
                                                    VALUES (:str_mes_comp, :str_ano_comp, :str_mes_ref, :str_ano_ref, :dbl_data_saque, :dbl_valor_saque,
                                                                  :tb_city_id_city, :tb_beneficiaries_id_beneficiaries)");
            }
            $statement->bindValue(":str_mes_comp",$familyBag->getStrMesComp());
            $statement->bindValue(":str_ano_comp",$familyBag->getStrAnoComp());
            $statement->bindValue(":str_mes_ref",$familyBag->getStrMesRef());
            $statement->bindValue(":str_ano_ref",$familyBag->getStrAnoRef());
            $statement->bindValue(":dbl_data_saque",$familyBag->getDblDataSaque());
            $statement->bindValue(":dbl_valor_saque",$familyBag->getDblValorSaque());
            $statement->bindValue(":tb_city_id_city",$familyBag->getTbCityIdCity());
            $statement->bindValue(":tb_beneficiaries_id_beneficiaries",$familyBag->getTbBeneficiariesIdBeneficiaries());

            if ($statement->execute()) {
                if ($statement->rowCount() > 0) {
                    return "<script> alert('Dados cadastrados com sucesso !'); </script>";
                } else {
                    return "<script> alert('Erro ao tentar efetivar cadastro !'); </script>";
                }
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function atualizar($familyBag){
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT id_family_bag, str_mes_comp, str_ano_comp, str_mes_ref, str_ano_ref, dbl_data_saque, dbl_valor_saque,
                                                  tb_city_id_city, tb_beneficiaries_id_beneficiaries
                                                 FROM tb_family_bag WHERE id_family_bag = :id");
            $statement->bindValue(":id", $familyBag->getIdFamilyBag());
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                $familyBag->setIdFamilyBag($rs->id_family_bag);
                $familyBag->setStrMesComp($rs->str_mes_comp);
                $familyBag->setStrAnoComp($rs->str_ano_comp);
                $familyBag->setStrMesRef($rs->str_mes_ref);
                $familyBag->setStrAnoRef($rs->str_ano_ref);
                $familyBag->setDblDataSaque($rs->dbl_data_saque);
                $familyBag->setDblValorSaque($rs->dbl_valor_saque);
                $familyBag->setTbBeneficiariesIdBeneficiaries($rs->tb_beneficiaries_id_beneficiaries);
                $familyBag->setTbCityIdCity($rs->tb_city_id_city);
                return $familyBag;
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: ".$erro->getMessage();
        }
    }

    public function tabelapaginada() {

        //carrega o banco
        global $pdo;

        //endereço atual da página
        $endereco = $_SERVER ['PHP_SELF'];

        /* Constantes de configuração */
        define('QTDE_REGISTROS', 10);
        define('RANGE_PAGINAS', 1);

        /* Recebe o número da página via parâmetro na URL */
        $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

        /* Calcula a linha inicial da consulta */
        $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;

        /* Instrução de consulta para paginação com MySQL */
        $sql = "SELECT f.id_family_bag, f.str_mes_comp, f.str_ano_comp, f.str_mes_ref, f.str_ano_ref, f.dbl_data_saque, f.dbl_valor_saque, 
                              c.str_name_city, b.str_name_person
                FROM tb_family_bag f,tb_city c, tb_beneficiaries b
                WHERE f.tb_city_id_city = c.id_city and f.tb_beneficiaries_id_beneficiaries = b.id_beneficiaries LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_OBJ);

        /* Conta quantos registos existem na tabela */
        $sqlContador = "SELECT COUNT(*) AS total_registros FROM tb_family_bag";
        $statement = $pdo->prepare($sqlContador);
        $statement->execute();
        $valor = $statement->fetch(PDO::FETCH_OBJ);

        /* Idêntifica a primeira página */
        $primeira_pagina = 1;

        /* Cálcula qual será a última página */
        $ultima_pagina  = ceil($valor->total_registros / QTDE_REGISTROS);

        /* Cálcula qual será a página anterior em relação a página atual em exibição */
        $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 : 0 ;

        /* Cálcula qual será a pŕoxima página em relação a página atual em exibição */
        $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 : 0 ;

        /* Cálcula qual será a página inicial do nosso range */
        $range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;

        /* Cálcula qual será a página final do nosso range */
        $range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;

        /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */
        $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder';

        /* Verifica se vai exibir o botão "Anterior" e "Último" */
        $exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';

        if (!empty($dados)):
            echo "
     <table class='table table-striped table-bordered'>
     <thead>
       <tr style='text-transform: uppercase;' class='active'>
        <th style='text-align: center; font-weight: bolder;'>Code</th>
        <th style='text-align: center; font-weight: bolder;'>Month Competence</th>
        <th style='text-align: center; font-weight: bolder;'>Year Competence</th>
        <th style='text-align: center; font-weight: bolder;'>Month Reference</th>
        <th style='text-align: center; font-weight: bolder;'>Year Reference</th>
        <th style='text-align: center; font-weight: bolder;'>Draw Date</th>
        <th style='text-align: center; font-weight: bolder;'>Draw Value</th>
        <th style='text-align: center; font-weight: bolder;'>Beneficiarie</th>
        <th style='text-align: center; font-weight: bolder;'>City</th>
        <th style='text-align: center; font-weight: bolder;' colspan='2'>Actions</th>
       </tr>
     </thead>
     <tbody>";
            foreach ($dados as $familyBag):
                echo "<tr>
        <td style='text-align: center'>$familyBag->id_family_bag</td>
        <td style='text-align: center'>$familyBag->str_mes_comp</td>
        <td style='text-align: center'>$familyBag->str_ano_comp</td>
        <td style='text-align: center'>$familyBag->str_mes_ref</td>
        <td style='text-align: center'>$familyBag->str_ano_ref</td>
        <td style='text-align: center'>$familyBag->dbl_data_saque</td>
        <td style='text-align: center'>$familyBag->dbl_valor_saque</td>
        <td style='text-align: center'>$familyBag->str_name_person</td>
        <td style='text-align: center'>$familyBag->str_name_city</td>
        <td style='text-align: center'><a href='?act=upd&id=$familyBag->id_family_bag' title='Alterar'><i class='ti-reload'></i></a></td>
        <td style='text-align: center'><a href='?act=del&id=$familyBag->id_family_bag' title='Remover'><i class='ti-close'></i></a></td>
       </tr>";
            endforeach;
            echo "
</tbody>
     </table>

     <div class='box-paginacao' style='text-align: center'>
       <a class='box-navegacao  $exibir_botao_inicio' href='$endereco?page=$primeira_pagina' title='Primeira Página'> FIRST  |</a>
       <a class='box-navegacao  $exibir_botao_inicio' href='$endereco?page=$pagina_anterior' title='Página Anterior'> PREVIOUS  |</a>
";

            /* Loop para montar a páginação central com os números */
            for ($i = $range_inicial; $i <= $range_final; $i++):
                $destaque = ($i == $pagina_atual) ? 'destaque' : '';
                echo "<a class='box-numero $destaque' href='$endereco?page=$i'> ( $i ) </a>";
            endfor;

            echo "<a class='box-navegacao $exibir_botao_final' href='$endereco?page=$proxima_pagina' title='Próxima Página'>| NEXT  </a>
                  <a class='box-navegacao $exibir_botao_final' href='$endereco?page=$ultima_pagina'  title='Última Página'>| LAST  </a>
     </div>";
        else:
            echo "<p class='bg-danger'>Nenhum registro foi encontrado!</p>
     ";
        endif;

    }
}