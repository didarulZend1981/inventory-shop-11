<div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table table-sm w-100" id="customerTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Customer</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="customerList">

                        </tbody>
                    </table>
                </div>
</div>


<script>


    (async ()=>{
    showLoader();
    await  CustomerList();

    hideLoader();
    })()

    async function CustomerList(){
        let res=await axios.get("/list-customer");
        let customerList=$("#customerList");
        let customerTable=$("#customerTable");
        // customerTable.DataTable().destroy();
        // customerList.empty();

        // যদি DataTable পূর্বে ইনিশিয়ালাইজ করা থাকে, তাহলে এটি ধ্বংস করুন
        if ($.fn.DataTable.isDataTable(customerTable)) {
            customerTable.DataTable().destroy();
        }

        customerList.empty(); // পুরনো ডাটা মুছে ফেলুন



        res.data.forEach(function (item,index) {
            let row=`<tr class="text-xs">
                    <td><i class="bi bi-person"></i> ${item['name']}-${item['id']}</td>
                    <td><a data-name="${item['name']}" data-email="${item['email']}" data-id="${item['id']}" class="btn btn-outline-dark addCustomer  text-xxs px-2 py-1  btn-sm m-0">Add</a></td>
                </tr>`
            customerList.append(row)
        })


        $('.addCustomer').on('click', async function () {

            let CName= $(this).data('name');
            let CEmail= $(this).data('email');
            let CId= $(this).data('id');

            $("#CName").text(CName)
            $("#CEmail").text(CEmail)
            $("#CId").text(CId)

        })



        // DataTable পুনরায় ইনিশিয়ালাইজ করুন (একবারই করা হবে)
        let table = customerTable.DataTable({
            order: [[0, 'desc']],
            lengthMenu: [5, 10, 15, 20, 30]
        });

        // সার্চ ফিল্ড ফাংশন ঠিক করা হয়েছে
        $('#customerTable_filter input').off('keyup').on('keyup', function () {
            setTimeout(function () {
                if (table.rows({ filter: 'applied' }).count() === 0) {
                    $("#create-cus-modal").modal('show');
                }
            }, 500);
        });


    }






</script>
