@extends('layouts.app')

@section('content')
<section class="container">

    <store-products :id="{{ $id }}" :categories="{{ $categories }}"/>

</section>
@endsection
