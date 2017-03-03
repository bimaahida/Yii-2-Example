<?php

namespace app\components;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Menu;

class SidebarMenu extends Widget
{
    public static function getMenu($roleId, $parentId=NULL){
        $output = [];
        foreach(Menu::find()->where(["parent_id"=>$parentId])->orderBy("`order` ASC")->all() as $menu){
            $obj = [
                "label" => $menu->name,
                "icon" => $menu->icon,
                "url" => SidebarMenu::getUrl($menu),
                "visible" => SidebarMenu::roleHasAccess($roleId, $menu->id),
            ];

            if(count($menu->menus) != 0){
                $obj["items"] = SidebarMenu::getMenu($roleId, $menu->id);
            }

            $output[] = $obj;
        }
        return $output;
    }

    private static function roleHasAccess($roleId, $menuId){
        $roleMenu = \app\models\RoleMenu::find()->where(["menu_id"=>$menuId, "role_id"=>$roleId])->one();
        if($roleMenu){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    private static function getUrl($menu){
        if($menu->controller == NULL){
            return "#";
        }else{
            return [$menu->controller."/".$menu->action];
        }
    }
    public static function countSpanMenu($controller, $countOnly = false){
        $user = \Yii::$app->user->identity;
        $count = 0;

        switch($controller){
            case 'ktp' :
                $model =  new \app\models\KtpSearch();break;
            case 'skck' :
                $model =  new \app\models\SkckSearch();break;
            }
        if(isset($model))
            $count = $model->search(['processOnly'=>true])->count;

        if($countOnly) return $count;
        else if($count > 0)
            return '<span class="label label-danger pull-right">'.$count.'</span>';
        else
            return'';
    }
    public static function notifList(){
        $notifList = [];
        $totalCount = 0;

        $controller = [
            ['ktp', 'Pengantar e-KTP'],
            ['skck', 'Pengantar SKCK'],
        ];
        foreach ($controller as $con){
            $c = SidebarMenu::countSpanMenu($con[0], true);
            if($c>0){
                array_push($notifList,
                    '<li>
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i>'.$con[1].'
                            <span class="label label-danger pull-right">'.$c.'</span>
                        </a>
                    </li>');
                $totalCount += $c;
            }
        }

        echo '
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">'.$totalCount.'</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">Total Permintaaan '.$totalCount.'</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        '.implode('',$notifList).'
                    </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
            </ul>
        ';
    }
}