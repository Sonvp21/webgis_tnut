
<div>
    @if (session('msg'))
    {{session('msg')}}
    @endif
    <h2>Cập nhật bài viết:</h2>
    <form action="" wire:submit="handleSubmit">
        <input type="text" placeholder="Tên..." wire:model="name"/>
        <button>Submit</button>
    </form>
</div>
