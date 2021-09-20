@extends('layouts.app')


@section("title","تعديل المشروع")
@section('content')
<div class="row justify-content-center text-right">
    <div class="col-8">
        <div class="card P-5">
            <h3 class="text-center pd-5 font-weight-bold">
                مشروع جديد
            </h3>
            <form action="/projects/{{$project->id}}" method="POST" dir="rtl">
                 @method("PATCH")
                @include('projects.form')
                <div class="form-group d-flex flex-row-reverse">
                    <button type"submit" class="btn btn-primary"> تعديل</button>
                    <a href="/projects" class="btn btn-light">ألغاء</a>
                </div>
            </form>
     </div>
    </div>
</div>
    
@endsection