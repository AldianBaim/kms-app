<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    </link>
</head>

<body>
    <div id="app">
        <?php if(auth()->guard()->check()): ?>
        <section class="bg-secondary">
            <div class="container p-4 p-lg-5">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9">
                        <main>
                            <?php echo $__env->yieldContent('content'); ?>
                        </main>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </div>
</body>

</html><?php /**PATH /Users/aldiansyahibrahim/Documents/projects/KMS-APP/resources/views/layouts/app.blade.php ENDPATH**/ ?>