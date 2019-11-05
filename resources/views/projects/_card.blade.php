<div class="col-3 my-3">
    <div  class="card project-card">

        <ul class="icon-bar">
            <li>
                @include('projects._deleteForm')
            </li>
            <li>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProjectModal-{{$project->id}}">
                    <i class="fa fa-btn fa-cog"></i>
                </button>

            </li>
        </ul>
            <a href= '{{route('projects.show', $project->id)}}'>
                <img src="{{ asset('storage/thumbs/original/'.$project->thumbnail) }}" class="card-img-top" alt="...">
            </a>
{{--        padding py-3 --}}
        <div class="card-body py-3">
            <a href= '{{route('projects.show', $project->id)}}'>
                <h5 class="card-title text-center">
                    {{$project->name}}
                </h5>
            </a>
        </div>
    </div>

  @include('projects._editModal')

</div>