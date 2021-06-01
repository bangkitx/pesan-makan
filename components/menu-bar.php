<div id="menu-order-bar" class="h-full bg-gray-200 p-8 rounded mb-5 hidden">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
        <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
    </svg>
    <h1 class="title-font font-black text-xl text-gray-900 mb-6">Pesanan Anda</h1>
    <form method="post" action="orders.php">
        <input id="menu-order-data-orders" type="text" name="orders" value="" hidden />
        <div id="menu-order-bar-list"></div>
        <div class="mt-4 mt-mb-0 text-right">
            <button type="submit" class="text-white bg-yellow-500 border-0 py-2 px-4 focus:outline-none hover:bg-yellow-600 rounded">
                Konfirmasi Pesanan
            </button>
        </div>
    </form>
</div>
<script type="text/javascript">
    let menuBar, menuBarList;

    document.addEventListener('DOMContentLoaded', function() {
        menuBar = document.getElementById('menu-order-bar');
        menuBarList = document.getElementById('menu-order-bar-list');
    });

    function addMenuOrderItem(id, thumbnail, name) {
        menuBar = document.getElementById('menu-order-bar');
        menuBarList = document.getElementById('menu-order-bar-list');
        if (!menuBar || !menuBarList) return;
        let quantity = promptMenuOrderQuantity(name);
        let currentOrders = document.getElementById('menu-order-data-orders');
        let oldData = currentOrders.value ? JSON.parse(currentOrders.value) : [];
        oldData.push({
            id: id,
            quantity: quantity
        });
        currentOrders.value = JSON.stringify(oldData);
        let item = document.createElement('a');
        item.id = `menu-order-item-${id}`;
        item.classList.add('inline-flex', 'items-center', 'mb-4', 'mr-4', 'p-4', 'rounded', 'bg-white', 'border', 'border-yellow-500');
        item.innerHTML = `
            <img alt="${name}" src="${thumbnail}" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
                <span class="title-font font-medium text-gray-900">${name}</span>
                <span id="menu-order-item-quantity-${id}" class="text-gray-500 text-sm">${quantity} Porsi</span>
            </span>
            <svg onclick="removeMenuOrderItem(${id}, this)" class="w-5 h-5 rounded-full flex-shrink-0 object-cover object-center ml-4 order-menu-item-delete" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
        `;
        menuBarList.appendChild(item);
        if (menuBar.classList.contains('hidden')) toggleMenuBar();
    }

    function promptMenuOrderQuantity(name) {
        let valid = false,
            quantity = 1,
            message = `${name}-nya pengen berapa porsi nih gan? 🤔`;
        while (!valid) {
            quantity = parseInt(window.prompt(`${message}`, 1));
            if (Number.isInteger(quantity)) valid = true;
            else message = 'Data porsi yang dimasukkin harus angka ya... 🙃'
        }
        return quantity;
    }

    function removeMenuOrderItem(id, itemTarget) {
        let currentOrders = document.getElementById('menu-order-data-orders');
        if (currentOrders) {
            let oldData = currentOrders.value ? JSON.parse(currentOrders.value) : [];
            oldData = oldData.filter(function(item) {
                return item.id !== id
            });
            currentOrders.value = JSON.stringify(oldData);
            const item = itemTarget.parentElement;
            if (item) menuBarList.removeChild(item);
            if (menuBarList.childElementCount <= 0 && !menuBar.classList.contains('hidden')) toggleMenuBar();
        }
    }

    function toggleMenuBar() {
        if (!menuBar) return;
        menuBar.classList.toggle('hidden');
    }
</script>