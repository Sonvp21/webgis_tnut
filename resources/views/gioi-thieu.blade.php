<x-layouts.app>
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
</x-layouts.app>
