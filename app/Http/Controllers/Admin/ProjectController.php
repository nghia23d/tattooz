<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project as MainModel;
use App\Models\Category;

class ProjectController extends Controller
{
    private $pathView;
    private $prefix;
    private $model;
    private $params;

    public function __construct()
    {
        $this->prefix       = 'project';
        $this->pathView     = 'admin/pages/project/';
        $this->model        = new MainModel();
        $this->params       = [];
        
        view()->share('prefix', $this->prefix);
    }

    public function index(){    

        $data = $this->model->getListData('list-data-admin');
        $dataCategory =  (new Category)->getListData('list-data-in-selectbox');

        return view($this->pathView . 'index',[
            'data'         => $data,
            'dataCategory' => $dataCategory
        ]);
    }

    public function store(Request $request){    

        $this->model->storeData($request->all());
        
        return redirect()->back()->with('success','Thêm phần tử thành công');
    }

    public function changeStatus(Request $request)
    { 
        $this->params['status']  = $request->status;
        $this->params['id']      = $request->id;

        $statusOnChange = $this->model->changeData($this->params , $task = 'change-status');

        return response()->json(['id'=> $request->id,'status' => $statusOnChange]);
    }

    public function update(Request $request,$id){    
        
        $this->model->updateData($request->except(['_token','_method']),$id);
        
        return redirect()->back()->with('success','Cập nhật phần tử thành công');
    }

    public function destroy($id){    

        $this->model->destroyData($id);
        
        return redirect()->back()->with('success','Xóa phần tử thành công');
    }
}
