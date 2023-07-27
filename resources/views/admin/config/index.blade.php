@extends('admin.layouts.layout')
@section('title', 'Cấu hình chung')
@section('content')
   <?php
    $router = '';
    if(!empty($record)){
       $router = route('admin.config.update',['id' => $record->id]);
    } else {
       $router = route('admin.config.store');
    }
   ?>
   @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Success!</strong> {{ Session::get('success') }}
      </div>
   @endif
   @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade in">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
         @endforeach
      </div>
   @endif

   <form action="{{$router}}" method="post">
      @csrf
   <div class="content" style="margin-left: 5px;background: white">
      <div class="row">
         <div class="col-sm-4">
            <div class="box box-default">
               <div class="box-header with-border">
                  <h3 class="box-title">
                     Logo
                  </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="avatar_container_logo text-center form-group {{ empty($record) ? 'hide' : '' }}">
                     <img src="{{ !empty($record) ? $record->logo : '' }}" class="img_avatar_logo img-responsive"/>
                     {!! Form::hidden('logo', old('logo'), ['class' => 'input_avatar_logo']) !!}
                  </div>
                  <div class="text-center">
                     <div class="btn btn-default btn_choose_avatar_logo {{ !empty($record) ? 'hide' : '' }}">
                        <i class="fa fa-image"></i> Click chọn ảnh đại diện
                     </div>
                     <div class="btn btn-danger btn_delete_avatar_logo {{ empty($record) ? 'hide' : '' }}">
                        <i class="fa fa-close"></i> Xóa logo
                     </div>
                  </div>
                  <span class="help-block text-red validation_error hide validation_avatar_logo"></span>
               </div>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="box box-default">
               <div class="box-header with-border">
                  <h3 class="box-title">
                     ThumbNail
                  </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="avatar_container text-center form-group {{ empty($record) ? 'hide' : '' }}">
                     <img src="{{ !empty($record) ? $record->image : '' }}" class="img_avatar img-responsive"/>
                     {!! Form::hidden('image', old('image'), ['class' => 'input_avatar']) !!}
                  </div>
                  <div class="text-center">
                     <div class="btn btn-default btn_choose_avatar {{ !empty($record) ? 'hide' : '' }}">
                        <i class="fa fa-image"></i> Click chọn ảnh đại diện
                     </div>
                     <div class="btn btn-danger btn_delete_avatar {{ empty($record) ? 'hide' : '' }}">
                        <i class="fa fa-close"></i> Xóa Thumbnail
                     </div>
                  </div>
                  <span class="help-block text-red validation_error hide validation_avatar"></span>
               </div>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="box box-default">
               <div class="box-header with-border">
                  <h3 class="box-title">
                     Favicon
                  </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="avatar_container_favicon text-center form-group {{ empty($record) ? 'hide' : '' }}">
                     <img src="{{ !empty($record) ? $record->favicon : '' }}" class="img_avatar_favicon img-responsive"/>
                     {!! Form::hidden('favicon', old('favicon'), ['class' => 'input_avatar_favicon']) !!}
                  </div>
                  <div class="text-center">
                     <div class="btn btn-default btn_choose_avatar_favicon {{ !empty($record) ? 'hide' : '' }}">
                        <i class="fa fa-image"></i> Click chọn ảnh đại diện
                     </div>
                     <div class="btn btn-danger btn_delete_avatar_favicon {{ empty($record) ? 'hide' : '' }}">
                        <i class="fa fa-close"></i> Xóa favicon
                     </div>
                  </div>
                  <span class="help-block text-red validation_error hide validation_avatar_favicon"></span>
               </div>
            </div>
         </div>
      </div>
      <div class="box box-default">
         <div class="box-header with-border">
            <h3 class="box-title">
               SEO
            </h3>
            <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
               </button>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="form-group">
               <label class="control-label">Seo Title</label>
               {!! Form::text('seo_title', !empty($record->seo_title) ? $record->seo_title : '', ['class' => 'form-control']) !!}
               <span class="help-block text-red validation_error hide validation_seo_title"></span>
            </div>

            <div class="form-group">
               <label class="control-label">Seo Description</label>
               {!! Form::textarea('seo_description', !empty($record->seo_description) ? $record->seo_description : '', ['class' => 'form-control']) !!}
               <span class="help-block text-red validation_error hide validation_seo_description"></span>
            </div>

            <div class="form-group">
               <label class="control-label">Seo Keyword</label>
               {!! Form::text('seo_keyword', !empty($record->seo_keyword) ? $record->seo_keyword : '', ['class' => 'form-control']) !!}
               <span class="help-block text-red validation_error hide validation_seo_keyword"></span>
            </div>

         </div>
      </div>
      <button class="btn btn-primary" type="submit">Lưu cấu hình</button>
   </div>

   </form>
@endsection
@section('script')
   @include('admin.layouts.elements.ckeditor_script')
   <script>
      $('.btn_choose_avatar_favicon').click(function () {
         CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
               finder.on( 'files:choose', function( evt ) {
                  var file = evt.data.files.first();
                  var url = file.getUrl();
                  $('.input_avatar_favicon').val(url);
                  $('.img_avatar_favicon').attr('src', url);
                  $('.avatar_container_favicon').removeClass('hide');
                  $('.btn_delete_avatar_favicon').removeClass('hide');
                  $('.btn_choose_avatar_favicon').addClass('hide');
               } );

               finder.on( 'file:choose:resizedImage', function( evt ) {
                  var url = evt.data.resizedUrl;
                  $('.input_avatar_favicon').val(url);
                  $('.img_avatar_favicon').attr('src', url);
                  $('.avatar_container_favicon').removeClass('hide');
                  $('.btn_delete_avatar_favicon').removeClass('hide');
                  $('.btn_choose_avatar_favicon').addClass('hide');
               } );
            }
         } );
      });

      $('.btn_delete_avatar_favicon').click(function () {
         $('.input_avatar_favicon').val('');
         $('.img_avatar_favicon').attr('src', '');
         $('.avatar_container_favicon').addClass('hide');
         $('.btn_delete_avatar_favicon').addClass('hide');
         $('.btn_choose_avatar_favicon').removeClass('hide');
      });

      //Logo url
      $('.btn_choose_avatar_logo').click(function () {
         CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
               finder.on( 'files:choose', function( evt ) {
                  var file = evt.data.files.first();
                  var url = file.getUrl();
                  $('.input_avatar_logo').val(url);
                  $('.img_avatar_logo').attr('src', url);
                  $('.avatar_container_logo').removeClass('hide');
                  $('.btn_delete_avatar_logo').removeClass('hide');
                  $('.btn_choose_avatar_logo').addClass('hide');
               } );

               finder.on( 'file:choose:resizedImage', function( evt ) {
                  var url = evt.data.resizedUrl;
                  $('.input_avatar_logo').val(url);
                  $('.img_avatar_logo').attr('src', url);
                  $('.avatar_container_logo').removeClass('hide');
                  $('.btn_delete_avatar_logo').removeClass('hide');
                  $('.btn_choose_avatar_logo').addClass('hide');
               } );
            }
         } );
      });

      $('.btn_delete_avatar_logo').click(function () {
         $('.input_avatar_logo').val('');
         $('.img_avatar_logo').attr('src', '');
         $('.avatar_container_logo').addClass('hide');
         $('.btn_delete_avatar_logo').addClass('hide');
         $('.btn_choose_avatar_logo').removeClass('hide');
      });
   </script>
@endsection