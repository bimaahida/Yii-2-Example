<?php

namespace app\controllers;

use Datetime;
use app\models\Pengeluaran;
use app\models\PengeluaranSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\components\Tanggal;
use app\components\Angka;
class LaporanPengeluaranController extends Controller {
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionProcess() {
        extract($_POST);

        $tgl1 = $t1;
        $tgl2 = $t2;

        $mdl = \app\models\Pengeluaran::find()
            ->where(['between', 'tanggal', "$tgl1", "$tgl2" ])
            ->all();



        if (COUNT($mdl) > 0) {

            $dataChart = [];
            $dataChart['cat'] = [];
            $dataChart['value1'] = [];
            $dataChart['value2'] = [];
            $dataChart['value3'] = [];


//            foreach ($mdl as $ld) {
//    //            $dataChart['cat'][] = $ld['TGL_PMH'];
//
//                $dataChart['cat'][] = Tanggal::toReadableDate($ld->TGL_PMH, FALSE);
//
//                $dataChart['value1'][] = $ld->JUM_PMH;
//                $dataChart['value2'][] = $ld->SUM_JB;
//                $dataChart['value3'][] = $ld->VLDS;
//    //            $dataChart[] = array($ld['TGL_PMH'], $ld['JUM_PLG'], $ld['SUM_JB']);
//            }

            echo '
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">Laporan Pengeluaran Tanggal : <strong>'.Tanggal::toReadableDate($tgl1, FALSE).'</strong> s/d  <strong>'.Tanggal::toReadableDate($tgl2, FALSE).'</strong></div>
                            <div class="box-body">

                                <table class="myDatatable table table-striped table-bordered table-hover datatable" width="100%">
                                    <thead>
                                        <th>#</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Keperluan</th>
                                        </thead>
                                    <tbody>
            ';

            $tglView = '';
            $counter=0;
            foreach($mdl as $m) {
//                                    $tglView = Tanggal::toReadableDate($m->TGL_PMH, FALSE);

                echo '
                                        <tr>
                                            <td>'.++$counter.'</td>
                                            <td>'.Angka::toReadableHarga($m->nominal, FALSE).'</td>
                                            <td>'.$m->tanggal.'</td>
                                            <td>'.$m->keperluan.'</td>
                                            </tr>
                                    ';
            }

            echo '
                                    </tbody>
                                </table>
                            ';

            echo '
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function(){
                        $(".myDatatable").DataTable();
                    });
                </script>
            ';
        } else {
            echo '<div class="alert alert-danger col-md-12">Data tidak ditemukan</div>';

        }
    }
    public function actionExport() {
        extract($_GET);


        $tgl1 = $t1;
        $tgl2 = $t2;

        $mdl = \app\models\Pengeluaran::find()
            ->where(['between', 'tanggal', "$tgl1", "$tgl2" ])
            ->all();

        $objPHPExcel = new \PHPExcel();

        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Test')
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'nominal')
            ->setCellValue('C1', 'tanggal')
            ->setCellValue('D1', 'keperluan');
        $count=1;
        $row = 2;
        foreach ($mdl as $m) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $count);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $m->nominal);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $m->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $m->keperluan);
            $row++;
            $count++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = "LaporanPengeluaran_" . $tgl1."-". $tgl2 .".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}