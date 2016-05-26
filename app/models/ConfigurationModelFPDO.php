<?php
namespace App\Model;

final class ConfigurationModelFPDO extends BaseModel
{
    public function getConfigById($cfgId = null)
    {
        $arrCfg = [];
        $rcCfg = $this->db->from('configurations')->where('id', $cfgId);

        foreach ($rcCfg as $cfg) {
            array_push($arrCfg, $cfg);
        }
        
        return $arrCfg;
    }
    
    public function getAllConfig()
    {
        $arrCfgs = [];
        $rcCfgs = $this->db->from('configurations');

        foreach ($rcCfgs as $cfg) {
            array_push($arrCfgs, $cfg);
        }
        
        return $arrCfgs;
    }
}
