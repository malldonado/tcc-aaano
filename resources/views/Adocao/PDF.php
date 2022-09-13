<?php
    ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        @page { margin: 27px 100px 100px 100px; }
    </style>
    <style>
        table{
            width: 100%;
        }

        table tr td, h1, h2, h3, h4 {
            margin: 0px;
            padding: 0px;
        }

        .img{
            padding: 10px;
        }

        .description-title {
            text-align:left;
            padding: 7px;
            margin: 5px;
            background-color: lightgrey;
            width: 100%;
            margin-top: 10px;
        }

        .description-subtitle{
            width: 20%;
            text-align: left;
            border-bottom: 1px solid black;
        }

    </style>
</head>

<body>
    <table style="width: 100%; background-color: red;">
        <tr>
            <th class="img">
                <img style="height: 40px; width: 50px;" src="<?= public_path() . '/imagens/logo.png' ?> ">
            </th>
            <th style="text-align: left; color: white;">
                <h2>Associação Amigos dos Animais de Nova Odessa</h2>
            </th>
        </tr>

        <tr>
            <th colspan="2" style="text-align: left; color: white; padding: 10; font-size: 20px; border-top: .5px solid white;">
                Relatório
            </th>
            <th style="text-align: right; color: white; font-size: 15px; border-top: .5px solid white;">
                De <?= formatDate($datas['data_inicio']) ?> até <?= formatDate($datas['data_fim']) ?>
            </th>
        </tr>

    </table>

    <div style="padding-top: 20px;"></div>
    <table style="border: 1px solid lightgrey;">
        <tr >
            <th class="description-title" colspan="5" >
                Adoções realizadas
            </th>
        </tr>
        <tr>
            <td class="description-subtitle">Nome do adotante</td>
            <td class="description-subtitle">Nome do animal</td>
            <td class="description-subtitle">Raça</td>
            <td class="description-subtitle">Data de adoção</td>
            <td class="description-subtitle">Status animal</td>
        </tr>

        <?php foreach($adocoes as $adocao) : ?>
             <?php if ($adocao->adocao_adotado == 'S') : ?>
                <tr>
                    <td> <?= $adocao->pessoa_nome ?> </td>
                    <td> <?= $adocao->animal_nome ?>  </td>
                    <td> <?= $adocao->animal_raca ?> </td>
                    <td> <?= formatDate($adocao->adocao_dt_adocao) ?> </td>
                    <td> <?= $adocao->animal_status ?> </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <div style="padding-top: 20px;"></div>
    <table style="border: 1px solid lightgrey;">
        <tr>
            <th class="description-title" colspan="5">
                Pedidos de Adoção
            </th>
        </tr>

        <tr>
            <td class="description-subtitle">Nome do adotante</td>
            <td class="description-subtitle">Nome do animal</td>
            <td class="description-subtitle">Raça</td>
            <td class="description-subtitle">Data do pedido de adoção</td>
            <td class="description-subtitle">Status animal</td>
        </tr>

        <?php foreach($adocoes as $adocao) : ?>
            <?php if ($adocao->adocao_adotado == 'N') : ?>
                <tr>
                    <td> <?= $adocao->pessoa_nome ?> </td>
                    <td> <?= $adocao->animal_nome ?> </td>
                    <td> <?= $adocao->animal_raca ?> </td>
                    <td> <?= formatDate($adocao->adocao_dt_pedido_adocao) ?> </td>
                    <td> <?= $adocao->animal_status ?> </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <div style="padding-top: 20px;"></div>
    <table style="border: 1px solid lightgrey;">
        <tr>
            <th class="description-title" colspan="5" >
                Pedidos de Adoção recusados
            </th>
        </tr>

        <tr>
            <td class="description-subtitle">Nome do adotante</td>
            <td class="description-subtitle">Nome do animal</td>
            <td class="description-subtitle">Raça</td>
            <td class="description-subtitle">Data de recusa</td>
            <td class="description-subtitle">Status animal</td>
        </tr>

        <?php foreach($adocoes as $adocao) : ?>
            <?php if ($adocao->adocao_adotado == 'R') : ?>
                <tr>
                    <td> <?= $adocao->pessoa_nome ?> </td>
                    <td> <?= $adocao->animal_nome ?> </td>
                    <td> <?= $adocao->animal_raca ?> </td>
                    <td> <?= formatDate($adocao->adocao_dt_recusa) ?> </td>
                    <td> <?= $adocao->animal_status ?> </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
  </body>
</html>

<?php

    $html = ob_get_contents();
    ob_end_clean();
//    echo $html;

    require __DIR__.'/../../../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 300], 'orientation' => 'L']);
    $mpdf->allow_charset_conversion = true;
    $mpdf->charset_in = 'UTF-8';
    $mpdf->WriteHTML($html);
    $mpdf->OutPut('relatório.pdf', 'I');
    exit();

?>
