@extends('layouts.default')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consultants</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(session('result'))

        <div class="card bg-{{ session('result.0') }}">
            <div class="card-body">
                {{ session('result.1') }}
            </div>
        </div>
        @endif
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    @foreach($consultants as $c)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                Lorem Ipsum
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$c->name}}</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b> Neque porro quisquam est qui
                                            dolorem ipsum quia dolor sit amet, consectetur, adipisci velit... </p>

                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{$c->image}}" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                    @csrf
                                    <div class="text-right">
                                        @if($c->status)
                                            <button disabled class="btn btn-sm btn-danger">
                                                <i class="fas fa-user"></i> Consultant is not available
                                            </button>
                                        @else
                                        
                                            <div class="form-group">
                                                <select  class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                            <br>
                                            <button onclick="createAppointment('{{$c->UID}}')" class="btn btn-sm btn-success">
                                                <i class="fas fa-user"></i> Create an appointment
                                            </button>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


@stop
