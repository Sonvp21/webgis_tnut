<style>
    .custom-background-header {
        background-image: url("{{ asset('homepage/banner/banner_header.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 8rem;
    }
    @media (max-width: 768px) {
    .custom-background-header {
        height: 3rem;
        width: 100%;
        background-size: 475px 50px;
    }
}
</style>
<div class="custom-background-header">
</div>