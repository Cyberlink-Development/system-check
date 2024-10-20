<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\News\NewsTypeModel;
use App\Models\News\ContentWriterModel;
use App\Models\News\NewsModel;


class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('footernews_section1', NewsTypeModel::where(['is_menu'=>'1','parent_id'=>'0','status'=>1])
			->orderBy('ordering','asc')
			->get());

		$view->with('footernews_section2', NewsTypeModel::where(['is_menu'=>'1','parent_id'=>'3','status'=>1])
			->orderBy('ordering','asc')
			->get());

		$view->with('setting', SettingModel::where('id',1)
			->first());


        $view->with('mobile_menu',NewsTypeModel::where(['mobile_menu'=>'1','parent_id'=>'0','status'=>1])->orderBy('ordering','asc')->get());
            
        $view->with('trending', NewsModel::where('uri','<>','NULL')->orderBy('visiter','desc')->limit(10)->get());

        $view->with('latest', NewsModel::where('uri','<>','NULL')->orderBy('id','desc')->limit(10)->get());


		}
}
