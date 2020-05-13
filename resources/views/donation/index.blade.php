@extends('base')

@section('main')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Donations</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('donation.create')}}" class="btn btn-primary">New donation</a>
            </div>
            <div class="col-sm-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Date</td>
                    <td class="text-right">Debit</td>
                    <td class="text-right">Credit</td>
                    <td class="text-right">Balance</td>

                </tr>
                </thead>
                <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <td>{{$donation->created_at}}</td>
                        <td class="text-right">{{$donation->debit}}</td>
                        <td class="text-right">{{$donation->credit}}</td>
                        <td class="text-right">{{$donation->balance}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
