<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booknow extends Model
{
    protected $table    = 'booknow';
    protected $fillable = ['id','name','phone','status','description','status_contact','time','email'];
    const ACTIVE   = 1;
    const INACTIVE = 0;

   
    public function getListData($task)
    {
        if($task == 'list-data-admin'){
            return self::get();
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
