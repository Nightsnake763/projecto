@extends('layouts.app')

@section('content')
<section class="container">
    <index-role :roles="{{ $roles }}">
</section>
@endsection
