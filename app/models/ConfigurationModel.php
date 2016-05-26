<?php
namespace App\Model;

final class ConfigurationModel extends BaseModel
{
    public function getConfigById($cfgId = null)
    {
        $sql = 'SELECT * FROM configurations WHERE id = :cfgId';
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':cfgId', $cfgId, \PDO::PARAM_INT);
        $sth->execute();
        $rcCfg = $sth->fetchAll();

        return $rcCfg;
    }
    
    public function getAllConfig()
    {
        $sql = 'SELECT * FROM configurations';
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $rcCfgs = $sth->fetchAll();

        return $rcCfgs;
    }
}
