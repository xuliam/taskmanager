{!! Form::open(['route'=>['tasks.destroy', $task1->id], 'method'=>'DELETE']) !!}
<button type="submit" class="btn btn-danger btn-sm">
    <i class="fa fa-times"></i>
</button>
{!! Form::close() !!}
