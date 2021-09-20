@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تفعيل الحساب') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('تم ارسال كود تفعيل الي بريدك الالكتروني') }}
                        </div>
                    @endif

                    {{ __('قبل البدء يرجي التاكد من بريدك الالكتروني تم ارسال كود التفعيل') }}
                    {{ __('اذا لم تستلم بريد التفعيل') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('أضغط هنا لارسال كود جديد') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
