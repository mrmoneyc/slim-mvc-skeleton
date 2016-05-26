<?php
namespace App\Model;

final class ConfigurationModelMock
{
    public function getConfigById($cfgId = null)
    {
        $arrCfg = [
            [
                "id" => "2",
                "cfgKey" => "AppVersion",
                "cfgValue" => "1.0.0"
            ]
        ];

        return $arrCfg;
    }
    
    public function getAllConfig()
    {
        $arrCfgs = [
            [
                "id" => "1",
                "cfgKey" => "AppName",
                "cfgValue" => "Slim-MVC-Skeleton"
            ],
            [
                "id" => "2",
                "cfgKey" => "AppVersion",
                "cfgValue" => "1.0.0"
            ],
            [
                "id" => "3",
                "cfgKey" => "Blah",
                "cfgValue" => "haha"
            ]
        ];
        
        return $arrCfgs;
    }
}
