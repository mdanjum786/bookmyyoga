<?= $this->extend('front/master-layout') ?>
<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery UI CSS for Autocomplete -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<section class="py-5 bg-light" id="user-dashboard">
     <style>
        .list-group-item.active {
    background: #619e90 !important;
}
.bg-warning {
    background: #06C167 !important;
}
 
    
    @media (max-width: 768px) {
        .main_flex_div {
            display: flex;
            flex-direction: column;
        }
        .inner_flex_div {
            min-width: 100% !important;
        }
        .modal-content {
            padding: 10px 0px !important;
            min-width: 95% !important;
            height: 700px;
            overflow: scroll;
        }
        .close {
            margin-right: 10px;
        }
    }
    
    
    
    </style>
    <?php include('trainer-alert.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info text-center"><strong>info!</strong> Always verified by admin</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <?php include('user-sidebar.php'); ?>
            </div>
                <div class="col-md-8">
                <div class="left_sidebar">
                      <div  id="orderDetails" class="order_card">
                        <div class="card">
                            <div class="card-body">
                                <div class="top-status">
                                    <h5 class="mb-3"> Trainer and studio </h5>
                                <form class="user-profile-form" id="user-profile-form">
                                    <div class="row">
                               
                                  <div class="form-group col-md-6 mb-4 has-error has-danger error-parent">
                                    <label for="fullname">Business Name</label>
                                    <input type="text" name="business_name" class="form-control" id="fullname" placeholder="Enter Business Name" required="" value="<?= isset($trainers_and_studio_data['business_name']) ?  $trainers_and_studio_data['business_name'] :  session()->get('name')?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                                <div class="form-group col-md-6 mb-4 has-error has-danger error-parent">
                                     <label for="profile_image">Banner Image</label>
                                    <input type="file" name="banner_image" id="banner_image" class="form-control" >

                                    <div class="user-profile-image" id="user-profile-image">
                                        <?php
                                            if(isset( $trainers_and_studio_data['banner_image']) && !empty($trainers_and_studio_data['banner_image'])){
                                                ?>
                                                <img src="<?= base_url('assets/images/trainer-studio/') . $trainers_and_studio_data['banner_image'] ?>" width="200">
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="error-msg"></div>
                                   
                                </div>

                                   <div class="form-group col-md-6 mb-4 error-parent">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email"  value="<?= isset($trainers_and_studio_data['email']) ? $trainers_and_studio_data['email'] : session()->get('email')?>">
                                    <div class="error-msg"></div>
                                   
                                </div>

                                <div class="form-group col-md-6 mb-4 error-parent">
                                    <label for="phone_no">Contact No</label>
                                    <input type="text" name="mobile_no" class="form-control" id="phone" placeholder="Contact No" required="" value="<?= isset($trainers_and_studio_data['mobile_no']) ? $trainers_and_studio_data['mobile_no'] : session()->get('phone_no') ?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                             
                                <div class="form-group col-md-4 mb-4 has-error has-danger error-parent">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" name="pincode" class="form-control" id="pincode-autocomplete" value="<?= !empty($pincode) ? $pincode : '' ?>" placeholder="Type or select Pincode" autocomplete="off">
                                    <div class="error-msg"></div>
                                    <div class="mt-2">
                                        <label><input type="checkbox" id="manual-pincode-region-checkbox"> Manually add unique Pincode & Region</label>
                                    </div>
                                    <div id="manual-pincode-region-fields" style="display:none;">
                                        <input type="text" name="manual_pincode" id="manual_pincode" class="form-control mt-2" placeholder="Enter Pincode">
                                        <input type="text" name="manual_region" id="manual_region" class="form-control mt-2" placeholder="Enter Region Name">
                                        <div class="error-msg manual-pincode-region-error"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 mb-4 has-error has-danger error-parent">
                                    <label for="address">Country</label>
                                    <select name="country_id" class="form-control" id="country-name">
                                        <option value="">Select Country</option>
                                        <?php
                                            if(count($countries)){
                                                foreach($countries as $country){
                                                    ?>
                                                    <option value="<?= $country['id']?>" <?= (isset($trainers_and_studio_data) && $trainers_and_studio_data['country_id'] == $country['id']) ? 'selected' : '' ?>><?= $country['name']?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="error-msg"></div>
                                </div>
                                <div class="form-group col-md-4 mb-4 has-error has-danger error-parent">
                                    <label for="address">State</label>
                                    <select name="state_id" class="form-control" id="state-name"  >
                                        <option value="">Select State</option>
                                        <?php if(isset($state) && count($state)) { 
                                            foreach($state as $st){
                                            ?>
                                            <option value="<?= $st['id']?>" <?= (isset($trainers_and_studio_data) && $trainers_and_studio_data['state_id'] == $st['id']) ? 'selected' : '' ?> ><?= $st['name']?> </option>
                                        <?php } } ?>
                                    </select>
                                    <div class="error-msg"></div>
                                </div>
                                <div class="form-group col-md-4 mb-4 has-error has-danger error-parent">
                                    <label for="address">City</label>
                                    <select name="city_id" class="form-control" id="city-name">
                                        <option value="">Select City</option>
                                        <?php if(isset($city_dropdown) && count($city_dropdown)) { 
                                            foreach($city_dropdown as $ci){
                                            ?>
                                            <option value="<?= $ci['id']?>" <?= (isset($trainers_and_studio_data) && $trainers_and_studio_data['city_id'] == $ci['id']) ? 'selected' : '' ?> ><?= $ci['name']?> </option>
                                        <?php } } ?>
                                    </select>
                                    <div><label><input type="checkbox" name="other_city_checkbox">Other City</label>
                                        <input type="text" name="other_city" style="display: none" class="form-control" placeholder="City Name" >
                                    </div>
                                    <div class="error-msg"></div>
                                </div>

                                  <div class="form-group col-12 mb-4 has-error has-danger error-parent">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Username" value="<?= isset($trainers_and_studio_data['address']) ? $trainers_and_studio_data['address'] : session()->get('address') ?>">
                                    <div class="error-msg"></div>
                                   
                                </div>
                                    

                                <div class="form-group col-12 mb-4 has-error has-danger error-parent">
                                    <label for="about_us">About Us</label>
                                    <textarea name="about_us" id="about_us" rows="10" class="form-control" placeholder="About Us"><?= isset($trainers_and_studio_data['about_us']) ? $trainers_and_studio_data['about_us'] : ''  ?></textarea>
                                    <div class="error-msg"></div>
                                   
                                </div>
 
                                <div class="col-md-12 mb-4">
                                    <button type="submit" class="btn-default btn-submit">Submit</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>

                                <div class="col-md-12">
                                   <div class="res-msg"> </div>
                                </div>
                               
                            </div>
                             </form>
                                </div>
                            </div>
                        </div>
                       
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<!-- jQuery (required for jQuery UI) -->

<!-- jQuery UI JS for Autocomplete -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                <script>

                                    // Manual pincode+region entry logic and uniqueness check
$(document).on('change', '#manual-pincode-region-checkbox', function() {
    if ($(this).is(':checked')) {
        $('#manual-pincode-region-fields').show();
        $('#pincode-autocomplete').prop('readonly', true);
    } else {
        $('#manual-pincode-region-fields').hide();
        $('#pincode-autocomplete').prop('readonly', false);
        $('.manual-pincode-region-error').text('');
    }
});

// Validate unique pincode+region on blur
$('#manual_pincode, #manual_region').on('blur', function() {
    let pincode = $('#manual_pincode').val().trim();
    let region = $('#manual_region').val().trim();
    if(pincode && region) {
        $.ajax({
            url: "<?= base_url('front/pincode-autocomplete') ?>",
            dataType: 'json',
            data: { q: pincode },
            success: function(data) {
                let exists = data.some(function(item) {
                    return item.pincode == pincode && item.region_name.toLowerCase() == region.toLowerCase();
                });
                if(exists) {
                    $('.manual-pincode-region-error').text('This pincode and region combination already exists.');
                } else {
                    $('.manual-pincode-region-error').text('');
                }
            }
        });
    }
});

// Prevent form submit if duplicate manual pincode+region
$('#user-profile-form').on('submit', function(e) {
    if($('#manual-pincode-region-checkbox').is(':checked')) {
        let pincode = $('#manual_pincode').val().trim();
        let region = $('#manual_region').val().trim();
        let error = $('.manual-pincode-region-error').text();
        if(!pincode || !region) {
            $('.manual-pincode-region-error').text('Both pincode and region are required.');
            e.preventDefault();
            return false;
        }
        if(error) {
            e.preventDefault();
            return false;
        }
    }
});
// Pincode autocomplete and auto-populate logic using jQuery UI Autocomplete
$('#pincode-autocomplete').autocomplete({
    minLength: 2,
    source: function(request, response) {
        $.ajax({
            url: "<?= base_url('front/pincode-autocomplete') ?>",
            dataType: 'json',
            data: { q: request.term },
            success: function(data) {
                response($.map(data, function(item) {
                    return {
                        label: item.pincode + ' - ' + item.region_name,
                        value: item.pincode,
                        city_id: item.city_id,
                        city_name: item.city_name,
                        state_id: item.state_id,
                        state_name: item.state_name,
                        country_id: item.country_id,
                        country_name: item.country_name
                    };
                }));
            }
        });
    },
    select: function(event, ui) {
        // Set city
        if(ui.item.city_id) {
            $('#city-name').html(`<option value="${ui.item.city_id}" selected>${ui.item.city_name}</option>`);
            $('#city-name').val(ui.item.city_id).trigger('change');
        }
        // Set state
        if(ui.item.state_id) {
            $('#state-name').html(`<option value="${ui.item.state_id}" selected>${ui.item.state_name}</option>`);
            $('#state-name').val(ui.item.state_id).trigger('change');
        }
        // Set country
        if(ui.item.country_id) {
            $('#country-name').html(`<option value="${ui.item.country_id}" selected>${ui.item.country_name}</option>`);
            $('#country-name').val(ui.item.country_id).trigger('change');
        }
    }
});
</script>
<script type="text/javascript">
    $(function(){
        let city_name = 'city_id';
        $(document).on('change', '[name="other_city_checkbox"]', function(){

            if ($(this).is(':checked')) {
                $('[name="other_city"]').show();
                $('#user-profile-form').validate().settings.rules.other_city.required = true;
                $('#user-profile-form').validate().settings.rules.city_id.required = false;
                city_name = 'other_city';
            } else {
                $('[name="other_city"]').hide();
                $('#user-profile-form').validate().settings.rules.other_city.required = false;
                $('#user-profile-form').validate().settings.rules.city_id.required = true;
                city_name = 'city_id';
            }
            // Revalidate both fields to ensure correct validation messages are shown
            $('#user-profile-form').validate().element($('[name="other_city"]'));
            $('#user-profile-form').validate().element($('[name="city_id"]'));
        });
        $('#country-name').select2();
        $('#state-name').select2();
        $('#city-name').select2();
        $(document).on('change', '#country-name',function(e){
            e.preventDefault();
            let country_id = $(this).val();
            if(country_id != ""){
                $.ajax({
                    type: 'POST',
                    url : "<?= base_url('get-state')?>",
                    data:{country_id:country_id},
                    dataType:'json',
                    success:function(res){
                        //state-name
                        console.log('res ', res);
                        console.log('type ', res.data);
                        let  options = '<option value="">Select State</option>';
                        res.data?.forEach(function(item){
                             options += `<option value="${item['id']}">${item['name']}</option>`
                         });
                        $('#state-name').html(options)
                    }
                });
            }else{
                $('#state-name').html(`<option value="">Select State</option>`)
                $('#city-name').html(`<option value="">Select City</option>`)
            }
            
        });
        $(document).on('change', '#state-name',function(e){
            e.preventDefault();
            let state_id = $(this).val();
            if(state_id != ""){
                $.ajax({
                    type: 'POST',
                    url : "<?= base_url('get-city')?>",
                    data:{state_id:state_id},
                    dataType:'json',
                    success:function(res){
                        console.log('res ', res);
                        console.log('type ', res.data);
                        let  options = '<option value="">Select City</option>';
                        res.data?.forEach(function(item){
                             options += `<option value="${item['id']}">${item['name']}</option>`
                         });
                        $('#city-name').html(options)
                    }
                });
            }else{
               
                $('#city-name').html(`<option value="">Select City</option>`)
            }
            
        });
        $('#user-profile-image').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-profile-image').html(`<img src="${e.target.result}" width="200">`);
                }
                reader.readAsDataURL(file);
            }
        });
let banner_image_flag  = <?= isset($trainers_and_studio_data['banner_image']) ? 'false' : 'true'  ?>

        $('#user-profile-form').validate({
            rules:{
          
            business_name:{
                required:true,
            },
           
            address:{
                required:true
            },
            about_us:{
                required:true
            },
            email:{
                required:true,
            },
            mobile_no:{
                required:true
            },
            banner_image:{
                required:banner_image_flag
            },
            country_id:{
                required:true
            },
            state_id:{
                required:true
            },
            [city_name]:{
                required:true
            },
            other_city:{
                required:false
            }

           

        },
        messages:{
           
            name:{
                required:"Please enter name"
            }
           
           
        },
         errorPlacement: function(error, element) {
            console.log('error ', error);
            console.log('element ', element);
            $(element).closest('.error-parent').find('.error-msg').html(error);
            // Append the error message after the input field
           // error.insertAfter(element);
        },
        submitHandler:function(form){
            let formData = new FormData(form);
           let _this = $('#user-profile-form');
            $.ajax({
                type : 'POST',
                url:"<?= base_url('front/update_trainer_studio') ?>",
                data:formData,
                contentType: false, // Important for file uploads
                processData: false,
                dataType:'json',
                beforeSend:function(){
                    _this.find('[type="submit"]').prop('disabled', true);
                    // _this.find('.loading').show();
                },
                success:function(res){
                    if(res.status){
                        $('.res-msg').html(`<span class="aler alert-success success">${res.msg}</span>`);
                        // _this[0].reset();
                    }else{
                         $('.res-msg').html(`<span class="aler alert-danger error">${res.msg}</span>`);
                    }
                },
                complete:function(){
                    _this.find('[type="submit"]').prop('disabled', false);
                   // _this.find('.loading').hide();

                }

            });
            return false;
        }
        });
    });
</script>
<?= $this->endSection() ?>

