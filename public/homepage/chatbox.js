var TuDongChat = (function () {
    "use strict";
    var Ie = Object.defineProperty;
    var Pe = (C, R, O) =>
      R in C
        ? Ie(C, R, { enumerable: !0, configurable: !0, writable: !0, value: O })
        : (C[R] = O);
    var gt = (C, R, O) => (Pe(C, typeof R != "symbol" ? R + "" : R, O), O);
    function C() {}
    const R = (t) => t;
    function O(t) {
      return t();
    }
    function mt() {
      return Object.create(null);
    }
    function I(t) {
      t.forEach(O);
    }
    function nt(t) {
      return typeof t == "function";
    }
    function rt(t, e) {
      return t != t
        ? e == e
        : t !== e || (t && typeof t == "object") || typeof t == "function";
    }
    let J;
    function ot(t, e) {
      return J || (J = document.createElement("a")), (J.href = e), t === J.href;
    }
    function Wt(t) {
      return Object.keys(t).length === 0;
    }
    function _t(t) {
      const e = typeof t == "string" && t.match(/^\s*(-?[\d.]+)([^\s]*)\s*$/);
      return e ? [parseFloat(e[1]), e[2] || "px"] : [t, "px"];
    }
    const yt = typeof window < "u";
    let Ut = yt ? () => window.performance.now() : () => Date.now(),
      it = yt ? (t) => requestAnimationFrame(t) : C;
    const P = new Set();
    function vt(t) {
      P.forEach((e) => {
        e.c(t) || (P.delete(e), e.f());
      }),
        P.size !== 0 && it(vt);
    }
    function Mt(t) {
      let e;
      return (
        P.size === 0 && it(vt),
        {
          promise: new Promise((n) => {
            P.add((e = { c: t, f: n }));
          }),
          abort() {
            P.delete(e);
          },
        }
      );
    }
    function H(t, e) {
      t.appendChild(e);
    }
    function Ft(t, e, n) {
      const r = st(t);
      if (!r.getElementById(e)) {
        const i = A("style");
        (i.id = e), (i.textContent = n), xt(r, i);
      }
    }
    function st(t) {
      if (!t) return document;
      const e = t.getRootNode ? t.getRootNode() : t.ownerDocument;
      return e && e.host ? e : t.ownerDocument;
    }
    function Nt(t) {
      const e = A("style");
      return xt(st(t), e), e.sheet;
    }
    function xt(t, e) {
      return H(t.head || t, e), e.sheet;
    }
    function wt(t, e, n) {
      t.insertBefore(e, n || null);
    }
    function K(t) {
      t.parentNode && t.parentNode.removeChild(t);
    }
    function A(t) {
      return document.createElement(t);
    }
    function Vt(t) {
      return document.createTextNode(t);
    }
    function bt() {
      return Vt(" ");
    }
    function Gt(t, e, n, r) {
      return t.addEventListener(e, n, r), () => t.removeEventListener(e, n, r);
    }
    function S(t, e, n) {
      n == null
        ? t.removeAttribute(e)
        : t.getAttribute(e) !== n && t.setAttribute(e, n);
    }
    function Zt(t) {
      return Array.from(t.childNodes);
    }
    function Bt(t, e, n, r) {
      n === null
        ? t.style.removeProperty(e)
        : t.style.setProperty(e, n, r ? "important" : "");
    }
    function j(t, e, n) {
      t.classList[n ? "add" : "remove"](e);
    }
    function Jt(t, e, { bubbles: n = !1, cancelable: r = !1 } = {}) {
      const i = document.createEvent("CustomEvent");
      return i.initCustomEvent(t, n, r, e), i;
    }
    const Q = new Map();
    let X = 0;
    function Kt(t) {
      let e = 5381,
        n = t.length;
      for (; n--; ) e = ((e << 5) - e) ^ t.charCodeAt(n);
      return e >>> 0;
    }
    function Qt(t, e) {
      const n = { stylesheet: Nt(e), rules: {} };
      return Q.set(t, n), n;
    }
    function Ct(t, e, n, r, i, c, g, s = 0) {
      const u = 16.666 / r;
      let a = `{
  `;
      for (let v = 0; v <= 1; v += u) {
        const E = e + (n - e) * c(v);
        a +=
          v * 100 +
          `%{${g(E, 1 - E)}}
  `;
      }
      const f =
          a +
          `100% {${g(n, 1 - n)}}
  }`,
        d = `__svelte_${Kt(f)}_${s}`,
        h = st(t),
        { stylesheet: p, rules: y } = Q.get(h) || Qt(h, t);
      y[d] ||
        ((y[d] = !0), p.insertRule(`@keyframes ${d} ${f}`, p.cssRules.length));
      const w = t.style.animation || "";
      return (
        (t.style.animation = `${
          w ? `${w}, ` : ""
        }${d} ${r}ms linear ${i}ms 1 both`),
        (X += 1),
        d
      );
    }
    function Xt(t, e) {
      const n = (t.style.animation || "").split(", "),
        r = n.filter(
          e ? (c) => c.indexOf(e) < 0 : (c) => c.indexOf("__svelte") === -1
        ),
        i = n.length - r.length;
      i && ((t.style.animation = r.join(", ")), (X -= i), X || Yt());
    }
    function Yt() {
      it(() => {
        X ||
          (Q.forEach((t) => {
            const { ownerNode: e } = t.stylesheet;
            e && K(e);
          }),
          Q.clear());
      });
    }
    let W;
    function U(t) {
      W = t;
    }
    function te() {
      if (!W) throw new Error("Function called outside component initialization");
      return W;
    }
    function ee(t) {
      te().$$.on_destroy.push(t);
    }
    const T = [],
      M = [];
    let q = [];
    const St = [],
      ne = Promise.resolve();
    let at = !1;
    function re() {
      at || ((at = !0), ne.then(Et));
    }
    function F(t) {
      q.push(t);
    }
    const ct = new Set();
    let D = 0;
    function Et() {
      if (D !== 0) return;
      const t = W;
      do {
        try {
          for (; D < T.length; ) {
            const e = T[D];
            D++, U(e), oe(e.$$);
          }
        } catch (e) {
          throw ((T.length = 0), (D = 0), e);
        }
        for (U(null), T.length = 0, D = 0; M.length; ) M.pop()();
        for (let e = 0; e < q.length; e += 1) {
          const n = q[e];
          ct.has(n) || (ct.add(n), n());
        }
        q.length = 0;
      } while (T.length);
      for (; St.length; ) St.pop()();
      (at = !1), ct.clear(), U(t);
    }
    function oe(t) {
      if (t.fragment !== null) {
        t.update(), I(t.before_update);
        const e = t.dirty;
        (t.dirty = [-1]),
          t.fragment && t.fragment.p(t.ctx, e),
          t.after_update.forEach(F);
      }
    }
    function ie(t) {
      const e = [],
        n = [];
      q.forEach((r) => (t.indexOf(r) === -1 ? e.push(r) : n.push(r))),
        n.forEach((r) => r()),
        (q = e);
    }
    let N;
    function se() {
      return (
        N ||
          ((N = Promise.resolve()),
          N.then(() => {
            N = null;
          })),
        N
      );
    }
    function lt(t, e, n) {
      t.dispatchEvent(Jt(`${e ? "intro" : "outro"}${n}`));
    }
    const Y = new Set();
    let z;
    function ae() {
      z = { r: 0, c: [], p: z };
    }
    function ce() {
      z.r || I(z.c), (z = z.p);
    }
    function V(t, e) {
      t && t.i && (Y.delete(t), t.i(e));
    }
    function ut(t, e, n, r) {
      if (t && t.o) {
        if (Y.has(t)) return;
        Y.add(t),
          z.c.push(() => {
            Y.delete(t), r && (n && t.d(1), r());
          }),
          t.o(e);
      } else r && r();
    }
    const le = { duration: 0 };
    function kt(t, e, n, r) {
      const i = { direction: "both" };
      let c = e(t, n, i),
        g = r ? 0 : 1,
        s = null,
        u = null,
        a = null;
      function f() {
        a && Xt(t, a);
      }
      function d(p, y) {
        const w = p.b - g;
        return (
          (y *= Math.abs(w)),
          {
            a: g,
            b: p.b,
            d: w,
            duration: y,
            start: p.start,
            end: p.start + y,
            group: p.group,
          }
        );
      }
      function h(p) {
        const {
            delay: y = 0,
            duration: w = 300,
            easing: v = R,
            tick: E = C,
            css: o,
          } = c || le,
          l = { start: Ut() + y, b: p };
        p || ((l.group = z), (z.r += 1)),
          s || u
            ? (u = l)
            : (o && (f(), (a = Ct(t, g, p, w, y, v, o))),
              p && E(0, 1),
              (s = d(l, w)),
              F(() => lt(t, p, "start")),
              Mt((m) => {
                if (
                  (u &&
                    m > u.start &&
                    ((s = d(u, w)),
                    (u = null),
                    lt(t, s.b, "start"),
                    o && (f(), (a = Ct(t, g, s.b, s.duration, 0, v, c.css)))),
                  s)
                ) {
                  if (m >= s.end)
                    E((g = s.b), 1 - g),
                      lt(t, s.b, "end"),
                      u || (s.b ? f() : --s.group.r || I(s.group.c)),
                      (s = null);
                  else if (m >= s.start) {
                    const x = m - s.start;
                    (g = s.a + s.d * v(x / s.duration)), E(g, 1 - g);
                  }
                }
                return !!(s || u);
              }));
      }
      return {
        run(p) {
          nt(c)
            ? se().then(() => {
                (c = c(i)), h(p);
              })
            : h(p);
        },
        end() {
          f(), (s = u = null);
        },
      };
    }
    [
      ...[
        "allowfullscreen",
        "allowpaymentrequest",
        "async",
        "autofocus",
        "autoplay",
        "checked",
        "controls",
        "default",
        "defer",
        "disabled",
        "formnovalidate",
        "hidden",
        "inert",
        "ismap",
        "loop",
        "multiple",
        "muted",
        "nomodule",
        "novalidate",
        "open",
        "playsinline",
        "readonly",
        "required",
        "reversed",
        "selected",
      ],
    ];
    function ue(t) {
      t && t.c();
    }
    function $t(t, e, n, r) {
      const { fragment: i, after_update: c } = t.$$;
      i && i.m(e, n),
        r ||
          F(() => {
            const g = t.$$.on_mount.map(O).filter(nt);
            t.$$.on_destroy ? t.$$.on_destroy.push(...g) : I(g),
              (t.$$.on_mount = []);
          }),
        c.forEach(F);
    }
    function Rt(t, e) {
      const n = t.$$;
      n.fragment !== null &&
        (ie(n.after_update),
        I(n.on_destroy),
        n.fragment && n.fragment.d(e),
        (n.on_destroy = n.fragment = null),
        (n.ctx = []));
    }
    function fe(t, e) {
      t.$$.dirty[0] === -1 && (T.push(t), re(), t.$$.dirty.fill(0)),
        (t.$$.dirty[(e / 31) | 0] |= 1 << e % 31);
    }
    function zt(t, e, n, r, i, c, g, s = [-1]) {
      const u = W;
      U(t);
      const a = (t.$$ = {
        fragment: null,
        ctx: [],
        props: c,
        update: C,
        not_equal: i,
        bound: mt(),
        on_mount: [],
        on_destroy: [],
        on_disconnect: [],
        before_update: [],
        after_update: [],
        context: new Map(e.context || (u ? u.$$.context : [])),
        callbacks: mt(),
        dirty: s,
        skip_bound: !1,
        root: e.target || u.$$.root,
      });
      g && g(a.root);
      let f = !1;
      if (
        ((a.ctx = n
          ? n(t, e.props || {}, (d, h, ...p) => {
              const y = p.length ? p[0] : h;
              return (
                a.ctx &&
                  i(a.ctx[d], (a.ctx[d] = y)) &&
                  (!a.skip_bound && a.bound[d] && a.bound[d](y), f && fe(t, d)),
                h
              );
            })
          : []),
        a.update(),
        (f = !0),
        I(a.before_update),
        (a.fragment = r ? r(a.ctx) : !1),
        e.target)
      ) {
        if (e.hydrate) {
          const d = Zt(e.target);
          a.fragment && a.fragment.l(d), d.forEach(K);
        } else a.fragment && a.fragment.c();
        e.intro && V(t.$$.fragment),
          $t(t, e.target, e.anchor, e.customElement),
          Et();
      }
      U(u);
    }
    class Ot {
      $destroy() {
        Rt(this, 1), (this.$destroy = C);
      }
      $on(e, n) {
        if (!nt(n)) return C;
        const r = this.$$.callbacks[e] || (this.$$.callbacks[e] = []);
        return (
          r.push(n),
          () => {
            const i = r.indexOf(n);
            i !== -1 && r.splice(i, 1);
          }
        );
      }
      $set(e) {
        this.$$set &&
          !Wt(e) &&
          ((this.$$.skip_bound = !0), this.$$set(e), (this.$$.skip_bound = !1));
      }
    }
    function de(t) {
      const e = t - 1;
      return e * e * e + 1;
    }
    function At(
      t,
      {
        delay: e = 0,
        duration: n = 400,
        easing: r = de,
        x: i = 0,
        y: c = 0,
        opacity: g = 0,
      } = {}
    ) {
      const s = getComputedStyle(t),
        u = +s.opacity,
        a = s.transform === "none" ? "" : s.transform,
        f = u * (1 - g),
        [d, h] = _t(i),
        [p, y] = _t(c);
      return {
        delay: e,
        duration: n,
        easing: r,
        css: (w, v) => `
              transform: ${a} translate(${(1 - w) * d}${h}, ${(1 - w) * p}${y});
              opacity: ${u - f * v}`,
      };
    }
    let he = (t = 21) =>
        crypto
          .getRandomValues(new Uint8Array(t))
          .reduce(
            (e, n) => (
              (n &= 63),
              n < 36
                ? (e += n.toString(36))
                : n < 62
                ? (e += (n - 26).toString(36).toUpperCase())
                : n > 62
                ? (e += "-")
                : (e += "_"),
              e
            ),
            ""
          ),
      G = !1,
      ft = G ? "http://localhost:5173" : "https://app.tudongchat.com",
      jt = G ? "http://localhost:3000" : "https://shark.tudongchat.com";
    const pe = (t) => {
        (G = t),
          (ft = G ? "http://localhost:5173" : "https://app.tudongchat.com"),
          (jt = G ? "http://localhost:3000" : "https://shark.tudongchat.com");
      },
      ge = (t) => {
        const e = he(),
          n = encodeURIComponent(window.location.href),
          r = encodeURIComponent(
            Intl.DateTimeFormat().resolvedOptions().timeZone
          ),
          i = `${jt}/guest/visit?footprint=${e}&id=${t}&url=${n}&timezone=${r}`,
          c = `${ft}/chat/${t}?footprint=${e}&url=${n}`;
        return { footprint_url: i, iframe_url: c, footprint: e };
      },
      L = [];
    function me(t, e) {
      return { subscribe: Ht(t, e).subscribe };
    }
    function Ht(t, e = C) {
      let n;
      const r = new Set();
      function i(s) {
        if (rt(t, s) && ((t = s), n)) {
          const u = !L.length;
          for (const a of r) a[1](), L.push(a, t);
          if (u) {
            for (let a = 0; a < L.length; a += 2) L[a][0](L[a + 1]);
            L.length = 0;
          }
        }
      }
      function c(s) {
        i(s(t));
      }
      function g(s, u = C) {
        const a = [s, u];
        return (
          r.add(a),
          r.size === 1 && (n = e(i) || C),
          s(t),
          () => {
            r.delete(a), r.size === 0 && n && (n(), (n = null));
          }
        );
      }
      return { set: i, update: c, subscribe: g };
    }
    function _e(t) {
      return {
        all: (t = t || new Map()),
        on: function (e, n) {
          var r = t.get(e);
          r ? r.push(n) : t.set(e, [n]);
        },
        off: function (e, n) {
          var r = t.get(e);
          r && (n ? r.splice(r.indexOf(n) >>> 0, 1) : t.set(e, []));
        },
        emit: function (e, n) {
          var r = t.get(e);
          r &&
            r.slice().map(function (i) {
              i(n);
            }),
            (r = t.get("*")) &&
              r.slice().map(function (i) {
                i(e, n);
              });
        },
      };
    }
    const k = _e(),
      dt = (t, e) => t.kind === e && t.from === "tudongchat";
    window.addEventListener("message", ({ data: t }) => {
      dt(t, "initial") && k.emit("initial", t.data);
    }),
      window.addEventListener("message", ({ data: t }) => {
        dt(t, "close") && k.emit("close");
      }),
      window.addEventListener("message", ({ data: t }) => {
        dt(t, "open") && k.emit("open");
      });
    const ye = me(null, (t) => {
        k.on("initial", t), k.on("reset", () => t(null));
      }),
      tt = Ht("close", (t) => {
        k.on("open", () => t("open")),
          k.on("close", () => t("close")),
          k.on("reset", () => t("close"));
      });
    function ve(t) {
      Ft(
        t,
        "svelte-3x3xt4",
        ".tracker.svelte-3x3xt4.svelte-3x3xt4{display:none}.tudongchat-com.svelte-3x3xt4.svelte-3x3xt4{position:fixed;bottom:30px;right:30px;display:flex;z-index:20}.tudongchat-com.ltr.svelte-3x3xt4.svelte-3x3xt4{bottom:30px;left:30px;flex-direction:column-reverse}.tudongchat-com.ltr.svelte-3x3xt4>.tudongchat-icon.svelte-3x3xt4{right:auto;left:0}.tudongchat-icon.svelte-3x3xt4.svelte-3x3xt4{position:absolute;bottom:0;right:0;cursor:pointer;background-color:#0598ff;border-radius:100%;margin-top:auto;transition:all .15s ease-in-out;display:grid;padding:15px;place-content:center;box-shadow:0 0 10px rgba(0, 0, 0, 0.2)}.tudongchat-box.svelte-3x3xt4.svelte-3x3xt4{width:420px;height:580px;border-radius:10px;margin-right:.5rem;opacity:0;transition:all .15s ease-in-out;transform:scale(.9)}.tudongchat-animate-open.svelte-3x3xt4.svelte-3x3xt4{transform:scale(1);opacity:1}.tudongchat-box.svelte-3x3xt4>iframe.svelte-3x3xt4{width:100%;height:100%;border-radius:10px;box-shadow:0 0 10px rgba(0, 0, 0, 0.2)}.t-hidden.svelte-3x3xt4.svelte-3x3xt4{display:none}@media screen and (max-width: 500px){.tudongchat-box.svelte-3x3xt4.svelte-3x3xt4{width:100%;height:100%;top:0;left:0;bottom:0;right:0;border-radius:0%;position:fixed}.tudongchat-box.svelte-3x3xt4>iframe.svelte-3x3xt4{border-radius:0}.tudongchat-com.svelte-3x3xt4.svelte-3x3xt4{border-radius:0}}.tudongchat-icon-logo.svelte-3x3xt4.svelte-3x3xt4{transition:all .15s ease-in-out;width:25px;height:25px;max-width:none;max-height:none}.tudongchat-icon.svelte-3x3xt4:hover>.tudongchat-icon-logo.svelte-3x3xt4{transform:scale(1.1)}.tudongchat-icon.svelte-3x3xt4:active>.tudongchat-icon-logo.svelte-3x3xt4{transform:scale(0.8)}"
      );
    }
    function It(t) {
      let e, n, r, i, c, g, s;
      const newSrc = window.iconChatbotUrl; 
      return {
        c() {
          (e = A("div")),
            (n = A("img")),
            S(n, "class", "tudongchat-icon-logo svelte-3x3xt4"),
            ot(n.src, (r = newSrc)) || S(n, "src", r), 
            S(n, "alt", ""),
            S(e, "class", "tudongchat-icon svelte-3x3xt4"),
            Bt(e, "background-color", t[3]);
        },
        m(u, a) {
          wt(u, e, a),
            H(e, n),
            t[13](e),
            (c = !0),
            g || ((s = Gt(e, "click", t[10])), (g = !0));
        },
        p(u, a) {
          (!c || a & 8) && Bt(e, "background-color", u[3]);
        },
        i(u) {
          c ||
            (F(() => {
              c && (i || (i = kt(e, At, {}, !0)), i.run(1));
            }),
            (c = !0));
        },
        o(u) {
          i || (i = kt(e, At, {}, !1)), i.run(0), (c = !1);
        },
        d(u) {
          u && K(e), t[13](null), u && i && i.end(), (g = !1), s();
        },
      };
    }
    function xe(t) {
      let e,
        n,
        r,
        i,
        c,
        g,
        s,
        u,
        a,
        f = t[0] && It(t);
      return {
        c() {
          (e = A("div")),
            (n = A("div")),
            (r = A("iframe")),
            (c = bt()),
            f && f.c(),
            (g = bt()),
            (s = A("iframe")),
            ot(r.src, (i = t[9])) || S(r, "src", i),
            S(r, "title", "Main boxchat"),
            S(r, "frameborder", "0"),
            S(r, "class", "svelte-3x3xt4"),
            S(n, "class", "tudongchat-box svelte-3x3xt4"),
            j(n, "t-hidden", t[0]),
            j(n, "tudongchat-animate-open", t[2]),
            S(s, "title", "Tracker"),
            S(s, "class", "tracker svelte-3x3xt4"),
            ot(s.src, (u = t[8])) || S(s, "src", u),
            S(s, "frameborder", "0"),
            S(e, "class", "tudongchat-com svelte-3x3xt4"),
            j(e, "t-hidden", !t[1]),
            j(e, "ltr", t[4] === "left");
        },
        m(d, h) {
          wt(d, e, h),
            H(e, n),
            H(n, r),
            t[12](n),
            H(e, c),
            f && f.m(e, null),
            H(e, g),
            H(e, s),
            t[14](e),
            (a = !0);
        },
        p(d, [h]) {
          (!a || h & 1) && j(n, "t-hidden", d[0]),
            (!a || h & 4) && j(n, "tudongchat-animate-open", d[2]),
            d[0]
              ? f
                ? (f.p(d, h), h & 1 && V(f, 1))
                : ((f = It(d)), f.c(), V(f, 1), f.m(e, g))
              : f &&
                (ae(),
                ut(f, 1, 1, () => {
                  f = null;
                }),
                ce()),
            (!a || h & 2) && j(e, "t-hidden", !d[1]),
            (!a || h & 16) && j(e, "ltr", d[4] === "left");
        },
        i(d) {
          a || (V(f), (a = !0));
        },
        o(d) {
          ut(f), (a = !1);
        },
        d(d) {
          d && K(e), t[12](null), f && f.d(), t[14](null);
        },
      };
    }
    function we(t, e, n) {
      let { id: r } = e;
      const { footprint_url: i, iframe_url: c } = ge(r),
        g = (_) => new Promise(($) => setTimeout($, _));
      let s = !0,
        u = !1,
        a = !1,
        f = "#0598ff",
        d = "right",
        h,
        p,
        y;
      const w = window.document.body,
        v = {
          current: 20,
          get force() {
            return 2147483644;
          },
          get default() {
            return 20;
          },
          set default(_) {
            this.current = _;
          },
          get isReady() {
            return !!h && !!p && !!y;
          },
          update(_) {
            _ ?? (_ = this.current),
              this.isReady &&
                (n(5, (h.style.zIndex = _.toString()), h),
                n(6, (p.style.zIndex = (_ - 1).toString()), p),
                n(7, (y.style.zIndex = _.toString()), y)),
              (this.current = _);
          },
        },
        E = ye.subscribe((_) => {
          n(1, (u = !!_)),
            _ &&
              (n(3, (f = _.color || "")),
              (v.default = _.z_index ?? v.default),
              n(4, (d = _.position || "right")),
              v.isReady &&
                (v.update(),
                _.color && n(6, (p.style.backgroundColor = _.color), p)));
        }),
        o = () => {
          n(0, (s = !1)),
            g(50).then(() => n(2, (a = !0))),
            w.clientWidth <= 460 && (w.style.overflow = "hidden"),
            v.update(v.force);
        },
        l = () => {
          n(2, (a = !1)),
            g(150).then(() => n(0, (s = !0))),
            w.clientWidth <= 460 && (w.style.overflow = ""),
            v.update(v.default);
        };
      tt.subscribe((_) => {
        _ === "open" ? o() : l();
      });
      const m = () => tt.update((_) => (_ === "open" ? "close" : "open"));
      ee(E);
      function x(_) {
        M[_ ? "unshift" : "push"](() => {
          (y = _), n(7, y);
        });
      }
      function b(_) {
        M[_ ? "unshift" : "push"](() => {
          (p = _), n(6, p);
        });
      }
      function B(_) {
        M[_ ? "unshift" : "push"](() => {
          (h = _), n(5, h);
        });
      }
      return (
        (t.$$set = (_) => {
          "id" in _ && n(11, (r = _.id));
        }),
        [s, u, a, f, d, h, p, y, i, c, m, r, x, b, B]
      );
    }
    class be extends Ot {
      constructor(e) {
        super(), zt(this, e, we, xe, rt, { id: 11 }, ve);
      }
    }
    function Be(t) {
      let e, n;
      return (
        (e = new t[1]({ props: { id: t[0] } })),
        {
          c() {
            ue(e.$$.fragment);
          },
          m(r, i) {
            $t(e, r, i), (n = !0);
          },
          p(r, [i]) {
            const c = {};
            i & 1 && (c.id = r[0]), e.$set(c);
          },
          i(r) {
            n || (V(e.$$.fragment, r), (n = !0));
          },
          o(r) {
            ut(e.$$.fragment, r), (n = !1);
          },
          d(r) {
            Rt(e, r);
          },
        }
      );
    }
    function Ce(t, e, n) {
      let { id: r } = e,
        { dev: i = void 0 } = e,
        { persistent: c = !0 } = e,
        g = be;
      return (
        i !== void 0 && pe(i),
        c &&
          (localStorage.getItem("tudongchat:state"),
          tt.subscribe((s) => {
            localStorage.setItem("tudongchat:state", s);
          })),
        (t.$$set = (s) => {
          "id" in s && n(0, (r = s.id)),
            "dev" in s && n(2, (i = s.dev)),
            "persistent" in s && n(3, (c = s.persistent));
        }),
        [r, g, i, c]
      );
    }
    class Se extends Ot {
      constructor(e) {
        super(), zt(this, e, Ce, Be, rt, { id: 0, dev: 2, persistent: 3 });
      }
    }
    var Z =
      typeof globalThis < "u"
        ? globalThis
        : typeof window < "u"
        ? window
        : typeof global < "u"
        ? global
        : typeof self < "u"
        ? self
        : {};
    function Ee(t) {
      return t &&
        t.__esModule &&
        Object.prototype.hasOwnProperty.call(t, "default")
        ? t.default
        : t;
    }
    function ke(t) {
      if (t.__esModule) return t;
      var e = t.default;
      if (typeof e == "function") {
        var n = function r() {
          if (this instanceof r) {
            var i = [null];
            i.push.apply(i, arguments);
            var c = Function.bind.apply(e, i);
            return new c();
          }
          return e.apply(this, arguments);
        };
        n.prototype = e.prototype;
      } else n = {};
      return (
        Object.defineProperty(n, "__esModule", { value: !0 }),
        Object.keys(t).forEach(function (r) {
          var i = Object.getOwnPropertyDescriptor(t, r);
          Object.defineProperty(
            n,
            r,
            i.get
              ? i
              : {
                  enumerable: !0,
                  get: function () {
                    return t[r];
                  },
                }
          );
        }),
        n
      );
    }
    var Pt = { exports: {} };
    function $e(t) {
      throw new Error(
        'Could not dynamically require "' +
          t +
          '". Please configure the dynamicRequireTargets or/and ignoreDynamicRequires option of @rollup/plugin-commonjs appropriately for this require call to work.'
      );
    }
    var ht = { exports: {} };
    const Re = ke(
      Object.freeze(
        Object.defineProperty(
          { __proto__: null, default: {} },
          Symbol.toStringTag,
          { value: "Module" }
        )
      )
    );
    var Tt;
    function ze() {
      return (
        Tt ||
          ((Tt = 1),
          (function (t, e) {
            (function (n, r) {
              t.exports = r();
            })(Z, function () {
              var n =
                n ||
                (function (r, i) {
                  var c;
                  if (
                    (typeof window < "u" && window.crypto && (c = window.crypto),
                    typeof self < "u" && self.crypto && (c = self.crypto),
                    typeof globalThis < "u" &&
                      globalThis.crypto &&
                      (c = globalThis.crypto),
                    !c &&
                      typeof window < "u" &&
                      window.msCrypto &&
                      (c = window.msCrypto),
                    !c && typeof Z < "u" && Z.crypto && (c = Z.crypto),
                    !c && typeof $e == "function")
                  )
                    try {
                      c = Re;
                    } catch {}
                  var g = function () {
                      if (c) {
                        if (typeof c.getRandomValues == "function")
                          try {
                            return c.getRandomValues(new Uint32Array(1))[0];
                          } catch {}
                        if (typeof c.randomBytes == "function")
                          try {
                            return c.randomBytes(4).readInt32LE();
                          } catch {}
                      }
                      throw new Error(
                        "Native crypto module could not be used to get secure random number."
                      );
                    },
                    s =
                      Object.create ||
                      (function () {
                        function o() {}
                        return function (l) {
                          var m;
                          return (
                            (o.prototype = l),
                            (m = new o()),
                            (o.prototype = null),
                            m
                          );
                        };
                      })(),
                    u = {},
                    a = (u.lib = {}),
                    f = (a.Base = (function () {
                      return {
                        extend: function (o) {
                          var l = s(this);
                          return (
                            o && l.mixIn(o),
                            (!l.hasOwnProperty("init") || this.init === l.init) &&
                              (l.init = function () {
                                l.$super.init.apply(this, arguments);
                              }),
                            (l.init.prototype = l),
                            (l.$super = this),
                            l
                          );
                        },
                        create: function () {
                          var o = this.extend();
                          return o.init.apply(o, arguments), o;
                        },
                        init: function () {},
                        mixIn: function (o) {
                          for (var l in o)
                            o.hasOwnProperty(l) && (this[l] = o[l]);
                          o.hasOwnProperty("toString") &&
                            (this.toString = o.toString);
                        },
                        clone: function () {
                          return this.init.prototype.extend(this);
                        },
                      };
                    })()),
                    d = (a.WordArray = f.extend({
                      init: function (o, l) {
                        (o = this.words = o || []),
                          l != i
                            ? (this.sigBytes = l)
                            : (this.sigBytes = o.length * 4);
                      },
                      toString: function (o) {
                        return (o || p).stringify(this);
                      },
                      concat: function (o) {
                        var l = this.words,
                          m = o.words,
                          x = this.sigBytes,
                          b = o.sigBytes;
                        if ((this.clamp(), x % 4))
                          for (var B = 0; B < b; B++) {
                            var _ = (m[B >>> 2] >>> (24 - (B % 4) * 8)) & 255;
                            l[(x + B) >>> 2] |= _ << (24 - ((x + B) % 4) * 8);
                          }
                        else
                          for (var $ = 0; $ < b; $ += 4)
                            l[(x + $) >>> 2] = m[$ >>> 2];
                        return (this.sigBytes += b), this;
                      },
                      clamp: function () {
                        var o = this.words,
                          l = this.sigBytes;
                        (o[l >>> 2] &= 4294967295 << (32 - (l % 4) * 8)),
                          (o.length = r.ceil(l / 4));
                      },
                      clone: function () {
                        var o = f.clone.call(this);
                        return (o.words = this.words.slice(0)), o;
                      },
                      random: function (o) {
                        for (var l = [], m = 0; m < o; m += 4) l.push(g());
                        return new d.init(l, o);
                      },
                    })),
                    h = (u.enc = {}),
                    p = (h.Hex = {
                      stringify: function (o) {
                        for (
                          var l = o.words, m = o.sigBytes, x = [], b = 0;
                          b < m;
                          b++
                        ) {
                          var B = (l[b >>> 2] >>> (24 - (b % 4) * 8)) & 255;
                          x.push((B >>> 4).toString(16)),
                            x.push((B & 15).toString(16));
                        }
                        return x.join("");
                      },
                      parse: function (o) {
                        for (var l = o.length, m = [], x = 0; x < l; x += 2)
                          m[x >>> 3] |=
                            parseInt(o.substr(x, 2), 16) << (24 - (x % 8) * 4);
                        return new d.init(m, l / 2);
                      },
                    }),
                    y = (h.Latin1 = {
                      stringify: function (o) {
                        for (
                          var l = o.words, m = o.sigBytes, x = [], b = 0;
                          b < m;
                          b++
                        ) {
                          var B = (l[b >>> 2] >>> (24 - (b % 4) * 8)) & 255;
                          x.push(String.fromCharCode(B));
                        }
                        return x.join("");
                      },
                      parse: function (o) {
                        for (var l = o.length, m = [], x = 0; x < l; x++)
                          m[x >>> 2] |=
                            (o.charCodeAt(x) & 255) << (24 - (x % 4) * 8);
                        return new d.init(m, l);
                      },
                    }),
                    w = (h.Utf8 = {
                      stringify: function (o) {
                        try {
                          return decodeURIComponent(escape(y.stringify(o)));
                        } catch {
                          throw new Error("Malformed UTF-8 data");
                        }
                      },
                      parse: function (o) {
                        return y.parse(unescape(encodeURIComponent(o)));
                      },
                    }),
                    v = (a.BufferedBlockAlgorithm = f.extend({
                      reset: function () {
                        (this._data = new d.init()), (this._nDataBytes = 0);
                      },
                      _append: function (o) {
                        typeof o == "string" && (o = w.parse(o)),
                          this._data.concat(o),
                          (this._nDataBytes += o.sigBytes);
                      },
                      _process: function (o) {
                        var l,
                          m = this._data,
                          x = m.words,
                          b = m.sigBytes,
                          B = this.blockSize,
                          _ = B * 4,
                          $ = b / _;
                        o
                          ? ($ = r.ceil($))
                          : ($ = r.max(($ | 0) - this._minBufferSize, 0));
                        var et = $ * B,
                          Lt = r.min(et * 4, b);
                        if (et) {
                          for (var pt = 0; pt < et; pt += B)
                            this._doProcessBlock(x, pt);
                          (l = x.splice(0, et)), (m.sigBytes -= Lt);
                        }
                        return new d.init(l, Lt);
                      },
                      clone: function () {
                        var o = f.clone.call(this);
                        return (o._data = this._data.clone()), o;
                      },
                      _minBufferSize: 0,
                    }));
                  a.Hasher = v.extend({
                    cfg: f.extend(),
                    init: function (o) {
                      (this.cfg = this.cfg.extend(o)), this.reset();
                    },
                    reset: function () {
                      v.reset.call(this), this._doReset();
                    },
                    update: function (o) {
                      return this._append(o), this._process(), this;
                    },
                    finalize: function (o) {
                      o && this._append(o);
                      var l = this._doFinalize();
                      return l;
                    },
                    blockSize: 16,
                    _createHelper: function (o) {
                      return function (l, m) {
                        return new o.init(m).finalize(l);
                      };
                    },
                    _createHmacHelper: function (o) {
                      return function (l, m) {
                        return new E.HMAC.init(o, m).finalize(l);
                      };
                    },
                  });
                  var E = (u.algo = {});
                  return u;
                })(Math);
              return n;
            });
          })(ht)),
        ht.exports
      );
    }
    (function (t, e) {
      (function (n, r) {
        t.exports = r(ze());
      })(Z, function (n) {
        return (
          (function () {
            var r = n,
              i = r.lib,
              c = i.WordArray,
              g = i.Hasher,
              s = r.algo,
              u = [],
              a = (s.SHA1 = g.extend({
                _doReset: function () {
                  this._hash = new c.init([
                    1732584193, 4023233417, 2562383102, 271733878, 3285377520,
                  ]);
                },
                _doProcessBlock: function (f, d) {
                  for (
                    var h = this._hash.words,
                      p = h[0],
                      y = h[1],
                      w = h[2],
                      v = h[3],
                      E = h[4],
                      o = 0;
                    o < 80;
                    o++
                  ) {
                    if (o < 16) u[o] = f[d + o] | 0;
                    else {
                      var l = u[o - 3] ^ u[o - 8] ^ u[o - 14] ^ u[o - 16];
                      u[o] = (l << 1) | (l >>> 31);
                    }
                    var m = ((p << 5) | (p >>> 27)) + E + u[o];
                    o < 20
                      ? (m += ((y & w) | (~y & v)) + 1518500249)
                      : o < 40
                      ? (m += (y ^ w ^ v) + 1859775393)
                      : o < 60
                      ? (m += ((y & w) | (y & v) | (w & v)) - 1894007588)
                      : (m += (y ^ w ^ v) - 899497514),
                      (E = v),
                      (v = w),
                      (w = (y << 30) | (y >>> 2)),
                      (y = p),
                      (p = m);
                  }
                  (h[0] = (h[0] + p) | 0),
                    (h[1] = (h[1] + y) | 0),
                    (h[2] = (h[2] + w) | 0),
                    (h[3] = (h[3] + v) | 0),
                    (h[4] = (h[4] + E) | 0);
                },
                _doFinalize: function () {
                  var f = this._data,
                    d = f.words,
                    h = this._nDataBytes * 8,
                    p = f.sigBytes * 8;
                  return (
                    (d[p >>> 5] |= 128 << (24 - (p % 32))),
                    (d[(((p + 64) >>> 9) << 4) + 14] = Math.floor(
                      h / 4294967296
                    )),
                    (d[(((p + 64) >>> 9) << 4) + 15] = h),
                    (f.sigBytes = d.length * 4),
                    this._process(),
                    this._hash
                  );
                },
                clone: function () {
                  var f = g.clone.call(this);
                  return (f._hash = this._hash.clone()), f;
                },
              }));
            (r.SHA1 = g._createHelper(a)), (r.HmacSHA1 = g._createHmacHelper(a));
          })(),
          n.SHA1
        );
      });
    })(Pt);
    var Oe = Pt.exports;
    const Ae = Ee(Oe),
      qt = "https://collect.tudongchat.com/js/script.js",
      je = (t) => {
        if (document.querySelector(`script[src="${qt}"]`)) return;
        t && (t = `${Ae(t)}.tdc`);
        const e = document.createElement("script");
        (e.defer = !0),
          e.setAttribute("data-domain", t ?? window.location.host),
          e.setAttribute("src", qt),
          document.head.appendChild(e);
      },
      He = (t) => {
        const e = document.createElement("div");
        return (e.id = t), document.body.appendChild(e), e;
      };
    class Dt {
      constructor(e, n) {
        gt(this, "el");
        gt(this, "app");
        (this.id = e), (this.options = n), (this.el = He(this.id)), je(e);
      }
      initial() {
        this.app = new Se({
          target: this.el,
          props: { id: this.id, ...this.options },
        });
      }
      reload() {
        this.app && (this.app.$destroy(), this.initial());
      }
      popup(e = !0) {
        tt.set(e ? "open" : "close");
      }
      onInit(e) {
        k.on("initial", e);
      }
      onClose(e) {
        k.on("close", e);
      }
      onOpen(e) {
        k.on("open", e);
      }
      off(e) {
        k.off(e);
      }
    }
    return window && (window.TuDongChat = Dt), Dt;
  })();
  //# sourceMappingURL=chatbox.js.map
  