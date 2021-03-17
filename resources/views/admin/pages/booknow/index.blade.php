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
              </div>
              <div class="card-body">
                <table id="admin-table" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <td>STT</td>
                      <td>Tên	</td>
                      <td>Email	</td>
                      <td>Thời gian đặt lịch	</td>
                      <td>Số điện thoại	</td>
                      <td>Mô tả	</td>
                      <td>Trạng thái liên hệ	</td>
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
                        <td class="name"> {{$value->name}}</td>
                        <td> {{$value->email}}</td>
                        <td> {{$value->time}}</td>
                        <td> {{$value->phone}}</td>
                        <td> {{$value->description}}</td>
                        <td> {!! Helper::showButtonStatus($value->status_contact,$prefix,$value->id,'status-contact') !!} </td>
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
                <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" >Kích hoạt</option>
                    <option value="0">Chưa kích hoạt</option>
                </select>
            </div>
            <div class="form-group">
              <label for="status" class="control-label">Trạng thái liên hệ</label>
              <select class="form-control" id="status-contact" name="status_contact">
                  <option value="1" >Đã liên hệ</option>
                  <option value="0">Chưa liên hệ</option>
              </select>
          </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <img class="d-none img-fluid" src="" alt="">
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
            let status          = rowParent.find(".btn-status-ajax");
            let statusContact   = rowParent.find(".status-contact");

            let formEdit = $('#form-edit');

            formEdit.attr('action', formEdit.attr('action').slice(0, -1) + id);

            $("#status").val(status.attr('data-value'));
            $("#status-contact").val(statusContact.attr('data-value'));
        });

      </script>
  @endsection
@endsection
