@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengecekan 2 Free Input') }}</div>

                <div class="card-body">
                    <ul>Task :</ul>
                    <li>Buat suatu fitur untuk pengecekan dua free input dari user, dan system akan menghitung berapa persen karakter dari input pertama ada di input kedua dan akan dimunculkan ke user.</li>
                    <li>Contoh</li>
                    <ol>
                        <li>Input 1: ABBCD </li>
                        <li>Input 2: Gallant Duck</li>
                    </ol>
                    <li>Karena karakter A dan D ada muncul di Gallant Duck, berarti 2 / 5 karakter (ABBCD = 5 karakter) itu muncul di input kedua, maka hasil = 40%.</li>
                </div>
            </div>
        </div>
       @if(isset($data))
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Jawaban') }}</div>

                <div class="card-body">
                    <ul>Input 1 : {{$data['a']}}</ul>
                    <ul>Input 2 : {{$data['b']}}</ul>
                    <ul>Hasil : {{$data['persen']}}</ul>
                    <ul>Bobot : </ul>
                    <ol>
                        @if(isset($data['bobot']))
                            @foreach($data['bobot'] as $value)
                            <li>Abjad : {{$value['abjad']}}, Jumlah : {{$value['jml']}}</li>
                            @endforeach
                        @endif
                    </ol>
                    
                </div>
            </div>
        </div>
       @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form') }}</div>
                <div class="card-body">
                    <div class="container">
                       <form action="{{ route('test') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Input 1 :</strong>
                                        <input type="text" name="a" class="form-control" placeholder="Input A">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Input 2 :</strong>
                                        <input type="text" class="form-control" name="b" placeholder="Input B">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
