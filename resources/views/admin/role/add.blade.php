@extends('layouts.app')

@section('content')
<section class="container mt-5">
    <index-role :roles="{{ $roles }}">
</section>
@endsection
