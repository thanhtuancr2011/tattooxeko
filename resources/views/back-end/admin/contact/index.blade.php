@extends('back-end.admin.master')
@section('title')
    Thêm liên hệ
@endsection
@section('content')
    
    <!-- Page Content -->
    <div id="page-wrapper" data-ng-controller="ContactController">
        <div class="container-fluid hidden">
            <div class="modal-body">
                <div class="innerAll">
                    <div class="col-lg-12">
                        <h3 class="page-header">Nhập liên hệ</h3>
                    </div>
                    <div class="innerLR">
                        <form method="POST" accept-charset="UTF-8" name="formContact">
                            <input type="hidden" name="_token" value="csrf_token()" />
                            <div class="form-group">
                                <label for="last_name"></label>
                                <div class="">
                                    <textarea class="form-control" rows="5" id="description" name="description" placeholder="Mô tả" ng-model="contactItem.description">
                                    </textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div ng-if="messageSuccess" class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @{{messageSuccess}}
            </div>
            <div style="padding-top: 30px" class="form-group center-block pull-right">
                <button class="btn btn-primary" ng-click="submit()">
                <i class="fa fa-plus"></i>
                <span>Hoàn tất</span>
                </button>
                <button class="btn btn-primary" ng-click="cancel()"><i class="fa fa-times"></i> Hủy</button>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        window.contactItem = {!! json_encode($contact) !!}
    </script>
    {!! Html::script('/bower_components/ckeditor/ckeditor.js?v='.getVersionScript())!!}
    {!! Html::script('/bower_components/ckeditor/adapters/jquery.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/back-end/contact/ContactService.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/back-end/contact/ContactController.js?v='.getVersionScript())!!}
@endsection