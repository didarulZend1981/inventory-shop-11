@extends('layout.sidenav-layout')
@section('content')
@include('components.product.product-list')
@include('components.product.product-delete')
@include('components.product.product-update')
@include('components.product.product-create')

@endsection