@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Scores for: {{ Str::of($league)->after('soccer_')->replace('_', ' ')->title() }}</h2>

    <a href="{{ route('scores.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if (empty($scores))
        <div class="alert alert-warning">No score data available.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Teams</th>
                    <th>Status</th>
                    <th>Score</th>
                    <th>Commence Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $match)
                    <tr>
                        <td>{{ $match['home_team'] }} vs {{ $match['away_team'] }}</td>
                        <td>{{ $match['completed'] ? 'Completed' : 'Upcoming' }}</td>
                        <td>
                            {{ $match['scores']['home_score'] ?? '-' }} : {{ $match['scores']['away_score'] ?? '-' }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($match['commence_time'])->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
