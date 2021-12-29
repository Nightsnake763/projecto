@extends('layouts.app')

@section('content')
<section class="container">
    <view-category :category="{{ $category }}" :products="{{ $products }}"/>
</section>
@endsection
