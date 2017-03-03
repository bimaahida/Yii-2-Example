<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\web\View;
use kartik\spinner\Spinner;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\IuranSearch $searchModel
 */
$this->title = 'Laporan Pemasukkan';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="giiant-crud laporan-pemasukkan-index">

        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <!--<div class="box-header with-border">Laporan</div>-->
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-12">
                                <label><strong>Tanggal Awal:</strong></label>
                            </div>
                            <div class="col-md-12">
                                <input id="tanggal1" type="text" class="datepicker form-control"
                                       value="<?php echo date("Y-m-d"); ?>" style="text-align: center">
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="col-md-12">
                                <label><strong>Tanggal Akhir:</strong></label>
                            </div>
                            <div class="col-md-12">
                                <input id="tanggal2" type="text" class="datepicker form-control"
                                       value="<?php echo date("Y-m-d"); ?>" style="text-align: center">
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" id="tampilkan">Tampilkan</button>
                                <a class="btn btn-success btn-block disabled" id="cetak" target="_blank" >Cetak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                echo '<div id="spinner" class="well">';
                echo Spinner::widget(['preset' => 'large', 'align' => 'center']);
                echo '<div class="clearfix"></div>';
                echo '</div>';
                ?>
                <div id="content-index"></div>

            </div>

        </div>
    </div>
<?php
$my_js = '
$(document).ready(function(){
$(".datepicker").datepicker({
format: "yyyy-mm-dd"
});
 $("#spinner").hide();
});
$("#tampilkan").click(function() {
                $("#spinner").show();
                $("#content-index").hide();
                $("#cetak").addClass("disabled");
                $.ajax({
                    url : "'.Yii::$app->homeUrl.'laporan-pemasukkan/process",
                    data : {
                        t1 : $("#tanggal1").val(),
                        t2 : $("#tanggal2").val(),
                        },
                    dataType : "html",
                    type : "post"
                }).done(function(data){
                    $("#content-index").html(data);
                    $("#content-index").show()
                    $("#spinner").hide();
                    $("#cetak").removeClass("disabled");
                });
                return false;
            });

            $("#cetak").click(function() {
                var url = "'.Yii::$app->homeUrl.'laporan-pemasukkan/export?"
                    + "t1=" + $("#tanggal1").val()
                    + "&t2=" + $("#tanggal2").val();

                window.open(url, "_blank","height=200,width=150");
            });
   ';
$this->registerJs($my_js, View::POS_END);
?>