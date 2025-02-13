<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                <label class="form-label">Status</label>
                                <select type="text" class="form-control form-select" id="statusUpdate">


                                </select>

                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="brandNameUpdate">


                                <br />
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}" />
                                <br />
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="productImgUpdate">

                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">


                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>

        </div>
    </div>
</div>
<script>
    async function FillUpUpdateForm(id, filePath) {
        document.getElementById('updateID').value = id;
        document.getElementById('filePath').value = filePath;
        document.getElementById('oldImg').src = filePath;

        showLoader();

        let res = await axios.post("/brand-by-id", {
            id: id
        });

        let statusText = res.data['status'] == 1 ? 'Active' : 'Inactive';
        hideLoader();

        // Fill product name
        document.getElementById('brandNameUpdate').value = res.data['name'];

        // Populate the status select dropdown (Active or Inactive)
        const statusSelect = document.getElementById('statusUpdate');
        statusSelect.innerHTML = ''; // Clear previous options

        // Add the options dynamically
        const activeOption = document.createElement('option');
        activeOption.value = 1; // Active status value
        activeOption.textContent = 'Active';

        const inactiveOption = document.createElement('option');
        inactiveOption.value = 0; // Inactive status value
        inactiveOption.textContent = 'Inactive';

        // Append the options to the dropdown
        statusSelect.appendChild(activeOption);
        statusSelect.appendChild(inactiveOption);

        // Set the current status in the dropdown
        statusSelect.value = res.data['status']; // Set selected status (1 for Active, 0 for Inactive)
    }


    async function update() {
        let statusUpdate = document.getElementById('statusUpdate').value; // The selected status (0 or 1)
        let brandNameUpdate = document.getElementById('brandNameUpdate').value;

        let updateID = document.getElementById('updateID').value;
        let filePath = document.getElementById('filePath').value;
        let productImgUpdate = document.getElementById('productImgUpdate').files[0];


        console.log(productImgUpdate);

        if (statusUpdate.length === 0) {
            errorToast("Product Category Required !");
        } else if (brandNameUpdate.length === 0) {
            errorToast("Product Name Required !");
        } else {
            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('img', productImgUpdate);
            formData.append('id', updateID);
            formData.append('name', brandNameUpdate);
            formData.append('status', statusUpdate); // The correct status value (1 or 0)
            formData.append('file_path', filePath);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }


            showLoader();
            // for (let pair of formData.entries()) {
            //     console.log(pair[0] + ':', pair[1]);
            // }

            let res = await axios.post("/update-brand", formData, config);


            hideLoader();

            if (res.status === 200) {
                successToast('Request completed');
                document.getElementById("update-form").reset();
                await getList();
            } else {
                errorToast("Request fail !");
            }
        }


    }








</script>
