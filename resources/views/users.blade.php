@extends('layouts.app')

@section('content')
<section class="container">

    <users :users="{{ $users }}" :roles="{{ $roles }}"/>

</section>
@endsection
