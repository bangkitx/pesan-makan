<?php
require_once(__DIR__ . '/../helper/factory.php');
require_once(__DIR__ . '/../helper/menu-order.php');

if (!isset($_POST['orders'])) header('Location: index.php');
$orders = json_decode($_POST['orders']);
$menus = Factory::getMenus();

$finalOrders = array();
$totalPrice = 0;
foreach ($menus as $menu) {
    foreach ($orders as $order) {
        if ($order->id == $menu->id) {
            $finalOrders[] = new MenuOrder(
                $menu->thumbnail,
                $menu->type,
                $menu->name,
                $order->quantity,
                $menu->price
            );
            $totalPrice = $totalPrice + $menu->price * $order->quantity;
        }
    }
}
?>
<?php if (!empty($finalOrders)) : ?>
    <div class="flex flex-wrap w-full px-4 mt-2 mb-4">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
            <h1 class="sm:text-3xl text-2xl font-black title-font mb-2 text-gray-900">Pesanan Kamu</h1>
            <div class="h-1 w-20 bg-yellow-500 rounded"></div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3">
        <div class="col-span-2">
            <div class="flex flex-wrap">
                <?php foreach ($finalOrders as $order) : ?>
                    <div class="p-4 md:w-1/1">
                        <div class="w-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden float-center">
                            <div class="flex flex-wrap">
                                <img class="lg:h-28  lg:w-28 md:h-36 md:h-36 object-cover object-center" src="<?= $order->thumbnail ?>" alt="<?= $order->name ?>">
                                <div class="p-5">
                                    <h2 class="tracking-widest text-xs title-font font-bold text-yellow-500 mb-1"><?= $order->type ?></h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900"><?= $order->name ?></h1>
                                    <span class="mt-2 text-gray-400 inline-flex items-center leading-none text-sm float-left mt-2">
                                        Rp. <?= $order->itemPrice ?> x <?= $order->quantity ?> Porsi
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-span-1">
            <div class="flex flex-col ml-4 mr-4 lg:ml-0 lg:mr-12 mt-2 lg:mt-0">
                <form method="post" action="checkout.php">
                    <h2 class="text-gray-900 text-lg mb-1 font-bold title-font">Total Pembayaran</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Total harga pesanan yang perlu kamu bayar adalah sebanyak<br /><b>Rp. <?= $totalPrice ?>,-</b></p>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">*Nama Pemesan</label>
                        <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out font-light" placeholder="Masukkin nama pemesannya" required>
                    </div>
                    <div class="relative mb-4">
                        <label for="type" class="leading-7 text-sm text-gray-600">*Jenis Pembayaran</label>
                        <select id="type" name="type" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-2 leading-8 transition-colors duration-200 ease-in-out font-light" required>
                            <option>Cash on Delivery</option>
                            <option>Transfer Bank</option>
                            <option>OVO</option>
                            <option>Dana</option>
                        </select>
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Keterangan Tambahan</label>
                        <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out font-light" placeholder="Semisal, 'nggak pake pedes'"></textarea>
                    </div>
                    <button class="w-full mb-2 text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Bayar</button>
                </form>
                <a href="orders.php"><button class="w-full text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded text-lg">Batalkan</button></a>
                <p class="text-xs text-gray-500 mt-3">Pemesanan dengan Cash on Delivery hanya dilayani dengan maksimal jarak 5km.</p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (empty($finalOrders)) : ?>
    <div class="mt-4 text-center text-lg">
        <span>😥 Aduh, kayanya kamu lupa pesan menunya deh...</span>
    </div>
<?php endif; ?>