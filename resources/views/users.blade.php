@extends('layouts.app')

@section('content')
<section class="container">

    <edit-users :users="{{ $users }}" :roles="{{ $roles }}"/>

</section>
@endsection
