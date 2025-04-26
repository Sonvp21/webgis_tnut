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

        // ADMINISTRATIVE_LAYER.districts,
        // ADMINISTRATIVE_LAYER.communes,
    ],
    target: "map",
    view: VIEW,
});

/**  Measurementsm, Zoom, Reset **/
DEFAULT_CONTROLS(
    map,
    // vuonSource /* vuonSource is use to get the extent for the reset function */
);

/** Enable info for administrative map **/
// TILE_LAYER_INFOBOX(map);
// ADMINISTRATIVE_INFOBOX(map);
// PRODUCT_INFOBOX(map);
// COMPANY_INFOBOX(map);
