@extends('layouts.app')

@section('content')
<section class="container">

    <index :categories = '{{ $categories }}'/>

</section>
@endsection
