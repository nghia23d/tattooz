<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Feedback extends Model
{
    protected $table    = 'feedback';
    protected $fillable = ['id','name','star','description','status','thumb'];
    protected $folderUpload = 'feedback';
    const ACTIVE   = 1;
    const INACTIVE = 0;

    public function getListData($task)
    {
        if($task == 'list-data-admin'){
            return self::get();
        }
        
        if($task == 'list-data-home'){
            return self::where('status',self::ACTIVE)->get();
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
