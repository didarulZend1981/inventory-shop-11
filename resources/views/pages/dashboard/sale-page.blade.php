@extends('layout.sidenav-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">


            @include('components.invoice.invoice-form.product-list')
            @include('components.invoice.invoice-form.customer-list')

        </div>
    </div>




              @include('components.invoice.invoice-form.product-add-form')

              @include('components.invoice.invoice-form.customer-create')






<script>


function add() {
   let PId= document.getElementById('PId').value;
   let PName= document.getElementById('PName').value;
   let PPrice=document.getElementById('PPrice').value;
   let PQty= document.getElementById('PQty').value;
   let PTotalPrice=(parseFloat(PPrice)*parseFloat(PQty)).toFixed(2);
   if(PId.length===0){
       errorToast("Product ID Required");
   }
   else if(PName.length===0){
       errorToast("Product Name Required");
   }
   else if(PPrice.length===0){
       errorToast("Product Price Required");
   }
   else if(PQty.length===0){
       errorToast("Product Quantity Required");
   }
   else{
       let item={product_name:PName,product_id:PId,qty:PQty,sale_price:PTotalPrice};
       InvoiceItemList.push(item);
       console.log(InvoiceItemList);
       $('#create-modal').modal('hide')
       ShowInvoiceItem();
   }
}




function addModal(id,name,price) {
    document.getElementById('PId').value=id
    document.getElementById('PName').value=name
    document.getElementById('PPrice').value=price
    $('#create-modal').modal('show')
}

</script>









@endsection
