import "ol/ol.css";
import GeoJSON from "ol/format/GeoJSON.js";
import VectorSource from "ol/source/Vector";
import { Style, Fill, Text, Stroke, Icon } from "ol/style";
import {
    VectorImage as VectorImageLayer,
    Vector as VectorLayer,
} from "ol/layer";
// import { TILE_LAYER } from "./tilelayer.js";

const APP_URL = document.querySelector('meta[name="app-url"]').content;

const API_URL = {
    borders: APP_URL + "/map/borders.geojson",
    ytes: APP_URL + "/map/ytes.geojson",

    
};

const LAYER_STYLE = {
    borders: function (feature) {
        return new Style({
            stroke: new Stroke({
                color: "#e79a3d",
                width: 2,
                lineDash: [2, 4],
            }),
            // fill: new Fill({ color: feature.get("color") }),

            text: new Text({
                text: feature.get("name"),
                font: "bold 14px Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif",
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({
                    color: "#fff",
                    width: 3,
                }),
            }),
        });
    },
    ytes: function (feature) {
        return new Style({
            stroke: new Stroke({
                color: "#00000024",
                width: 1,
            }),
            fill: new Fill({ color: "rgba(0,0,0,0)" }),
            text: new Text({
                text: feature.get("yte"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({
                    color: "#eee",
                    width: 2,
                }),
            }),
        });
    },


    
};

// this is only for small data ok
const LAYER_SOURCE = {
    borders: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.borders,
    }),
    ytes: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.ytes,
    }),


    
};

export const ADMINISTRATIVE_LAYER = {
    ytes: new VectorImageLayer({
        visible: true,
        title: "ytes",
        source: LAYER_SOURCE.ytes,
        style: LAYER_STYLE.ytes,
    }),

    borders: new VectorImageLayer({
        visible: true,
        title: "borders",
        source: LAYER_SOURCE.borders,
        style: LAYER_STYLE.borders,
    }),


};

export const ADMINISTRATIVE_UI = {
    ytes: document.getElementById("ytes-checkbox"),
    borders: document.getElementById("borders-checkbox"),

};

ADMINISTRATIVE_UI.ytes.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.ytes.setVisible(this.checked);
});

ADMINISTRATIVE_UI.borders.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.borders.setVisible(this.checked);
});





export function ADMINISTRATIVE_INFOBOX(map) {
    map.on("singleclick", function (event) {
        console.log('Map clicked', event);
        const features = map.getFeaturesAtPixel(event.pixel);
        console.log('Features at pixel:', features);
        if (features.length === 0) return;

        let prop = features[0].getProperties();

        if (prop.layer === "borders") {
            Livewire.dispatchTo(
                "website.map.info.borders",
                "getDistrictInfo",
                {
                    id: prop.id,
                }
            );
        }
        if (prop.layer === "ytes") {
            Livewire.dispatchTo("website.map.info.ytes", "getYteInfo", {
                id: prop.id,
            });
        }
    });
}
