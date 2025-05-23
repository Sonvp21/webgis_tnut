/*!
 * @splidejs/splide-extension-grid
 * Version  : 0.4.1
 * License  : MIT
 * Copyright: 2022 Naotoshi Fujita
 */ (function (O) {
    typeof define == "function" && define.amd ? define(O) : O();
})(function () {
    "use strict";
    function O(n) {
        n.length = 0;
    }
    function S(n, t, i) {
        return Array.prototype.slice.call(n, t, i);
    }
    function T(n) {
        return n.bind.apply(n, [null].concat(S(arguments, 1)));
    }
    function V(n, t) {
        return typeof t === n;
    }
    var Q = Array.isArray;
    T(V, "function"), T(V, "string"), T(V, "undefined");
    function X(n) {
        return Q(n) ? n : [n];
    }
    function Z(n, t) {
        X(n).forEach(t);
    }
    var hn = Object.keys;
    function En(n, t, i) {
        if (n) {
            var r = hn(n);
            r = i ? r.reverse() : r;
            for (var f = 0; f < r.length; f++) {
                var a = r[f];
                if (a !== "__proto__" && t(n[a], a) === !1) break;
            }
        }
        return n;
    }
    function gn(n) {
        return (
            S(arguments, 1).forEach(function (t) {
                En(t, function (i, r) {
                    n[r] = t[r];
                });
            }),
            n
        );
    }
    var j = "splide";
    function mn() {
        var n = [];
        function t(u, c, l, v) {
            f(u, c, function (d, g, m) {
                var _ = "addEventListener" in d,
                    C = _
                        ? d.removeEventListener.bind(d, g, l, v)
                        : d.removeListener.bind(d, l);
                _ ? d.addEventListener(g, l, v) : d.addListener(l),
                    n.push([d, g, m, l, C]);
            });
        }
        function i(u, c, l) {
            f(u, c, function (v, d, g) {
                n = n.filter(function (m) {
                    return m[0] === v &&
                        m[1] === d &&
                        m[2] === g &&
                        (!l || m[3] === l)
                        ? (m[4](), !1)
                        : !0;
                });
            });
        }
        function r(u, c, l) {
            var v,
                d = !0;
            return (
                typeof CustomEvent == "function"
                    ? (v = new CustomEvent(c, { bubbles: d, detail: l }))
                    : ((v = document.createEvent("CustomEvent")),
                      v.initCustomEvent(c, d, !1, l)),
                u.dispatchEvent(v),
                v
            );
        }
        function f(u, c, l) {
            Z(u, function (v) {
                v &&
                    Z(c, function (d) {
                        d.split(" ").forEach(function (g) {
                            var m = g.split(".");
                            l(v, m[0], m[1]);
                        });
                    });
            });
        }
        function a() {
            n.forEach(function (u) {
                u[4]();
            }),
                O(n);
        }
        return { bind: t, unbind: i, dispatch: r, destroy: a };
    }
    var pn = "visible",
        yn = "hidden",
        H = "refresh",
        wn = "updated",
        _n = "destroy";
    function k(n) {
        var t = n ? n.event.bus : document.createDocumentFragment(),
            i = mn();
        function r(a, u) {
            i.bind(t, X(a).join(" "), function (c) {
                u.apply(u, Q(c.detail) ? c.detail : []);
            });
        }
        function f(a) {
            i.dispatch(t, a, S(arguments, 1));
        }
        return (
            n && n.event.on(_n, i.destroy),
            gn(i, { bus: t, on: r, off: T(i.unbind, t), emit: f })
        );
    }
    var Cn = j,
        $ = j + "__slide",
        An = $ + "__container";
    function nn(n) {
        n.length = 0;
    }
    function I(n, t, i) {
        return Array.prototype.slice.call(n, t, i);
    }
    function B(n) {
        return n.bind.apply(n, [null].concat(I(arguments, 1)));
    }
    function N(n, t) {
        return typeof t === n;
    }
    function bn(n) {
        return !P(n) && N("object", n);
    }
    var F = Array.isArray;
    B(N, "function");
    var G = B(N, "string"),
        Ln = B(N, "undefined");
    function P(n) {
        return n === null;
    }
    function Dn(n) {
        return n instanceof HTMLElement;
    }
    function U(n) {
        return F(n) ? n : [n];
    }
    function A(n, t) {
        U(n).forEach(t);
    }
    function tn(n, t) {
        return n.push.apply(n, U(t)), n;
    }
    function rn(n, t, i) {
        n &&
            A(t, function (r) {
                r && n.classList[i ? "add" : "remove"](r);
            });
    }
    function q(n, t) {
        rn(n, G(t) ? t.split(" ") : t, !0);
    }
    function R(n, t) {
        A(t, n.appendChild.bind(n));
    }
    function On(n, t) {
        return Dn(n) && (n.msMatchesSelector || n.matches).call(n, t);
    }
    function Tn(n, t) {
        var i = n ? I(n.children) : [];
        return t
            ? i.filter(function (r) {
                  return On(r, t);
              })
            : i;
    }
    function on(n, t) {
        return t ? Tn(n, t)[0] : n.firstElementChild;
    }
    var en = Object.keys;
    function un(n, t, i) {
        if (n) {
            var r = en(n);
            r = i ? r.reverse() : r;
            for (var f = 0; f < r.length; f++) {
                var a = r[f];
                if (a !== "__proto__" && t(n[a], a) === !1) break;
            }
        }
        return n;
    }
    function $n(n) {
        return (
            I(arguments, 1).forEach(function (t) {
                un(t, function (i, r) {
                    n[r] = t[r];
                });
            }),
            n
        );
    }
    function In(n, t) {
        U(t || en(n)).forEach(function (i) {
            delete n[i];
        });
    }
    function J(n, t) {
        A(n, function (i) {
            A(t, function (r) {
                i && i.removeAttribute(r);
            });
        });
    }
    function K(n, t, i) {
        bn(t)
            ? un(t, function (r, f) {
                  K(n, f, r);
              })
            : A(n, function (r) {
                  P(i) || i === "" ? J(r, t) : r.setAttribute(t, String(i));
              });
    }
    function fn(n, t, i) {
        var r = document.createElement(n);
        return t && (G(t) ? q(r, t) : K(r, t)), i && R(i, r), r;
    }
    function p(n, t, i) {
        if (Ln(i)) return getComputedStyle(n)[t];
        P(i) || (n.style[t] = "" + i);
    }
    function Nn(n, t) {
        return n && n.classList.contains(t);
    }
    function Rn(n) {
        A(n, function (t) {
            t && t.parentNode && t.parentNode.removeChild(t);
        });
    }
    function an(n, t) {
        return t ? I(n.querySelectorAll(t)) : [];
    }
    function cn(n, t) {
        rn(n, t, !1);
    }
    function x(n) {
        return G(n) ? n : n ? n + "px" : "";
    }
    var xn = "splide";
    function Mn(n, t) {
        if (!n) throw new Error("[" + xn + "] " + (t || ""));
    }
    var Sn = Math.min,
        Un = Math.max,
        qn = Math.floor,
        Jn = Math.ceil,
        Kn = Math.abs;
    function Vn(n) {
        return n < 10 ? "0" + n : "" + n;
    }
    var sn = $ + "__row",
        z = $ + "--col",
        Hn = { rows: 1, cols: 1, dimensions: [], gap: {} };
    function Bn(n) {
        function t() {
            var f = n.rows,
                a = n.cols,
                u = n.dimensions;
            return F(u) && u.length ? u : [[f, a]];
        }
        function i(f) {
            var a = t();
            return a[Sn(f, a.length - 1)];
        }
        function r(f) {
            for (var a = t(), u, c, l = 0, v = 0; v < a.length; v++) {
                var d = a[v];
                if (((u = d[0] || 1), (c = d[1] || 1), (l += u * c), f < l))
                    break;
            }
            return Mn(u && c, "Invalid dimension"), [u, c];
        }
        return { get: i, getAt: r };
    }
    function Fn(n, t, i) {
        var r = k(n),
            f = r.on,
            a = r.destroy,
            u = n.Components,
            c = n.options,
            l = u.Direction.resolve,
            v = u.Slides.forEach;
        function d() {
            m(), c.slideFocus && (f(pn, W), f(yn, Y));
        }
        function g() {
            v(function (e) {
                var s = e.slide;
                D(s, !1),
                    M(s).forEach(function (o) {
                        J(o, "style");
                    }),
                    b(s).forEach(function (o) {
                        L(o, !0), J(o, "style");
                    });
            }),
                a();
        }
        function m() {
            v(function (e) {
                var s = e.slide,
                    o = i.get(e.isClone ? e.slideIndex : e.index),
                    h = o[0],
                    E = o[1];
                _(h, s),
                    C(E, s),
                    b(e.slide).forEach(function (y, w) {
                        (y.id = e.slide.id + "-col" + Vn(w + 1)),
                            n.options.cover && L(y);
                    });
            });
        }
        function _(e, s) {
            var o = t.gap.row,
                h =
                    "calc(" +
                    100 / e +
                    "%" +
                    (o ? " - " + x(o) + " * " + (e - 1) / e : "") +
                    ")";
            M(s).forEach(function (E, y, w) {
                p(E, "height", h),
                    p(E, "display", "flex"),
                    p(E, "margin", "0 0 " + x(o) + " 0"),
                    p(E, "padding", 0),
                    y === w.length - 1 && p(E, "marginBottom", 0);
            });
        }
        function C(e, s) {
            var o = t.gap.col,
                h =
                    "calc(" +
                    100 / e +
                    "%" +
                    (o ? " - " + x(o) + " * " + (e - 1) / e : "") +
                    ")";
            b(s).forEach(function (E, y, w) {
                p(E, "width", h),
                    y !== w.length - 1 && p(E, l("marginRight"), x(o));
            });
        }
        function L(e, s) {
            var o = on(e, "." + An),
                h = on(o || e, "img");
            h &&
                h.src &&
                (p(
                    o || e,
                    "background",
                    s ? "" : 'center/cover no-repeat url("' + h.src + '")'
                ),
                p(h, "display", s ? "" : "none"));
        }
        function M(e) {
            return an(e, "." + sn);
        }
        function b(e) {
            return an(e, "." + z);
        }
        function D(e, s) {
            b(e).forEach(function (o) {
                K(o, "tabindex", s ? 0 : null);
            });
        }
        function W(e) {
            D(e.slide, !0);
        }
        function Y(e) {
            D(e.slide, !1);
        }
        return { mount: d, destroy: g };
    }
    function Gn(n, t, i) {
        var r = k(n),
            f = r.on,
            a = r.off,
            u = t.Elements,
            c = {},
            l = Bn(c),
            v = Fn(n, c, l),
            d = Cn + "--grid",
            g = [];
        function m() {
            _(), f(wn, _);
        }
        function _() {
            In(c),
                $n(c, Hn, i.grid || {}),
                Y()
                    ? (C(),
                      tn(g, u.slides),
                      q(n.root, d),
                      R(u.list, b()),
                      a(H),
                      f(H, M),
                      L())
                    : e() && (C(), L());
        }
        function C() {
            if (e()) {
                var s = u.slides;
                v.destroy(),
                    g.forEach(function (o) {
                        cn(o, z), R(u.list, o);
                    }),
                    Rn(s),
                    cn(n.root, d),
                    nn(s),
                    tn(s, g),
                    nn(g),
                    a(H);
            }
        }
        function L() {
            n.refresh();
        }
        function M() {
            e() && v.mount();
        }
        function b() {
            var s = [],
                o = 0,
                h = 0,
                E,
                y;
            return (
                g.forEach(function (w, Pn) {
                    var dn = l.getAt(Pn),
                        vn = dn[0],
                        ln = dn[1];
                    h ||
                        (o || ((E = fn(w.tagName, $)), s.push(E)),
                        (y = D(vn, w, E))),
                        W(ln, w, y),
                        ++h >= ln && ((h = 0), (o = ++o >= vn ? 0 : o));
                }),
                s
            );
        }
        function D(s, o, h) {
            var E = o.tagName.toLowerCase() === "li" ? "ul" : "div";
            return fn(E, sn, h);
        }
        function W(s, o, h) {
            return q(o, z), R(h, o), o;
        }
        function Y() {
            if (i.grid) {
                var s = c.rows,
                    o = c.cols,
                    h = c.dimensions;
                return s > 1 || o > 1 || (F(h) && h.length > 0);
            }
            return !1;
        }
        function e() {
            return Nn(n.root, d);
        }
        return { mount: m, destroy: C };
    }
    typeof window < "u" &&
        ((window.splide = window.splide || {}),
        (window.splide.Extensions = window.splide.Extensions || {}),
        (window.splide.Extensions.Grid = Gn));
});
//# sourceMappingURL=splide-extension-grid.min.js.map
