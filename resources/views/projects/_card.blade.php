<div class="col-3 my-3">
    <div  class="card project-card">

        <ul class="icon-bar">
            <li>
                {!! Form::open(['route'=>['projects.destroy', $project->id], 'method'=>'DELETE']) !!}
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-times"></i>
                    </button>
                {!! Form::close() !!}
            </li>
            <li>
                        <i class="fa fa-btn fa-cog"></i>
            </li>
        </ul>
            <a href= 'projects/{{$project->id}}'>
                <img src="{{ asset('storage/thumbs/original/'.$project->thumbnail) }}" class="card-img-top" alt="...">
            </a>
{{--        padding py-3 --}}
        <div class="card-body py-3">
            <a href= 'projects/{{$project->id}}'>
                <h5 class="card-title text-center">
                    {{$project->name}}
                </h5>
            </a>
        </div>
    </div>
</div>