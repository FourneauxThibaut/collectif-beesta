<?php 
    $title = 'Not Found';
    ob_start(); 
?>

<div class="h-full pt-48 justify-center">
    <center class="mt-24 m-auto">
        <div class=" tracking-widest mt-8">
            <span class="text-gray-300 text-3xl">Access denied!</span>
        </div>
    </center>
    <center class="mt-6">
        <a href="/" class="text-white font-mono text-xl bg-cyan-600 hover:bg-cyan-700 p-3 rounded-md hover:shadow-md">Get Home</a>
    </center>
</div>

<?php $content = ob_get_clean(); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Layout/public_layout.php'); ?>