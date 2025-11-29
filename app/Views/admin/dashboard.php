<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<style>
    .stat-card {
        border-left: 4px solid #007bff;
        transition: transform 0.2s;
        margin-bottom: 15px;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .stat-card.success {
        border-left-color: #28a745;
    }
    .stat-card.warning {
        border-left-color: #ffc107;
    }
    .stat-card.danger {
        border-left-color: #dc3545;
    }
    .stat-card.info {
        border-left-color: #17a2b8;
    }
    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .stat-card .inner p {
        margin-bottom: 0;
        font-size: 0.9rem;
    }
    .dashboard-section {
        margin-bottom: 20px;
    }
    .compact-table {
        font-size: 0.85rem;
    }
    .compact-table th,
    .compact-table td {
        padding: 8px 10px;
    }
    .date-badge {
        font-size: 0.75rem;
        padding: 3px 8px;
    }
    .badge-sm {
        font-size: 0.75rem;
        padding: 3px 6px;
    }
    .btn-xs {
        padding: 2px 8px;
        font-size: 0.75rem;
        line-height: 1.5;
    }
    .incomplete-badge {
        background-color: #ffc107;
        color: #000;
        padding: 3px 8px;
        border-radius: 3px;
        font-size: 0.8rem;
    }
</style>

<div class="row dashboard-section">
    <div class="col-12">
        <h3 class="mb-3"><i class="fas fa-tachometer-alt"></i> Dashboard Overview</h3>
    </div>
</div>

<!-- Statistics Cards - First Row -->
<div class="row dashboard-section">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-info stat-card">
            <div class="inner">
                <h3 class="stat-number"><?= $totalUsers ?></h3>
                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url('admin/user-list') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-success stat-card success">
            <div class="inner">
                <h3 class="stat-number"><?= $activeUsers ?></h3>
                <p>Active Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
            <a href="<?= base_url('admin/user-list?status=1') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-warning stat-card warning">
            <div class="inner">
                <h3 class="stat-number"><?= $yogaTrainers ?></h3>
                <p>Yoga Trainers</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <a href="<?= base_url('admin/user-list?roles[]=4') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-danger stat-card danger">
            <div class="inner">
                <h3 class="stat-number"><?= count($incompleteTrainers) ?></h3>
                <p>Incomplete Trainer Profiles</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <a href="<?= base_url('admin/user-list?trainer_studio_status=no_profile&roles[]=4') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Statistics Cards - Second Row -->
<div class="row dashboard-section">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-primary stat-card">
            <div class="inner">
                <h3 class="stat-number"><?= $totalTrainersStudio ?></h3>
                <p>Total Trainers & Studio</p>
            </div>
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <a href="<?= base_url('admin/trainers-and-studio') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-success stat-card success">
            <div class="inner">
                <h3 class="stat-number"><?= $activeTrainersStudio ?></h3>
                <p>Active Trainers & Studio</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <a href="<?= base_url('admin/trainers-and-studio') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-info stat-card">
            <div class="inner">
                <h3 class="stat-number"><?= $totalMembers ?></h3>
                <p>Total Members</p>
            </div>
            <div class="icon">
                <i class="fas fa-id-card"></i>
            </div>
            <a href="<?= base_url('admin/member-list') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-warning stat-card warning">
            <div class="inner">
                <h3 class="stat-number"><?= $totalServices ?></h3>
                <p>Total Services</p>
            </div>
            <div class="icon">
                <i class="fas fa-concierge-bell"></i>
            </div>
            <a href="<?= base_url('admin/services') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Statistics Cards - Third Row -->
<div class="row dashboard-section">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-info stat-card">
            <div class="inner">
                <h3 class="stat-number"><?= $totalPosts ?></h3>
                <p>Total Posts</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="<?= base_url('admin/posts') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-primary stat-card">
            <div class="inner">
                <h3 class="stat-number"><?= $totalEvents ?></h3>
                <p>Total Events</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="<?= base_url('admin/event') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="small-box bg-success stat-card success">
            <div class="inner">
                <h3 class="stat-number"><?= $totalGallery ?></h3>
                <p>Gallery Images</p>
            </div>
            <div class="icon">
                <i class="fas fa-images"></i>
            </div>
            <a href="<?= base_url('admin/gallery') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Incomplete Trainer Profiles Alert -->
<?php if(count($incompleteTrainers) > 0): ?>
<div class="row dashboard-section">
    <div class="col-12">
        <div class="card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Incomplete Trainer Profiles</h3>
            </div>
            <div class="card-body p-2">
                <p class="mb-2"><small>The following yoga trainer users have not completed their trainer profile data:</small></p>
                <div class="table-responsive">
                    <table class="table table-sm table-hover compact-table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($incompleteTrainers as $trainer): ?>
                            <tr>
                                <td><?= $trainer['id'] ?></td>
                                <td><?= htmlspecialchars($trainer['name'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($trainer['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($trainer['username'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <span class="badge badge-<?= ($trainer['status'] ?? 0) == 1 ? 'success' : 'danger' ?> badge-sm">
                                        <?= ($trainer['status'] ?? 0) == 1 ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/user-list?trainer_studio_status=no_profile&roles[]=4') ?>" class="btn btn-xs btn-warning">
                                        View
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Recent Users -->
<div class="row dashboard-section">
    <div class="col-12">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i> Recent Users</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm compact-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 15%;">Name</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 15%;">Role</th>
                                <th style="width: 15%;">Date</th>
                                <th style="width: 10%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($recentUsers) > 0): ?>
                                <?php foreach($recentUsers as $user): 
                                    $user_type = '';
                                    switch ($user['role'] ?? '') {
                                        case 1: $user_type = 'Admin'; break;
                                        case 2: $user_type = 'Site User'; break;
                                        case 3: $user_type = 'Yoga Studio'; break;
                                        case 4: $user_type = 'Yoga Instructor'; break;
                                        case 5: $user_type = 'Yoga Institute'; break;
                                        default: $user_type = 'Unknown'; break;
                                    }
                                    
                                    // Format date
                                    $userDate = '';
                                    if(isset($user['created_date']) && !empty($user['created_date'])) {
                                        $date = is_numeric($user['created_date']) ? date('Y-m-d', $user['created_date']) : $user['created_date'];
                                        $userDate = date('M d, Y', strtotime($date));
                                    } elseif(isset($user['created_at']) && !empty($user['created_at'])) {
                                        $userDate = date('M d, Y', strtotime($user['created_at']));
                                    } elseif(isset($user['createddate']) && !empty($user['createddate'])) {
                                        $date = is_numeric($user['createddate']) ? date('Y-m-d', $user['createddate']) : $user['createddate'];
                                        $userDate = date('M d, Y', strtotime($date));
                                    } else {
                                        $userDate = 'N/A';
                                    }
                                ?>
                                <tr>
                                    <td><?= $user['id'] ?? '' ?></td>
                                    <td><?= htmlspecialchars($user['name'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><small><?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></small></td>
                                    <td><span class="badge badge-info badge-sm"><?= $user_type ?></span></td>
                                    <td><span class="badge badge-secondary date-badge"><?= $userDate ?></span></td>
                                    <td>
                                        <span class="badge badge-<?= ($user['status'] ?? 0) == 1 ? 'success' : 'danger' ?> badge-sm">
                                            <?= ($user['status'] ?? 0) == 1 ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No users found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center p-2">
                <a href="<?= base_url('admin/user-list') ?>" class="btn btn-sm btn-primary">View All Users</a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Trainers -->
<div class="row dashboard-section">
    <div class="col-12">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-building"></i> Recent Trainers & Studio</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm compact-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Business Name</th>
                                <th style="width: 15%;">User</th>
                                <th style="width: 25%;">Email</th>
                                <th style="width: 20%;">Date</th>
                                <th style="width: 10%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($recentTrainers) > 0): ?>
                                <?php foreach($recentTrainers as $trainer): 
                                    // Format date
                                    $trainerDate = '';
                                    if(isset($trainer['created_date']) && !empty($trainer['created_date'])) {
                                        $date = is_numeric($trainer['created_date']) ? date('Y-m-d', $trainer['created_date']) : $trainer['created_date'];
                                        $trainerDate = date('M d, Y', strtotime($date));
                                    } elseif(isset($trainer['created_at']) && !empty($trainer['created_at'])) {
                                        $trainerDate = date('M d, Y', strtotime($trainer['created_at']));
                                    } elseif(isset($trainer['created_date']) && !empty($trainer['created_date'])) {
                                        $date = is_numeric($trainer['created_date']) ? date('Y-m-d', $trainer['created_date']) : $trainer['created_date'];
                                        $trainerDate = date('M d, Y', strtotime($date));
                                    } elseif(isset($trainer['updated_date']) && !empty($trainer['updated_date'])) {
                                        $date = is_numeric($trainer['updated_date']) ? date('Y-m-d', $trainer['updated_date']) : $trainer['updated_date'];
                                        $trainerDate = date('M d, Y', strtotime($date));
                                    } else {
                                        $trainerDate = 'N/A';
                                    }
                                ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($trainer['business_name'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></strong></td>
                                    <td><?= htmlspecialchars($trainer['user_name'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><small><?= htmlspecialchars($trainer['email'] ?? $trainer['user_email'] ?? '', ENT_QUOTES, 'UTF-8') ?></small></td>
                                    <td><span class="badge badge-secondary date-badge"><?= $trainerDate ?></span></td>
                                    <td>
                                        <span class="badge badge-<?= ($trainer['status'] ?? 0) == 1 ? 'success' : 'danger' ?> badge-sm">
                                            <?= ($trainer['status'] ?? 0) == 1 ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">No trainers found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center p-2">
                <a href="<?= base_url('admin/trainers-and-studio') ?>" class="btn btn-sm btn-primary">View All Trainers</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
