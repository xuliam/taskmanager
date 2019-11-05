
<!-- Modal -->
<div class="modal fade" id="editProjectModal-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="editProjectModal-{{$project->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProjectModal-{{$project->id}}">Edit Project:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
{{--            Form表单改成model,后面跟一个参数指定表单，然后把下面表单改为null 就会显示以前数据--}}
            {!!Form::model($project,['route'=>['projects.update', $project->id], 'method'=>'PATCH', 'files'=>'true']) !!}

            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name','Project Name:') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('thumbnail','Project Pic:') !!}
                    {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
                </div>
                @include('errors._errors')
            </div>
            <div class="modal-footer">
                {{--                    这个errors是系统本身的一个全局变量--}}

                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
            {!!Form::close() !!}
        </div>
    </div>
</div>