@extends('layouts.app')

@section('content')
<section class="container">
    <buy-product :product="{{ $product }}"/>
</section>
@endsection
