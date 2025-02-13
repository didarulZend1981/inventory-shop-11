<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">



                                <label class="form-label mt-2">Name</label>

                                <input type="text" class="form-control" id="brandName">

                                <br/>

                                <select type="text" class="form-control form-select" id="brandStatus">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>



                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label">Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="productImg">

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary mx-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>






    async function Save() {


        let brandName = document.getElementById('brandName').value;
        let brandStatus = document.getElementById('brandStatus').value;
        let productImg = document.getElementById('productImg').files[0];

        if (brandName.length === 0) {
            errorToast(" brandName Required !")
        }
        else if(brandStatus.length===0){
            errorToast("Product Name Required !")
        }
        else if(!productImg){
            errorToast("Product Image Required !")
        }

        else {

            document.getElementById('modal-close').click();

            let formData=new FormData();
            formData.append('img',productImg)
            formData.append('name',brandName)
            formData.append('status',brandStatus)



            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/create-brand",formData,config)
            hideLoader();

            if(res.status===201){
                successToast('Request completed');
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }
</script>
