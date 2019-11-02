
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProject">
    <i class="fas fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="createProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!!Form::open(['route'=>'projects.store', 'method'=>'post', 'files'=>'true']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="createProjectLabel">new project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name','Project Name:') !!}
                        {!! Form::text('name','',['class'=>'form-control']) !!}
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

