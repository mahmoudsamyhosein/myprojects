@extends('layouts.app')

@section('title',"الملف الشخصي")
@section("content")
<!-- هناك خطأ لا يتم تعديل بيانات المستخدم !-->
<div class="row">
    <div class="col md-6 mx-auto">
        <div class ="card p-5">
            <div class="text-center">
                <img src="{{asset("storage/" . auth()->user()->image)}}" alt="" width="82px" height="82px">
                <h3 class="mt-4 font-weight-bold">
                    {{auth()->user()->name}}
                </h3>
            </div>
            <div class="card-body text-right">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <lablel for="name">الأسم</lablel>
                        <input type="text" name="name" id="name" class="form-control" value={{ auth()->user()->name }}>
                        @error("name")
                        <div class="text-danger">
                            <small>{{$message}}</small>
                        </div>
                
                    @enderror
                    </div>

                    <div class="form-group">
                        <lablel for="name">البريد الألكتروني</lablel>
                        <input type="email" name="email" id="email" class="form-control" value={{ auth()->user()->email }}>
                    </div>
                    @error("email")
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
            
                    @enderror

                    <div class="form-group">
                        <lablel for="name">الرقم السري </lablel>
                        <input type="password" name="password" id="password" class="form-control" >
                    </div>
                    @error("password")
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
            
                    @enderror

                    <div class="form-group">
                        <lablel for="name">تأكيد الرقم السري </lablel>
                        <input type="password" name="password-confirmation" id="password-confirmation" class="form-control" >
                    </div>
                    @error("password-confirmation")
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
            
                    @enderror
                    <div class="form-group">
                        <lable for="image">تغيير الصورة الشخصية</lable>
                        <div class="custom-file">
                            <input type="file"name="image" id="image" class="custom-file-input">
                            <label for="image" id="image-label" class="custom-file-label text-left" data-browse="استعرض"></label>
                        </div>
                    </div>
                    @error("image")
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
            
                    @enderror
                    <div class="form-group d-flex mt-5 flex-row-reverse<button type="submit" class="btn btn-primary mr-2">
                        <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                        <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                    </div>
                </form>
                <form action="/logout" id="logout" method="POST">
                    @csrf
                </form>
            </div>
    </div>
</div>
<script>
    document.getElementById("image").onchange=uploadonchange;
    function uploadonchange(){
        let filename = this.value;
        let lastindex = filename.lastindexof("\\");

        if(lastindex >= 0){
            filename = filename.substring(lastindex +1);
        }
        document.getElementById("image-label").innerHTML =filename;
    }
</script>
@endsection