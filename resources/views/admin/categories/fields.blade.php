<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Categories</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">Category</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">



<!-- Category Field -->
<div class="form-group col-md-6 col-lg-4">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control category-class']) !!}
     <small class="text-danger">{{ $errors->first('category') }}</small>
</div>

<!-- Cat Meta Title Field -->
<div class="form-group col-md-6 col-lg-4">
    {!! Form::label('cat_meta_title', 'Cat Meta Title:') !!}
    {!! Form::text('cat_meta_title', null, ['class' => 'form-control cat_meta_title-class']) !!}
     <small class="text-danger">{{ $errors->first('cat_meta_title') }}</small>
</div>

<div class="clearfix"></div>


<!-- Cat Meta Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cat_meta_desc', 'Cat Meta Desc:') !!}
    {!! Form::text('cat_meta_desc', null, ['class' => 'form-control cat_meta_desc-class']) !!}
     <small class="text-danger">{{ $errors->first('cat_meta_desc') }}</small>
</div>

<div class="clearfix"></div>

<!-- / Cat Desc / Form Input -->
<div class="form-group col-md-12">
    {!! Form::label('cat_desc', 'Cat Desc:') !!}
    <div class="input-group">
    {!! Form::textarea('cat_desc', null, ['id' => 'id', 'rows' => '3', 'class' => 'form-control', 'placeholder' => ' Cat Desc ']) !!}
        <div class="input-group-addon">
            <i class="livicon" data-name="info" data-size="18" data-loop="false" data-c="#428BCA" data-hc="#428BCA" title="view info" data-toggle="collapse" href="#cat_desc-info" aria-expanded="false" aria-controls="cat_desc-info"></i>
        </div>
    </div>
    <div class="collapse" id="cat_desc-info">
        <div class="well"><medium class="list-group-item list-group-item-info">  / SCHEMA: itemprop=" "</medium>
        </div>
    </div>
    <span id="helpBlock" class="help-block">
    A block of help text that breaks onto a new line and may extend beyond one line. </span>
    <small class="text-danger">{{ $errors->first('cat_desc') }}</small>
</div>
<!-- / Cat Desc / END Form Input -->




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    The footer of the box
  </div><!-- box-footer -->
</div><!-- /.box -->
<div class="clearfix"></div>
