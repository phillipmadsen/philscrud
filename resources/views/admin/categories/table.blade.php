<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! $categories !!}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                        <th>Category</th>
			<th>Cat Desc</th>
			<th>Cat Meta Title</th>
			<th>Cat Meta Desc</th>
                        <th width="50px">Action</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{!! $category->category !!}</td>
			<td>{!! $category->cat_desc !!}</td>
			<td>{!! $category->cat_meta_title !!}</td>
			<td>{!! $category->cat_meta_desc !!}</td>
                                <td>
                                    <a href="{!! route('admin.categories.edit', [$category->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{!! route('admin.categories.delete', [$category->id]) !!}" onclick="return confirm('Are you sure wants to delete this Category?')"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>