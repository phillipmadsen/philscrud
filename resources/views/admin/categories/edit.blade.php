@extends('app')
@section('content')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">category</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">$category</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="container-fluid">
      @include('common.errors')
      {!! Form::model(category, ['route' => ['admin.categories.update', category->id], 'method' => 'patch']) !!}
      @include('admin.categories.fields')
      {!! Form::close() !!}
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    The footer of the box
  </div><!-- box-footer -->
</div><!-- /.box -->
@endsection
