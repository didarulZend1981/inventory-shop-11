<div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table  w-100" id="productTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Product</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="productList">

                        </tbody>
                    </table>
                </div>
</div>



@include('components.invoice.invoice-form.product-add-form')


<script>

(async ()=>{
    showLoader();
    await  ProductList();

    hideLoader();
    })()

    async function ProductList(){
    let res=await axios.get("/list-product");
    let productList=$("#productList");
    let productTable=$("#productTable");
    productTable.DataTable().destroy();
    productList.empty();

    res.data.forEach(function (item,index) {
        let row=`<tr class="text-xs">
                <td> <img class="w-10" src="${item['img_url']}"/> ${item['name']} ($ ${item['price']})</td>
                <td><a data-name="${item['name']}" data-price="${item['price']}" data-id="${item['id']}" class="btn btn-outline-dark text-xxs px-2 py-1 addProduct  btn-sm m-0">Add</a></td>
             </tr>`
        productList.append(row)
    })


    $('.addProduct').on('click', async function () {
        let PName= $(this).data('name');
        let PPrice= $(this).data('price');
        let PId= $(this).data('id');
        addModal(PId,PName,PPrice)
    })


    new DataTable('#productTable',{
        order:[[0,'desc']],
        scrollCollapse: false,
        info: false,
        lengthChange: false
    });
}

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
    document.getElementById("PQty").reset();
}

</script>
