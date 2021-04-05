@extends('layouts.app')

@section('content')
    <h3>Hi, {{$playerName}}</h3>

    <table>
        <thead>
            <tr>
                <th>Territory Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($territories as $territory)
                <tr>
                    <td data-label="Territory Name">{{$territory}}</td>
                    <td data-label="Action"><a href="{{ route('territory', ['territory' => $territory])}}">Go to</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection