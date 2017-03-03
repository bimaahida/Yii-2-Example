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

class NikFinderWidgetV2 extends Widget
{
    public $model;
    public $otherModel;
    public $attribute;
    public $inputID;
    public $buttonID;
    public $modelName;
    public $registerJs = true;

    public $pilihan = [];

    public function run()
    {
        $model = $this->model;
        $attr = $this->attribute;

        $this->inputID = uniqid();
        $this->buttonID = uniqid();


        if ($this->otherModel == null) {
            $reflect = new \ReflectionClass($this->model->className());
            $this->modelName = strtolower($reflect->getShortName());
        } else {
            $model = $this->model = $this->otherModel;
            $reflect = new \ReflectionClass($this->otherModel->className());
            $this->modelName = strtolower($reflect->getShortName());
        }

        $jsPengisian = "";
        $jsPengisianArray = [];
        foreach ($this->pilihan as $value) {
            //$jsPengisian .= '$("#'. $this->modelName .'-'.$this->attribute.'_' . $value .'").val(result.'.$value.');';
            //$jsPengisian .= '$("#'. $this->modelName .'-'.$this->attribute.'_' . $value .'").trigger("change");';
            if (strpos($value, 'hidden') !== false) {
                $variableIsian = str_replace("_hidden", "", $value);
            } else {
                $variableIsian = $value;
            }
            $otherAttr = $this->attribute;
            $otherAttr = str_replace('[', '', $otherAttr);
            $otherAttr = str_replace(']', '-', $otherAttr);
            $w =
                '
                    $.when(
                        $("#' . $this->modelName . '-' . $otherAttr . '_' . $value . '").val(result.' . $variableIsian . ').change().triggerHandler("change")

                    ).done(
                        function(){
                            console.log("' . $this->modelName . '-' . $otherAttr . '_' . $value . '");
                            console.log(result.' . $variableIsian . ');
                            nextaction
                        }
                    );
                ';
            array_push($jsPengisianArray, $w);

        }

        foreach ($jsPengisianArray as $tochange) {
            if ($jsPengisian == "") $jsPengisian = $tochange;
            else {
                $jsPengisian = str_replace("nextaction", $tochange, $jsPengisian);
            }
        }
        $jsPengisian = str_replace("nextaction", "", $jsPengisian);

        if ($this->registerJs)
            $this->registerJs($jsPengisian);

        return
            Html::activeTextInput($model, $this->attribute,
                [
                    "class" => "form-control input-nik  " . $this->inputID,
                    "style" => "width:90%;display:inline-block",
                    "btnId" => $this->buttonID,
                    "placeholder" => "NIK Penduduk"
                ]
            ) . " " .
            Html::a("<i class=\"fa fa-search\"></i>", "javascript:void(0)",
                [
                    "id" => $this->buttonID,
                    "btnId" => $this->buttonID,
                    "model" => $this->modelName,
                    "attribute" => $this->attribute,
                    "timestamp" => "",
                    "pilihan" => implode(',', $this->pilihan),
                    "class" => "btn btn-info btn-searc-nik",
                    "style" => "position: absolute;margin-left: 10px;",
                    "onclick" => "nikSearch(this)"
                ]
            );
    }

    public function registerJs()
    {
        $this->getView()->registerJs('


function nikSearch(btn){


    var url = "' . Url::to(["ajax/find-penduduk"]) . '";
    var data = {
        id : $("input[btnId=" + $(btn).attr("btnId") + "]").val(),
        _format : "json"
    }
    var input = $(btn).attr("pilihan").split(",");
    var model = $(btn).attr("model");
    var attribute = $(btn).attr("attribute");

    jQuery.ajax( {
        url: url,
        data: data,
        type: "GET",
        dataType: "json",
        success: function(result) {
            if (result.message == "data-found" ){
            input.forEach(function(entry, index) {
                var entryjs = entry.replace("_hidden", "");

                attribute = attribute.replace("[", "");
                attribute = attribute.replace("]", "-");

                if($("#"  + model + "-" +  attribute + "_" + entry).length !=1){
                    //UNTUK DYNAMIC FORM
                    //alert("tidak ada");
                    $(".input_attribute").each(function(i, obj){
                        var marker = $(obj).attr("marker");
                        if(marker.indexOf($(btn).attr("timestamp")) > 0){
                            if(marker.indexOf(entry) > 0){
                                $(obj).val(result[entryjs]).trigger("change");
                            }
                        }
                    });

                }else{
                    console.log(model + "-" +  attribute + "_" + entry + "=>" + entryjs);
                    $("#"  + model + "-" +  attribute + "_" + entry).val(result[entryjs]).trigger("change");
                }


            });

            }else{
                alert("Data Penduduk tidak ditemukan, silahkan menambah data di Master Penduduk");
                location.reload();
            }
        },
        error: function(){

        },
    } );
}

        ', \yii\web\View::POS_END);
    }
}