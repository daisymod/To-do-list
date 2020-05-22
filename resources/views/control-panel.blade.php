@extends('layouts.app')
@section('title-block') Control panel @endsection
@section('content')
<table align="center" class="table w-75">
    <thead>
    <tr>
        <th style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3" scope="col">ID</th>
        <th style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3" scope="col">Name</th>
        <th style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3" scope="col">E-mail</th>
        <th style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3" scope="col">Created at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $user)
    <tr>
        <th style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3" scope="row">{{$user->id}}</th>
        <td style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3">{{$user->name}}</td>
        <td style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3">{{$user->email}}</td>
        <td style="font-size: 20px; font-family: 'Barlow Condensed'; color: #d3">{{$user->created_at}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection