<?php
namespace App\Components;

use App\Models\Category;


class Recusive{
	private $data;
	private $htmlSelect= '';
	public function __construct($data){
		$this->data=$data;
	}
	public function categoryRecusive($parentId,$id=0, $text=''){
		
		foreach($this->data as $v){
			if($v['parent_id']==$id){
				if(!empty($parentId)&& $parentId==$v['id'])
				{
					$this->htmlSelect .= "<option selected value='".$v['id']."'>" .$text.$v['name']."</option>";
				}
				else{
					$this->htmlSelect .= "<option value='".$v['id']."'>" .$text.$v['name']."</option>";
				}
				
				$this->categoryRecusive($parentId,$v['id'],$text.'--');
			}
		}
		return $this->htmlSelect;
	}
}

