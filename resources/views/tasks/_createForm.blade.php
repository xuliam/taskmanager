{!! Form::open(['route'=>'tasks.store','method'=>'post']) !!}
<div class="input-group mb-2">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="fa fa-plus"></i>
        </div>
    </div>
    {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'put in something']) !!}
    {!! Form::hidden('project', $project->id)!!}
</div>
{!! Form::close() !!}
