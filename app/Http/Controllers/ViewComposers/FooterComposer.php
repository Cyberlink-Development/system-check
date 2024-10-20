<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\News\NewsTypeModel;
use App\Models\News\ContentWriterModel;

class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
	

		$view->with('mobile_menu', NewsTypeModel::where(['mobile_menu'=>'1','status'=>1])
			->orderBy('ordering','asc')
			->get());

		$view->with('setting', SettingModel::where('id',1)
			->first());	

		}	
}