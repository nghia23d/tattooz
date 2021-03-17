<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Team;
use App\Models\Feedback;
use App\Models\Booknow;
use App\Models\FAQ;
use Config;

class UserController extends Controller
{

    public function __construct(Category $category){
        $this->category = $category;
        $this->generalData   = [
            'dataMenu'   => [
                'category' => $this->category->getListData('list-data-home'),
            ],
            'dataFooter' => config('frontend.footer'),
        ];
        view()->share('generalData', $this->generalData);
    }

    public function index(){
        
        $data           = new \stdClass();
        $data->slider   = (new Slider())->getListData('list-data-home');
        $data->team     = (new Team())->getListData('list-data-home');
        $data->feedback = (new Feedback())->getListData('list-data-home');
        $data->faq      = (new FAQ())->getListData('list-data-home');
        
        return view('user.pages.home.index', ['data' => $data]);
    }

    public function booknow(Request $request){    

       (new Booknow())->storeData($request->all());
        
        return redirect()->back()->with('success','Thêm phần tử thành công');
    }
}
