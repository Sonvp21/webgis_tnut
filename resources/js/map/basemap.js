import XYZ from 'ol/source/XYZ';
import TileLayer from 'ol/layer/Tile';

// Khởi tạo lớp nền bản đồ với ngôn ngữ và vị trí mặc định
const BASEMAP_LAYERSOURCE = new XYZ({
    attributionsCollapsible: false,
    tilePixelRatio: 2,
    url: 'https://mt0.google.com/vt/lyrs=m&hl=vi&gl=VN&x={x}&y={y}&z={z}' // Mặc định ngôn ngữ tiếng Việt và vị trí là Việt Nam
});

export const BASEMAP_LAYER = new TileLayer({
    visible: true,
    source: BASEMAP_LAYERSOURCE
});

// Bắt sự kiện thay đổi lớp nền khi chọn bản đồ
document.querySelectorAll('input[type=radio][name="basemap"]').forEach(radio => radio.addEventListener('change', function () {
    let layerType = this.value;

    // Nếu chọn vệ tinh, chuyển sang lớp hybrid (vệ tinh + địa danh)
    if (layerType === 's') {
        layerType = 'y'; // Lớp hybrid có vệ tinh và tên địa danh
    }

    BASEMAP_LAYERSOURCE.setUrl(`https://mt0.google.com/vt/lyrs=${layerType}&hl=vi&gl=VN&x={x}&y={y}&z={z}`); // Đặt lại URL với lớp bản đồ và ngôn ngữ tiếng Việt
}));
