<?php

require_once "db/connection.php";
require_once "classes/guaranteeCrop.php";

class guaranteeCropDAO
{
    public function remover($guaranteeCrop){
        global $pdo;
        try {
            $statement = $pdo->prepare("DELETE FROM tb_guarantee_crop WHERE id_guarantee_crop = :id");
            $statement->bindValue(":id", $guaranteeCrop->getIdGuaranteeCrop());
            if ($statement->execute()) {
                return "<script> alert('Registo foi excluído com êxito !'); </script>";
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: ".$erro->getMessage();
        }
    }

    public function salvar($guaranteeCrop){
        global $pdo;
        try {
            if ($guaranteeCrop->getIdGuaranteeCrop() != "") {
                $statement = $pdo->prepare("UPDATE tb_guarantee_crop SET srt_month=:srt_month, str_year=:str_year, dbl_value=:dbl_value, tb_city_id_city=:tb_city_id_city, tb_beneficiaries_id_beneficiaries=:tb_beneficiaries_id_beneficiaries   WHERE id_guarantee_crop = :id;");
                $statement->bindValue(":id", $guaranteeCrop->getIdGuaranteeCrop());
            } else {
                $statement = $pdo->prepare("INSERT INTO tb_guarantee_crop (srt_month, str_year, dbl_value, tb_city_id_city, tb_beneficiaries_id_beneficiaries) VALUES (:srt_month, :str_year, :dbl_value, :tb_city_id_city, :tb_beneficiaries_id_beneficiaries)");
            }
            $statement->bindValue(":srt_month",$guaranteeCrop->getSrtMonth());
            $statement->bindValue(":str_year",$guaranteeCrop->getSrtYear());
            $statement->bindValue(":dbl_value",$guaranteeCrop->getDblValue());
            $statement->bindValue(":tb_city_id_city",$guaranteeCrop->getTbCityIdCity());
            $statement->bindValue(":tb_beneficiaries_id_beneficiaries",$guaranteeCrop->getTbBeneficiariesIdBeneficiaries());

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

    public function atualizar($guaranteeCrop){
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT id_guarantee_crop, srt_month, str_year, dbl_value, tb_beneficiaries_id_beneficiaries, tb_city_id_city FROM tb_guarantee_crop WHERE id_guarantee_crop = :id");
            $statement->bindValue(":id", $guaranteeCrop->getIdCity());
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);
                $guaranteeCrop->setIdGuaranteeCrop($rs->id_guarantee_crop);
                $guaranteeCrop->setSrtMonth($rs->srt_month);
                $guaranteeCrop->setSrtYear($rs->str_year);
                $guaranteeCrop->setDblValue($rs->dbl_value);
                $guaranteeCrop->setTbBeneficiariesIdBeneficiaries($rs->tb_beneficiaries_id_beneficiaries);
                $guaranteeCrop->setTbCityIdCity($rs->tb_city_id_city);
                return $guaranteeCrop;
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
        $sql = "SELECT g.id_guarantee_crop, g.srt_month, g.str_year, g.dbl_value, g.tb_beneficiaries_id_beneficiaries, g.tb_city_id_city, c.str_name_city, str_name_person
                FROM tb_guarantee_crop g,tb_city c, tb_beneficiaries b
                WHERE g.tb_city_id_city = c.id_city and g.tb_beneficiaries_id_beneficiaries = b.id_beneficiaries LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_OBJ);

        /* Conta quantos registos existem na tabela */
        $sqlContador = "SELECT COUNT(*) AS total_registros FROM tb_guarantee_crop";
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
        <th style='text-align: center; font-weight: bolder;'>Month</th>
        <th style='text-align: center; font-weight: bolder;'>Year</th>
        <th style='text-align: center; font-weight: bolder;'>Value</th>
        <th style='text-align: center; font-weight: bolder;'>Beneficiarie</th>
        <th style='text-align: center; font-weight: bolder;'>City</th>
        <th style='text-align: center; font-weight: bolder;' colspan='2'>Actions</th>
       </tr>
     </thead>
     <tbody>";
            foreach ($dados as $guaranteeCrop):
                $money = 'R$' . number_format($guaranteeCrop->dbl_value, 2, ',', '.');
                echo "<tr>
        <td style='text-align: center'>$guaranteeCrop->id_guarantee_crop</td>
        <td style='text-align: center'>$guaranteeCrop->srt_month</td>
        <td style='text-align: center'>$guaranteeCrop->str_year</td>
        <td style='text-align: center'>$money</td>
        <td style='text-align: center'>$guaranteeCrop->str_name_person</td>
        <td style='text-align: center'>$guaranteeCrop->str_name_city</td>
        <td style='text-align: center'><a href='?act=upd&id=$guaranteeCrop->id_guarantee_crop' title='Alterar'><i class='ti-reload'></i></a></td>
        <td style='text-align: center'><a href='?act=del&id=$guaranteeCrop->id_guarantee_crop' title='Remover'><i class='ti-close'></i></a></td>
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