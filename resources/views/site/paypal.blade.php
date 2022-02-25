@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container my-bills mx-auto">
        <form action="{{ route('paypal.charge') }}" method="post">
            <input type="text" name="amount" value="1" />
            {{ csrf_field() }}
            <input type="submit" name="submit" value="Pay Now">
        </form>
    </div><!--page container-->
@endsection

@section('js')
@endsection
