    <div class="left_sidebar card">
			              
                      
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php
                                        if(!empty(session()->get('profile_image'))){
                                            ?>
                                             <img src="<?= base_url('assets/prfile/') . session()->get('profile_image') ?>" alt="profile image"class="rounded-circle p-1 bg-warning" width="110" />

                                            <?php
                                        }else{

                                            ?>
                                             <img src="<?= base_url('assets/front/images/profile.png')?>" alt="profile image"  <img src="<?= base_url('assets/front/images/profile.png')?>" alt="profile image" width="110" /> 
                                            <?php
                                        }
                                    ?>
                                   
                                   
                                    <div class="mt-3">
                                        <h4><?= session()->get('name')?></h4>
                                       <!--  <p class="text-secondary mb-1">+91 7493658737</p>
                                        <p class="text-muted font-size-sm">Delhi, NCR</p> -->
                                    </div>
                                </div>
                                <div class="list-group list-group-flush text-center mt-4">
                                    <a href="<?= base_url('dashboard')?>" class="list-group-item list-group-item-action border-0" >
                                       Dashboard 
                                    </a>
                                    <a href="<?= base_url('profile')?>" class="list-group-item list-group-item-action border-0 " >
                                       Profile 
                                    </a>
                                    <?php
                                        if(session()->get('role_id') == 1 || session()->get('role_id') == 3 || session()->get('role_id') == 4 || session()->get('role_id') == 5  ){


                                    ?>
                                    <a href="<?= base_url('user/trainers-and-studio')?>" class="list-group-item list-group-item-action border-0" >
                                        Trainer & Studio
                                    </a>
                                <?php } ?>
                                    
                                    <a href="#" class="list-group-item list-group-item-action border-0 ">
                                      Change Password
                                    </a>
                                    <a href="<?= base_url('logout')?>" class="list-group-item list-group-item-action border-0">Logout</a>
                                </div>
                            </div>
                     
                     
			    </div>