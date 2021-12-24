@extends('layouts.app')

@section('content')
<section class="container">
    <index-category :categories="{{ $categories }}">
</section>
@endsection
