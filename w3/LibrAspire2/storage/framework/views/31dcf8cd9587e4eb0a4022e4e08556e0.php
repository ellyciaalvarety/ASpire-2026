

<?php $__env->startSection('title', 'Dashboard Admin'); ?>
<?php $__env->startSection('page-title', '🏠 Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Buku</h5>
                        <h2 class="mb-0"><?php echo e($totalBuku ?? 0); ?></h2>
                    </div>
                    <i class="fas fa-book fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Peminjaman</h5>
                        <h2 class="mb-0"><?php echo e($totalPeminjaman ?? 0); ?></h2>
                    </div>
                    <i class="fas fa-hand-holding fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Stok Habis</h5>
                        <h2 class="mb-0"><?php echo e($stokHabis ?? 0); ?></h2>
                    </div>
                    <i class="fas fa-exclamation-triangle fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <i class="fas fa-clock"></i> Peminjaman Terbaru
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $peminjamanTerbaru ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->user->name ?? '-'); ?></td>
                                <td><?php echo e($item->buku->judul ?? '-'); ?></td>
                                <td><?php echo e($item->tanggal_pinjam ?? $item->created_at->format('d/m/Y')); ?></td>
                                <td>
                                    <span class="badge bg-info"><?php echo e($item->status ?? 'Dipinjam'); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada peminjaman</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <i class="fas fa-book"></i> Buku Terbaru
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $bukuTerbaru ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(Str::limit($item->judul, 25)); ?></td>
                                <td><?php echo e($item->pengarang); ?></td>
                                <td>
                                    <?php if($item->stok > 0): ?>
                                        <span class="badge bg-success"><?php echo e($item->stok); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">0</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center">Belum ada buku</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <a href="<?php echo e(route('admin.buku.index')); ?>" class="btn btn-primary">
                    <i class="fas fa-book"></i> Kelola Buku
                </a>
                <a href="<?php echo e(route('admin.peminjaman.index')); ?>" class="btn btn-success">
                    <i class="fas fa-hand-holding"></i> Kelola Peminjaman
                </a>
                <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-info">
                    <i class="fas fa-user"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\Downloads\kuliah pens\FILE TUGAS\Rincian Tugas\ASpire\ASpire-2026-main\ASpire-2026-main\w3\LibrAspire2\resources\views/admin/home.blade.php ENDPATH**/ ?>