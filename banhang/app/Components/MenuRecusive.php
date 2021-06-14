<?php 
namespace App\Components;

use App\Models\Menu;

class MenuRecusive{
	private $html;
	public function __construct(){
		$this->html='';

	}
	public function menuRecusiveAdd($parent_id=0,$sub=''){
		$data=Menu::where('parent_id',$parent_id)->get();
		foreach($data as $v){
			$this->html.='<option value="'. $v->id.'"> '.$sub.$v->name.'</option>';
			$this->menuRecusiveAdd($v->id, $sub.'--');
		}
		return $this->html;
	}
	public function menuRecusiveEdit($edit,$parent_id=0,$sub=''){
		$data=Menu::where('parent_id',$parent_id)->get();
		foreach($data as $v){
			if($edit==$v->id){
				$this->html.='<option selected value="'. $v->id.'"> '.$sub.$v->name.'</option>';
			}else
			{
				$this->html.='<option value="'. $v->id.'"> '.$sub.$v->name.'</option>';
			}
			
			$this->menuRecusiveEdit($edit,$v->id, $sub.'--');
		}
		return $this->html;
	}
}