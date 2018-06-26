<?php
namespace app\manage\model;
use think\Model;
class Adsourse extends Model{
	protected $name = 'ad_resouse';
	protected $field = true;
	protected $pk = 'ID'; 	
	public function ads()
    {
        return $this->belongsTo('Ads','type_id','ID');
    }

    }
?>