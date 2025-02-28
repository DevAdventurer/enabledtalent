<div class="user-profile-sidebar">
    <div class="user-profile-sidebar-top">
        <div class="user-profile-img">
            <?php if(empty(optional(auth('candidate')->user())->avatar)): ?>
                <img src="<?php echo e(asset('assets/img/candidate.png')); ?>" alt="Candidate Avatar">
            <?php else: ?>
                <img src="<?php echo e(auth('candidate')->user()->avatar); ?>" alt="Candidate Avatar">
            <?php endif; ?>
            <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
            <input type="file" class="profile-img-file">
        </div>

        <h4><?php echo e(optional(auth('candidate')->user()->details)->candidate_name ?? 'N/A'); ?></h4>

        <?php if(optional(auth('candidate')->user()->details)->industry): ?>
            <p><?php echo e(optional(auth('candidate')->user()->details->industry)->name ?? 'No Industry'); ?></p>
        <?php endif; ?>
    </div>

    <ul class="user-profile-sidebar-list">
        <li>
          <a class="active" href="<?php echo e(route('candidate.dashboard.index')); ?>"><i class="far fa-gauge-high"></i> Dashboard</a>
        </li>

        <li>
          <a href="<?php echo e(route('candidate.details.detail')); ?>"><i class="far fa-user-tie"></i> Candidate Profile</a>
        </li>

        

        <li>
          <a href="<?php echo e(route('candidate.logout')); ?>"><i class="far fa-sign-out"></i> Logout</a>
        </li>
    </ul>
</div>
<?php /**PATH /Users/mamoonnasar/Documents/enabledtalent/resources/views/candidate/layouts/aside.blade.php ENDPATH**/ ?>