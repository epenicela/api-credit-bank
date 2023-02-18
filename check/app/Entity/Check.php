<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Check{

    public $id;
    public $credit_account_id;

    public function add() {
        $obDatabase = new Database('dado_bacario');
        $this->id = $obDatabase->insert([
            'credit_account_id' => $this->credit_account_id
        ]);

        return true;
    }

    public function update() {
        return (new Database('dado_bacario'))->update('id = ' . $this->id, [
            'credit_account_id' => $this->credit_account_id
        ]);
    }

    public function delete() {
        return (new Database('dado_bacario'))->delete('id = ' . $this->id);
    }

    public static function getAll($where = null, $order = null, $limit = null) {
        return (new Database('dado_bacario'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getQTDs($where = null) {
        return (new Database('dado_bacario'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    }

    public static function getByID($id) {
        return (new Database('dado_bacario'))->select("id = " . $id)->fetchObject(self::class);
    }

    public function toArray($list) {
        $array=null;
        $dataHora = date('Y-m-d H:i:s');
        $checkId = '';
        $chars = '0123456789';
        for ($i = 0; $i < 16; $i++) {
            $checkId .= $chars[rand(0, strlen($chars) - 1)];
        }
        if(isset($list)){
            foreach ($list as $li){
                $array[] = array(
                //'id' => $li->id,
                //'credit_account_id' => $li->credit_account_id,
                'dataHora' => $dataHora,
                'checkId' => $checkId
                );
            }
        }else{
            $array[] = array(
                'dataHora' => null,
                'checkId' => null
                );
        }
        return $array;
    }

}
