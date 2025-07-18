@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Select a League</h2>
    <form action="{{ route('scores.show') }}" method="GET" class="mt-3">
        <div class="form-group">
            <label for="league">League:</label>
            <select name="league" id="league" class="form-control" required>
                <option value="">-- Select League --</option>
                @foreach ($leagues as $league)
                    <option value="{{ $league }}">{{ Str::of($league)->after('soccer_')->replace('_', ' ')->title() }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Show Scores</button>
    </form>
</div>
@endsection
