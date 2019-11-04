@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card-deck">
{{--        方法3 @each方法：第一个元素为循环的视图，第二元素为集合是那个，第三个元素为单个元素变量名字，第四个如果不纯在严格元素时，调用那个视图（可选）--}}
             @each('projects._card',$projects,'project')
        </div>
{{--        方法 1--}}
{{--        @if(count($projects))--}}
{{--        方法2 --}}
{{--        @if(!$projects->isEmpty())--}}
{{--            <div class="card-deck">--}}
{{--                @foreach ($projects as $project)--}}
{{--                    <div class="col-3 my-3">--}}
{{--                        <a href= 'projects/{{$project->id}}' class="card">--}}
{{--                            <img src="{{ asset('storage/thumbs/original/'.$project->thumbnail) }}" class="card-img-top" alt="...">--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title text-center">--}}
{{--                                    {{$project->name}}--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            @else--}}
{{--            <div>No projects for current user</div>--}}
{{--        @endif--}}


        @include('projects._createModel')
    </div>

@endsection

@section('customJS')
    <script>
        $(document).ready(function () {
            $('.icon-bar').hide();
            $('.project-card').hover(function () {
                $(this).find('.icon-bar').toggle();
            })
        })
    </script>
@endsection