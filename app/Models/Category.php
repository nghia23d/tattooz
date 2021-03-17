<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table    = 'category';
    protected $fillable = ['id','name','status'];
    const ACTIVE   = 1;
    const INACTIVE = 0;

    public function project()
    {
        return $this->hasMany(Project::class);
        
    }
    public function getLimitProject()
    {
        return $this->project()->take(6);
    }

    public function getListData($task)
    {
        if($task == 'list-data-admin'){
            return self::withCount('project')->get();
        }
        
        if($task == 'list-data-in-selectbox'){
            return self::where('status',self::ACTIVE)->get();
        }

        if($task == 'list-data-home'){
            return self::where('status',self::ACTIVE)->get();
        }
    }

    public function storeData($data)
    {
        return self::create($data);
    }

    public function updateData($data,$id)
    { 
        return self::where('id', $id)->update($data);
    }

    public function destroyData($id)
    {
        return self::destroy($id);
    }

    public function changeData($params,$task)
    {
        if($task = 'change-status')
        {
            $status = ($params['status'] == 0) ? 1 : 0;
            self::where('id', $params['id'])->update(['status' => $status ]);
            return $status;
        }
    }
    
}
