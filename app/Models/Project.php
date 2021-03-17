<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Project extends Model
{
    protected $table    = 'project';
    protected $fillable = ['id','category_id','name','thumb','status'];
    protected $folderUpload = 'project';
    const ACTIVE   = 1;
    const INACTIVE = 0;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getListData($task)
    {
        if($task == 'list-data-admin'){
            return self::with('category:id,name')->get();
        }
        
        if($task == 'list-data-home'){
            return self::where('status',self::ACTIVE)->with('category:id,name')->get()->groupBy('category_id')->toArray();
        }
    }

    public function storeData($data)
    {
        $data['thumb'] = $this->uploadThumb($data['thumb']);

        return self::create($data);
    }

    public function updateData($data,$id)
    { 
        if (!empty($data['thumb'])) {

            $this->deleteThumb($data['thumb_old']);
           
            $data['thumb'] = $this->uploadThumb($data['thumb']);
            
        }
        unset($data['thumb_old']);
        return self::where('id',$id)->update($data);
    }

    public function destroyData($id)
    {
        $data = self::find($id);

        $this->deleteThumb($data->thumb);

        return $data->delete();
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

    public function deleteThumb($thumbName)
    {   
        Storage::disk('admin_storage_image')->delete("$this->folderUpload/".$thumbName);
    }

    public function uploadThumb($thumb)
    {
        $thumbName = $thumb->getClientOriginalName();
        $thumb->storeAs("$this->folderUpload", $thumbName, 'admin_storage_image');
        return $thumbName;
    }
}
