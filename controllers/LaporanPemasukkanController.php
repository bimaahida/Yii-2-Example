<?php

namespace app\controllers;

use Datetime;
use app\models\Iuran;
use app\models\IuranSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\components\Tanggal;
use app\components\Angka;
class LaporanPemasukkanController extends Controller {
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionProcess() {
        extract($_POST);

        $tgl1 = $t1;
        $tgl2 = $t2;

        $mdl = \app\models\Iuran::find()
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
                            <div class="box-header with-border">Laporan Pemasukkan Tanggal : <strong>'.Tanggal::toReadableDate($tgl1, FALSE).'</strong> s/d  <strong>'.Tanggal::toReadableDate($tgl2, FALSE).'</strong></div>
                            <div class="box-body">

                                <table class="myDatatable table table-striped table-bordered table-hover datatable" width="100%">
                                    <thead>
                                        <th>#</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
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
                                            <td>'.$m->nik.'</td>
                                            <td>'.$m->nama.'</td>
                                            <td>'.Angka::toReadableHarga($m->nominal, FALSE).'</td>
                                            <td>'.$m->tanggal.'</td>
                                            <td>'.$m->keterangan.'</td>
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

        $mdl = \app\models\Iuran::find()
            ->where(['between', 'tanggal', "$tgl1", "$tgl2" ])
            ->all();

        $objPHPExcel = new \PHPExcel();

        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('Test')
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NIK')
            ->setCellValue('C1', 'Nama')
            ->setCellValue('D1', 'Nominal')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Keterangan');

        $count=1;
        $row = 2;
        foreach ($mdl as $m) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $count);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $m->nik);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $m->nama);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $m->nominal);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $m->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $m->keterangan);
            $row++;
            $count++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = "LaporanPemasukkan_" . $tgl1."-". $tgl2 .".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}