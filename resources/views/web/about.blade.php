<x-website-layout>
    <div class="col-span-8 lg:col-span-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex flex-row items-center gap-1 bg-slate-100 px-4 py-2 text-xs uppercase text-slate-500">
            <a class="hover:text-slate-900 hover:underline" href="{{ route('home') }}">
                Trang chủ
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-4 w-4 text-slate-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
            </svg>
            <span>Giới thiệu</span>
        </div>
        <div class="py-10 space-y-6"> <!-- Tạo khoảng trắng và giãn cách giữa các khối nội dung -->
            <h2 class="text-2xl font-bold text-tnut-red">Giới thiệu Trường Đại học Kỹ thuật Công nghiệp</h2>

            <p class="text-justify">
                Trường Đại học Kỹ thuật Công nghiệp (TNUT), trực thuộc Đại học Thái Nguyên, là một trong những trường đại học kỹ thuật hàng đầu khu vực trung du và miền núi phía Bắc. Trường có lịch sử phát triển lâu đời và là nơi đào tạo nguồn nhân lực chất lượng cao cho đất nước.
            </p>

            <h3 class="text-xl font-semibold text-tnut-red">Tầm nhìn & Sứ mệnh</h3>

            <ul class="list-disc pl-5 space-y-2 text-justify">
                <li>Trở thành trường đại học kỹ thuật trọng điểm quốc gia và có uy tín trong khu vực.</li>
                <li>Đào tạo nguồn nhân lực kỹ thuật chất lượng cao, đáp ứng yêu cầu của cuộc cách mạng công nghiệp 4.0.</li>
                <li>Thực hiện nghiên cứu khoa học, chuyển giao công nghệ phục vụ phát triển kinh tế - xã hội.</li>
            </ul>

            <video autoplay muted loop class="w-full max-w-4xl mx-auto mt-6 rounded-lg shadow-lg">
                <source src="{{ asset('videos/tnut-intro.mp4') }}" type="video/mp4">
                Trình duyệt của bạn không hỗ trợ video.
            </video>
        </div>
    </div>
</x-website-layout>