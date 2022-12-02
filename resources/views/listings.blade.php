<h1>{{$heading}}</h1>
@foreach ($listings as $list)
    <h3>{{$list['title']}}</h3>
    <p>{{$list['description']}}</p>
@endforeach