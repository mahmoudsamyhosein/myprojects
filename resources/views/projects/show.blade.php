@extends('layouts.app')
@section('content')
<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
    <diV clss="h6 text-dark">
        <a href="/projects/{{$project->title}}">المشاريع/{{$project->title}}</a>
    </diV>
    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع  </a>
    </div>
</header>
<section class="row text-right" dir="rtl">
    <div class="col-lg-4">
        {{--project details--}}
        <div class="card text-right">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                    @case(1)
                        <span class="text-success">مكتمل</span>
                    @break
                    @case(2)
                        <span class="text-danger">ملغي</span>
                    @break
                    @default
                        <span class="text-warning">قيد الأنجاز</span>
                    @endswitch
                    <h5 class="font-weight-bold card-title">
                        <a href="/projects/{{$project->id}}">{{ $project->title}}</a>
                    </h5>
                    <div class="card-text mt-4">
                        {{($project->description) }}
                    </div>
                    
                </div>
                @include('projects.footer')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">تغيير حالة المشروع </h5>
                    <form action="/projects/{{$project->id}}" method="POST">
                     @csrf
                        @method("PATCH")
                        <select name="status" id="custom-select" onchange="this.form.submit()">
                            <option value="0"{{($project->status == 0) ? "selected" :""}}>قيد الأنجاز</option>
                            <option value="1"{{($project->status == 1) ? "selected" :""}}>مكتمل</option>
                            <option value="2"{{($project->status == 2) ? "selected" :""}}>ملغي</option>
                        </select>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-8">
        {{--tasks--}}
        @foreach ($project->tasks as $task)
        <div class="card d-flex flex-row mt-3 p-4 align-items-center">
            <div class="{{$task->done ? "checked muted" : "" }}">
                {{$task->body}}
            </div>
            
            <div class="mr-auto">
                <form action="/projects/{{$project->id}}/tasks/{{$task->id}} method="POST">
                    @csrf
                    @method("PATCH")
                    <input type="checkbox" name="done" class="form-control ml-4" {{$task->done ? "checked" : "" }} onchange="this.form.submit()">
                </form>
            </div>
            <div class="d-flex align-items-center ">
                <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                     @method("DELETE")
                     @csrf
                    <input type="submit" value="     " class="btn-delete mt-1">
                </form>
    
            </div>
        </div>  
        @endforeach

        <div class="card mt-4">
            <form action="/projects/{{$project->id}}/tasks" method="POST" class="d-flex p-3">
                @csrf
                <input type="text" name="body" class="form-control p-2 ml-2 border-0" placeholder="أضف مهمة جديدة">
                <button  type="submit" value="      " class="btn btn-primary">أضافة</button>
            </form>
        </div>
    </div>    

</section>

@endsection