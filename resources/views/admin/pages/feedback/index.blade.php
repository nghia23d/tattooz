@extends('admin.layout')
@section('content')
@php
    use App\Helpers\Helper;
@endphp
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">Bảng dữ liệu</h3>
                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modal-add" type="button">Thêm mới</button>
              </div>
              <div class="card-body">
                <table id="admin-table" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <td>STT</td>
                      <td>Tên</td>
                      <td>Số sao</td>
                      <td>Mô tả</td>
                      <td>Trạng thái	</td>
                      <td>Ngày tạo</td>
                      <td>Ngày chỉnh sửa</td>
                      <td>Thao tác</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                      <tr id="row-{{$value->id}}">
                        <td>{{$key + 1}}</td>
                        <td>
                          <p> <b>Tên: </b> <span class="name">{{$value->name}}</span>  </p> 
                          <img class="img-fluid thumb" src="{{asset('admin/images/'.$prefix."/$value->thumb")}}" alt="{{$value->thumb}}">
                        </td>
                        <td><span class="star">{{$value->star}}</span></td>
                        <td><span class="description">{{$value->description}}</span></td>
                        <td>{!! Helper::showButtonStatus($value->status,$prefix,$value->id)!!}</td>
                        <td>{{ Helper::formatDateTime($value->created_at)}}</td>
                        <td>{{ Helper::formatDateTime($value->updated_at)}}</td>
                        <td class='d-flex'>
                          <button class="btn btn-secondary btn-edit d-inline mr-3" data-id="{{$value->id}}">Sửa</button>
                          <form action="{{ route($prefix.'.destroy',$value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm mới {{$prefix}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route($prefix.'.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal form-label-left" id="main-form">
            @csrf
            <div class="form-group">
                <label for="name" >Name</label>
                <input class="form-control" name="name" type="text">
            </div>
            <div class="form-group">
                <label for="star" >Số sao</label>
                <select class="form-control" name="star">
                  <option value="5">5 Sao</option>
                  <option value="4">4 Sao</option>
                  <option value="3">3 Sao</option>
                  <option value="2">2 Sao</option>
                  <option value="1">1 Sao</option>
                  <option value="0">0 Sao</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description" >Mô tả</label>
              <input class="form-control" name="description" type="text">
            </div>
            <div class="form-group">
                <label for="status" class="control-label">Status</label>
                <select class="form-control" name="status">
                    <option value="1" >Kích hoạt</option>
                    <option value="0">Chưa kích hoạt</option>
                </select>
            </div>
            <div class="form-group">
                <label for="thumb" class="control-label">Thumb</label>
                <input class="form-control" name="thumb" type="file"> 
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelEdit">Chỉnh sửa {{$prefix}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-edit" method="POST" action="{{route($prefix.'.update',0)}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal form-label-left">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" >Name</label>
                <input class="form-control" name="name" type="text"  id="name">
            </div>
            <div class="form-group">
                <label for="star" >Chức Vụ</label>
                <select class="form-control" name="star" id="star">
                  <option value="5">5 Sao</option>
                  <option value="4">4 Sao</option>
                  <option value="3">3 Sao</option>
                  <option value="2">2 Sao</option>
                  <option value="1">1 Sao</option>
                  <option value="0">0 Sao</option>
                </select>
            </div>
            <div class="form-group">
              <label for="description" >Mô tả</label>
              <input class="form-control" name="description" type="text" id="description">
            </div>
            <div class="form-group">
                <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" >Kích hoạt</option>
                    <option value="0">Chưa kích hoạt</option>
                </select>
            </div>
            <div class="form-group">
                <label for="thumb" class="control-label">Thumb</label>
                <input class="form-control" name="thumb" type="file"> 
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <img class="d-none img-fluid" id="thumb" src="" alt="">
            <input type="hidden" name="thumb_old" id="thumb_old">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @section('js')
      <script>
      
        $('.btn-edit').click(function() {
            $("#modal-edit").modal({backdrop: 'static', keyboard: false});
           
            let id              = $(this).data('id');
            let rowParent       = $('tr#row-'+id);	
            let name            = rowParent.find(".name");
            let star            = rowParent.find(".star");
            let description     = rowParent.find(".description");
            let status          = rowParent.find(".btn-status-ajax");
            let thumb           = rowParent.find(".thumb");

            let formEdit = $('#form-edit');
            
            formEdit.attr('action', formEdit.attr('action').slice(0, -1) + id);
            
            $('#name').val(name.html());
            $('#star').val(star.html());
            $("#status").val(status.attr('data-value'));  
            $("#description").val(description.html());  
            $('#thumb').attr('src',thumb.attr('src')).removeClass('d-none');
            $('#thumb_old').val(thumb.attr('alt'));
        });

      </script>
  @endsection
@endsection