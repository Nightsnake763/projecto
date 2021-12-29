@extends('layouts.app')

@section('content')
<section class="container">
    <my-products :products="{{ $products }}" :categories="{{ $categories }}"/>
</section>
@endsection
