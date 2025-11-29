  <?php
            if((session()->get('logged_in') && !$trainer_studio_flag) && (session()->get('role_id') == 1 || session()->get('role_id') == 3 || session()->get('role_id') == 4 || session()->get('role_id') == 5)){
                ?>
                 <div class="container ">
            <div class="row">
                <div class="col-12 ">
                    <div class="alert alert-warning text-center">
                        <strong>Info!</strong> Update the trainer and studio profile by adding a listing for enhanced visibility and engagement.
                    </div>
                </div>
            </div>
        </div>
                <?php
            }
        ?>