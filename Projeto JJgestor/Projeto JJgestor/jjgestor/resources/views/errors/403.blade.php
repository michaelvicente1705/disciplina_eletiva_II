@extends('errors::minimal')

@section('title', __('Forbidden'))

@section('css')
    @import url('https://fonts.googleapis.com/css?family=Press+Start+2P');

    html,body{
    width: 100%;
    height: 100%;
    margin: 0;
    background: black;
    }

    *{
    font-family: 'Press Start 2P', cursive;
    box-sizing: border-box;
    }
    #app{
    padding: 1rem;
    background: black;
    display: flex;
    height: 500px;
    justify-content: center;
    align-items: center;
    color: #54FE55;
    text-shadow: 0px 0px 10px ;
    font-size: 5rem;
    flex-direction: column;


    }
    .txt {
    font-size: 1.8rem;
    }
    @keyframes blink {
    0%   {opacity: 0}
    49%  {opacity: 0}
    50%  {opacity: 1}
    100% {opacity: 1}
    }
    .erro{
    font-size: 3rem;
    }
    .blink {
    animation-name: blink;
    animation-duration: 0.5s;
    animation-iteration-count: infinite;
    }
@endsection

@section('message')
    <div id="app">

        <div><span class="erro">Error </span> 403<span class="blink">_</span>
        </div>
    </div>
@endsection
