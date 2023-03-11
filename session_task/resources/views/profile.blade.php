@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <div class="card mb-4">
            <div class="card-header">
                Sessions
            </div>
            <div class="card-body">
                <p>Number of sessions: {{ $sessions->count() }}</p>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Device name</th>
                        <th>IP Address</th>
                        <th>date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sessions as $session)
                        <tr>
                            <td>{{$session->user_agent}}</td>
                            <td>{{ $session->ip_address }}</td>
                            <td>{{ $session->date }}</td>
                            <td>
                                <form action="{{ route('sessions.terminate', $session->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-danger" type="submit">Terminate</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <form action="{{ route('sessions.terminateAll') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Terminate All</button>
                </form>
            </div>
        </div>
    </div>
@endsection
