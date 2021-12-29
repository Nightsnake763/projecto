@extends('layouts.app')

@section('content')
<section class="container">
    <view-products :categories="{{ $categories }}" :users="{{ $users }}"/>
</section>
@endsection
