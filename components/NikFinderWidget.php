<?php
/**
 * Created by PhpStorm.
 * User: feb
 * Date: 22/02/16
 * Time: 14.16
 */

namespace app\components;


use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class NikFinderWidget extends Widget
{
    public $model;
    public $attribute;
    public $inputID;
    public $buttonID;
    public $nameID;
    public $alamatID;
    public $tanggalLahirID;

    public $showTanggal = false;

    public $modelNama  = false;
    public $modelAlamat = false;

    public function run()
    {
        $model = $this->model;
        $attr = $this->attribute;

        $this->inputID = uniqid();
        $this->buttonID = uniqid();
        $this->nameID = uniqid();
        $this->alamatID = uniqid();
        $this->tanggalLahirID = uniqid();

        $this->registerJs();

        return
            Html::activeTextInput($model,$this->attribute, ["class" => "form-control " . $this->inputID, "style"=>"width:90%;display:inline-block"])." ".
            Html::a("<i class=\"fa fa-search\"></i>", "javascript:void(0)", ["id"=>$this->buttonID, "class"=>"btn btn-info", "style"=>"position: absolute;margin-left: 10px;"])." ".
            "<div class='row'>".
                "<div class='col-sm-12' style='margin-top:10px'>".
                    Html::label("Nama", null, ["class"=>"control-label col-sm-2"])." ".
                    "<div class='col-sm-10'>".

            (($this->modelNama)?
                        Html::activeTextInput($model, $this->attribute .'_nama', ["class"=>"form-control $this->nameID"]):
                        Html::textInput($this->attribute .'_nama', null, ["class"=>"form-control $this->nameID"]))
                        .
                    "</div>".
                "</div>".
                "<div class='col-sm-12' style='margin-top:10px'>".
                    Html::label("Alamat", null, ["class"=>"control-label col-sm-2"])." ".
                    "<div class='col-sm-10'>".
            (($this->modelAlamat)?
                        Html::activeTextarea($model, $this->attribute .'_alamat', ["class"=>"form-control $this->alamatID"]) :
                        Html::textarea($this->attribute .'_alamat',null, ["class"=>"form-control $this->alamatID"]))
                        .
                    "</div>".
                "</div>".
                ($this->showTanggal ?
                    "<div class='col-sm-12' style='margin-top:10px'>".
                        Html::label("Tanggal Lahir", null, ["class"=>"control-label col-sm-2"])." ".
                        "<div class='col-sm-10'>".
                            Html::textInput($this->tanggalLahirID, null, ["class"=>"form-control", "id"=>$this->tanggalLahirID]).
                        "</div>".
                    "</div>"
                    : "") .
            "</div>";
    }

    public function getFieldName()
    {
        $reflect = new \ReflectionClass($this->model->className());
        return strtolower($reflect->getShortName())."-".$this->attribute;
    }

    public function registerJs(){
        $this->getView()->registerJs('

$("#'.$this->buttonID.'").click(function(){
    var url = "'.Url::to(["ajax/find-penduduk"]).'";
    var data = {
        id : $(".'.$this->inputID.'").val(),
        _format : "json"
    }

    jQuery.ajax( {
        url: url,
        data: data,
        type: "GET",
        dataType: "json",
        success: function(result) {
            if (result.message == "data-found" ){

                var alamat =
                        result.alamat + " " +
                        " RT " + result.rt +
                        " RW " + result.rw + "\n " +
                        result.alamat_propinsi_nama + ", " +
                        result.alamat_kabupaten_nama
                    ;

                $(".'.$this->nameID.'").val(result.nama);
                $(".'.$this->alamatID.'").val(alamat);
                $("#'.$this->tanggalLahirID.'").val(result.tanggal_lahir);
            }else{
                //alert("Data Tidak Ditemukan");
            }
        },
        error: function(){
            //$(".'.$this->nameID.'").val("");
            //$(".'.$this->alamatID.'").val("");
            //$("#'.$this->tanggalLahirID.'").val("");

            //$(".field-'.$this->getFieldName().'").addClass("has-error");
        },
    } );
}).trigger("click");

        ');
    }
}