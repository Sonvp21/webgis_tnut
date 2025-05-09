import "ol/ol.css";
import Map from "ol/Map";
import View from "ol/View";
import { BASEMAP_LAYER } from "./basemap.js";
import { DEFAULT_CONTROLS } from "./basecontrol";
import { defaults as defaultControls } from "ol/control";
import { ADMINISTRATIVE_LAYER, ADMINISTRATIVE_INFOBOX } from "./baselayer";
import { TILE_LAYER, TILE_LAYER_INFOBOX } from "./tilelayer.js";

/** End of extended functionalities **/

const VIEW = new View({
    projection: "EPSG:4326",
    center: [105.8423093, 21.5490091],
    minZoom: 10,
    maxZoom: 20,
    zoom: 16.9,
});

// const vuonSource = ADMINISTRATIVE_LAYER.vuon.getSource();
// vuonSource.on("addfeature", function () {
//     VIEW.fit(vuonSource.getExtent());
// });

const map = new Map({
    controls: defaultControls({
        zoom: false,
    }),
    layers: [
        BASEMAP_LAYER,
        ADMINISTRATIVE_LAYER.gate,
        ADMINISTRATIVE_LAYER.campus,
        ADMINISTRATIVE_LAYER.ktx,
        ADMINISTRATIVE_LAYER.hoitruong,
        ADMINISTRATIVE_LAYER.thuvien,
        ADMINISTRATIVE_LAYER.xuong,
        ADMINISTRATIVE_LAYER.cantine,
        ADMINISTRATIVE_LAYER.conference,
        ADMINISTRATIVE_LAYER.yte,
        ADMINISTRATIVE_LAYER.vpkhoa,
        ADMINISTRATIVE_LAYER.giangduong,
        ADMINISTRATIVE_LAYER.tuaf,
        ADMINISTRATIVE_LAYER.lopdhcn1,
    ],
    target: "map",
    view: VIEW,
});

/**  Measurementsm, Zoom, Reset **/
DEFAULT_CONTROLS(
    map,
    // vuonSource /* vuonSource is use to get the extent for the reset function */
);
import Overlay from "ol/Overlay";

// Tạo overlay để hiển thị popup
const popupContainer = document.getElementById("popup");
const popupContent = document.getElementById("popup-content");

const overlay = new Overlay({
    element: popupContainer,
    autoPan: true,
    autoPanAnimation: {
        duration: 250,
    },
});
map.addOverlay(overlay);

// Sự kiện click để hiện popup thông tin
map.on("singleclick", function (evt) {
    const feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
        return feature;
    });

    if (feature) {
        const coordinates = evt.coordinate;

        // Lấy thuộc tính trừ geometry
        const props = feature.getProperties();
        delete props.geometry;

        let html = "<ul class='text-sm'>";
        for (const key in props) {
            html += `<li><strong>${key}:</strong> ${props[key]}</li>`;
        }
        html += "</ul>";

        popupContent.innerHTML = html;
        overlay.setPosition(coordinates);
        popupContainer.classList.remove("hidden");
    } else {
        overlay.setPosition(undefined);
        popupContainer.classList.add("hidden");
    }
});

/** Enable info for administrative map **/
// TILE_LAYER_INFOBOX(map);
// ADMINISTRATIVE_INFOBOX(map);
// PRODUCT_INFOBOX(map);
// COMPANY_INFOBOX(map);
