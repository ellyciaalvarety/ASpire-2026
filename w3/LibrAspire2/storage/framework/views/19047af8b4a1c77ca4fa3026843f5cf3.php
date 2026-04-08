

<?php $__env->startSection('title', 'Data Buku'); ?>
<?php $__env->startSection('page-title', '📖 Data Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span><i class="fas fa-book text-primary"></i> Daftar Buku</span>
        <a href="<?php echo e(route('admin.buku.create')); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Buku
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td>
                            <?php if($item->cover): ?>
                                <img src="<?php echo e(asset('storage/' . $item->cover)); ?>" width="40" height="50" style="object-fit: cover;">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(Str::limit($item->judul, 30)); ?></td>
                        <td><?php echo e($item->isbn); ?></td>
                        <td><?php echo e($item->pengarang); ?></td>
                        <td><?php echo e($item->penerbit); ?></td>
                        <td><?php echo e($item->tahun_terbit); ?></td>
                        <td>
                            <?php if($item->stok > 0): ?>
                                <span class="badge bg-success"><?php echo e($item->stok); ?></span>
                            <?php else: ?>
                                <span class="badge bg-danger">Habis</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.buku.show', $item->id)); ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.buku.edit', $item->id)); ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.buku.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus buku ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data buku</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\Downloads\kuliah pens\FILE TUGAS\Rincian Tugas\ASpire\ASpire-2026-main\ASpire-2026-main\w3\LibrAspire2\resources\views/buku/index.blade.php ENDPATH**/ ?>