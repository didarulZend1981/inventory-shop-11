@extends('layout.sidenav-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('components.invoice.invoice-form.bill-form')
            @include('components.invoice.invoice-form.product-list')
            @include('components.invoice.invoice-form.customer-list')

        </div>
    </div>




              @include('components.invoice.invoice-form.product-add-form')

              @include('components.invoice.invoice-form.customer-create')






<script>




</script>









@endsection
