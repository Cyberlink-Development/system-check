<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\News\NewsModel;
use App\Models\Settings\SettingModel;

class FrontpageComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('trending', NewsModel::where('uri','<>','NULL')->orderBy('visiter','desc')->limit(5)->get());

		$view->with('setting', SettingModel::where('id',1)
			->first());		
					
	}
	
}