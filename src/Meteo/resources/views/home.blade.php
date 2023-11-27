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
                <input type="text" id="latitude" name="latitude" value="{{ old('latitude') }}" placeholder="" maxlength="100">
            </div>
            <div>
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" value="{{ old('longitude') }}" placeholder=""  maxlength="100">
            </div>
            <button type="submit">Forecast</button>
        </form>
        <div>
            @isset($res)
            <ul>
                <li><b>temperature_2m: </b> {{ $res['current']['temperature_2m'] }}</li>
                <li><b>wind_speed_10m: </b> {{ $res['current']['wind_speed_10m'] }}</li>
            <ul>
            @endisset
        </div>
    </div>
</article>
@endsection