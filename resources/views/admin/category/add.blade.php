@extends('layouts.app')

@section('content')
<section class="container mt-5">
    <index-category :categories="{{ $categories }}">
</section>
@endsection
