@extends('app')
@section('pagetitle')
 <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Category
                <small> Category Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{!! url('admin.categories') !!}"><span class="glyphicons glyphicons-list"></span> Categories</a></li>
                <li class="active">Categories</li>
            </ol>
        </section>
@endsection
@section('content')
<div class="container-fluid">
    <div class="box box-primary">


        @include('common.errors')

        {!! Form::open(['route' => 'admin.categories.store']) !!}

            @include('admin.categories.fields')

        {!! Form::close() !!}


    </div>
</div>
@endsection
