@extends('layouts.app')

@section('content')
<article>
    <div class="grid">
        <form action="{{ route('forecast') }}" method="POST">
            @csrf
            @if ($errors->any())
            <ul class="error">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div>
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" name="latitude" value="{{ old('latitude', $latitude) }}" placeholder="" maxlength="20">
            </div>
            <div>
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" value="{{ old('longitude', $longitude) }}" placeholder=""  maxlength="20">
            </div>
            <button type="submit">Forecast</button>
        </form>
        <div style="padding: 20px">
            @isset($res['current'])
            <ul>
                <li><b>time: </b> {{ $res['current']['time'] }}</li>
                <li><b>interval: </b> {{ $res['current']['interval'] }}</li>
                <li><b>temperature_2m: </b> {{ $res['current']['temperature_2m'] }}</li>
                <li><b>wind_speed_10m: </b> {{ $res['current']['wind_speed_10m'] }}</li>
            <ul>
            @endisset

            @isset($res['error'])
            <ul class="error">
                <li><b>Error: </b> {{ $res['reason'] }}</li>
            <ul>
            @endisset
        </div>
    </div>
</article>
@endsection