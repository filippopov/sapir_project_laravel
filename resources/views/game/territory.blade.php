@extends('layouts.app')

@section('content')
    <div>
        <div>
            <span>Player Name: </span>{{$player->getName()}}</span>
        </div>
        <div>
            <span>Player Health: </span>{{$playerHealth}}</span>
        </div>
        <div>
            <span>Player Strength: </span>{{$player->getStrength()}}</span>
        </div>
        <div>
            <span>Player Defence: </span>{{$player->getDefence()}}</span>
        </div>
        <div>
            <span>Player Speed: </span>{{$player->getSpeed()}}</span>
        </div>
        <div>
            <span>Player Luck: </span>{{$player->getLuck()}}</span>
        </div>
    </div>
    <br>
    <br>
    <div>
        <div>
            <span>Wild Beasts Name: </span>{{$wildBeasts->getName()}}</span>
        </div>
        <div>
            <span>Wild Beasts Health: </span>{{$wildBeastsHealth}}</span>
        </div>
        <div>
            <span>Wild Beasts Strength: </span>{{$wildBeasts->getStrength()}}</span>
        </div>
        <div>
            <span>Wild Beasts Defence: </span>{{$wildBeasts->getDefence()}}</span>
        </div>
        <div>
            <span>Wild Beasts Speed: </span>{{$wildBeasts->getSpeed()}}</span>
        </div>
        <div>
            <span>Wild Beasts Luck: </span>{{$wildBeasts->getLuck()}}</span>
        </div>
    </div>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>Round Number</th>
                <th>Text 1</th>
                <th>Text 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roundData as $key => $data)
                <?php
                    
                    $text1 = isset($data['text1']) ? $data['text1'] : '';
                    $text2 = isset($data['text2']) ? $data['text2'] : '';
                ?>
                <tr>
                    <td data-label="Round Number">>{{$key}}</td>
                    <td data-label="Text 1">{{$text1}}</td>
                    <td data-label="Text 2">{{$text2}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Winner: {{$winner}}</h3>
    <a href="{{ route('home')}}">Return to Home page</a>
@endsection

