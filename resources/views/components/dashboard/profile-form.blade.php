<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>User Profile</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            
                            <div class="col-full p-2">
                                <label>Full Name</label> 
                                <input id="name" placeholder="Full Name" class="form-control" type="text"/>
                            </div>

                            <div class="col-full p-2">
                                <label>E-mail</label> 
                                <input id="email" placeholder="E-mail" class="form-control" type="text"/>
                            </div>
                           
                            <div class="col-full p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>
                            <div class="col-full p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                        <div class="col-md-4 p-2">
                                <button onclick="onUpdate()" class="btn mt-3 w-100  bg-gradient-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    async function getProfile(){
        showLoader();
        let res=await axios.get("/user-profile")
        console.log("testriokkk---------",res.data['data']['email'])

        hideLoader();
        if(res.status===200 && res.data['status']==='success'){
            let data=res.data['data'];
            document.getElementById('email').value=data['email'];
            document.getElementById('name').value=data['name'];
            document.getElementById('mobile').value=data['mobile'];
            document.getElementById('password').value=data['password'];
        }
        else{
            errorToast(res.data['message'])
        }

    }
    getProfile();
</script>