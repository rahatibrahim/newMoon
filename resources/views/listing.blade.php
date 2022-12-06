@extends('layout')

{{-- <?php dd($listing); ?> --}}
@section('content')

<h2>
    {{$listing->title}}
</h2>
<p>
    {{$listing->description}}
</p>

@endsection