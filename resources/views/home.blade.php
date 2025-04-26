<x-layouts.app>
    <!-- Bản đồ -->
    <div class="w-full h-full">
        <iframe class="w-full h-full" frameborder="0"
            src="https://www.bing.com/maps/embed?h=1000&w=1200&cp=21.029392~105.855331&lvl=11&typ=d&sty=r&src=SHELL&FORM=MBEDV8"
            allowfullscreen></iframe>
    </div>

    <!-- Thanh điều khiển bản đồ nổi bên phải -->
    <div class="absolute top-1/4 right-4 space-y-3 z-50">
        <button title="Lớp nền" class="bg-white rounded-full shadow p-2 hover:ring-2 hover:ring-tnut-red">
            <img src="/images/lop-nen-icon.png" alt="Lớp nền" class="h-6 w-6">
        </button>
        <button title="Lớp hành chính" class="bg-white rounded-full shadow p-2 hover:ring-2 hover:ring-tnut-red">
            <img src="/images/hanh-chinh-icon.png" alt="Lớp hành chính" class="h-6 w-6">
        </button>
        <button title="Cơ sở vật chất" class="bg-white rounded-full shadow p-2 hover:ring-2 hover:ring-tnut-red">
            <img src="/images/co-so-vat-chat-icon.png" alt="Cơ sở vật chất" class="h-6 w-6">
        </button>
        <button title="Phóng to"
            class="bg-white rounded-full shadow p-2 hover:ring-2 hover:ring-tnut-red text-xl font-bold">+</button>
        <button title="Thu nhỏ"
            class="bg-white rounded-full shadow p-2 hover:ring-2 hover:ring-tnut-red text-xl font-bold">−</button>
    </div>
</x-layouts.app>