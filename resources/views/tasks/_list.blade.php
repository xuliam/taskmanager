<nav>
    <div class="nav nav-tabs" id="myTab" role="tablist">
        <a class="nav-item nav-link active" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="true">Progressing</a>
        <a class="nav-item nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="false">Complete</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="todo" role="tabpanel" aria-labelledby="todo-tab">
        @if (count($todos))
            <table class="table table-striped">
                @foreach($todos as $task1)
                    <tr>
                        <td>{{$task1->name}}</td>
                        <td>@include('tasks._checkForm')</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
    <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
        @if (count($dones))
            <table class="table table-striped">
                @foreach($dones as $task)
                    <tr>
                        <td>{{$task->name}}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>