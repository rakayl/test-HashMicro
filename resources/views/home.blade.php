@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nested Loop, Nested If, Mathematics') }}</div>

                <div class="card-body">
                    <ul>Task :</ul>
                    <ol>
                    <li>Isikan proses di dalam fungsi mergeSortArray() untuk menyatukan array int a dan array int b. Lalu setelah itu di sort secara ascending.</li>
                    <li>Iesikan proses di dalam fungsi getMissingData() untuk mencari integer yang hilang berdasarkan pola angka dari hasil fungsi mergeSortArray().</li>
                    <li>Isikan pross di dalam fungsi insertMissingData() untuk memasukkan integer yang hilang dari hasil fungsi getMissingData() ke dalam array hasil fungsi mergeSortArray().</li>
                    <li>Hasil yang diharapkan adalah pola angka yang tersusun tanpa ada integer yang hilang.</li>
                    </ol>
                    <ul>Syarat :</ul>
                    <ol>
                    <li>Tidak menggunakan fungsi bawaan PHP seperti </li>
                            <ol>
                            <li>array_merge()</li>
                            <li>array_push()</li>
                            <li>asort()</li>
                            <li>dsb.</li>
                            </ol>
                    <li>Kerjakan menggunakan logic pemograman</li>
                    </ol>
                </div>
            </div>
        </div>
       @if(isset($data))
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Jawaban') }}</div>

                <div class="card-body">
                    <ul>Array A : {{$data['a']}}</ul>
                    <ul>Array B : {{$data['b']}}</ul>
                    <ul>Merge Sort Array: {{$data['sortArray']}}</ul>
                    <ul>Missing Data : {{$data['missingData']}}</ul>
                    <ul>Insert Missing Data : {{$data['insertMissingData']}}</ul>
                    
                </div>
            </div>
        </div>
       @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form') }}</div>
                <div class="card-body">
                    <div class="container mt-5">
                       <form action="{{ route('home') }}" method="POST">
                          @csrf
                            
                            <div class="repeater">
                                 <strong>Array A:</strong>
                                <div data-repeater-list="array">
                                    <div data-repeater-item>
                                        <div class="row mt-3">
                                            <div class="col-5">
                                                 <input type="number" name="a" required class="form-control" />
                                            </div>
                                            <div class="col-2">
                                                <button data-repeater-delete class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                <button data-repeater-create type="button" class="btn btn-success float-left mt-3">Add</button>
                              </div>
                          <hr> 
                            <div class="repeater">
                                <strong>Array B:</strong>
                                <div data-repeater-list="array">
                                    <div data-repeater-item>
                                        <div class="row mt-3">
                                            <div class="col-5">
                                                 <input type="number" name="b" required class="form-control" />
                                            </div>
                                            <div class="col-2">
                                                <button data-repeater-delete class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                              <button data-repeater-create type="button" class="btn btn-success float-left mt-3">Add</button>
                              </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
