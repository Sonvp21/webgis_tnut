import "ol/ol.css";
import Map from "ol/Map";
import View from "ol/View";
import { BASEMAP_LAYER } from "./basemap.js";
import { DEFAULT_CONTROLS } from "./basecontrol";
import { defaults as defaultControls } from "ol/control";
import { ADMINISTRATIVE_LAYER, ADMINISTRATIVE_INFOBOX } from "./baselayer";
// import { TILE_LAYER, TILE_LAYER_INFOBOX } from "./tilelayer.js";

/** End of extended functionalities **/

const VIEW = new View({
    projection: 'EPSG:4326',
    center: [105.8423093, 21.5490091],
    minZoom: 10,
    maxZoom: 20,
    zoom: 16.5,
});

const bordersSource = ADMINISTRATIVE_LAYER.borders.getSource();
bordersSource.on("addfeature", function () {
    VIEW.fit(bordersSource.getExtent());
});

const map = new Map({
    controls: defaultControls({
        zoom: false,
    }),
    layers: [
        BASEMAP_LAYER,
        ADMINISTRATIVE_LAYER.borders, //ranh giới toàn trường
        
        ADMINISTRATIVE_LAYER.ytes,
    ],
    target: "map",
    view: VIEW,
});

/**  Measurementsm, Zoom, Reset **/
DEFAULT_CONTROLS(
    map,
    bordersSource /* bordersSource is use to get the extent for the reset function */
);

/** Enable info for administrative map **/
// TILE_LAYER_INFOBOX(map);
ADMINISTRATIVE_INFOBOX(map);
