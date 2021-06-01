<?php
require_once(__DIR__ . '/../helper/factory.php');

$menus = Factory::getMenus();
?>
<div class="flex flex-wrap w-full px-4 mt-2 mb-4">
    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-black title-font mb-2 text-gray-900">Menu Andalan Kami</h1>
        <div class="h-1 w-20 bg-yellow-500 rounded"></div>
    </div>
</div>
<div class="flex flex-wrap">
    <?php foreach ($menus as $menu) : ?>
        <div class="p-4 md:w-1/4">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden pb-6">
                <img class="lg:h-60 md:h-36 w-full object-cover object-center" src="<?= $menu->thumbnail ?>" alt="blog">
                <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-bold text-yellow-500 mb-1"><?= $menu->type ?></h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?= $menu->name ?></h1>
                    <p class="leading-relaxed mb-3"><?= strlen($menu->description) > 150 ? substr($menu->description, 0, 150) . '...' : $menu->description ?></p>
                    <div class="mt-4">
                        <span class="text-gray-400 inline-flex items-center leading-none text-sm float-left mt-2">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>Rp. <?= $menu->price ?>
                        </span>
                        <button class="float-right text-white bg-yellow-500 hover:bg-yellow-600 border-0 py-1 px-3 focus:outline-none rounded text-md" onclick="addMenuOrderItem(<?= $menu->id ?>, '<?= $menu->thumbnail ?>', '<?= $menu->name ?>')">
                            Pesan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php if (empty($menus)) : ?>
    <div class="mt-4 text-center text-lg">
        <span>😥 Maaf nih, makanan sama minumannya lagi kosong...</span>
    </div>
<?php endif; ?>