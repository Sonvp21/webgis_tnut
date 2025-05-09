import "ol/ol.css";
import GeoJSON from "ol/format/GeoJSON.js";
import VectorSource from "ol/source/Vector";
import { Style, Fill, Text, Stroke, Icon } from "ol/style";
import {
    VectorImage as VectorImageLayer,
    Vector as VectorLayer,
} from "ol/layer";
import { TILE_LAYER } from "./tilelayer.js";

const APP_URL = document.querySelector('meta[name="app-url"]').content;

const API_URL = {
    gate: APP_URL + "/map/gate.geojson",
    campus: APP_URL + "/map/campus.geojson",
    ktx: APP_URL + "/map/ktx.geojson",
    hoitruong: APP_URL + "/map/hoitruong.geojson",
    thuvien: APP_URL + "/map/thuvien.geojson",
    xuong: APP_URL + "/map/xuong.geojson",
    vpkhoa: APP_URL + "/map/vpkhoa.geojson",
    cantine: APP_URL + "/map/cantine.geojson",
    conference: APP_URL + "/map/conference.geojson",
    yte: APP_URL + "/map/yte.geojson",
    giangduong: APP_URL + "/map/giangduong.geojson",
    tuaf: APP_URL + "/map/tuaf.geojson",
    lopdhcn1: APP_URL + "/map/lopdhcn1.geojson",
};
const LAYER_STYLE = {
    gate: new Style({
        stroke: new Stroke({
            color: "#FF00C5",
            width: 2,
        }),
    }),

    campus: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#00000024", width: 4 }),
            fill: new Fill({ color: "rgba(0,0,0,0)" }),
            text: new Text({
                text: feature.get("ten"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    ktx: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#28A745", width: 4 }),
            fill: new Fill({ color: "rgba(40, 167, 69, 0.1)" }),
            text: new Text({
                text: feature.get("ktx"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    hoitruong: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#6F42C1", width: 4 }),
            fill: new Fill({ color: "rgba(111, 66, 193, 0.1)" }),
            text: new Text({
                text: feature.get("toa"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    thuvien: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#00000024", width: 4 }),
            fill: new Fill({ color: "rgba(0,0,0,0)" }),
            text: new Text({
                text: feature.get("thuvien"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    xuong: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#007BFF", width: 4 }),
            fill: new Fill({ color: "rgba(0, 123, 255, 0.1)" }),
            text: new Text({
                text: feature.get("xuong"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    vpkhoa: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#DC3545", width: 4 }),
            fill: new Fill({ color: "rgba(220, 53, 69, 0.1)" }),
            text: new Text({
                text: feature.get("khoa"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    cantine: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#FD7E14", width: 4 }),
            fill: new Fill({ color: "rgba(253, 126, 20, 0.1)" }),
            text: new Text({
                text: feature.get("cantine"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    conference: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#E83E8C", width: 4 }),
            fill: new Fill({ color: "rgba(232, 62, 140, 0.1)" }),
            text: new Text({
                text: feature.get("conference"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },

    yte: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#20C997", width: 4 }),
            fill: new Fill({ color: "rgba(32, 201, 151, 0.1)" }),
            text: new Text({
                text: feature.get("yte"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },
    giangduong: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#0056b3", width: 4 }),
            fill: new Fill({ color: "rgba(0, 86, 179, 0.1)" }),
            text: new Text({
                text: feature.get("nha"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },
    tuaf: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#0056b3", width: 4 }),
            fill: new Fill({ color: "rgba(0, 86, 179, 0.1)" }),
            text: new Text({
                text: feature.get("Layer"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },
    lopdhcn1: function (feature) {
        return new Style({
            stroke: new Stroke({ color: "#000000", width: 4 }), // viền màu đen
            fill: new Fill({ color: "rgba(0, 0, 0, 0)" }),       // không có màu nền
            // font: "bold 16px Arial", // chỉnh cỡ chữ tại đây
            text: new Text({
                text: feature.get("name"),
                fill: new Fill({ color: "#000" }),
                stroke: new Stroke({ color: "#eee", width: 4 }),
            }),
        });
    },
}; 


const LAYER_SOURCE = {
    gate: new VectorSource({
        url: API_URL.gate,
        format: new GeoJSON(),
    }),
    campus: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.campus,
    }),
    ktx: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.ktx,
    }),
    hoitruong: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.hoitruong,
    }),
    thuvien: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.thuvien,
    }),
    xuong: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.xuong,
    }),
    vpkhoa: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.vpkhoa,
    }),
    cantine: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.cantine,
    }),
    conference: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.conference,
    }),
    yte: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.yte,
    }),
    giangduong: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.giangduong,
    }),
    tuaf: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.tuaf,
    }),
    lopdhcn1: new VectorSource({
        format: new GeoJSON(),
        url: API_URL.lopdhcn1,
    }),
};

export const ADMINISTRATIVE_LAYER = {
    gate: new VectorLayer({
        visible: false,
        title: "gate",
        source: LAYER_SOURCE.gate,
        style: LAYER_STYLE.gate,
    }),

    campus: new VectorImageLayer({
        visible: false,
        title: "campus",
        source: LAYER_SOURCE.campus,
        style: LAYER_STYLE.campus,
    }),

    ktx: new VectorLayer({
        visible: false,
        title: "ktx",
        source: LAYER_SOURCE.ktx,
        style: LAYER_STYLE.ktx,
    }),

    hoitruong: new VectorLayer({
        visible: false,
        title: "hoitruong",
        source: LAYER_SOURCE.hoitruong,
        style: LAYER_STYLE.hoitruong,
    }),

    thuvien: new VectorLayer({
        visible: false,
        title: "thuvien",
        source: LAYER_SOURCE.thuvien,
        style: LAYER_STYLE.thuvien,
    }),

    xuong: new VectorLayer({
        visible: false,
        title: "xuong",
        source: LAYER_SOURCE.xuong,
        style: LAYER_STYLE.xuong,
    }),

    vpkhoa: new VectorLayer({
        visible: false,
        title: "vpkhoa",
        source: LAYER_SOURCE.vpkhoa,
        style: LAYER_STYLE.vpkhoa,
    }),

    cantine: new VectorLayer({
        visible: false,
        title: "cantine",
        source: LAYER_SOURCE.cantine,
        style: LAYER_STYLE.cantine,
    }),

    conference: new VectorLayer({
        visible: false,
        title: "conference",
        source: LAYER_SOURCE.conference,
        style: LAYER_STYLE.conference,
    }),

    yte: new VectorLayer({
        visible: false,
        title: "yte",
        source: LAYER_SOURCE.yte,
        style: LAYER_STYLE.yte,
    }),

    giangduong: new VectorLayer({
        visible: false,
        title: "giangduong",
        source: LAYER_SOURCE.giangduong,
        style: LAYER_STYLE.giangduong,
    }),
    tuaf: new VectorLayer({
        visible: false,
        title: "tuaf",
        source: LAYER_SOURCE.tuaf,
        style: LAYER_STYLE.tuaf,
    }),
    lopdhcn1: new VectorLayer({
        visible: true,
        title: "lopdhcn1",
        source: LAYER_SOURCE.lopdhcn1,
        style: LAYER_STYLE.lopdhcn1,
    }),
};


export const ADMINISTRATIVE_UI = {
    gate: document.getElementById("gate-checkbox"),
    campus: document.getElementById("campus-checkbox"),
    ktx: document.getElementById("ktx-checkbox"),
    hoitruong: document.getElementById("hoitruong-checkbox"),
    thuvien: document.getElementById("thuvien-checkbox"),
    xuong: document.getElementById("xuong-checkbox"),
    vpkhoa: document.getElementById("vpkhoa-checkbox"),
    cantine: document.getElementById("cantine-checkbox"),
    conference: document.getElementById("conference-checkbox"),
    yte: document.getElementById("yte-checkbox"),
    giangduong: document.getElementById("giangduong-checkbox"),
    tuaf: document.getElementById("tuaf-checkbox"),
    lopdhcn1: document.getElementById("lopdhcn1-checkbox"),

};

ADMINISTRATIVE_UI.gate.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.gate.setVisible(this.checked);
});

ADMINISTRATIVE_UI.campus.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.campus.setVisible(this.checked);
});

ADMINISTRATIVE_UI.ktx.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.ktx.setVisible(this.checked);
});
ADMINISTRATIVE_UI.hoitruong.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.hoitruong.setVisible(this.checked);
});
ADMINISTRATIVE_UI.thuvien.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.thuvien.setVisible(this.checked);
});
ADMINISTRATIVE_UI.xuong.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.xuong.setVisible(this.checked);
});
ADMINISTRATIVE_UI.vpkhoa.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.vpkhoa.setVisible(this.checked);
});
ADMINISTRATIVE_UI.cantine.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.cantine.setVisible(this.checked);
});
ADMINISTRATIVE_UI.conference.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.conference.setVisible(this.checked);
});
ADMINISTRATIVE_UI.yte.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.yte.setVisible(this.checked);
});
ADMINISTRATIVE_UI.giangduong.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.giangduong.setVisible(this.checked);
});
ADMINISTRATIVE_UI.tuaf.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.tuaf.setVisible(this.checked);
});
ADMINISTRATIVE_UI.lopdhcn1.addEventListener("click", function () {
    ADMINISTRATIVE_LAYER.lopdhcn1.setVisible(this.checked);
});
export function ADMINISTRATIVE_INFOBOX(map) {
    
    map.on("singleclick", function (event) {
        const features = map.getFeaturesAtPixel(event.pixel);
        let prop = features[0].getProperties();
        // console.log(prop.layer)


        if (features.length === 0) return;

        // let prop = features[0].getProperties();

        // if (prop.layer === 'campus') {
        //     Livewire.dispatchTo('website.map.info.campus', 'getCommuneInfo', {
        //         'id': prop.id
        //     });
        // }

        if (prop.layer === "districts") {
            Livewire.dispatchTo(
                "website.map.info.districts",
                "getDistrictInfo",
                {
                    id: prop.id,
                }
            );
        }

        // if (prop.layer === "traffics") {
        //     Livewire.dispatchTo("website.map.info.traffics", "getTrafficInfo", {
        //         id: prop.id,
        //     });
        // }

    });
}
