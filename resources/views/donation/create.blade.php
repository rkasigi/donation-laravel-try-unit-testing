@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a donation</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('donation.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="donation_amount">Donation amount:</label>
                        <input type="text" class="form-control" name="donation_amount"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add amount</button>
                    <a href="{{ route("donation.index") }}" class="btn btn-outline-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
