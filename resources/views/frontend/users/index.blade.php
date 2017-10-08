@extends('layouts.frontend.app')

@section('content')
	<div id="crud" class="featured-blocks">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <div class="col-sm-7">
                    <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Add</a>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in allUsers">
                                <td>@{{ user.name }}</td>
                                <td>@{{ user.email }}</td>
                                <td width="10px"><button class="btn btn-warning btn-sm">Edit</button></td>
                                <td width="10px"><button class="btn btn-danger btn-sm" v-on:click.prevent="deleteUser(user)">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                    @include('frontend.users.create')
                </div>
                <div class="col-sm-5">
                    <pre>@{{$data}}</pre>
                </div>
            </div>
        </div>
    </div>
@endsection