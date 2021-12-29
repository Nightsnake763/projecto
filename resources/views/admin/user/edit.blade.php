@extends('layouts.app')

@section('content')
<section class="container mt-5">
    <edit-users :roles="{{ $roles }}"/>
</section>
@endsection
