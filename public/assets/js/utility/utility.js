/*!
 * Minified Utility Resources
 * Theme Core resources.
 */
!function (t) {
    function e(t, e) {
        var n = t.options.animationSpeed / 1e3;
        return e.css({transition: n + "s right, " + n + "s left, " + n + "s top, " + n + "s bottom, " + n + "s height, " + n + "s width"}), !0
    }

    function n(t) {
        return t.css({transition: "none"}), !0
    }

    var o = {
        width: 400,
        height: "65%",
        minimizedWidth: 200,
        gutter: 10,
        poppedOutDistance: "6%",
        title: function () {
            return ""
        },
        dialogClass: "",
        buttons: [],
        animationSpeed: 400,
        opacity: 1,
        initialState: "modal",
        showClose: !0,
        showPopout: !0,
        showMinimize: !0,
        create: void 0,
        open: void 0,
        beforeClose: void 0,
        close: void 0,
        beforeMinimize: void 0,
        minimize: void 0,
        beforeRestore: void 0,
        restore: void 0,
        beforePopout: void 0,
        popout: void 0
    }, i = "dockmodal", l = (t(window).width(), {
        init: function (n) {
            return this.each(function () {
                var r = t(this), a = r.data("dockmodal");
                if (r.options = t.extend({}, o, n), function () {
                        "function" == typeof r.options.title && (r.options.title = r.options.title.call(r))
                    }(), a)return t("body").append(r.closest("." + i).show()), l.refreshLayout(), void setTimeout(function () {
                    l.restore.apply(r)
                }, r.options.animationSpeed);
                r.data("dockmodal", r);
                var s = t("body"), c = t(window), u = t("<div/>").addClass(i).addClass(r.options.dialogClass);
                "modal" == r.options.initialState ? u.addClass("popped-out") : "minimized" == r.options.initialState && u.addClass("minimized"), u.height(0), e(r, u);
                var p = t("<div></div>").addClass(i + "-header");
                r.options.showClose && t('<a href="#" class="header-action action-close" title="Close"><i class="icon-dockmodal-close"></i></a>').appendTo(p).click(function () {
                    return l.destroy.apply(r), !1
                }), r.options.showPopout && t('<a href="#" class="header-action action-popout" title="Pop out"><i class="icon-dockmodal-popout"></i></a>').appendTo(p).click(function () {
                    return u.hasClass("popped-out") ? l.restore.apply(r) : l.popout.apply(r), !1
                }), r.options.showMinimize && t('<a href="#" class="header-action action-minimize" title="Minimize"><i class="icon-dockmodal-minimize"></i></a>').appendTo(p).click(function () {
                    return u.hasClass("minimized") ? u.hasClass("popped-out") ? l.popout.apply(r) : l.restore.apply(r) : l.minimize.apply(r), !1
                }), r.options.showMinimize && r.options.showPopout && p.click(function () {
                    return u.hasClass("minimized") ? u.hasClass("popped-out") ? l.popout.apply(r) : l.restore.apply(r) : l.minimize.apply(r), !1
                }), p.append('<div class="title-text">' + (r.options.title || r.attr("title")) + "</div>"), u.append(p);
                var d = t('<div class="modal-placeholder"></div>').insertAfter(r);
                r.placeholder = d;
                var h = t("<div></div>").addClass(i + "-body").append(r);
                if (u.append(h), r.options.buttons.length) {
                    var f = t("<div></div>").addClass(i + "-footer"), v = t("<div></div>").addClass(i + "-footer-buttonset");
                    f.append(v), t.each(r.options.buttons, function (e, n) {
                        var o = t('<a href="#" class="btn"></a>');
                        o.attr({id: n.id, "class": n.buttonClass}), o.html(n.html), o.click(function (t) {
                            return n.click(t, r), !1
                        }), v.append(o)
                    }), u.append(f)
                } else u.addClass("no-footer");
                var m = t("." + i + "-overlay");
                m.length || (m = t("<div/>").addClass(i + "-overlay")), t.isFunction(r.options.create) && r.options.create(r), s.append(u), u.after(m), h.focus(), t.isFunction(r.options.open) && setTimeout(function () {
                    r.options.open(r)
                }, r.options.animationSpeed), u.hasClass("minimized") ? (u.find(".dockmodal-body, .dockmodal-footer").hide(), l.minimize.apply(r)) : u.hasClass("popped-out") ? l.popout.apply(r) : l.restore.apply(r), s.data("windowWidth", c.width()), c.unbind("resize.dockmodal").bind("resize.dockmodal", function () {
                    c.width() != s.data("windowWidth") && (s.data("windowWidth", c.width()), l.refreshLayout())
                })
            })
        }, destroy: function () {
            return this.each(function () {
                var e = t(this).data("dockmodal");
                if (e && (!t.isFunction(e.options.beforeClose) || e.options.beforeClose(e) !== !1))try {
                    var n = e.closest("." + i);
                    n.css(n.hasClass("popped-out") && !n.hasClass("minimized") ? {
                        left: "50%",
                        right: "50%",
                        top: "50%",
                        bottom: "50%"
                    } : {width: "0", height: "0"}), setTimeout(function () {
                        e.removeData("dockmodal"), e.placeholder.replaceWith(e), n.remove(), t("." + i + "-overlay").hide(), l.refreshLayout(), t.isFunction(e.options.close) && e.options.close(e)
                    }, e.options.animationSpeed)
                } catch (o) {
                    alert(o.message)
                }
            })
        }, close: function () {
            l.destroy.apply(this)
        }, minimize: function () {
            return this.each(function () {
                var e = t(this).data("dockmodal");
                if (e && (!t.isFunction(e.options.beforeMinimize) || e.options.beforeMinimize(e) !== !1)) {
                    var n = e.closest("." + i), o = n.find(".dockmodal-header").outerHeight();
                    n.addClass("minimized").css({
                        width: e.options.minimizedWidth + "px",
                        height: o + "px",
                        left: "auto",
                        right: "auto",
                        top: "auto",
                        bottom: "0"
                    }), setTimeout(function () {
                        n.find(".dockmodal-body, .dockmodal-footer").hide(), t.isFunction(e.options.minimize) && e.options.minimize(e)
                    }, e.options.animationSpeed), t("." + i + "-overlay").hide(), n.find(".action-minimize").attr("title", "Restore"), l.refreshLayout()
                }
            })
        }, restore: function () {
            return this.each(function () {
                var e = t(this).data("dockmodal");
                if (e && (!t.isFunction(e.options.beforeRestore) || e.options.beforeRestore(e) !== !1)) {
                    var n = e.closest("." + i);
                    n.removeClass("minimized popped-out"), n.find(".dockmodal-body, .dockmodal-footer").show(), n.css({
                        width: e.options.width + "px",
                        height: e.options.height,
                        left: "auto",
                        right: "auto",
                        top: "auto",
                        bottom: "0"
                    }), t("." + i + "-overlay").hide(), n.find(".action-minimize").attr("title", "Minimize"), n.find(".action-popout").attr("title", "Pop-out"), setTimeout(function () {
                        t.isFunction(e.options.restore) && e.options.restore(e)
                    }, e.options.animationSpeed), l.refreshLayout()
                }
            })
        }, popout: function () {
            return this.each(function () {
                var o = t(this).data("dockmodal");
                if (o && (!t.isFunction(o.options.beforePopout) || o.options.beforePopout(o) !== !1)) {
                    var r = o.closest("." + i);
                    r.find(".dockmodal-body, .dockmodal-footer").show(), n(r);
                    var a = r.position(), s = t(window).width();
                    r.css({
                        width: "auto",
                        height: "auto",
                        left: a.left + "px",
                        right: s - a.left - r.outerWidth(!0) + "px",
                        top: a.top + "px",
                        bottom: 0
                    }), e(o, r), setTimeout(function () {
                        r.removeClass("minimized").addClass("popped-out").css({
                            width: "auto",
                            height: "auto",
                            left: o.options.poppedOutDistance,
                            right: o.options.poppedOutDistance,
                            top: o.options.poppedOutDistance,
                            bottom: o.options.poppedOutDistance
                        }), t("." + i + "-overlay").show(), r.find(".action-popout").attr("title", "Pop-in"), l.refreshLayout()
                    }, 10), setTimeout(function () {
                        t.isFunction(o.options.popout) && o.options.popout(o)
                    }, o.options.animationSpeed)
                }
            })
        }, refreshLayout: function () {
            var e = 0, n = t(window).width();
            t.each(t("." + i).toArray().reverse(), function () {
                var o = t(this), l = o.find("." + i + "-body > div").data("dockmodal");
                (!o.hasClass("popped-out") || o.hasClass("minimized")) && (e += l.options.gutter, o.css({right: e + "px"}), e += o.hasClass("minimized") ? l.options.minimizedWidth : l.options.width, e > n ? o.hide() : setTimeout(function () {
                    o.show()
                }, l.options.animationSpeed))
            })
        }
    });
    t.fn.dockmodal = function (e) {
        return l[e] ? l[e].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof e && e ? void t.error("Method " + e + " does not exist on jQuery.dockmodal") : l.init.apply(this, arguments)
    }
}(jQuery), function (t, e) {
    t.fn.adminpanel = function (n) {
        var o = {
            grid: ".admin-grid", draggable: !1, mobile: !1, preserveGrid: !1, onPanel: function () {
                console.log("callback:", "onPanel")
            }, onStart: function () {
                console.log("callback:", "onStart")
            }, onSave: function () {
                console.log("callback:", "onSave")
            }, onDrop: function () {
                console.log("callback:", "onDrop")
            }, onFinish: function () {
                console.log("callback:", "onFinish")
            }
        }, n = t.extend({}, o, n), i = t(this), l = (i.attr("id"), n.grid), r = n.draggable, a = n.mobile, s = n.preserveGrid, c = i.find(".panel"), u = "panel-settings_" + location.pathname, p = "panel-positions_" + location.pathname, d = localStorage.getItem(u), h = localStorage.getItem(p);
        t(".panel").on("click", ".panel-controls > a", function (e) {
            e.preventDefault(), t("body.ui-drag-active").length || f.controlHandlers.call(this, n)
        });
        var f = {
            init: function (e) {
                t(this);
                if ("function" == typeof e.onStart && e.onStart(), h ? f.setPositions() : localStorage.setItem(p, f.findPositions()), d || localStorage.setItem(u, f.modifySettings()), t(l).each(function (e, n) {
                        t(n).attr("id", "grid-" + e)
                    }), s) {
                    var n = "<div class='panel preserve-grid'></div>";
                    t(l).each(function (e, o) {
                        t(o).append(n)
                    })
                }
                f.createControls(e), f.createMobileControls(e), f.applySettings(), r === !0 && i.sortable({
                    items: i.find('.panel:not(".sort-disable")'),
                    connectWith: l,
                    cursor: "default",
                    revert: 250,
                    handle: ".panel-heading",
                    opacity: 1,
                    delay: 100,
                    tolerance: "pointer",
                    scroll: !0,
                    placeholder: "panel-placeholder",
                    forcePlaceholderSize: !0,
                    forceHelperSize: !0,
                    start: function (e, n) {
                        t("body").addClass("ui-drag-active"), n.placeholder.height(n.helper.outerHeight() - 4)
                    },
                    beforeStop: function () {
                        "function" == typeof e.onDrop && e.onDrop()
                    },
                    stop: function () {
                        t("body").removeClass("ui-drag-active")
                    },
                    update: function () {
                        f.toggleLoader(), f.updatePositions(e)
                    }
                }), "function" == typeof e.onFinish && e.onFinish()
            }, createMobileControls: function () {
                var e = c.find(".panel-controls"), n = {};
                t.each(e, function (e, o) {
                    var i = t(o), l = t(o).parents(".panel").attr("id"), r = i.width(), a = i.siblings(".panel-title").width(), s = (i.parent(".panel-heading").width(), r + a);
                    n[l] = s
                }), console.log(n), t.each(n, function (e, n) {
                    var o = t("#" + e), i = o.width() - 75, l = o.find(".panel-controls");
                    if (a === !0 || n > i) {
                        o.addClass("mobile-controls");
                        var r = {
                            html: !0,
                            placement: "left",
                            content: function () {
                                var e = t(this).clone();
                                return e
                            },
                            template: '<div data-popover-id="' + e + '" class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
                        };
                        l.popover(r)
                    } else l.removeClass("mobile-controls")
                }), t(".mobile-controls .panel-heading > .panel-controls").on("click", function () {
                    t(this).toggleClass("panel-controls-open")
                })
            }, applySettings: function () {
                var e = localStorage.getItem(u), n = JSON.parse(e), o = "panel-primary panel-success panel-info panel-warning panel-danger panel-alert panel-system panel-dark panel-default";
                t.each(n, function (e, n) {
                    t.each(n, function (e, n) {
                        var i = n.id, l = n.title, r = n.collapsed, a = n.hidden, s = n.color, c = t("#" + i);
                        l && c.children(".panel-heading").find(".panel-title").text(l), 1 === r && c.addClass("panel-collapsed").children(".panel-body, .panel-menu, .panel-footer").hide(), s && c.removeClass(o).addClass(s).attr("data-panel-color", s), 1 === a && c.addClass("panel-hidden").hide().remove()
                    })
                })
            }, createControls: function () {
                var e = '<span class="panel-controls"></span>', n = '<a href="#" class="panel-control-title"></a>', o = '<a href="#" class="panel-control-color"></a>', i = '<a href="#" class="panel-control-collapse"></a>', l = '<a href="#" class="panel-control-fullscreen"></a>', r = '<a href="#" class="panel-control-remove"></a>', a = '<a href="#" class="panel-control-callback"></a>', s = '<a href="#" class="panel-control-dockable" data-toggle="popover" data-content="panelDockContent();"></a>', u = '<a href="#" class="panel-control-expose"></a>', p = '<a href="#" class="panel-control-loader"></a>';
                c.each(function (c, d) {
                    var h = t(d), f = h.children(".panel-heading");
                    t(e).appendTo(f);
                    var v = h.attr("data-panel-title"), m = h.attr("data-panel-color"), g = h.attr("data-panel-collapse"), b = h.attr("data-panel-fullscreen"), y = h.attr("data-panel-remove"), C = h.attr("data-panel-callback"), w = h.attr("data-panel-dockable"), x = h.attr("data-panel-expose"), k = h.attr("data-panel-loader");
                    if (!k) {
                        var S = f.find(".panel-controls");
                        t(p).appendTo(S)
                    }
                    if (x) {
                        var S = f.find(".panel-controls");
                        t(u).appendTo(S)
                    }
                    if (w) {
                        var S = f.find(".panel-controls");
                        t(s).appendTo(S)
                    }
                    if (C) {
                        var S = f.find(".panel-controls");
                        t(a).appendTo(S)
                    }
                    if (!y) {
                        var S = f.find(".panel-controls");
                        t(r).appendTo(S)
                    }
                    if (!v) {
                        var S = f.find(".panel-controls");
                        t(n).appendTo(S)
                    }
                    if (!m) {
                        var S = f.find(".panel-controls");
                        t(o).appendTo(S)
                    }
                    if (!g) {
                        var S = f.find(".panel-controls");
                        t(i).appendTo(S)
                    }
                    if (!b) {
                        var S = f.find(".panel-controls");
                        t(l).appendTo(S)
                    }
                })
            }, controlHandlers: function () {
                var o = t(this), l = (o.attr("class"), o.parents(".panel")), a = l.children(".panel-heading"), s = l.find(".panel-title"), c = function () {
                    var t = function () {
                        var t = l.find(".panel-editbox");
                        t.slideToggle("fast", function () {
                            l.toggleClass("panel-editbox-open"), l.hasClass("panel-editbox-open") || (s.text(t.children("input").val()), f.updateSettings(n))
                        })
                    };
                    if (l.find(".panel-editbox").length)t(); else {
                        var e = '<div class="panel-editbox"><input type="text" class="form-control" value="' + s.text() + '"></div>';
                        a.after(e);
                        var o = l.find(".panel-editbox");
                        o.children("input").on("keyup", function () {
                            s.text(o.children("input").val())
                        }), o.children("input").on("keypress", function (e) {
                            13 == e.which && t()
                        }), t()
                    }
                }, u = function () {
                    if (!l.find(".panel-colorbox").length) {
                        var e = '<div class="panel-colorbox"> <span class="bg-white" data-panel-color="panel-default"></span> <span class="bg-primary" data-panel-color="panel-primary"></span> <span class="bg-info" data-panel-color="panel-info"></span> <span class="bg-success" data-panel-color="panel-success"></span> <span class="bg-warning" data-panel-color="panel-warning"></span> <span class="bg-danger" data-panel-color="panel-danger"></span> <span class="bg-alert" data-panel-color="panel-alert"></span> <span class="bg-system" data-panel-color="panel-system"></span> <span class="bg-dark" data-panel-color="panel-dark"></span> </div>';
                        a.after(e)
                    }
                    var o = l.find(".panel-colorbox");
                    o.on("click", "> span", function () {
                        var e = t(this).data("panel-color"), o = "panel-primary panel-info panel-success panel-warning panel-danger panel-alert panel-system panel-dark panel-default panel-white";
                        l.removeClass(o).addClass(e).data("panel-color", e), f.updateSettings(n)
                    }), o.slideToggle("fast", function () {
                        l.toggleClass("panel-colorbox-open")
                    })
                }, p = function () {
                    l.toggleClass("panel-collapsed"), l.children(".panel-body, .panel-menu, .panel-footer").slideToggle("fast", function () {
                        f.updateSettings(n)
                    })
                }, d = function () {
                    t("body.panel-fullscreen-active").length ? (t("body").removeClass("panel-fullscreen-active"), l.removeClass("panel-fullscreen"), r === !0 && i.sortable("enable")) : (t("body").addClass("panel-fullscreen-active"), l.addClass("panel-fullscreen"), r === !0 && i.sortable("disable")), t(".panel-controls").removeClass("panel-controls-open"), t(".popover").popover("hide"), setTimeout(function () {
                        t(e).trigger("resize")
                    }, 100)
                }, h = function () {
                    bootbox.confirm ? bootbox.confirm("Are You Sure?!", function (t) {
                        t && setTimeout(function () {
                            l.addClass("panel-removed").hide(), f.updateSettings(n)
                        }, 200)
                    }) : (l.addClass("panel-removed").hide(), f.updateSettings(n))
                }, v = function () {
                    "function" == typeof n.onPanel && n.onPanel()
                }, m = function () {
                };
                t(this).hasClass("panel-control-collapse") && p(), t(this).hasClass("panel-control-title") && c(), t(this).hasClass("panel-control-color") && u(), t(this).hasClass("panel-control-fullscreen") && d(), t(this).hasClass("panel-control-remove") && h(), t(this).hasClass("panel-control-callback") && v(), t(this).hasClass("panel-control-expose") && m(), t(this).hasClass("panel-control-dockable") || t(this).hasClass("panel-control-loader") || f.toggleLoader.call(this)
            }, toggleLoader: function () {
                var e = t(this), n = e.parents(".panel");
                n.addClass("panel-loader-active"), setTimeout(function () {
                    n.removeClass("panel-loader-active")
                }, 650)
            }, modifySettings: function () {
                var e = [];
                c.each(function (n, o) {
                    var i = t(o), l = {}, r = (i.attr("id"), i.children(".panel-heading").find(".panel-title").text(), i.hasClass("panel-collapsed") ? 1 : 0, i.is(":hidden") ? 1 : 0, i.data("panel-color"));
                    l.id = i.attr("id"), l.title = i.children(".panel-heading").find(".panel-title").text(), l.collapsed = i.hasClass("panel-collapsed") ? 1 : 0, l.hidden = i.is(":hidden") ? 1 : 0, l.color = r ? r : null, e.push({panel: l})
                });
                var n = JSON.stringify(e);
                return n
            }, findPositions: function () {
                var e = i.find(l), n = [];
                e.each(function (e, o) {
                    var i = t(o).find(".panel"), l = [];
                    t(o).attr("id", "grid-" + e), i.each(function (e, n) {
                        var o = t(n).attr("id");
                        l.push(o)
                    }), n[e] = l
                });
                var o = JSON.stringify(n);
                return o
            }, setPositions: function () {
                var e = localStorage.getItem(p), n = JSON.parse(e);
                t(l).each(function (e, o) {
                    var i = t(o);
                    t.each(n[e], function (e, n) {
                        t("#" + n).appendTo(i)
                    })
                })
            }, updatePositions: function (t) {
                localStorage.setItem(p, f.findPositions()), "function" == typeof t.onSave && t.onSave()
            }, updateSettings: function (t) {
                localStorage.setItem(u, f.modifySettings()), "function" == typeof t.onSave && t.onSave()
            }
        };
        return this.each(function () {
            f.init.call(i, n)
        })
    }
}(jQuery, window, document), function (t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e(require("jquery")) : t.bootbox = e(t.jQuery)
}(this, function t(e, n) {
    "use strict";
    function o(t) {
        var e = m[f.locale];
        return e ? e[t] : m.en[t]
    }

    function i(t, n, o) {
        t.stopPropagation(), t.preventDefault();
        var i = e.isFunction(o) && o(t) === !1;
        i || n.modal("hide")
    }

    function l(t) {
        var e, n = 0;
        for (e in t)n++;
        return n
    }

    function r(t, n) {
        var o = 0;
        e.each(t, function (t, e) {
            n(t, e, o++)
        })
    }

    function a(t) {
        var n, o;
        if ("object" != typeof t)throw new Error("Please supply an object of options");
        if (!t.message)throw new Error("Please specify a message");
        return t = e.extend({}, f, t), t.buttons || (t.buttons = {}), t.backdrop = t.backdrop ? "static" : !1, n = t.buttons, o = l(n), r(n, function (t, i, l) {
            if (e.isFunction(i) && (i = n[t] = {callback: i}), "object" !== e.type(i))throw new Error("button with key " + t + " must be an object");
            i.label || (i.label = t), i.className || (i.className = 2 >= o && l === o - 1 ? "btn-primary" : "btn-default")
        }), t
    }

    function s(t, e) {
        var n = t.length, o = {};
        if (1 > n || n > 2)throw new Error("Invalid argument length");
        return 2 === n || "string" == typeof t[0] ? (o[e[0]] = t[0], o[e[1]] = t[1]) : o = t[0], o
    }

    function c(t, n, o) {
        return e.extend(!0, {}, t, s(n, o))
    }

    function u(t, e, n, o) {
        var i = {className: "bootbox-" + t, buttons: p.apply(null, e)};
        return d(c(i, o, n), e)
    }

    function p() {
        for (var t = {}, e = 0, n = arguments.length; n > e; e++) {
            var i = arguments[e], l = i.toLowerCase(), r = i.toUpperCase();
            t[l] = {label: o(r)}
        }
        return t
    }

    function d(t, e) {
        var o = {};
        return r(e, function (t, e) {
            o[e] = !0
        }), r(t.buttons, function (t) {
            if (o[t] === n)throw new Error("button key " + t + " is not allowed (options are " + e.join("\n") + ")")
        }), t
    }

    var h = {
        dialog: "<div class='bootbox modal' tabindex='-1' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-body'><div class='bootbox-body'></div></div></div></div></div>",
        header: "<div class='modal-header'><h4 class='modal-title'></h4></div>",
        footer: "<div class='modal-footer'></div>",
        closeButton: "<button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>&times;</button>",
        form: "<form class='bootbox-form'></form>",
        inputs: {
            text: "<input class='bootbox-input bootbox-input-text form-control' autocomplete=off type=text />",
            textarea: "<textarea class='bootbox-input bootbox-input-textarea form-control'></textarea>",
            email: "<input class='bootbox-input bootbox-input-email form-control' autocomplete='off' type='email' />",
            select: "<select class='bootbox-input bootbox-input-select form-control'></select>",
            checkbox: "<div class='checkbox'><label><input class='bootbox-input bootbox-input-checkbox' type='checkbox' /></label></div>",
            date: "<input class='bootbox-input bootbox-input-date form-control' autocomplete=off type='date' />",
            time: "<input class='bootbox-input bootbox-input-time form-control' autocomplete=off type='time' />",
            number: "<input class='bootbox-input bootbox-input-number form-control' autocomplete=off type='number' />",
            password: "<input class='bootbox-input bootbox-input-password form-control' autocomplete='off' type='password' />"
        }
    }, f = {
        locale: "en",
        backdrop: !0,
        animate: !0,
        className: null,
        keyboard: !1,
        closeButton: !0,
        show: !0,
        container: "body"
    }, v = {};
    v.defineLocale = function (t, e) {
        return e ? (m[t] = {OK: e.OK, CANCEL: e.CANCEL, CONFIRM: e.CONFIRM}, m[t]) : (delete m[t], null)
    }, v.alert = function () {
        var t;
        if (t = u("alert", ["ok"], ["message", "callback"], arguments), t.callback && !e.isFunction(t.callback))throw new Error("alert requires callback property to be a function when provided");
        return t.buttons.ok.callback = t.onEscape = function () {
            return e.isFunction(t.callback) ? t.callback() : !0
        }, v.dialog(t)
    }, v.confirm = function () {
        var t;
        if (t = u("confirm", ["cancel", "confirm"], ["message", "callback"], arguments), t.buttons.cancel.callback = t.onEscape = function () {
                return t.callback(!1)
            }, t.buttons.confirm.callback = function () {
                return t.callback(!0)
            }, !e.isFunction(t.callback))throw new Error("confirm requires a callback");
        return v.dialog(t)
    }, v.prompt = function () {
        var t, o, i, l, a, s, u;
        if (l = e(h.form), o = {
                className: "bootbox-prompt",
                buttons: p("cancel", "confirm"),
                value: "",
                inputType: "text"
            }, t = d(c(o, arguments, ["title", "callback"]), ["cancel", "confirm"]), s = t.show === n ? !0 : t.show, t.message = l, t.buttons.cancel.callback = t.onEscape = function () {
                return t.callback(null)
            }, t.buttons.confirm.callback = function () {
                var n;
                switch (t.inputType) {
                    case"text":
                    case"textarea":
                    case"email":
                    case"select":
                    case"date":
                    case"time":
                    case"number":
                    case"password":
                        n = a.val();
                        break;
                    case"checkbox":
                        var o = a.find("input:checked");
                        n = [], r(o, function (t, o) {
                            n.push(e(o).val())
                        })
                }
                return t.callback(n)
            }, t.show = !1, !t.title)throw new Error("prompt requires a title");
        if (!e.isFunction(t.callback))throw new Error("prompt requires a callback");
        if (!h.inputs[t.inputType])throw new Error("invalid prompt type");
        switch (a = e(h.inputs[t.inputType]), t.inputType) {
            case"text":
            case"textarea":
            case"email":
            case"date":
            case"time":
            case"number":
            case"password":
                a.val(t.value);
                break;
            case"select":
                var f = {};
                if (u = t.inputOptions || [], !u.length)throw new Error("prompt with select requires options");
                r(u, function (t, o) {
                    var i = a;
                    if (o.value === n || o.text === n)throw new Error("given options in wrong format");
                    o.group && (f[o.group] || (f[o.group] = e("<optgroup/>").attr("label", o.group)), i = f[o.group]), i.append("<option value='" + o.value + "'>" + o.text + "</option>")
                }), r(f, function (t, e) {
                    a.append(e)
                }), a.val(t.value);
                break;
            case"checkbox":
                var m = e.isArray(t.value) ? t.value : [t.value];
                if (u = t.inputOptions || [], !u.length)throw new Error("prompt with checkbox requires options");
                if (!u[0].value || !u[0].text)throw new Error("given options in wrong format");
                a = e("<div/>"), r(u, function (n, o) {
                    var i = e(h.inputs[t.inputType]);
                    i.find("input").attr("value", o.value), i.find("label").append(o.text), r(m, function (t, e) {
                        e === o.value && i.find("input").prop("checked", !0)
                    }), a.append(i)
                })
        }
        return t.placeholder && a.attr("placeholder", t.placeholder), t.pattern && a.attr("pattern", t.pattern), l.append(a), l.on("submit", function (t) {
            t.preventDefault(), t.stopPropagation(), i.find(".btn-primary").click()
        }), i = v.dialog(t), i.off("shown.bs.modal"), i.on("shown.bs.modal", function () {
            a.focus()
        }), s === !0 && i.modal("show"), i
    }, v.dialog = function (t) {
        t = a(t);
        var o = e(h.dialog), l = o.find(".modal-dialog"), s = o.find(".modal-body"), c = t.buttons, u = "", p = {onEscape: t.onEscape};
        if (e.fn.modal === n)throw new Error("$.fn.modal is not defined; please double check you have included the Bootstrap JavaScript library. See http://getbootstrap.com/javascript/ for more details.");
        if (r(c, function (t, e) {
                u += "<button data-bb-handler='" + t + "' type='button' class='btn " + e.className + "'>" + e.label + "</button>", p[t] = e.callback
            }), s.find(".bootbox-body").html(t.message), t.animate === !0 && o.addClass("fade"), t.className && o.addClass(t.className), "large" === t.size && l.addClass("modal-lg"), "small" === t.size && l.addClass("modal-sm"), t.title && s.before(h.header), t.closeButton) {
            var d = e(h.closeButton);
            t.title ? o.find(".modal-header").prepend(d) : d.css("margin-top", "-10px").prependTo(s)
        }
        return t.title && o.find(".modal-title").html(t.title), u.length && (s.after(h.footer), o.find(".modal-footer").html(u)), o.on("hidden.bs.modal", function (t) {
            t.target === this && o.remove()
        }), o.on("shown.bs.modal", function () {
            o.find(".btn-primary:first").focus()
        }), o.on("escape.close.bb", function (t) {
            p.onEscape && i(t, o, p.onEscape)
        }), o.on("click", ".modal-footer button", function (t) {
            var n = e(this).data("bb-handler");
            i(t, o, p[n])
        }), o.on("click", ".bootbox-close-button", function (t) {
            i(t, o, p.onEscape)
        }), o.on("keyup", function (t) {
            27 === t.which && o.trigger("escape.close.bb")
        }), e(t.container).append(o), o.modal({
            backdrop: t.backdrop,
            keyboard: t.keyboard || !1,
            show: !1
        }), t.show && o.modal("show"), o
    }, v.setDefaults = function () {
        var t = {};
        2 === arguments.length ? t[arguments[0]] = arguments[1] : t = arguments[0], e.extend(f, t)
    }, v.hideAll = function () {
        return e(".bootbox").modal("hide"), v
    };
    var m = {
        br: {OK: "OK", CANCEL: "Cancelar", CONFIRM: "Sim"},
        cs: {OK: "OK", CANCEL: "Zrušit", CONFIRM: "Potvrdit"},
        da: {OK: "OK", CANCEL: "Annuller", CONFIRM: "Accepter"},
        de: {OK: "OK", CANCEL: "Abbrechen", CONFIRM: "Akzeptieren"},
        el: {OK: "Εντάξει", CANCEL: "Ακύρωση", CONFIRM: "Επιβεβαίωση"},
        en: {OK: "OK", CANCEL: "Cancel", CONFIRM: "OK"},
        es: {OK: "OK", CANCEL: "Cancelar", CONFIRM: "Aceptar"},
        et: {OK: "OK", CANCEL: "Katkesta", CONFIRM: "OK"},
        fi: {OK: "OK", CANCEL: "Peruuta", CONFIRM: "OK"},
        fr: {OK: "OK", CANCEL: "Annuler", CONFIRM: "D'accord"},
        he: {OK: "אישור", CANCEL: "ביטול", CONFIRM: "אישור"},
        hu: {OK: "OK", CANCEL: "Mégsem", CONFIRM: "Megerősít"},
        hr: {OK: "OK", CANCEL: "Odustani", CONFIRM: "Potvrdi"},
        id: {OK: "OK", CANCEL: "Batal", CONFIRM: "OK"},
        it: {OK: "OK", CANCEL: "Annulla", CONFIRM: "Conferma"},
        ja: {OK: "OK", CANCEL: "キャンセル", CONFIRM: "確認"},
        lt: {OK: "Gerai", CANCEL: "Atšaukti", CONFIRM: "Patvirtinti"},
        lv: {OK: "Labi", CANCEL: "Atcelt", CONFIRM: "Apstiprināt"},
        nl: {OK: "OK", CANCEL: "Annuleren", CONFIRM: "Accepteren"},
        no: {OK: "OK", CANCEL: "Avbryt", CONFIRM: "OK"},
        pl: {OK: "OK", CANCEL: "Anuluj", CONFIRM: "Potwierdź"},
        pt: {OK: "OK", CANCEL: "Cancelar", CONFIRM: "Confirmar"},
        ru: {OK: "OK", CANCEL: "Отмена", CONFIRM: "Применить"},
        sv: {OK: "OK", CANCEL: "Avbryt", CONFIRM: "OK"},
        tr: {OK: "Tamam", CANCEL: "İptal", CONFIRM: "Onayla"},
        zh_CN: {OK: "OK", CANCEL: "取消", CONFIRM: "确认"},
        zh_TW: {OK: "OK", CANCEL: "取消", CONFIRM: "確認"}
    };
    return v.init = function (n) {
        return t(n || e)
    }, v
}), !function (t) {
    "use strict";
    function e(t) {
        return ko.isObservable(t) && !(void 0 === t.destroyAll)
    }

    function n(t, e) {
        for (var n = 0; n < t.length; ++n)e(t[n])
    }

    function o(e, n) {
        this.$select = t(e), this.options = this.mergeOptions(t.extend({}, n, this.$select.data())), this.originalOptions = this.$select.clone()[0].options, this.query = "", this.searchTimeout = null, this.options.multiple = "multiple" === this.$select.attr("multiple"), this.options.onChange = t.proxy(this.options.onChange, this), this.options.onDropdownShow = t.proxy(this.options.onDropdownShow, this), this.options.onDropdownHide = t.proxy(this.options.onDropdownHide, this), this.options.onDropdownShown = t.proxy(this.options.onDropdownShown, this), this.options.onDropdownHidden = t.proxy(this.options.onDropdownHidden, this), this.buildContainer(), this.buildButton(), this.buildDropdown(), this.buildSelectAll(), this.buildDropdownOptions(), this.buildFilter(), this.updateButtonText(), this.updateSelectAll(), this.options.disableIfEmpty && t("option", this.$select).length <= 0 && this.disable(), this.$select.hide().after(this.$container)
    }

    "undefined" != typeof ko && ko.bindingHandlers && !ko.bindingHandlers.multiselect && (ko.bindingHandlers.multiselect = {
        init: function (o, i, l) {
            var r = l().selectedOptions, a = ko.utils.unwrapObservable(i());
            t(o).multiselect(a), e(r) && (t(o).multiselect("select", ko.utils.unwrapObservable(r)), r.subscribe(function (e) {
                var i = [], l = [];
                n(e, function (t) {
                    switch (t.status) {
                        case"added":
                            i.push(t.value);
                            break;
                        case"deleted":
                            l.push(t.value)
                    }
                }), i.length > 0 && t(o).multiselect("select", i), l.length > 0 && t(o).multiselect("deselect", l)
            }, null, "arrayChange"))
        }, update: function (n, o, i) {
            var l = i().options, r = t(n).data("multiselect"), a = ko.utils.unwrapObservable(o());
            e(l) && l.subscribe(function () {
                t(n).multiselect("rebuild")
            }), r ? r.updateOriginalOptions() : t(n).multiselect(a)
        }
    }), o.prototype = {
        defaults: {
            buttonText: function (e, n) {
                if (0 === e.length)return this.nonSelectedText + ' <b class="caret"></b>';
                if (e.length == t("option", t(n)).length)return this.allSelectedText + ' <b class="caret"></b>';
                if (e.length > this.numberDisplayed)return e.length + " " + this.nSelectedText + ' <b class="caret"></b>';
                var o = "";
                return e.each(function () {
                    var e = void 0 !== t(this).attr("label") ? t(this).attr("label") : t(this).html();
                    o += e + ", "
                }), o.substr(0, o.length - 2) + ' <b class="caret"></b>'
            },
            buttonTitle: function (e) {
                if (0 === e.length)return this.nonSelectedText;
                var n = "";
                return e.each(function () {
                    n += t(this).text() + ", "
                }), n.substr(0, n.length - 2)
            },
            label: function (e) {
                return t(e).attr("label") || t(e).html()
            },
            onChange: function () {
            },
            onDropdownShow: function () {
            },
            onDropdownHide: function () {
            },
            onDropdownShown: function () {
            },
            onDropdownHidden: function () {
            },
            buttonClass: "btn btn-default",
            buttonWidth: "auto",
            buttonContainer: '<div class="btn-group" />',
            dropRight: !1,
            selectedClass: "active",
            maxHeight: !1,
            checkboxName: !1,
            includeSelectAllOption: !1,
            includeSelectAllIfMoreThan: 0,
            selectAllText: " Select all",
            selectAllValue: "multiselect-all",
            selectAllName: !1,
            enableFiltering: !1,
            enableCaseInsensitiveFiltering: !1,
            enableClickableOptGroups: !1,
            filterPlaceholder: "Search",
            filterBehavior: "text",
            includeFilterClearBtn: !0,
            preventInputChangeEvent: !1,
            nonSelectedText: "None selected",
            nSelectedText: "selected",
            allSelectedText: "All selected",
            numberDisplayed: 3,
            disableIfEmpty: !1,
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
                ul: '<ul class="multiselect-container dropdown-menu"></ul>',
                filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
                filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove"></i></button></span>',
                li: '<li><a href="javascript:void(0);"><label></label></a></li>',
                divider: '<li class="multiselect-item divider"></li>',
                liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
            }
        }, constructor: o, buildContainer: function () {
            this.$container = t(this.options.buttonContainer), this.$container.on("show.bs.dropdown", this.options.onDropdownShow), this.$container.on("hide.bs.dropdown", this.options.onDropdownHide), this.$container.on("shown.bs.dropdown", this.options.onDropdownShown), this.$container.on("hidden.bs.dropdown", this.options.onDropdownHidden)
        }, buildButton: function () {
            this.$button = t(this.options.templates.button).addClass(this.options.buttonClass), this.$select.prop("disabled") ? this.disable() : this.enable(), this.options.buttonWidth && "auto" !== this.options.buttonWidth && (this.$button.css({width: this.options.buttonWidth}), this.$container.css({width: this.options.buttonWidth}));
            var e = this.$select.attr("tabindex");
            e && this.$button.attr("tabindex", e), this.$container.prepend(this.$button)
        }, buildDropdown: function () {
            this.$ul = t(this.options.templates.ul), this.options.dropRight && this.$ul.addClass("pull-right"), this.options.maxHeight && this.$ul.css({
                "max-height": this.options.maxHeight + "px",
                "overflow-y": "auto",
                "overflow-x": "hidden"
            }), this.$container.append(this.$ul)
        }, buildDropdownOptions: function () {
            this.$select.children().each(t.proxy(function (e, n) {
                var o = t(n), i = o.prop("tagName").toLowerCase();
                o.prop("value") !== this.options.selectAllValue && ("optgroup" === i ? this.createOptgroup(n) : "option" === i && ("divider" === o.data("role") ? this.createDivider() : this.createOptionValue(n)))
            }, this)), t("li input", this.$ul).on("change", t.proxy(function (e) {
                var n = t(e.target), o = n.prop("checked") || !1, i = n.val() === this.options.selectAllValue;
                this.options.selectedClass && (o ? n.closest("li").addClass(this.options.selectedClass) : n.closest("li").removeClass(this.options.selectedClass));
                var l = n.val(), r = this.getOptionByValue(l), a = t("option", this.$select).not(r), s = t("input", this.$container).not(n);
                return i && (o ? this.selectAll() : this.deselectAll()), i || (o ? (r.prop("selected", !0), this.options.multiple ? r.prop("selected", !0) : (this.options.selectedClass && t(s).closest("li").removeClass(this.options.selectedClass), t(s).prop("checked", !1), a.prop("selected", !1), this.$button.click()), "active" === this.options.selectedClass && a.closest("a").css("outline", "")) : r.prop("selected", !1)), this.$select.change(), this.updateButtonText(), this.updateSelectAll(), this.options.onChange(r, o), this.options.preventInputChangeEvent ? !1 : void 0
            }, this)), t("li a", this.$ul).on("touchstart click", function (e) {
                e.stopPropagation();
                var n = t(e.target);
                if ("Range" === document.getSelection().type) {
                    var o = t(this).find("input:first");
                    o.prop("checked", !o.prop("checked")).trigger("change")
                }
                if (e.shiftKey) {
                    var i = n.prop("checked") || !1;
                    if (i) {
                        var l = n.closest("li").siblings('li[class="active"]:first'), r = n.closest("li").index(), a = l.index();
                        r > a ? n.closest("li").prevUntil(l).each(function () {
                            t(this).find("input:first").prop("checked", !0).trigger("change")
                        }) : n.closest("li").nextUntil(l).each(function () {
                            t(this).find("input:first").prop("checked", !0).trigger("change")
                        })
                    }
                }
                n.blur()
            }), this.$container.off("keydown.multiselect").on("keydown.multiselect", t.proxy(function (e) {
                if (!t('input[type="text"]', this.$container).is(":focus"))if (9 === e.keyCode && this.$container.hasClass("open"))this.$button.click(); else {
                    var n = t(this.$container).find("li:not(.divider):not(.disabled) a").filter(":visible");
                    if (!n.length)return;
                    var o = n.index(n.filter(":focus"));
                    38 === e.keyCode && o > 0 ? o-- : 40 === e.keyCode && o < n.length - 1 ? o++ : ~o || (o = 0);
                    var i = n.eq(o);
                    if (i.focus(), 32 === e.keyCode || 13 === e.keyCode) {
                        var l = i.find("input");
                        l.prop("checked", !l.prop("checked")), l.change()
                    }
                    e.stopPropagation(), e.preventDefault()
                }
            }, this)), this.options.enableClickableOptGroups && this.options.multiple && t("li.multiselect-group", this.$ul).on("click", t.proxy(function (e) {
                e.stopPropagation();
                var n = t(e.target).parent(), o = n.nextUntil("li.multiselect-group"), i = !0, l = o.find("input");
                l.each(function () {
                    i = i && t(this).prop("checked")
                }), l.prop("checked", !i).trigger("change")
            }, this))
        }, createOptionValue: function (e) {
            var n = t(e);
            n.is(":selected") && n.prop("selected", !0);
            var o = this.options.label(e), i = n.val(), l = this.options.multiple ? "checkbox" : "radio", r = t(this.options.templates.li), a = t("label", r);
            a.addClass(l);
            var s = t("<input/>").attr("type", l);
            this.options.checkboxName && s.attr("name", this.options.checkboxName), a.append(s);
            var c = n.prop("selected") || !1;
            s.val(i), i === this.options.selectAllValue && (r.addClass("multiselect-item multiselect-all"), s.parent().parent().addClass("multiselect-all")), a.append(" " + o), a.attr("title", n.attr("title")), this.$ul.append(r), n.is(":disabled") && s.attr("disabled", "disabled").prop("disabled", !0).closest("a").attr("tabindex", "-1").closest("li").addClass("disabled"), s.prop("checked", c), c && this.options.selectedClass && s.closest("li").addClass(this.options.selectedClass)
        }, createDivider: function () {
            var e = t(this.options.templates.divider);
            this.$ul.append(e)
        }, createOptgroup: function (e) {
            var n = t(e).prop("label"), o = t(this.options.templates.liGroup);
            t("label", o).text(n), this.options.enableClickableOptGroups && o.addClass("multiselect-group-clickable"), this.$ul.append(o), t(e).is(":disabled") && o.addClass("disabled"), t("option", e).each(t.proxy(function (t, e) {
                this.createOptionValue(e)
            }, this))
        }, buildSelectAll: function () {
            "number" == typeof this.options.selectAllValue && (this.options.selectAllValue = this.options.selectAllValue.toString());
            var e = this.hasSelectAll();
            if (!e && this.options.includeSelectAllOption && this.options.multiple && t("option", this.$select).length > this.options.includeSelectAllIfMoreThan) {
                this.options.includeSelectAllDivider && this.$ul.prepend(t(this.options.templates.divider));
                var n = t(this.options.templates.li);
                t("label", n).addClass("checkbox"), t("label", n).append(this.options.selectAllName ? '<input type="checkbox" name="' + this.options.selectAllName + '" />' : '<input type="checkbox" />');
                var o = t("input", n);
                o.val(this.options.selectAllValue), n.addClass("multiselect-item multiselect-all"), o.parent().parent().addClass("multiselect-all"), t("label", n).append(" " + this.options.selectAllText), this.$ul.prepend(n), o.prop("checked", !1)
            }
        }, buildFilter: function () {
            if (this.options.enableFiltering || this.options.enableCaseInsensitiveFiltering) {
                var e = Math.max(this.options.enableFiltering, this.options.enableCaseInsensitiveFiltering);
                if (this.$select.find("option").length >= e) {
                    if (this.$filter = t(this.options.templates.filter), t("input", this.$filter).attr("placeholder", this.options.filterPlaceholder), this.options.includeFilterClearBtn) {
                        var n = t(this.options.templates.filterClearBtn);
                        n.on("click", t.proxy(function () {
                            clearTimeout(this.searchTimeout), this.$filter.find(".multiselect-search").val(""), t("li", this.$ul).show().removeClass("filter-hidden"), this.updateSelectAll()
                        }, this)), this.$filter.find(".input-group").append(n)
                    }
                    this.$ul.prepend(this.$filter), this.$filter.val(this.query).on("click", function (t) {
                        t.stopPropagation()
                    }).on("input keydown", t.proxy(function (e) {
                        13 === e.which && e.preventDefault(), clearTimeout(this.searchTimeout), this.searchTimeout = this.asyncFunction(t.proxy(function () {
                            if (this.query !== e.target.value) {
                                this.query = e.target.value;
                                var n, o;
                                t.each(t("li", this.$ul), t.proxy(function (e, i) {
                                    var l = t("input", i).val(), r = t("label", i).text(), a = "";
                                    if ("text" === this.options.filterBehavior ? a = r : "value" === this.options.filterBehavior ? a = l : "both" === this.options.filterBehavior && (a = r + "\n" + l), l !== this.options.selectAllValue && r) {
                                        var s = !1;
                                        this.options.enableCaseInsensitiveFiltering && a.toLowerCase().indexOf(this.query.toLowerCase()) > -1 ? s = !0 : a.indexOf(this.query) > -1 && (s = !0), t(i).toggle(s).toggleClass("filter-hidden", !s), t(i).hasClass("multiselect-group") ? (n = i, o = s) : (s && t(n).show().removeClass("filter-hidden"), !s && o && t(i).show().removeClass("filter-hidden"))
                                    }
                                }, this))
                            }
                            this.updateSelectAll()
                        }, this), 300, this)
                    }, this))
                }
            }
        }, destroy: function () {
            this.$container.remove(), this.$select.show(), this.$select.data("multiselect", null)
        }, refresh: function () {
            t("option", this.$select).each(t.proxy(function (e, n) {
                var o = t("li input", this.$ul).filter(function () {
                    return t(this).val() === t(n).val()
                });
                t(n).is(":selected") ? (o.prop("checked", !0), this.options.selectedClass && o.closest("li").addClass(this.options.selectedClass)) : (o.prop("checked", !1), this.options.selectedClass && o.closest("li").removeClass(this.options.selectedClass)), t(n).is(":disabled") ? o.attr("disabled", "disabled").prop("disabled", !0).closest("li").addClass("disabled") : o.prop("disabled", !1).closest("li").removeClass("disabled")
            }, this)), this.updateButtonText(), this.updateSelectAll()
        }, select: function (e, n) {
            t.isArray(e) || (e = [e]);
            for (var o = 0; o < e.length; o++) {
                var i = e[o];
                if (null !== i && void 0 !== i) {
                    var l = this.getOptionByValue(i), r = this.getInputByValue(i);
                    void 0 !== l && void 0 !== r && (this.options.multiple || this.deselectAll(!1), this.options.selectedClass && r.closest("li").addClass(this.options.selectedClass), r.prop("checked", !0), l.prop("selected", !0))
                }
            }
            this.updateButtonText(), this.updateSelectAll(), n && 1 === e.length && this.options.onChange(l, !0)
        }, clearSelection: function () {
            this.deselectAll(!1), this.updateButtonText(), this.updateSelectAll()
        }, deselect: function (e, n) {
            t.isArray(e) || (e = [e]);
            for (var o = 0; o < e.length; o++) {
                var i = e[o];
                if (null !== i && void 0 !== i) {
                    var l = this.getOptionByValue(i), r = this.getInputByValue(i);
                    void 0 !== l && void 0 !== r && (this.options.selectedClass && r.closest("li").removeClass(this.options.selectedClass), r.prop("checked", !1), l.prop("selected", !1))
                }
            }
            this.updateButtonText(), this.updateSelectAll(), n && 1 === e.length && this.options.onChange(l, !1)
        }, selectAll: function (e) {
            var e = "undefined" == typeof e ? !0 : e, n = t("li input[type='checkbox']:enabled", this.$ul), o = n.filter(":visible"), i = n.length, l = o.length;
            if (e ? (o.prop("checked", !0), t("li:not(.divider):not(.disabled)", this.$ul).filter(":visible").addClass(this.options.selectedClass)) : (n.prop("checked", !0), t("li:not(.divider):not(.disabled)", this.$ul).addClass(this.options.selectedClass)), i === l || e === !1)t("option:enabled", this.$select).prop("selected", !0); else {
                var r = o.map(function () {
                    return t(this).val()
                }).get();
                t("option:enabled", this.$select).filter(function () {
                    return -1 !== t.inArray(t(this).val(), r)
                }).prop("selected", !0)
            }
        }, deselectAll: function (e) {
            var e = "undefined" == typeof e ? !0 : e;
            if (e) {
                var n = t("li input[type='checkbox']:enabled", this.$ul).filter(":visible");
                n.prop("checked", !1);
                var o = n.map(function () {
                    return t(this).val()
                }).get();
                t("option:enabled", this.$select).filter(function () {
                    return -1 !== t.inArray(t(this).val(), o)
                }).prop("selected", !1), this.options.selectedClass && t("li:not(.divider):not(.disabled)", this.$ul).filter(":visible").removeClass(this.options.selectedClass)
            } else t("li input[type='checkbox']:enabled", this.$ul).prop("checked", !1), t("option:enabled", this.$select).prop("selected", !1), this.options.selectedClass && t("li:not(.divider):not(.disabled)", this.$ul).removeClass(this.options.selectedClass)
        }, rebuild: function () {
            this.$ul.html(""), this.options.multiple = "multiple" === this.$select.attr("multiple"), this.buildSelectAll(), this.buildDropdownOptions(), this.buildFilter(), this.updateButtonText(), this.updateSelectAll(), this.options.disableIfEmpty && t("option", this.$select).length <= 0 && this.disable(), this.options.dropRight && this.$ul.addClass("pull-right")
        }, dataprovider: function (e) {
            var o = "", i = 0, l = t("");
            t.each(e, function (e, r) {
                var a;
                t.isArray(r.children) ? (i++, a = t("<optgroup/>").attr({label: r.label || "Group " + i}), n(r.children, function (e) {
                    a.append(t("<option/>").attr({
                        value: e.value,
                        label: e.label || e.value,
                        title: e.title,
                        selected: !!e.selected
                    }))
                }), o += "</optgroup>") : a = t("<option/>").attr({
                    value: r.value,
                    label: r.label || r.value,
                    title: r.title,
                    selected: !!r.selected
                }), l = l.add(a)
            }), this.$select.empty().append(l), this.rebuild()
        }, enable: function () {
            this.$select.prop("disabled", !1), this.$button.prop("disabled", !1).removeClass("disabled")
        }, disable: function () {
            this.$select.prop("disabled", !0), this.$button.prop("disabled", !0).addClass("disabled")
        }, setOptions: function (t) {
            this.options = this.mergeOptions(t)
        }, mergeOptions: function (e) {
            return t.extend(!0, {}, this.defaults, e)
        }, hasSelectAll: function () {
            return t("li." + this.options.selectAllValue, this.$ul).length > 0
        }, updateSelectAll: function () {
            if (this.hasSelectAll()) {
                var e = t("li:not(.multiselect-item):not(.filter-hidden) input:enabled", this.$ul), n = e.length, o = e.filter(":checked").length, i = t("li." + this.options.selectAllValue, this.$ul), l = i.find("input");
                o > 0 && o === n ? (l.prop("checked", !0), i.addClass(this.options.selectedClass)) : (l.prop("checked", !1), i.removeClass(this.options.selectedClass))
            }
        }, updateButtonText: function () {
            var e = this.getSelected();
            t(".multiselect", this.$container).html(this.options.buttonText(e, this.$select)), t(".multiselect", this.$container).attr("title", this.options.buttonTitle(e, this.$select))
        }, getSelected: function () {
            return t("option", this.$select).filter(":selected")
        }, getOptionByValue: function (e) {
            for (var n = t("option", this.$select), o = e.toString(), i = 0; i < n.length; i += 1) {
                var l = n[i];
                if (l.value === o)return t(l)
            }
        }, getInputByValue: function (e) {
            for (var n = t("li input", this.$ul), o = e.toString(), i = 0; i < n.length; i += 1) {
                var l = n[i];
                if (l.value === o)return t(l)
            }
        }, updateOriginalOptions: function () {
            this.originalOptions = this.$select.clone()[0].options
        }, asyncFunction: function (t, e, n) {
            var o = Array.prototype.slice.call(arguments, 3);
            return setTimeout(function () {
                t.apply(n || window, o)
            }, e)
        }
    }, t.fn.multiselect = function (e, n, i) {
        return this.each(function () {
            var l = t(this).data("multiselect"), r = "object" == typeof e && e;
            l || (l = new o(this, r), t(this).data("multiselect", l)), "string" == typeof e && (l[e](n, i), "destroy" === e && t(this).data("multiselect", !1))
        })
    }, t.fn.multiselect.Constructor = o, t(function () {
        t("select[data-role=multiselect]").multiselect()
    })
}(window.jQuery), function (t) {
    t.fn.hoverIntent = function (e, n, o) {
        var i = {interval: 100, sensitivity: 6, timeout: 0};
        i = "object" == typeof e ? t.extend(i, e) : t.isFunction(n) ? t.extend(i, {
            over: e,
            out: n,
            selector: o
        }) : t.extend(i, {over: e, out: e, selector: n});
        var l, r, a, s, c = function (t) {
            l = t.pageX, r = t.pageY
        }, u = function (e, n) {
            return n.hoverIntent_t = clearTimeout(n.hoverIntent_t), Math.sqrt((a - l) * (a - l) + (s - r) * (s - r)) < i.sensitivity ? (t(n).off("mousemove.hoverIntent", c), n.hoverIntent_s = !0, i.over.apply(n, [e])) : (a = l, s = r, n.hoverIntent_t = setTimeout(function () {
                u(e, n)
            }, i.interval), void 0)
        }, p = function (t, e) {
            return e.hoverIntent_t = clearTimeout(e.hoverIntent_t), e.hoverIntent_s = !1, i.out.apply(e, [t])
        }, d = function (e) {
            var n = t.extend({}, e), o = this;
            o.hoverIntent_t && (o.hoverIntent_t = clearTimeout(o.hoverIntent_t)), "mouseenter" === e.type ? (a = n.pageX, s = n.pageY, t(o).on("mousemove.hoverIntent", c), o.hoverIntent_s || (o.hoverIntent_t = setTimeout(function () {
                u(n, o)
            }, i.interval))) : (t(o).off("mousemove.hoverIntent", c), o.hoverIntent_s && (o.hoverIntent_t = setTimeout(function () {
                p(n, o)
            }, i.timeout)))
        };
        return this.on({"mouseenter.hoverIntent": d, "mouseleave.hoverIntent": d}, i.selector)
    }
}(jQuery), !function (t) {
    function e(e) {
        var n = e || window.event, o = [].slice.call(arguments, 1), i = 0, l = 0, r = 0;
        return e = t.event.fix(n), e.type = "mousewheel", n.wheelDelta && (i = n.wheelDelta / 120), n.detail && (i = -n.detail / 3), r = i, void 0 !== n.axis && n.axis === n.HORIZONTAL_AXIS && (r = 0, l = -1 * i), void 0 !== n.wheelDeltaY && (r = n.wheelDeltaY / 120), void 0 !== n.wheelDeltaX && (l = -1 * n.wheelDeltaX / 120), o.unshift(e, i, l, r), (t.event.dispatch || t.event.handle).apply(this, o)
    }

    var n = ["DOMMouseScroll", "mousewheel"];
    if (t.event.fixHooks)for (var o = n.length; o;)t.event.fixHooks[n[--o]] = t.event.mouseHooks;
    t.event.special.mousewheel = {
        setup: function () {
            if (this.addEventListener)for (var t = n.length; t;)this.addEventListener(n[--t], e, !1); else this.onmousewheel = e
        }, teardown: function () {
            if (this.removeEventListener)for (var t = n.length; t;)this.removeEventListener(n[--t], e, !1); else this.onmousewheel = null
        }
    }, t.fn.extend({
        mousewheel: function (t) {
            return t ? this.bind("mousewheel", t) : this.trigger("mousewheel")
        }, unmousewheel: function (t) {
            return this.unbind("mousewheel", t)
        }
    })
}(jQuery), function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
}(function (t) {
    function e(t) {
        return t.replace(/(:|\.|\/)/g, "\\$1")
    }

    var n = "1.5.4", o = {}, i = {
        exclude: [],
        excludeWithin: [],
        offset: 0,
        direction: "top",
        scrollElement: null,
        scrollTarget: null,
        beforeScroll: function () {
        },
        afterScroll: function () {
        },
        easing: "swing",
        speed: 400,
        autoCoefficient: 2,
        preventDefault: !0
    }, l = function (e) {
        var n = [], o = !1, i = e.dir && "left" === e.dir ? "scrollLeft" : "scrollTop";
        return this.each(function () {
            if (this !== document && this !== window) {
                var e = t(this);
                e[i]() > 0 ? n.push(this) : (e[i](1), o = e[i]() > 0, o && n.push(this), e[i](0))
            }
        }), n.length || this.each(function () {
            "BODY" === this.nodeName && (n = [this])
        }), "first" === e.el && n.length > 1 && (n = [n[0]]), n
    };
    t.fn.extend({
        scrollable: function (t) {
            var e = l.call(this, {dir: t});
            return this.pushStack(e)
        }, firstScrollable: function (t) {
            var e = l.call(this, {el: "first", dir: t});
            return this.pushStack(e)
        }, smoothScroll: function (n, o) {
            if (n = n || {}, "options" === n)return o ? this.each(function () {
                var e = t(this), n = t.extend(e.data("ssOpts") || {}, o);
                t(this).data("ssOpts", n)
            }) : this.first().data("ssOpts");
            var i = t.extend({}, t.fn.smoothScroll.defaults, n), l = t.smoothScroll.filterPath(location.pathname);
            return this.unbind("click.smoothscroll").bind("click.smoothscroll", function (n) {
                var o = this, r = t(this), a = t.extend({}, i, r.data("ssOpts") || {}), s = i.exclude, c = a.excludeWithin, u = 0, p = 0, d = !0, h = {}, f = location.hostname === o.hostname || !o.hostname, v = a.scrollTarget || t.smoothScroll.filterPath(o.pathname) === l, m = e(o.hash);
                if (a.scrollTarget || f && v && m) {
                    for (; d && s.length > u;)r.is(e(s[u++])) && (d = !1);
                    for (; d && c.length > p;)r.closest(c[p++]).length && (d = !1)
                } else d = !1;
                d && (a.preventDefault && n.preventDefault(), t.extend(h, a, {
                    scrollTarget: a.scrollTarget || m,
                    link: o
                }), t.smoothScroll(h))
            }), this
        }
    }), t.smoothScroll = function (e, n) {
        if ("options" === e && "object" == typeof n)return t.extend(o, n);
        var i, l, r, a, s, c = 0, u = "offset", p = "scrollTop", d = {}, h = {};
        "number" == typeof e ? (i = t.extend({link: null}, t.fn.smoothScroll.defaults, o), r = e) : (i = t.extend({link: null}, t.fn.smoothScroll.defaults, e || {}, o), i.scrollElement && (u = "position", "static" === i.scrollElement.css("position") && i.scrollElement.css("position", "relative"))), p = "left" === i.direction ? "scrollLeft" : p, i.scrollElement ? (l = i.scrollElement, /^(?:HTML|BODY)$/.test(l[0].nodeName) || (c = l[p]())) : l = t("html, body").firstScrollable(i.direction), i.beforeScroll.call(l, i), r = "number" == typeof e ? e : n || t(i.scrollTarget)[u]() && t(i.scrollTarget)[u]()[i.direction] || 0, d[p] = r + c + i.offset, a = i.speed, "auto" === a && (s = d[p] - l.scrollTop(), 0 > s && (s *= -1), a = s / i.autoCoefficient), h = {
            duration: a,
            easing: i.easing,
            complete: function () {
                i.afterScroll.call(i.link, i)
            }
        }, i.step && (h.step = i.step), l.length ? l.stop().animate(d, h) : i.afterScroll.call(i.link, i)
    }, t.smoothScroll.version = n, t.smoothScroll.filterPath = function (t) {
        return t = t || "", t.replace(/^\//, "").replace(/(?:index|default).[a-zA-Z]{3,4}$/, "").replace(/\/$/, "")
    }, t.fn.smoothScroll.defaults = i
}), !function (t) {
    function e(t, e) {
        if (!(t.originalEvent.touches.length > 1)) {
            t.preventDefault();
            var n = t.originalEvent.changedTouches[0], o = document.createEvent("MouseEvents");
            o.initMouseEvent(e, !0, !0, window, 1, n.screenX, n.screenY, n.clientX, n.clientY, !1, !1, !1, !1, 0, null), t.target.dispatchEvent(o)
        }
    }

    if (t.support.touch = "ontouchend"in document, t.support.touch) {
        var n, o = t.ui.mouse.prototype, i = o._mouseInit, l = o._mouseDestroy;
        o._touchStart = function (t) {
            var o = this;
            !n && o._mouseCapture(t.originalEvent.changedTouches[0]) && (n = !0, o._touchMoved = !1, e(t, "mouseover"), e(t, "mousemove"), e(t, "mousedown"))
        }, o._touchMove = function (t) {
            n && (this._touchMoved = !0, e(t, "mousemove"))
        }, o._touchEnd = function (t) {
            n && (e(t, "mouseup"), e(t, "mouseout"), this._touchMoved || e(t, "click"), n = !1)
        }, o._mouseInit = function () {
            var e = this;
            e.element.bind({
                touchstart: t.proxy(e, "_touchStart"),
                touchmove: t.proxy(e, "_touchMove"),
                touchend: t.proxy(e, "_touchEnd")
            }), i.call(e)
        }, o._mouseDestroy = function () {
            var e = this;
            e.element.unbind({
                touchstart: t.proxy(e, "_touchStart"),
                touchmove: t.proxy(e, "_touchMove"),
                touchend: t.proxy(e, "_touchEnd")
            }), l.call(e)
        }
    }
}(jQuery);
var JSON;
JSON || (JSON = {}), function () {
    function f(t) {
        return 10 > t ? "0" + t : t
    }

    function quote(t) {
        return escapable.lastIndex = 0, escapable.test(t) ? '"' + t.replace(escapable, function (t) {
            var e = meta[t];
            return "string" == typeof e ? e : "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4)
        }) + '"' : '"' + t + '"'
    }

    function str(t, e) {
        var n, o, i, l, r, a = gap, s = e[t];
        switch (s && "object" == typeof s && "function" == typeof s.toJSON && (s = s.toJSON(t)), "function" == typeof rep && (s = rep.call(e, t, s)), typeof s) {
            case"string":
                return quote(s);
            case"number":
                return isFinite(s) ? String(s) : "null";
            case"boolean":
            case"null":
                return String(s);
            case"object":
                if (!s)return "null";
                if (gap += indent, r = [], "[object Array]" === Object.prototype.toString.apply(s)) {
                    for (l = s.length, n = 0; l > n; n += 1)r[n] = str(n, s) || "null";
                    return i = 0 === r.length ? "[]" : gap ? "[\n" + gap + r.join(",\n" + gap) + "\n" + a + "]" : "[" + r.join(",") + "]", gap = a, i
                }
                if (rep && "object" == typeof rep)for (l = rep.length, n = 0; l > n; n += 1)"string" == typeof rep[n] && (o = rep[n], i = str(o, s), i && r.push(quote(o) + (gap ? ": " : ":") + i)); else for (o in s)Object.prototype.hasOwnProperty.call(s, o) && (i = str(o, s), i && r.push(quote(o) + (gap ? ": " : ":") + i));
                return i = 0 === r.length ? "{}" : gap ? "{\n" + gap + r.join(",\n" + gap) + "\n" + a + "}" : "{" + r.join(",") + "}", gap = a, i
        }
    }

    "function" != typeof Date.prototype.toJSON && (Date.prototype.toJSON = function () {
        return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
    }, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function () {
        return this.valueOf()
    });
    var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, gap, indent, meta = {
        "\b": "\\b",
        " ": "\\t",
        "\n": "\\n",
        "\f": "\\f",
        "\r": "\\r",
        '"': '\\"',
        "\\": "\\\\"
    }, rep;
    "function" != typeof JSON.stringify && (JSON.stringify = function (t, e, n) {
        var o;
        if (gap = "", indent = "", "number" == typeof n)for (o = 0; n > o; o += 1)indent += " "; else"string" == typeof n && (indent = n);
        if (rep = e, e && "function" != typeof e && ("object" != typeof e || "number" != typeof e.length))throw new Error("JSON.stringify");
        return str("", {"": t})
    }), "function" != typeof JSON.parse && (JSON.parse = function (text, reviver) {
        function walk(t, e) {
            var n, o, i = t[e];
            if (i && "object" == typeof i)for (n in i)Object.prototype.hasOwnProperty.call(i, n) && (o = walk(i, n), void 0 !== o ? i[n] = o : delete i[n]);
            return reviver.call(t, e, i)
        }

        var j;
        if (text = String(text), cx.lastIndex = 0, cx.test(text) && (text = text.replace(cx, function (t) {
                return "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4)
            })), /^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, "")))return j = eval("(" + text + ")"), "function" == typeof reviver ? walk({"": j}, "") : j;
        throw new SyntaxError("JSON.parse")
    })
}(), function (t) {
    function e(t) {
        return "undefined" != typeof t
    }

    function n(e, n, o) {
        var i = function () {
        };
        i.prototype = n.prototype, e.prototype = new i, e.prototype.constructor = e, n.prototype.constructor = n, e._super = n.prototype, o && t.extend(e.prototype, o)
    }

    function o(t, n) {
        var o;
        "string" == typeof t && (n = t, t = document);
        for (var r = 0; r < i.length; ++r) {
            n = n.replace(i[r][0], i[r][1]);
            for (var a = 0; a < l.length; ++a)if (o = l[a], o += 0 === a ? n : n.charAt(0).toUpperCase() + n.substr(1), e(t[o]))return t[o]
        }
        return void 0
    }

    var i = [["", ""], ["exit", "cancel"], ["screen", "Screen"]], l = ["", "o", "ms", "moz", "webkit", "webkitCurrent"], r = navigator.userAgent, a = o("fullscreenEnabled"), s = -1 !== r.indexOf("Android") && -1 !== r.indexOf("Chrome"), c = !s && e(o("fullscreenElement")) && (!e(a) || a === !0), u = t.fn.jquery.split("."), p = parseInt(u[0]) < 2 && parseInt(u[1]) < 7, d = function () {
        this.__options = null, this._fullScreenElement = null, this.__savedStyles = {}
    };
    d.prototype = {
        _DEFAULT_OPTIONS: {
            styles: {
                boxSizing: "border-box",
                MozBoxSizing: "border-box",
                WebkitBoxSizing: "border-box"
            }, toggleClass: null
        }, __documentOverflow: "visible", __htmlOverflow: "visible", _preventDocumentScroll: function () {
            this.__documentOverflow = t("body")[0].style.overflow, this.__htmlOverflow = t("html")[0].style.overflow
        }, _allowDocumentScroll: function () {
            t("body")[0].style.overflow = this.__documentOverflow, t("html")[0].style.overflow = this.__htmlOverflow
        }, _fullScreenChange: function () {
            this.__options && (this.isFullScreen() ? (this._preventDocumentScroll(), this._triggerEvents()) : (this._allowDocumentScroll(), this._revertStyles(), this._triggerEvents(), this._fullScreenElement = null))
        }, _fullScreenError: function (e) {
            this.__options && (this._revertStyles(), this._fullScreenElement = null, e && t(document).trigger("fscreenerror", [e]))
        }, _triggerEvents: function () {
            t(this._fullScreenElement).trigger(this.isFullScreen() ? "fscreenopen" : "fscreenclose"), t(document).trigger("fscreenchange", [this.isFullScreen(), this._fullScreenElement])
        }, _saveAndApplyStyles: function () {
            var e = t(this._fullScreenElement);
            this.__savedStyles = {};
            for (var n in this.__options.styles)this.__savedStyles[n] = this._fullScreenElement.style[n], this._fullScreenElement.style[n] = this.__options.styles[n];
            this.__options.toggleClass && e.addClass(this.__options.toggleClass)
        }, _revertStyles: function () {
            var e = t(this._fullScreenElement);
            for (var n in this.__options.styles)this._fullScreenElement.style[n] = this.__savedStyles[n];
            this.__options.toggleClass && e.removeClass(this.__options.toggleClass)
        }, open: function (e, n) {
            e !== this._fullScreenElement && (this.isFullScreen() && this.exit(), this._fullScreenElement = e, this.__options = t.extend(!0, {}, this._DEFAULT_OPTIONS, n), this._saveAndApplyStyles())
        }, exit: null, isFullScreen: null, isNativelySupported: function () {
            return c
        }
    };
    var h = function () {
        h._super.constructor.apply(this, arguments), this.exit = t.proxy(o("exitFullscreen"), document), this._DEFAULT_OPTIONS = t.extend(!0, {}, this._DEFAULT_OPTIONS, {
            styles: {
                width: "100%",
                height: "100%"
            }
        }), t(document).bind(this._prefixedString("fullscreenchange") + " MSFullscreenChange", t.proxy(this._fullScreenChange, this)).bind(this._prefixedString("fullscreenerror") + " MSFullscreenError", t.proxy(this._fullScreenError, this))
    };
    n(h, d, {
        VENDOR_PREFIXES: ["", "o", "moz", "webkit"], _prefixedString: function (e) {
            return t.map(this.VENDOR_PREFIXES, function (t) {
                return t + e
            }).join(" ")
        }, open: function (t) {
            h._super.open.apply(this, arguments);
            var e = o(t, "requestFullscreen");
            e.call(t)
        }, exit: t.noop, isFullScreen: function () {
            return null !== o("fullscreenElement")
        }, element: function () {
            return o("fullscreenElement")
        }
    });
    var f = function () {
        f._super.constructor.apply(this, arguments), this._DEFAULT_OPTIONS = t.extend({}, this._DEFAULT_OPTIONS, {
            styles: {
                position: "fixed",
                zIndex: "2147483647",
                left: 0,
                top: 0,
                bottom: 0,
                right: 0
            }
        }), this.__delegateKeydownHandler()
    };
    n(f, d, {
        __isFullScreen: !1, __delegateKeydownHandler: function () {
            var e = t(document);
            e.delegate("*", "keydown.fullscreen", t.proxy(this.__keydownHandler, this));
            var n = p ? e.data("events") : t._data(document).events, o = n.keydown;
            p ? n.live.unshift(n.live.pop()) : o.splice(0, 0, o.splice(o.delegateCount - 1, 1)[0])
        }, __keydownHandler: function (t) {
            return this.isFullScreen() && 27 === t.which ? (this.exit(), !1) : !0
        }, _revertStyles: function () {
            f._super._revertStyles.apply(this, arguments), this._fullScreenElement.offsetHeight
        }, open: function () {
            f._super.open.apply(this, arguments), this.__isFullScreen = !0, this._fullScreenChange()
        }, exit: function () {
            this.__isFullScreen = !1, this._fullScreenChange()
        }, isFullScreen: function () {
            return this.__isFullScreen
        }, element: function () {
            return this.__isFullScreen ? this._fullScreenElement : null
        }
    }), t.fullscreen = c ? new h : new f, t.fn.fullscreen = function (e) {
        var n = this[0];
        return e = t.extend({
            toggleClass: null,
            overflow: "hidden"
        }, e), e.styles = {overflow: e.overflow}, delete e.overflow, n && t.fullscreen.open(n, e), this
    }
}(jQuery), function (t, e) {
    "use strict";
    function n(e) {
        e = t.extend({}, m, e || {}), null === h && (h = t("body"));
        for (var n = t(this), i = 0, l = n.length; l > i; i++)o(n.eq(i), e);
        return n
    }

    function o(n, o) {
        if (!n.hasClass(f.base)) {
            o = t.extend({}, o, n.data(d + "-options"));
            var a = "";
            a += '<div class="' + f.bar + '">', a += '<div class="' + f.track + '">', a += '<div class="' + f.handle + '">', a += "</div></div></div>", o.paddingRight = parseInt(n.css("padding-right"), 10), o.paddingBottom = parseInt(n.css("padding-bottom"), 10), n.addClass([f.base, o.customClass].join(" ")).wrapInner('<div class="' + f.content + '" />').prepend(a), o.horizontal && n.addClass(f.isHorizontal);
            var s = t.extend({
                $scroller: n,
                $content: n.find(p(f.content)),
                $bar: n.find(p(f.bar)),
                $track: n.find(p(f.track)),
                $handle: n.find(p(f.handle))
            }, o);
            s.trackMargin = parseInt(s.trackMargin, 10), s.$content.on("scroll." + d, s, i), s.$scroller.on(v.start, p(f.track), s, l).on(v.start, p(f.handle), s, r).data(d, s), g.reset.apply(n), t(e).one("load", function () {
                g.reset.apply(n)
            })
        }
    }

    function i(t) {
        t.preventDefault(), t.stopPropagation();
        var e = t.data, n = {};
        if (e.horizontal) {
            var o = e.$content.scrollLeft();
            0 > o && (o = 0);
            var i = o / e.scrollRatio;
            i > e.handleBounds.right && (i = e.handleBounds.right), n = {left: i}
        } else {
            var l = e.$content.scrollTop();
            0 > l && (l = 0);
            var r = l / e.scrollRatio;
            r > e.handleBounds.bottom && (r = e.handleBounds.bottom), n = {top: r}
        }
        e.$handle.css(n)
    }

    function l(t) {
        t.preventDefault(), t.stopPropagation();
        var e = t.data, n = t.originalEvent, o = e.$track.offset(), i = "undefined" != typeof n.targetTouches ? n.targetTouches[0] : null, l = i ? i.pageX : t.clientX, r = i ? i.pageY : t.clientY;
        e.horizontal ? (e.mouseStart = l, e.handleLeft = l - o.left - e.handleWidth / 2, u(e, e.handleLeft)) : (e.mouseStart = r, e.handleTop = r - o.top - e.handleHeight / 2, u(e, e.handleTop)), a(e)
    }

    function r(t) {
        t.preventDefault(), t.stopPropagation();
        var e = t.data, n = t.originalEvent, o = "undefined" != typeof n.targetTouches ? n.targetTouches[0] : null, i = o ? o.pageX : t.clientX, l = o ? o.pageY : t.clientY;
        e.horizontal ? (e.mouseStart = i, e.handleLeft = parseInt(e.$handle.css("left"), 10)) : (e.mouseStart = l, e.handleTop = parseInt(e.$handle.css("top"), 10)), a(e)
    }

    function a(t) {
        t.$content.off(p(d)), h.on(v.move, t, s).on(v.end, t, c)
    }

    function s(t) {
        t.preventDefault(), t.stopPropagation();
        var e = t.data, n = t.originalEvent, o = 0, i = 0, l = "undefined" != typeof n.targetTouches ? n.targetTouches[0] : null, r = l ? l.pageX : t.clientX, a = l ? l.pageY : t.clientY;
        e.horizontal ? (i = e.mouseStart - r, o = e.handleLeft - i) : (i = e.mouseStart - a, o = e.handleTop - i), u(e, o)
    }

    function c(t) {
        t.preventDefault(), t.stopPropagation();
        var e = t.data;
        e.$content.on("scroll.scroller", e, i), h.off(".scroller")
    }

    function u(t, e) {
        var n = {};
        if (t.horizontal) {
            e < t.handleBounds.left && (e = t.handleBounds.left), e > t.handleBounds.right && (e = t.handleBounds.right);
            var o = Math.round(e * t.scrollRatio);
            n = {left: e}, t.$content.scrollLeft(o)
        } else {
            e < t.handleBounds.top && (e = t.handleBounds.top), e > t.handleBounds.bottom && (e = t.handleBounds.bottom);
            var i = Math.round(e * t.scrollRatio);
            n = {top: e}, t.$content.scrollTop(i)
        }
        t.$handle.css(n)
    }

    function p(t) {
        return "." + t
    }

    var d = "scroller", h = null, f = {
        base: "scroller",
        content: "scroller-content",
        bar: "scroller-bar",
        track: "scroller-track",
        handle: "scroller-handle",
        isHorizontal: "scroller-horizontal",
        isSetup: "scroller-setup",
        isActive: "scroller-active"
    }, v = {
        start: "touchstart." + d + " mousedown." + d,
        move: "touchmove." + d + " mousemove." + d,
        end: "touchend." + d + " mouseup." + d
    }, m = {customClass: "", duration: 0, handleSize: 0, horizontal: !1, trackMargin: 0}, g = {
        defaults: function (e) {
            return m = t.extend(m, e || {}), "object" == typeof this ? t(this) : !0
        }, destroy: function () {
            return t(this).each(function (e, n) {
                var o = t(n).data(d);
                o && (o.$scroller.removeClass([o.customClass, f.base, f.isActive].join(" ")), o.$bar.remove(), o.$content.contents().unwrap(), o.$content.off(p(d)), o.$scroller.off(p(d)).removeData(d))
            })
        }, scroll: function (e, n) {
            return t(this).each(function () {
                var o = t(this).data(d), i = n || m.duration;
                if ("number" != typeof e) {
                    var l = t(e);
                    if (l.length > 0) {
                        var r = l.position();
                        e = o.horizontal ? r.left + o.$content.scrollLeft() : r.top + o.$content.scrollTop()
                    } else e = o.$content.scrollTop()
                }
                var a = o.horizontal ? {scrollLeft: e} : {scrollTop: e};
                o.$content.stop().animate(a, i)
            })
        }, reset: function () {
            return t(this).each(function () {
                var e = t(this).data(d);
                if (e) {
                    e.$scroller.addClass(f.isSetup);
                    var n = {}, o = {}, i = {}, l = 0, r = !0;
                    if (e.horizontal) {
                        e.barHeight = e.$content[0].offsetHeight - e.$content[0].clientHeight, e.frameWidth = e.$content.outerWidth(), e.trackWidth = e.frameWidth - 2 * e.trackMargin, e.scrollWidth = e.$content[0].scrollWidth, e.ratio = e.trackWidth / e.scrollWidth, e.trackRatio = e.trackWidth / e.scrollWidth, e.handleWidth = e.handleSize > 0 ? e.handleSize : e.trackWidth * e.trackRatio, e.scrollRatio = (e.scrollWidth - e.frameWidth) / (e.trackWidth - e.handleWidth), e.handleBounds = {
                            left: 0,
                            right: e.trackWidth - e.handleWidth
                        }, e.$content.css({paddingBottom: e.barHeight + e.paddingBottom});
                        var a = e.$content.scrollLeft();
                        l = a * e.ratio, r = e.scrollWidth <= e.frameWidth, n = {width: e.frameWidth}, o = {
                            width: e.trackWidth,
                            marginLeft: e.trackMargin,
                            marginRight: e.trackMargin
                        }, i = {width: e.handleWidth}
                    } else {
                        e.barWidth = e.$content[0].offsetWidth - e.$content[0].clientWidth, e.frameHeight = e.$content.outerHeight(), e.trackHeight = e.frameHeight - 2 * e.trackMargin, e.scrollHeight = e.$content[0].scrollHeight, e.ratio = e.trackHeight / e.scrollHeight, e.trackRatio = e.trackHeight / e.scrollHeight, e.handleHeight = e.handleSize > 0 ? e.handleSize : e.trackHeight * e.trackRatio, e.scrollRatio = (e.scrollHeight - e.frameHeight) / (e.trackHeight - e.handleHeight), e.handleBounds = {
                            top: 0,
                            bottom: e.trackHeight - e.handleHeight
                        };
                        var s = e.$content.scrollTop();
                        l = s * e.ratio, r = e.scrollHeight <= e.frameHeight, n = {height: e.frameHeight}, o = {
                            height: e.trackHeight,
                            marginBottom: e.trackMargin,
                            marginTop: e.trackMargin
                        }, i = {height: e.handleHeight}
                    }
                    r ? e.$scroller.removeClass(f.isActive) : e.$scroller.addClass(f.isActive), e.$bar.css(n), e.$track.css(o), e.$handle.css(i), u(e, l), e.$scroller.removeClass(f.isSetup)
                }
            })
        }
    };
    t.fn[d] = function (t) {
        return g[t] ? g[t].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof t && t ? this : n.apply(this, arguments)
    }, t[d] = function (t) {
        "defaults" === t && g.defaults.apply(this, Array.prototype.slice.call(arguments, 1))
    }
}(jQuery), function () {
    var t = this, e = t._, n = Array.prototype, o = Object.prototype, i = Function.prototype, l = n.push, r = n.slice, a = n.concat, s = o.toString, c = o.hasOwnProperty, u = Array.isArray, p = Object.keys, d = i.bind, h = function (t) {
        return t instanceof h ? t : this instanceof h ? void(this._wrapped = t) : new h(t)
    };
    "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = h), exports._ = h) : t._ = h, h.VERSION = "1.7.0";
    var f = function (t, e, n) {
        if (void 0 === e)return t;
        switch (null == n ? 3 : n) {
            case 1:
                return function (n) {
                    return t.call(e, n)
                };
            case 2:
                return function (n, o) {
                    return t.call(e, n, o)
                };
            case 3:
                return function (n, o, i) {
                    return t.call(e, n, o, i)
                };
            case 4:
                return function (n, o, i, l) {
                    return t.call(e, n, o, i, l)
                }
        }
        return function () {
            return t.apply(e, arguments)
        }
    };
    h.iteratee = function (t, e, n) {
        return null == t ? h.identity : h.isFunction(t) ? f(t, e, n) : h.isObject(t) ? h.matches(t) : h.property(t)
    }, h.each = h.forEach = function (t, e, n) {
        if (null == t)return t;
        e = f(e, n);
        var o, i = t.length;
        if (i === +i)for (o = 0; i > o; o++)e(t[o], o, t); else {
            var l = h.keys(t);
            for (o = 0, i = l.length; i > o; o++)e(t[l[o]], l[o], t)
        }
        return t
    }, h.map = h.collect = function (t, e, n) {
        if (null == t)return [];
        e = h.iteratee(e, n);
        for (var o, i = t.length !== +t.length && h.keys(t), l = (i || t).length, r = Array(l), a = 0; l > a; a++)o = i ? i[a] : a, r[a] = e(t[o], o, t);
        return r
    };
    var v = "Reduce of empty array with no initial value";
    h.reduce = h.foldl = h.inject = function (t, e, n, o) {
        null == t && (t = []), e = f(e, o, 4);
        var i, l = t.length !== +t.length && h.keys(t), r = (l || t).length, a = 0;
        if (arguments.length < 3) {
            if (!r)throw new TypeError(v);
            n = t[l ? l[a++] : a++]
        }
        for (; r > a; a++)i = l ? l[a] : a, n = e(n, t[i], i, t);
        return n
    }, h.reduceRight = h.foldr = function (t, e, n, o) {
        null == t && (t = []), e = f(e, o, 4);
        var i, l = t.length !== +t.length && h.keys(t), r = (l || t).length;
        if (arguments.length < 3) {
            if (!r)throw new TypeError(v);
            n = t[l ? l[--r] : --r]
        }
        for (; r--;)i = l ? l[r] : r, n = e(n, t[i], i, t);
        return n
    }, h.find = h.detect = function (t, e, n) {
        var o;
        return e = h.iteratee(e, n), h.some(t, function (t, n, i) {
            return e(t, n, i) ? (o = t, !0) : void 0
        }), o
    }, h.filter = h.select = function (t, e, n) {
        var o = [];
        return null == t ? o : (e = h.iteratee(e, n), h.each(t, function (t, n, i) {
            e(t, n, i) && o.push(t)
        }), o)
    }, h.reject = function (t, e, n) {
        return h.filter(t, h.negate(h.iteratee(e)), n)
    }, h.every = h.all = function (t, e, n) {
        if (null == t)return !0;
        e = h.iteratee(e, n);
        var o, i, l = t.length !== +t.length && h.keys(t), r = (l || t).length;
        for (o = 0; r > o; o++)if (i = l ? l[o] : o, !e(t[i], i, t))return !1;
        return !0
    }, h.some = h.any = function (t, e, n) {
        if (null == t)return !1;
        e = h.iteratee(e, n);
        var o, i, l = t.length !== +t.length && h.keys(t), r = (l || t).length;
        for (o = 0; r > o; o++)if (i = l ? l[o] : o, e(t[i], i, t))return !0;
        return !1
    }, h.contains = h.include = function (t, e) {
        return null == t ? !1 : (t.length !== +t.length && (t = h.values(t)), h.indexOf(t, e) >= 0)
    }, h.invoke = function (t, e) {
        var n = r.call(arguments, 2), o = h.isFunction(e);
        return h.map(t, function (t) {
            return (o ? e : t[e]).apply(t, n)
        })
    }, h.pluck = function (t, e) {
        return h.map(t, h.property(e))
    }, h.where = function (t, e) {
        return h.filter(t, h.matches(e))
    }, h.findWhere = function (t, e) {
        return h.find(t, h.matches(e))
    }, h.max = function (t, e, n) {
        var o, i, l = -1 / 0, r = -1 / 0;
        if (null == e && null != t) {
            t = t.length === +t.length ? t : h.values(t);
            for (var a = 0, s = t.length; s > a; a++)o = t[a], o > l && (l = o)
        } else e = h.iteratee(e, n), h.each(t, function (t, n, o) {
            i = e(t, n, o), (i > r || i === -1 / 0 && l === -1 / 0) && (l = t, r = i)
        });
        return l
    }, h.min = function (t, e, n) {
        var o, i, l = 1 / 0, r = 1 / 0;
        if (null == e && null != t) {
            t = t.length === +t.length ? t : h.values(t);
            for (var a = 0, s = t.length; s > a; a++)o = t[a], l > o && (l = o)
        } else e = h.iteratee(e, n), h.each(t, function (t, n, o) {
            i = e(t, n, o), (r > i || 1 / 0 === i && 1 / 0 === l) && (l = t, r = i)
        });
        return l
    }, h.shuffle = function (t) {
        for (var e, n = t && t.length === +t.length ? t : h.values(t), o = n.length, i = Array(o), l = 0; o > l; l++)e = h.random(0, l), e !== l && (i[l] = i[e]), i[e] = n[l];
        return i
    }, h.sample = function (t, e, n) {
        return null == e || n ? (t.length !== +t.length && (t = h.values(t)), t[h.random(t.length - 1)]) : h.shuffle(t).slice(0, Math.max(0, e))
    }, h.sortBy = function (t, e, n) {
        return e = h.iteratee(e, n), h.pluck(h.map(t, function (t, n, o) {
            return {value: t, index: n, criteria: e(t, n, o)}
        }).sort(function (t, e) {
            var n = t.criteria, o = e.criteria;
            if (n !== o) {
                if (n > o || void 0 === n)return 1;
                if (o > n || void 0 === o)return -1
            }
            return t.index - e.index
        }), "value")
    };
    var m = function (t) {
        return function (e, n, o) {
            var i = {};
            return n = h.iteratee(n, o), h.each(e, function (o, l) {
                var r = n(o, l, e);
                t(i, o, r)
            }), i
        }
    };
    h.groupBy = m(function (t, e, n) {
        h.has(t, n) ? t[n].push(e) : t[n] = [e]
    }), h.indexBy = m(function (t, e, n) {
        t[n] = e
    }), h.countBy = m(function (t, e, n) {
        h.has(t, n) ? t[n]++ : t[n] = 1
    }), h.sortedIndex = function (t, e, n, o) {
        n = h.iteratee(n, o, 1);
        for (var i = n(e), l = 0, r = t.length; r > l;) {
            var a = l + r >>> 1;
            n(t[a]) < i ? l = a + 1 : r = a
        }
        return l
    }, h.toArray = function (t) {
        return t ? h.isArray(t) ? r.call(t) : t.length === +t.length ? h.map(t, h.identity) : h.values(t) : []
    }, h.size = function (t) {
        return null == t ? 0 : t.length === +t.length ? t.length : h.keys(t).length
    }, h.partition = function (t, e, n) {
        e = h.iteratee(e, n);
        var o = [], i = [];
        return h.each(t, function (t, n, l) {
            (e(t, n, l) ? o : i).push(t)
        }), [o, i]
    }, h.first = h.head = h.take = function (t, e, n) {
        return null == t ? void 0 : null == e || n ? t[0] : 0 > e ? [] : r.call(t, 0, e)
    }, h.initial = function (t, e, n) {
        return r.call(t, 0, Math.max(0, t.length - (null == e || n ? 1 : e)))
    }, h.last = function (t, e, n) {
        return null == t ? void 0 : null == e || n ? t[t.length - 1] : r.call(t, Math.max(t.length - e, 0))
    }, h.rest = h.tail = h.drop = function (t, e, n) {
        return r.call(t, null == e || n ? 1 : e)
    }, h.compact = function (t) {
        return h.filter(t, h.identity)
    };
    var g = function (t, e, n, o) {
        if (e && h.every(t, h.isArray))return a.apply(o, t);
        for (var i = 0, r = t.length; r > i; i++) {
            var s = t[i];
            h.isArray(s) || h.isArguments(s) ? e ? l.apply(o, s) : g(s, e, n, o) : n || o.push(s)
        }
        return o
    };
    h.flatten = function (t, e) {
        return g(t, e, !1, [])
    }, h.without = function (t) {
        return h.difference(t, r.call(arguments, 1))
    }, h.uniq = h.unique = function (t, e, n, o) {
        if (null == t)return [];
        h.isBoolean(e) || (o = n, n = e, e = !1), null != n && (n = h.iteratee(n, o));
        for (var i = [], l = [], r = 0, a = t.length; a > r; r++) {
            var s = t[r];
            if (e)r && l === s || i.push(s), l = s; else if (n) {
                var c = n(s, r, t);
                h.indexOf(l, c) < 0 && (l.push(c), i.push(s))
            } else h.indexOf(i, s) < 0 && i.push(s)
        }
        return i
    }, h.union = function () {
        return h.uniq(g(arguments, !0, !0, []))
    }, h.intersection = function (t) {
        if (null == t)return [];
        for (var e = [], n = arguments.length, o = 0, i = t.length; i > o; o++) {
            var l = t[o];
            if (!h.contains(e, l)) {
                for (var r = 1; n > r && h.contains(arguments[r], l); r++);
                r === n && e.push(l)
            }
        }
        return e
    }, h.difference = function (t) {
        var e = g(r.call(arguments, 1), !0, !0, []);
        return h.filter(t, function (t) {
            return !h.contains(e, t)
        })
    }, h.zip = function (t) {
        if (null == t)return [];
        for (var e = h.max(arguments, "length").length, n = Array(e), o = 0; e > o; o++)n[o] = h.pluck(arguments, o);
        return n
    }, h.object = function (t, e) {
        if (null == t)return {};
        for (var n = {}, o = 0, i = t.length; i > o; o++)e ? n[t[o]] = e[o] : n[t[o][0]] = t[o][1];
        return n
    }, h.indexOf = function (t, e, n) {
        if (null == t)return -1;
        var o = 0, i = t.length;
        if (n) {
            if ("number" != typeof n)return o = h.sortedIndex(t, e), t[o] === e ? o : -1;
            o = 0 > n ? Math.max(0, i + n) : n
        }
        for (; i > o; o++)if (t[o] === e)return o;
        return -1
    }, h.lastIndexOf = function (t, e, n) {
        if (null == t)return -1;
        var o = t.length;
        for ("number" == typeof n && (o = 0 > n ? o + n + 1 : Math.min(o, n + 1)); --o >= 0;)if (t[o] === e)return o;
        return -1
    }, h.range = function (t, e, n) {
        arguments.length <= 1 && (e = t || 0, t = 0), n = n || 1;
        for (var o = Math.max(Math.ceil((e - t) / n), 0), i = Array(o), l = 0; o > l; l++, t += n)i[l] = t;
        return i
    };
    var b = function () {
    };
    h.bind = function (t, e) {
        var n, o;
        if (d && t.bind === d)return d.apply(t, r.call(arguments, 1));
        if (!h.isFunction(t))throw new TypeError("Bind must be called on a function");
        return n = r.call(arguments, 2), o = function () {
            if (!(this instanceof o))return t.apply(e, n.concat(r.call(arguments)));
            b.prototype = t.prototype;
            var i = new b;
            b.prototype = null;
            var l = t.apply(i, n.concat(r.call(arguments)));
            return h.isObject(l) ? l : i
        }
    }, h.partial = function (t) {
        var e = r.call(arguments, 1);
        return function () {
            for (var n = 0, o = e.slice(), i = 0, l = o.length; l > i; i++)o[i] === h && (o[i] = arguments[n++]);
            for (; n < arguments.length;)o.push(arguments[n++]);
            return t.apply(this, o)
        }
    }, h.bindAll = function (t) {
        var e, n, o = arguments.length;
        if (1 >= o)throw new Error("bindAll must be passed function names");
        for (e = 1; o > e; e++)n = arguments[e], t[n] = h.bind(t[n], t);
        return t
    }, h.memoize = function (t, e) {
        var n = function (o) {
            var i = n.cache, l = e ? e.apply(this, arguments) : o;
            return h.has(i, l) || (i[l] = t.apply(this, arguments)), i[l]
        };
        return n.cache = {}, n
    }, h.delay = function (t, e) {
        var n = r.call(arguments, 2);
        return setTimeout(function () {
            return t.apply(null, n)
        }, e)
    }, h.defer = function (t) {
        return h.delay.apply(h, [t, 1].concat(r.call(arguments, 1)))
    }, h.throttle = function (t, e, n) {
        var o, i, l, r = null, a = 0;
        n || (n = {});
        var s = function () {
            a = n.leading === !1 ? 0 : h.now(), r = null, l = t.apply(o, i), r || (o = i = null)
        };
        return function () {
            var c = h.now();
            a || n.leading !== !1 || (a = c);
            var u = e - (c - a);
            return o = this, i = arguments, 0 >= u || u > e ? (clearTimeout(r), r = null, a = c, l = t.apply(o, i), r || (o = i = null)) : r || n.trailing === !1 || (r = setTimeout(s, u)), l
        }
    }, h.debounce = function (t, e, n) {
        var o, i, l, r, a, s = function () {
            var c = h.now() - r;
            e > c && c > 0 ? o = setTimeout(s, e - c) : (o = null, n || (a = t.apply(l, i), o || (l = i = null)))
        };
        return function () {
            l = this, i = arguments, r = h.now();
            var c = n && !o;
            return o || (o = setTimeout(s, e)), c && (a = t.apply(l, i), l = i = null), a
        }
    }, h.wrap = function (t, e) {
        return h.partial(e, t)
    }, h.negate = function (t) {
        return function () {
            return !t.apply(this, arguments)
        }
    }, h.compose = function () {
        var t = arguments, e = t.length - 1;
        return function () {
            for (var n = e, o = t[e].apply(this, arguments); n--;)o = t[n].call(this, o);
            return o
        }
    }, h.after = function (t, e) {
        return function () {
            return --t < 1 ? e.apply(this, arguments) : void 0
        }
    }, h.before = function (t, e) {
        var n;
        return function () {
            return --t > 0 ? n = e.apply(this, arguments) : e = null, n
        }
    }, h.once = h.partial(h.before, 2), h.keys = function (t) {
        if (!h.isObject(t))return [];
        if (p)return p(t);
        var e = [];
        for (var n in t)h.has(t, n) && e.push(n);
        return e
    }, h.values = function (t) {
        for (var e = h.keys(t), n = e.length, o = Array(n), i = 0; n > i; i++)o[i] = t[e[i]];
        return o
    }, h.pairs = function (t) {
        for (var e = h.keys(t), n = e.length, o = Array(n), i = 0; n > i; i++)o[i] = [e[i], t[e[i]]];
        return o
    }, h.invert = function (t) {
        for (var e = {}, n = h.keys(t), o = 0, i = n.length; i > o; o++)e[t[n[o]]] = n[o];
        return e
    }, h.functions = h.methods = function (t) {
        var e = [];
        for (var n in t)h.isFunction(t[n]) && e.push(n);
        return e.sort()
    }, h.extend = function (t) {
        if (!h.isObject(t))return t;
        for (var e, n, o = 1, i = arguments.length; i > o; o++) {
            e = arguments[o];
            for (n in e)c.call(e, n) && (t[n] = e[n])
        }
        return t
    }, h.pick = function (t, e, n) {
        var o, i = {};
        if (null == t)return i;
        if (h.isFunction(e)) {
            e = f(e, n);
            for (o in t) {
                var l = t[o];
                e(l, o, t) && (i[o] = l)
            }
        } else {
            var s = a.apply([], r.call(arguments, 1));
            t = new Object(t);
            for (var c = 0, u = s.length; u > c; c++)o = s[c], o in t && (i[o] = t[o])
        }
        return i
    }, h.omit = function (t, e, n) {
        if (h.isFunction(e))e = h.negate(e); else {
            var o = h.map(a.apply([], r.call(arguments, 1)), String);
            e = function (t, e) {
                return !h.contains(o, e)
            }
        }
        return h.pick(t, e, n)
    }, h.defaults = function (t) {
        if (!h.isObject(t))return t;
        for (var e = 1, n = arguments.length; n > e; e++) {
            var o = arguments[e];
            for (var i in o)void 0 === t[i] && (t[i] = o[i])
        }
        return t
    }, h.clone = function (t) {
        return h.isObject(t) ? h.isArray(t) ? t.slice() : h.extend({}, t) : t
    }, h.tap = function (t, e) {
        return e(t), t
    };
    var y = function (t, e, n, o) {
        if (t === e)return 0 !== t || 1 / t === 1 / e;
        if (null == t || null == e)return t === e;
        t instanceof h && (t = t._wrapped), e instanceof h && (e = e._wrapped);
        var i = s.call(t);
        if (i !== s.call(e))return !1;
        switch (i) {
            case"[object RegExp]":
            case"[object String]":
                return "" + t == "" + e;
            case"[object Number]":
                return +t !== +t ? +e !== +e : 0 === +t ? 1 / +t === 1 / e : +t === +e;
            case"[object Date]":
            case"[object Boolean]":
                return +t === +e
        }
        if ("object" != typeof t || "object" != typeof e)return !1;
        for (var l = n.length; l--;)if (n[l] === t)return o[l] === e;
        var r = t.constructor, a = e.constructor;
        if (r !== a && "constructor"in t && "constructor"in e && !(h.isFunction(r) && r instanceof r && h.isFunction(a) && a instanceof a))return !1;
        n.push(t), o.push(e);
        var c, u;
        if ("[object Array]" === i) {
            if (c = t.length, u = c === e.length)for (; c-- && (u = y(t[c], e[c], n, o)););
        } else {
            var p, d = h.keys(t);
            if (c = d.length, u = h.keys(e).length === c)for (; c-- && (p = d[c], u = h.has(e, p) && y(t[p], e[p], n, o)););
        }
        return n.pop(), o.pop(), u
    };
    h.isEqual = function (t, e) {
        return y(t, e, [], [])
    }, h.isEmpty = function (t) {
        if (null == t)return !0;
        if (h.isArray(t) || h.isString(t) || h.isArguments(t))return 0 === t.length;
        for (var e in t)if (h.has(t, e))return !1;
        return !0
    }, h.isElement = function (t) {
        return !(!t || 1 !== t.nodeType)
    }, h.isArray = u || function (t) {
        return "[object Array]" === s.call(t)
    }, h.isObject = function (t) {
        var e = typeof t;
        return "function" === e || "object" === e && !!t
    }, h.each(["Arguments", "Function", "String", "Number", "Date", "RegExp"], function (t) {
        h["is" + t] = function (e) {
            return s.call(e) === "[object " + t + "]"
        }
    }), h.isArguments(arguments) || (h.isArguments = function (t) {
        return h.has(t, "callee")
    }), "function" != typeof/./ && (h.isFunction = function (t) {
        return "function" == typeof t || !1
    }), h.isFinite = function (t) {
        return isFinite(t) && !isNaN(parseFloat(t))
    }, h.isNaN = function (t) {
        return h.isNumber(t) && t !== +t
    }, h.isBoolean = function (t) {
        return t === !0 || t === !1 || "[object Boolean]" === s.call(t)
    }, h.isNull = function (t) {
        return null === t
    }, h.isUndefined = function (t) {
        return void 0 === t
    }, h.has = function (t, e) {
        return null != t && c.call(t, e)
    }, h.noConflict = function () {
        return t._ = e, this
    }, h.identity = function (t) {
        return t
    }, h.constant = function (t) {
        return function () {
            return t
        }
    }, h.noop = function () {
    }, h.property = function (t) {
        return function (e) {
            return e[t]
        }
    }, h.matches = function (t) {
        var e = h.pairs(t), n = e.length;
        return function (t) {
            if (null == t)return !n;
            t = new Object(t);
            for (var o = 0; n > o; o++) {
                var i = e[o], l = i[0];
                if (i[1] !== t[l] || !(l in t))return !1
            }
            return !0
        }
    }, h.times = function (t, e, n) {
        var o = Array(Math.max(0, t));
        e = f(e, n, 1);
        for (var i = 0; t > i; i++)o[i] = e(i);
        return o
    }, h.random = function (t, e) {
        return null == e && (e = t, t = 0), t + Math.floor(Math.random() * (e - t + 1))
    }, h.now = Date.now || function () {
        return (new Date).getTime()
    };
    var C = {
        "&": "&",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#x27;",
        "`": "&#x60;"
    }, w = h.invert(C), x = function (t) {
        var e = function (e) {
            return t[e]
        }, n = "(?:" + h.keys(t).join("|") + ")", o = RegExp(n), i = RegExp(n, "g");
        return function (t) {
            return t = null == t ? "" : "" + t, o.test(t) ? t.replace(i, e) : t
        }
    };
    h.escape = x(C), h.unescape = x(w), h.result = function (t, e) {
        if (null == t)return void 0;
        var n = t[e];
        return h.isFunction(n) ? t[e]() : n
    };
    var k = 0;
    h.uniqueId = function (t) {
        var e = ++k + "";
        return t ? t + e : e
    }, h.templateSettings = {evaluate: /<%([\s\S]+?)%>/g, interpolate: /<%=([\s\S]+?)%>/g, escape: /<%-([\s\S]+?)%>/g};
    var S = /(.)^/, O = {
        "'": "'",
        "\\": "\\",
        "\r": "r",
        "\n": "n",
        "\u2028": "u2028",
        "\u2029": "u2029"
    }, _ = /\\|'|\r|\n|\u2028|\u2029/g, A = function (t) {
        return "\\" + O[t]
    };
    h.template = function (t, e, n) {
        !e && n && (e = n), e = h.defaults({}, e, h.templateSettings);
        var o = RegExp([(e.escape || S).source, (e.interpolate || S).source, (e.evaluate || S).source].join("|") + "|$", "g"), i = 0, l = "__p+='";
        t.replace(o, function (e, n, o, r, a) {
            return l += t.slice(i, a).replace(_, A), i = a + e.length, n ? l += "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'" : o ? l += "'+\n((__t=(" + o + "))==null?'':__t)+\n'" : r && (l += "';\n" + r + "\n__p+='"), e
        }), l += "';\n", e.variable || (l = "with(obj||{}){\n" + l + "}\n"), l = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + l + "return __p;\n";
        try {
            var r = new Function(e.variable || "obj", "_", l)
        } catch (a) {
            throw a.source = l, a
        }
        var s = function (t) {
            return r.call(this, t, h)
        }, c = e.variable || "obj";
        return s.source = "function(" + c + "){\n" + l + "}", s
    }, h.chain = function (t) {
        var e = h(t);
        return e._chain = !0, e
    };
    var $ = function (t) {
        return this._chain ? h(t).chain() : t
    };
    h.mixin = function (t) {
        h.each(h.functions(t), function (e) {
            var n = h[e] = t[e];
            h.prototype[e] = function () {
                var t = [this._wrapped];
                return l.apply(t, arguments), $.call(this, n.apply(h, t))
            }
        })
    }, h.mixin(h), h.each(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function (t) {
        var e = n[t];
        h.prototype[t] = function () {
            var n = this._wrapped;
            return e.apply(n, arguments), "shift" !== t && "splice" !== t || 0 !== n.length || delete n[0], $.call(this, n)
        }
    }), h.each(["concat", "join", "slice"], function (t) {
        var e = n[t];
        h.prototype[t] = function () {
            return $.call(this, e.apply(this._wrapped, arguments))
        }
    }), h.prototype.value = function () {
        return this._wrapped
    }, "function" == typeof define && define.amd && define("underscore", [], function () {
        return h
    })
}.call(this);
;
!function (a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function (a) {
    function e(a) {
        var b = a.prop("clientWidth"), c = a.prop("offsetWidth"), d = parseInt(a.css("border-right-width"), 10), e = parseInt(a.css("border-left-width"), 10);
        return c > b + e + d
    }

    var b = "onmousewheel"in window ? "ActiveXObject"in window ? "wheel" : "mousewheel" : "DOMMouseScroll", c = ".scrollLock", d = a.fn.scrollLock;
    a.fn.scrollLock = function (d, f, g) {
        return "string" != typeof f && (f = null), void 0 !== d && !d || "off" === d ? this.each(function () {
            a(this).off(c)
        }) : this.each(function () {
            a(this).on(b + c, f, function (b) {
                if (!b.ctrlKey) {
                    var c = a(this);
                    if (g === !0 || e(c)) {
                        b.stopPropagation();
                        var d = c.scrollTop(), f = c.prop("scrollHeight"), h = c.prop("clientHeight"), i = b.originalEvent.wheelDelta || -1 * b.originalEvent.detail || -1 * b.originalEvent.deltaY, j = 0;
                        if ("wheel" === b.type) {
                            var k = c.height() / a(window).height();
                            j = b.originalEvent.deltaY * k
                        }
                        (i > 0 && 0 >= d + j || 0 > i && d + j >= f - h) && (b.preventDefault(), j && c.scrollTop(d + j))
                    }
                }
            })
        })
    }, a.fn.scrollLock.noConflict = function () {
        return a.fn.scrollLock = d, this
    }
});
;
!function (a) {
    return "function" == typeof define && define.amd ? define(["jquery"], function (b) {
        return a(b, window, document)
    }) : a(jQuery, window, document)
}(function (a, b, c) {
    "use strict";
    var d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H;
    z = {
        paneClass: "nano-pane",
        sliderClass: "nano-slider",
        contentClass: "nano-content",
        iOSNativeScrolling: !1,
        preventPageScrolling: !1,
        disableResize: !1,
        alwaysVisible: !1,
        flashDelay: 1500,
        sliderMinHeight: 20,
        sliderMaxHeight: null,
        documentContext: null,
        windowContext: null
    }, u = "scrollbar", t = "scroll", l = "mousedown", m = "mouseenter", n = "mousemove", p = "mousewheel", o = "mouseup", s = "resize", h = "drag", i = "enter", w = "up", r = "panedown", f = "DOMMouseScroll", g = "down", x = "wheel", j = "keydown", k = "keyup", v = "touchmove", d = "Microsoft Internet Explorer" === b.navigator.appName && /msie 7./i.test(b.navigator.appVersion) && b.ActiveXObject, e = null, D = b.requestAnimationFrame, y = b.cancelAnimationFrame, F = c.createElement("div").style, H = function () {
        var a, b, c, d, e, f;
        for (d = ["t", "webkitT", "MozT", "msT", "OT"], a = e = 0, f = d.length; f > e; a = ++e)if (c = d[a], b = d[a] + "ransform", b in F)return d[a].substr(0, d[a].length - 1);
        return !1
    }(), G = function (a) {
        return H === !1 ? !1 : "" === H ? a : H + a.charAt(0).toUpperCase() + a.substr(1)
    }, E = G("transform"), B = E !== !1, A = function () {
        var a, b, d;
        return a = c.createElement("div"), b = a.style, b.position = "absolute", b.width = "100px", b.height = "100px", b.overflow = t, b.top = "-9999px", c.body.appendChild(a), d = a.offsetWidth - a.clientWidth, c.body.removeChild(a), d
    }, C = function () {
        var a, c, d;
        return c = b.navigator.userAgent, (a = /(?=.+Mac OS X)(?=.+Firefox)/.test(c)) ? (d = /Firefox\/\d{2}\./.exec(c), d && (d = d[0].replace(/\D+/g, "")), a && +d > 23) : !1
    }, q = function () {
        function j(d, f) {
            this.el = d, this.options = f, e || (e = A()), this.$el = a(this.el), this.doc = a(this.options.documentContext || c), this.win = a(this.options.windowContext || b), this.body = this.doc.find("body"), this.$content = this.$el.children("." + f.contentClass), this.$content.attr("tabindex", this.options.tabIndex || 0), this.content = this.$content[0], this.previousPosition = 0, this.options.iOSNativeScrolling && null != this.el.style.WebkitOverflowScrolling ? this.nativeScrolling() : this.generate(), this.createEvents(), this.addEvents(), this.reset()
        }

        return j.prototype.preventScrolling = function (a, b) {
            if (this.isActive)if (a.type === f)(b === g && a.originalEvent.detail > 0 || b === w && a.originalEvent.detail < 0) && a.preventDefault(); else if (a.type === p) {
                if (!a.originalEvent || !a.originalEvent.wheelDelta)return;
                (b === g && a.originalEvent.wheelDelta < 0 || b === w && a.originalEvent.wheelDelta > 0) && a.preventDefault()
            }
        }, j.prototype.nativeScrolling = function () {
            this.$content.css({WebkitOverflowScrolling: "touch"}), this.iOSNativeScrolling = !0, this.isActive = !0
        }, j.prototype.updateScrollValues = function () {
            var a, b;
            a = this.content, this.maxScrollTop = a.scrollHeight - a.clientHeight, this.prevScrollTop = this.contentScrollTop || 0, this.contentScrollTop = a.scrollTop, b = this.contentScrollTop > this.previousPosition ? "down" : this.contentScrollTop < this.previousPosition ? "up" : "same", this.previousPosition = this.contentScrollTop, "same" !== b && this.$el.trigger("update", {
                position: this.contentScrollTop,
                maximum: this.maxScrollTop,
                direction: b
            }), this.iOSNativeScrolling || (this.maxSliderTop = this.paneHeight - this.sliderHeight, this.sliderTop = 0 === this.maxScrollTop ? 0 : this.contentScrollTop * this.maxSliderTop / this.maxScrollTop)
        }, j.prototype.setOnScrollStyles = function () {
            var a;
            B ? (a = {}, a[E] = "translate(0, " + this.sliderTop + "px)") : a = {top: this.sliderTop}, D ? (y && this.scrollRAF && y(this.scrollRAF), this.scrollRAF = D(function (b) {
                return function () {
                    return b.scrollRAF = null, b.slider.css(a)
                }
            }(this))) : this.slider.css(a)
        }, j.prototype.createEvents = function () {
            this.events = {
                down: function (a) {
                    return function (b) {
                        return a.isBeingDragged = !0, a.offsetY = b.pageY - a.slider.offset().top, a.slider.is(b.target) || (a.offsetY = 0), a.pane.addClass("active"), a.doc.bind(n, a.events[h]).bind(o, a.events[w]), a.body.bind(m, a.events[i]), !1
                    }
                }(this), drag: function (a) {
                    return function (b) {
                        return a.sliderY = b.pageY - a.$el.offset().top - a.paneTop - (a.offsetY || .5 * a.sliderHeight), a.scroll(), a.contentScrollTop >= a.maxScrollTop && a.prevScrollTop !== a.maxScrollTop ? a.$el.trigger("scrollend") : 0 === a.contentScrollTop && 0 !== a.prevScrollTop && a.$el.trigger("scrolltop"), !1
                    }
                }(this), up: function (a) {
                    return function () {
                        return a.isBeingDragged = !1, a.pane.removeClass("active"), a.doc.unbind(n, a.events[h]).unbind(o, a.events[w]), a.body.unbind(m, a.events[i]), !1
                    }
                }(this), resize: function (a) {
                    return function () {
                        a.reset()
                    }
                }(this), panedown: function (a) {
                    return function (b) {
                        return a.sliderY = (b.offsetY || b.originalEvent.layerY) - .5 * a.sliderHeight, a.scroll(), a.events.down(b), !1
                    }
                }(this), scroll: function (a) {
                    return function (b) {
                        a.updateScrollValues(), a.isBeingDragged || (a.iOSNativeScrolling || (a.sliderY = a.sliderTop, a.setOnScrollStyles()), null != b && (a.contentScrollTop >= a.maxScrollTop ? (a.options.preventPageScrolling && a.preventScrolling(b, g), a.prevScrollTop !== a.maxScrollTop && a.$el.trigger("scrollend")) : 0 === a.contentScrollTop && (a.options.preventPageScrolling && a.preventScrolling(b, w), 0 !== a.prevScrollTop && a.$el.trigger("scrolltop"))))
                    }
                }(this), wheel: function (a) {
                    return function (b) {
                        var c;
                        if (null != b)return c = b.delta || b.wheelDelta || b.originalEvent && b.originalEvent.wheelDelta || -b.detail || b.originalEvent && -b.originalEvent.detail, c && (a.sliderY += -c / 3), a.scroll(), !1
                    }
                }(this), enter: function (a) {
                    return function (b) {
                        var c;
                        if (a.isBeingDragged)return 1 !== (b.buttons || b.which) ? (c = a.events)[w].apply(c, arguments) : void 0
                    }
                }(this)
            }
        }, j.prototype.addEvents = function () {
            var a;
            this.removeEvents(), a = this.events, this.options.disableResize || this.win.bind(s, a[s]), this.iOSNativeScrolling || (this.slider.bind(l, a[g]), this.pane.bind(l, a[r]).bind("" + p + " " + f, a[x])), this.$content.bind("" + t + " " + p + " " + f + " " + v, a[t])
        }, j.prototype.removeEvents = function () {
            var a;
            a = this.events, this.win.unbind(s, a[s]), this.iOSNativeScrolling || (this.slider.unbind(), this.pane.unbind()), this.$content.unbind("" + t + " " + p + " " + f + " " + v, a[t])
        }, j.prototype.generate = function () {
            var a, c, d, f, g, h, i;
            return f = this.options, h = f.paneClass, i = f.sliderClass, a = f.contentClass, (g = this.$el.children("." + h)).length || g.children("." + i).length || this.$el.append('<div class="' + h + '"><div class="' + i + '" /></div>'), this.pane = this.$el.children("." + h), this.slider = this.pane.find("." + i), 0 === e && C() ? (d = b.getComputedStyle(this.content, null).getPropertyValue("padding-right").replace(/[^0-9.]+/g, ""), c = {
                right: -14,
                paddingRight: +d + 14
            }) : e && (c = {right: -e}, this.$el.addClass("has-scrollbar")), null != c && this.$content.css(c), this
        }, j.prototype.restore = function () {
            this.stopped = !1, this.iOSNativeScrolling || this.pane.show(), this.addEvents()
        }, j.prototype.reset = function () {
            var a, b, c, f, g, h, i, j, k, l, m, n;
            return this.iOSNativeScrolling ? void(this.contentHeight = this.content.scrollHeight) : (this.$el.find("." + this.options.paneClass).length || this.generate().stop(), this.stopped && this.restore(), a = this.content, f = a.style, g = f.overflowY, d && this.$content.css({height: this.$content.height()}), b = a.scrollHeight + e, l = parseInt(this.$el.css("max-height"), 10), l > 0 && (this.$el.height(""), this.$el.height(a.scrollHeight > l ? l : a.scrollHeight)), i = this.pane.outerHeight(!1), k = parseInt(this.pane.css("top"), 10), h = parseInt(this.pane.css("bottom"), 10), j = i + k + h, n = Math.round(j / b * j), n < this.options.sliderMinHeight ? n = this.options.sliderMinHeight : null != this.options.sliderMaxHeight && n > this.options.sliderMaxHeight && (n = this.options.sliderMaxHeight), g === t && f.overflowX !== t && (n += e), this.maxSliderTop = j - n, this.contentHeight = b, this.paneHeight = i, this.paneOuterHeight = j, this.sliderHeight = n, this.paneTop = k, this.slider.height(n), this.events.scroll(), this.pane.show(), this.isActive = !0, a.scrollHeight === a.clientHeight || this.pane.outerHeight(!0) >= a.scrollHeight && g !== t ? (this.pane.hide(), this.isActive = !1) : this.el.clientHeight === a.scrollHeight && g === t ? this.slider.hide() : this.slider.show(), this.pane.css({
                opacity: this.options.alwaysVisible ? 1 : "",
                visibility: this.options.alwaysVisible ? "visible" : ""
            }), c = this.$content.css("position"), ("static" === c || "relative" === c) && (m = parseInt(this.$content.css("right"), 10), m && this.$content.css({
                right: "",
                marginRight: m
            })), this)
        }, j.prototype.scroll = function () {
            return this.isActive ? (this.sliderY = Math.max(0, this.sliderY), this.sliderY = Math.min(this.maxSliderTop, this.sliderY), this.$content.scrollTop(this.maxScrollTop * this.sliderY / this.maxSliderTop), this.iOSNativeScrolling || (this.updateScrollValues(), this.setOnScrollStyles()), this) : void 0
        }, j.prototype.scrollBottom = function (a) {
            return this.isActive ? (this.$content.scrollTop(this.contentHeight - this.$content.height() - a).trigger(p), this.stop().restore(), this) : void 0
        }, j.prototype.scrollTop = function (a) {
            return this.isActive ? (this.$content.scrollTop(+a).trigger(p), this.stop().restore(), this) : void 0
        }, j.prototype.scrollTo = function (a) {
            return this.isActive ? (this.scrollTop(this.$el.find(a).get(0).offsetTop), this) : void 0
        }, j.prototype.stop = function () {
            return y && this.scrollRAF && (y(this.scrollRAF), this.scrollRAF = null), this.stopped = !0, this.removeEvents(), this.iOSNativeScrolling || this.pane.hide(), this
        }, j.prototype.destroy = function () {
            return this.stopped || this.stop(), !this.iOSNativeScrolling && this.pane.length && this.pane.remove(), d && this.$content.height(""), this.$content.removeAttr("tabindex"), this.$el.hasClass("has-scrollbar") && (this.$el.removeClass("has-scrollbar"), this.$content.css({right: ""})), this
        }, j.prototype.flash = function () {
            return !this.iOSNativeScrolling && this.isActive ? (this.reset(), this.pane.addClass("flashed"), setTimeout(function (a) {
                return function () {
                    a.pane.removeClass("flashed")
                }
            }(this), this.options.flashDelay), this) : void 0
        }, j
    }(), a.fn.nanoScroller = function (b) {
        return this.each(function () {
            var c, d;
            if ((d = this.nanoscroller) || (c = a.extend({}, z, b), this.nanoscroller = d = new q(this, c)), b && "object" == typeof b) {
                if (a.extend(d.options, b), null != b.scrollBottom)return d.scrollBottom(b.scrollBottom);
                if (null != b.scrollTop)return d.scrollTop(b.scrollTop);
                if (b.scrollTo)return d.scrollTo(b.scrollTo);
                if ("bottom" === b.scroll)return d.scrollBottom(0);
                if ("top" === b.scroll)return d.scrollTop(0);
                if (b.scroll && b.scroll instanceof a)return d.scrollTo(b.scroll);
                if (b.stop)return d.stop();
                if (b.destroy)return d.destroy();
                if (b.flash)return d.flash()
            }
            return d.reset()
        })
    }, a.fn.nanoScroller.Constructor = q
});

/*!
 * Bootstrap v3.3.1 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
;
if ("undefined" == typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");
+function (a) {
    var b = a.fn.jquery.split(" ")[0].split(".");
    if (b[0] < 2 && b[1] < 9 || 1 == b[0] && 9 == b[1] && b[2] < 1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")
}(jQuery), +function (a) {
    "use strict";
    function b() {
        var a = document.createElement("bootstrap"), b = {
            WebkitTransition: "webkitTransitionEnd",
            MozTransition: "transitionend",
            OTransition: "oTransitionEnd otransitionend",
            transition: "transitionend"
        };
        for (var c in b)if (void 0 !== a.style[c])return {end: b[c]};
        return !1
    }

    a.fn.emulateTransitionEnd = function (b) {
        var c = !1, d = this;
        a(this).one("bsTransitionEnd", function () {
            c = !0
        });
        var e = function () {
            c || a(d).trigger(a.support.transition.end)
        };
        return setTimeout(e, b), this
    }, a(function () {
        a.support.transition = b(), a.support.transition && (a.event.special.bsTransitionEnd = {
            bindType: a.support.transition.end,
            delegateType: a.support.transition.end,
            handle: function (b) {
                return a(b.target).is(this) ? b.handleObj.handler.apply(this, arguments) : void 0
            }
        })
    })
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var c = a(this), e = c.data("bs.alert");
            e || c.data("bs.alert", e = new d(this)), "string" == typeof b && e[b].call(c)
        })
    }

    var c = '[data-dismiss="alert"]', d = function (b) {
        a(b).on("click", c, this.close)
    };
    d.VERSION = "3.3.1", d.TRANSITION_DURATION = 150, d.prototype.close = function (b) {
        function c() {
            g.detach().trigger("closed.bs.alert").remove()
        }

        var e = a(this), f = e.attr("data-target");
        f || (f = e.attr("href"), f = f && f.replace(/.*(?=#[^\s]*$)/, ""));
        var g = a(f);
        b && b.preventDefault(), g.length || (g = e.closest(".alert")), g.trigger(b = a.Event("close.bs.alert")), b.isDefaultPrevented() || (g.removeClass("in"), a.support.transition && g.hasClass("fade") ? g.one("bsTransitionEnd", c).emulateTransitionEnd(d.TRANSITION_DURATION) : c())
    };
    var e = a.fn.alert;
    a.fn.alert = b, a.fn.alert.Constructor = d, a.fn.alert.noConflict = function () {
        return a.fn.alert = e, this
    }, a(document).on("click.bs.alert.data-api", c, d.prototype.close)
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.button"), f = "object" == typeof b && b;
            e || d.data("bs.button", e = new c(this, f)), "toggle" == b ? e.toggle() : b && e.setState(b)
        })
    }

    var c = function (b, d) {
        this.$element = a(b), this.options = a.extend({}, c.DEFAULTS, d), this.isLoading = !1
    };
    c.VERSION = "3.3.1", c.DEFAULTS = {loadingText: "loading..."}, c.prototype.setState = function (b) {
        var c = "disabled", d = this.$element, e = d.is("input") ? "val" : "html", f = d.data();
        b += "Text", null == f.resetText && d.data("resetText", d[e]()), setTimeout(a.proxy(function () {
            d[e](null == f[b] ? this.options[b] : f[b]), "loadingText" == b ? (this.isLoading = !0, d.addClass(c).attr(c, c)) : this.isLoading && (this.isLoading = !1, d.removeClass(c).removeAttr(c))
        }, this), 0)
    }, c.prototype.toggle = function () {
        var a = !0, b = this.$element.closest('[data-toggle="buttons"]');
        if (b.length) {
            var c = this.$element.find("input");
            "radio" == c.prop("type") && (c.prop("checked") && this.$element.hasClass("active") ? a = !1 : b.find(".active").removeClass("active")), a && c.prop("checked", !this.$element.hasClass("active")).trigger("change")
        } else this.$element.attr("aria-pressed", !this.$element.hasClass("active"));
        a && this.$element.toggleClass("active")
    };
    var d = a.fn.button;
    a.fn.button = b, a.fn.button.Constructor = c, a.fn.button.noConflict = function () {
        return a.fn.button = d, this
    }, a(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function (c) {
        var d = a(c.target);
        d.hasClass("btn") || (d = d.closest(".btn")), b.call(d, "toggle"), c.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function (b) {
        a(b.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(b.type))
    })
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.carousel"), f = a.extend({}, c.DEFAULTS, d.data(), "object" == typeof b && b), g = "string" == typeof b ? b : f.slide;
            e || d.data("bs.carousel", e = new c(this, f)), "number" == typeof b ? e.to(b) : g ? e[g]() : f.interval && e.pause().cycle()
        })
    }

    var c = function (b, c) {
        this.$element = a(b), this.$indicators = this.$element.find(".carousel-indicators"), this.options = c, this.paused = this.sliding = this.interval = this.$active = this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", a.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart"in document.documentElement) && this.$element.on("mouseenter.bs.carousel", a.proxy(this.pause, this)).on("mouseleave.bs.carousel", a.proxy(this.cycle, this))
    };
    c.VERSION = "3.3.1", c.TRANSITION_DURATION = 600, c.DEFAULTS = {
        interval: 5e3,
        pause: "hover",
        wrap: !0,
        keyboard: !0
    }, c.prototype.keydown = function (a) {
        if (!/input|textarea/i.test(a.target.tagName)) {
            switch (a.which) {
                case 37:
                    this.prev();
                    break;
                case 39:
                    this.next();
                    break;
                default:
                    return
            }
            a.preventDefault()
        }
    }, c.prototype.cycle = function (b) {
        return b || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(a.proxy(this.next, this), this.options.interval)), this
    }, c.prototype.getItemIndex = function (a) {
        return this.$items = a.parent().children(".item"), this.$items.index(a || this.$active)
    }, c.prototype.getItemForDirection = function (a, b) {
        var c = "prev" == a ? -1 : 1, d = this.getItemIndex(b), e = (d + c) % this.$items.length;
        return this.$items.eq(e)
    }, c.prototype.to = function (a) {
        var b = this, c = this.getItemIndex(this.$active = this.$element.find(".item.active"));
        return a > this.$items.length - 1 || 0 > a ? void 0 : this.sliding ? this.$element.one("slid.bs.carousel", function () {
            b.to(a)
        }) : c == a ? this.pause().cycle() : this.slide(a > c ? "next" : "prev", this.$items.eq(a))
    }, c.prototype.pause = function (b) {
        return b || (this.paused = !0), this.$element.find(".next, .prev").length && a.support.transition && (this.$element.trigger(a.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
    }, c.prototype.next = function () {
        return this.sliding ? void 0 : this.slide("next")
    }, c.prototype.prev = function () {
        return this.sliding ? void 0 : this.slide("prev")
    }, c.prototype.slide = function (b, d) {
        var e = this.$element.find(".item.active"), f = d || this.getItemForDirection(b, e), g = this.interval, h = "next" == b ? "left" : "right", i = "next" == b ? "first" : "last", j = this;
        if (!f.length) {
            if (!this.options.wrap)return;
            f = this.$element.find(".item")[i]()
        }
        if (f.hasClass("active"))return this.sliding = !1;
        var k = f[0], l = a.Event("slide.bs.carousel", {relatedTarget: k, direction: h});
        if (this.$element.trigger(l), !l.isDefaultPrevented()) {
            if (this.sliding = !0, g && this.pause(), this.$indicators.length) {
                this.$indicators.find(".active").removeClass("active");
                var m = a(this.$indicators.children()[this.getItemIndex(f)]);
                m && m.addClass("active")
            }
            var n = a.Event("slid.bs.carousel", {relatedTarget: k, direction: h});
            return a.support.transition && this.$element.hasClass("slide") ? (f.addClass(b), f[0].offsetWidth, e.addClass(h), f.addClass(h), e.one("bsTransitionEnd", function () {
                f.removeClass([b, h].join(" ")).addClass("active"), e.removeClass(["active", h].join(" ")), j.sliding = !1, setTimeout(function () {
                    j.$element.trigger(n)
                }, 0)
            }).emulateTransitionEnd(c.TRANSITION_DURATION)) : (e.removeClass("active"), f.addClass("active"), this.sliding = !1, this.$element.trigger(n)), g && this.cycle(), this
        }
    };
    var d = a.fn.carousel;
    a.fn.carousel = b, a.fn.carousel.Constructor = c, a.fn.carousel.noConflict = function () {
        return a.fn.carousel = d, this
    };
    var e = function (c) {
        var d, e = a(this), f = a(e.attr("data-target") || (d = e.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""));
        if (f.hasClass("carousel")) {
            var g = a.extend({}, f.data(), e.data()), h = e.attr("data-slide-to");
            h && (g.interval = !1), b.call(f, g), h && f.data("bs.carousel").to(h), c.preventDefault()
        }
    };
    a(document).on("click.bs.carousel.data-api", "[data-slide]", e).on("click.bs.carousel.data-api", "[data-slide-to]", e), a(window).on("load", function () {
        a('[data-ride="carousel"]').each(function () {
            var c = a(this);
            b.call(c, c.data())
        })
    })
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        var c, d = b.attr("data-target") || (c = b.attr("href")) && c.replace(/.*(?=#[^\s]+$)/, "");
        return a(d)
    }

    function c(b) {
        return this.each(function () {
            var c = a(this), e = c.data("bs.collapse"), f = a.extend({}, d.DEFAULTS, c.data(), "object" == typeof b && b);
            !e && f.toggle && "show" == b && (f.toggle = !1), e || c.data("bs.collapse", e = new d(this, f)), "string" == typeof b && e[b]()
        })
    }

    var d = function (b, c) {
        this.$element = a(b), this.options = a.extend({}, d.DEFAULTS, c), this.$trigger = a(this.options.trigger).filter('[href="#' + b.id + '"], [data-target="#' + b.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
    };
    d.VERSION = "3.3.1", d.TRANSITION_DURATION = 350, d.DEFAULTS = {
        toggle: !0,
        trigger: '[data-toggle="collapse"]'
    }, d.prototype.dimension = function () {
        var a = this.$element.hasClass("width");
        return a ? "width" : "height"
    }, d.prototype.show = function () {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var b, e = this.$parent && this.$parent.find("> .panel").children(".in, .collapsing");
            if (!(e && e.length && (b = e.data("bs.collapse"), b && b.transitioning))) {
                var f = a.Event("show.bs.collapse");
                if (this.$element.trigger(f), !f.isDefaultPrevented()) {
                    e && e.length && (c.call(e, "hide"), b || e.data("bs.collapse", null));
                    var g = this.dimension();
                    this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                    var h = function () {
                        this.$element.removeClass("collapsing").addClass("collapse in")[g](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                    };
                    if (!a.support.transition)return h.call(this);
                    var i = a.camelCase(["scroll", g].join("-"));
                    this.$element.one("bsTransitionEnd", a.proxy(h, this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])
                }
            }
        }
    }, d.prototype.hide = function () {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var b = a.Event("hide.bs.collapse");
            if (this.$element.trigger(b), !b.isDefaultPrevented()) {
                var c = this.dimension();
                this.$element[c](this.$element[c]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                var e = function () {
                    this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                };
                return a.support.transition ? void this.$element[c](0).one("bsTransitionEnd", a.proxy(e, this)).emulateTransitionEnd(d.TRANSITION_DURATION) : e.call(this)
            }
        }
    }, d.prototype.toggle = function () {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    }, d.prototype.getParent = function () {
        return a(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(a.proxy(function (c, d) {
            var e = a(d);
            this.addAriaAndCollapsedClass(b(e), e)
        }, this)).end()
    }, d.prototype.addAriaAndCollapsedClass = function (a, b) {
        var c = a.hasClass("in");
        a.attr("aria-expanded", c), b.toggleClass("collapsed", !c).attr("aria-expanded", c)
    };
    var e = a.fn.collapse;
    a.fn.collapse = c, a.fn.collapse.Constructor = d, a.fn.collapse.noConflict = function () {
        return a.fn.collapse = e, this
    }, a(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (d) {
        var e = a(this);
        e.attr("data-target") || d.preventDefault();
        var f = b(e), g = f.data("bs.collapse"), h = g ? "toggle" : a.extend({}, e.data(), {trigger: this});
        c.call(f, h)
    })
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        b && 3 === b.which || (a(e).remove(), a(f).each(function () {
            var d = a(this), e = c(d), f = {relatedTarget: this};
            e.hasClass("open") && (e.trigger(b = a.Event("hide.bs.dropdown", f)), b.isDefaultPrevented() || (d.attr("aria-expanded", "false"), e.removeClass("open").trigger("hidden.bs.dropdown", f)))
        }))
    }

    function c(b) {
        var c = b.attr("data-target");
        c || (c = b.attr("href"), c = c && /#[A-Za-z]/.test(c) && c.replace(/.*(?=#[^\s]*$)/, ""));
        var d = c && a(c);
        return d && d.length ? d : b.parent()
    }

    function d(b) {
        return this.each(function () {
            var c = a(this), d = c.data("bs.dropdown");
            d || c.data("bs.dropdown", d = new g(this)), "string" == typeof b && d[b].call(c)
        })
    }

    var e = ".dropdown-backdrop", f = '[data-toggle="dropdown"]', g = function (b) {
        a(b).on("click.bs.dropdown", this.toggle)
    };
    g.VERSION = "3.3.1", g.prototype.toggle = function (d) {
        var e = a(this);
        if (!e.is(".disabled, :disabled")) {
            var f = c(e), g = f.hasClass("open");
            if (b(), !g) {
                "ontouchstart"in document.documentElement && !f.closest(".navbar-nav").length && a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click", b);
                var h = {relatedTarget: this};
                if (f.trigger(d = a.Event("show.bs.dropdown", h)), d.isDefaultPrevented())return;
                e.trigger("focus").attr("aria-expanded", "true"), f.toggleClass("open").trigger("shown.bs.dropdown", h)
            }
            return !1
        }
    }, g.prototype.keydown = function (b) {
        if (/(38|40|27|32)/.test(b.which) && !/input|textarea/i.test(b.target.tagName)) {
            var d = a(this);
            if (b.preventDefault(), b.stopPropagation(), !d.is(".disabled, :disabled")) {
                var e = c(d), g = e.hasClass("open");
                if (!g && 27 != b.which || g && 27 == b.which)return 27 == b.which && e.find(f).trigger("focus"), d.trigger("click");
                var h = " li:not(.divider):visible a", i = e.find('[role="menu"]' + h + ', [role="listbox"]' + h);
                if (i.length) {
                    var j = i.index(b.target);
                    38 == b.which && j > 0 && j--, 40 == b.which && j < i.length - 1 && j++, ~j || (j = 0), i.eq(j).trigger("focus")
                }
            }
        }
    };
    var h = a.fn.dropdown;
    a.fn.dropdown = d, a.fn.dropdown.Constructor = g, a.fn.dropdown.noConflict = function () {
        return a.fn.dropdown = h, this
    }, a(document).on("click.bs.dropdown.data-api", b).on("click.bs.dropdown.data-api", ".dropdown form", function (a) {
        a.stopPropagation()
    }).on("click.bs.dropdown.data-api", f, g.prototype.toggle).on("keydown.bs.dropdown.data-api", f, g.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="menu"]', g.prototype.keydown).on("keydown.bs.dropdown.data-api", '[role="listbox"]', g.prototype.keydown)
}(jQuery), +function (a) {
    "use strict";
    function b(b, d) {
        return this.each(function () {
            var e = a(this), f = e.data("bs.modal"), g = a.extend({}, c.DEFAULTS, e.data(), "object" == typeof b && b);
            f || e.data("bs.modal", f = new c(this, g)), "string" == typeof b ? f[b](d) : g.show && f.show(d)
        })
    }

    var c = function (b, c) {
        this.options = c, this.$body = a(document.body), this.$element = a(b), this.$backdrop = this.isShown = null, this.scrollbarWidth = 0, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, a.proxy(function () {
            this.$element.trigger("loaded.bs.modal")
        }, this))
    };
    c.VERSION = "3.3.1", c.TRANSITION_DURATION = 300, c.BACKDROP_TRANSITION_DURATION = 150, c.DEFAULTS = {
        backdrop: !0,
        keyboard: !0,
        show: !0
    }, c.prototype.toggle = function (a) {
        return this.isShown ? this.hide() : this.show(a)
    }, c.prototype.show = function (b) {
        var d = this, e = a.Event("show.bs.modal", {relatedTarget: b});
        this.$element.trigger(e), this.isShown || e.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', a.proxy(this.hide, this)), this.backdrop(function () {
            var e = a.support.transition && d.$element.hasClass("fade");
            d.$element.parent().length || d.$element.appendTo(d.$body), d.$element.show().scrollTop(0), d.options.backdrop && d.adjustBackdrop(), d.adjustDialog(), e && d.$element[0].offsetWidth, d.$element.addClass("in").attr("aria-hidden", !1), d.enforceFocus();
            var f = a.Event("shown.bs.modal", {relatedTarget: b});
            e ? d.$element.find(".modal-dialog").one("bsTransitionEnd", function () {
                d.$element.trigger("focus").trigger(f)
            }).emulateTransitionEnd(c.TRANSITION_DURATION) : d.$element.trigger("focus").trigger(f)
        }))
    }, c.prototype.hide = function (b) {
        b && b.preventDefault(), b = a.Event("hide.bs.modal"), this.$element.trigger(b), this.isShown && !b.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), a(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal"), a.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", a.proxy(this.hideModal, this)).emulateTransitionEnd(c.TRANSITION_DURATION) : this.hideModal())
    }, c.prototype.enforceFocus = function () {
        a(document).off("focusin.bs.modal").on("focusin.bs.modal", a.proxy(function (a) {
            this.$element[0] === a.target || this.$element.has(a.target).length || this.$element.trigger("focus")
        }, this))
    }, c.prototype.escape = function () {
        this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", a.proxy(function (a) {
            27 == a.which && this.hide()
        }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
    }, c.prototype.resize = function () {
        this.isShown ? a(window).on("resize.bs.modal", a.proxy(this.handleUpdate, this)) : a(window).off("resize.bs.modal")
    }, c.prototype.hideModal = function () {
        var a = this;
        this.$element.hide(), this.backdrop(function () {
            a.$body.removeClass("modal-open"), a.resetAdjustments(), a.resetScrollbar(), a.$element.trigger("hidden.bs.modal")
        })
    }, c.prototype.removeBackdrop = function () {
        this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
    }, c.prototype.backdrop = function (b) {
        var d = this, e = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
            var f = a.support.transition && e;
            if (this.$backdrop = a('<div class="modal-backdrop ' + e + '" />').prependTo(this.$element).on("click.dismiss.bs.modal", a.proxy(function (a) {
                    a.target === a.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this))
                }, this)), f && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !b)return;
            f ? this.$backdrop.one("bsTransitionEnd", b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION) : b()
        } else if (!this.isShown && this.$backdrop) {
            this.$backdrop.removeClass("in");
            var g = function () {
                d.removeBackdrop(), b && b()
            };
            a.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION) : g()
        } else b && b()
    }, c.prototype.handleUpdate = function () {
        this.options.backdrop && this.adjustBackdrop(), this.adjustDialog()
    }, c.prototype.adjustBackdrop = function () {
        this.$backdrop.css("height", 0).css("height", this.$element[0].scrollHeight)
    }, c.prototype.adjustDialog = function () {
        var a = this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
            paddingLeft: !this.bodyIsOverflowing && a ? this.scrollbarWidth : "",
            paddingRight: this.bodyIsOverflowing && !a ? this.scrollbarWidth : ""
        })
    }, c.prototype.resetAdjustments = function () {
        this.$element.css({paddingLeft: "", paddingRight: ""})
    }, c.prototype.checkScrollbar = function () {
        this.bodyIsOverflowing = document.body.scrollHeight > document.documentElement.clientHeight, this.scrollbarWidth = this.measureScrollbar()
    }, c.prototype.setScrollbar = function () {
        var a = parseInt(this.$body.css("padding-right") || 0, 10);
        this.bodyIsOverflowing && this.$body.css("padding-right", a + this.scrollbarWidth)
    }, c.prototype.resetScrollbar = function () {
        this.$body.css("padding-right", "")
    }, c.prototype.measureScrollbar = function () {
        var a = document.createElement("div");
        a.className = "modal-scrollbar-measure", this.$body.append(a);
        var b = a.offsetWidth - a.clientWidth;
        return this.$body[0].removeChild(a), b
    };
    var d = a.fn.modal;
    a.fn.modal = b, a.fn.modal.Constructor = c, a.fn.modal.noConflict = function () {
        return a.fn.modal = d, this
    }, a(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (c) {
        var d = a(this), e = d.attr("href"), f = a(d.attr("data-target") || e && e.replace(/.*(?=#[^\s]+$)/, "")), g = f.data("bs.modal") ? "toggle" : a.extend({remote: !/#/.test(e) && e}, f.data(), d.data());
        d.is("a") && c.preventDefault(), f.one("show.bs.modal", function (a) {
            a.isDefaultPrevented() || f.one("hidden.bs.modal", function () {
                d.is(":visible") && d.trigger("focus")
            })
        }), b.call(f, g, this)
    })
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.tooltip"), f = "object" == typeof b && b, g = f && f.selector;
            (e || "destroy" != b) && (g ? (e || d.data("bs.tooltip", e = {}), e[g] || (e[g] = new c(this, f))) : e || d.data("bs.tooltip", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }

    var c = function (a, b) {
        this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null, this.init("tooltip", a, b)
    };
    c.VERSION = "3.3.1", c.TRANSITION_DURATION = 150, c.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {selector: "body", padding: 0}
    }, c.prototype.init = function (b, c, d) {
        this.enabled = !0, this.type = b, this.$element = a(c), this.options = this.getOptions(d), this.$viewport = this.options.viewport && a(this.options.viewport.selector || this.options.viewport);
        for (var e = this.options.trigger.split(" "), f = e.length; f--;) {
            var g = e[f];
            if ("click" == g)this.$element.on("click." + this.type, this.options.selector, a.proxy(this.toggle, this)); else if ("manual" != g) {
                var h = "hover" == g ? "mouseenter" : "focusin", i = "hover" == g ? "mouseleave" : "focusout";
                this.$element.on(h + "." + this.type, this.options.selector, a.proxy(this.enter, this)), this.$element.on(i + "." + this.type, this.options.selector, a.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = a.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }, c.prototype.getDefaults = function () {
        return c.DEFAULTS
    }, c.prototype.getOptions = function (b) {
        return b = a.extend({}, this.getDefaults(), this.$element.data(), b), b.delay && "number" == typeof b.delay && (b.delay = {
            show: b.delay,
            hide: b.delay
        }), b
    }, c.prototype.getDelegateOptions = function () {
        var b = {}, c = this.getDefaults();
        return this._options && a.each(this._options, function (a, d) {
            c[a] != d && (b[a] = d)
        }), b
    }, c.prototype.enter = function (b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c && c.$tip && c.$tip.is(":visible") ? void(c.hoverState = "in") : (c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), clearTimeout(c.timeout), c.hoverState = "in", c.options.delay && c.options.delay.show ? void(c.timeout = setTimeout(function () {
            "in" == c.hoverState && c.show()
        }, c.options.delay.show)) : c.show())
    }, c.prototype.leave = function (b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), clearTimeout(c.timeout), c.hoverState = "out", c.options.delay && c.options.delay.hide ? void(c.timeout = setTimeout(function () {
            "out" == c.hoverState && c.hide()
        }, c.options.delay.hide)) : c.hide()
    }, c.prototype.show = function () {
        var b = a.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(b);
            var d = a.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
            if (b.isDefaultPrevented() || !d)return;
            var e = this, f = this.tip(), g = this.getUID(this.type);
            this.setContent(), f.attr("id", g), this.$element.attr("aria-describedby", g), this.options.animation && f.addClass("fade");
            var h = "function" == typeof this.options.placement ? this.options.placement.call(this, f[0], this.$element[0]) : this.options.placement, i = /\s?auto?\s?/i, j = i.test(h);
            j && (h = h.replace(i, "") || "top"), f.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(h).data("bs." + this.type, this), this.options.container ? f.appendTo(this.options.container) : f.insertAfter(this.$element);
            var k = this.getPosition(), l = f[0].offsetWidth, m = f[0].offsetHeight;
            if (j) {
                var n = h, o = this.options.container ? a(this.options.container) : this.$element.parent(), p = this.getPosition(o);
                h = "bottom" == h && k.bottom + m > p.bottom ? "top" : "top" == h && k.top - m < p.top ? "bottom" : "right" == h && k.right + l > p.width ? "left" : "left" == h && k.left - l < p.left ? "right" : h, f.removeClass(n).addClass(h)
            }
            var q = this.getCalculatedOffset(h, k, l, m);
            this.applyPlacement(q, h);
            var r = function () {
                var a = e.hoverState;
                e.$element.trigger("shown.bs." + e.type), e.hoverState = null, "out" == a && e.leave(e)
            };
            a.support.transition && this.$tip.hasClass("fade") ? f.one("bsTransitionEnd", r).emulateTransitionEnd(c.TRANSITION_DURATION) : r()
        }
    }, c.prototype.applyPlacement = function (b, c) {
        var d = this.tip(), e = d[0].offsetWidth, f = d[0].offsetHeight, g = parseInt(d.css("margin-top"), 10), h = parseInt(d.css("margin-left"), 10);
        isNaN(g) && (g = 0), isNaN(h) && (h = 0), b.top = b.top + g, b.left = b.left + h, a.offset.setOffset(d[0], a.extend({
            using: function (a) {
                d.css({top: Math.round(a.top), left: Math.round(a.left)})
            }
        }, b), 0), d.addClass("in");
        var i = d[0].offsetWidth, j = d[0].offsetHeight;
        "top" == c && j != f && (b.top = b.top + f - j);
        var k = this.getViewportAdjustedDelta(c, b, i, j);
        k.left ? b.left += k.left : b.top += k.top;
        var l = /top|bottom/.test(c), m = l ? 2 * k.left - e + i : 2 * k.top - f + j, n = l ? "offsetWidth" : "offsetHeight";
        d.offset(b), this.replaceArrow(m, d[0][n], l)
    }, c.prototype.replaceArrow = function (a, b, c) {
        this.arrow().css(c ? "left" : "top", 50 * (1 - a / b) + "%").css(c ? "top" : "left", "")
    }, c.prototype.setContent = function () {
        var a = this.tip(), b = this.getTitle();
        a.find(".tooltip-inner")[this.options.html ? "html" : "text"](b), a.removeClass("fade in top bottom left right")
    }, c.prototype.hide = function (b) {
        function d() {
            "in" != e.hoverState && f.detach(), e.$element.removeAttr("aria-describedby").trigger("hidden.bs." + e.type), b && b()
        }

        var e = this, f = this.tip(), g = a.Event("hide.bs." + this.type);
        return this.$element.trigger(g), g.isDefaultPrevented() ? void 0 : (f.removeClass("in"), a.support.transition && this.$tip.hasClass("fade") ? f.one("bsTransitionEnd", d).emulateTransitionEnd(c.TRANSITION_DURATION) : d(), this.hoverState = null, this)
    }, c.prototype.fixTitle = function () {
        var a = this.$element;
        (a.attr("title") || "string" != typeof a.attr("data-original-title")) && a.attr("data-original-title", a.attr("title") || "").attr("title", "")
    }, c.prototype.hasContent = function () {
        return this.getTitle()
    }, c.prototype.getPosition = function (b) {
        b = b || this.$element;
        var c = b[0], d = "BODY" == c.tagName, e = c.getBoundingClientRect();
        null == e.width && (e = a.extend({}, e, {width: e.right - e.left, height: e.bottom - e.top}));
        var f = d ? {
            top: 0,
            left: 0
        } : b.offset(), g = {scroll: d ? document.documentElement.scrollTop || document.body.scrollTop : b.scrollTop()}, h = d ? {
            width: a(window).width(),
            height: a(window).height()
        } : null;
        return a.extend({}, e, g, h, f)
    }, c.prototype.getCalculatedOffset = function (a, b, c, d) {
        return "bottom" == a ? {
            top: b.top + b.height,
            left: b.left + b.width / 2 - c / 2
        } : "top" == a ? {
            top: b.top - d,
            left: b.left + b.width / 2 - c / 2
        } : "left" == a ? {top: b.top + b.height / 2 - d / 2, left: b.left - c} : {
            top: b.top + b.height / 2 - d / 2,
            left: b.left + b.width
        }
    }, c.prototype.getViewportAdjustedDelta = function (a, b, c, d) {
        var e = {top: 0, left: 0};
        if (!this.$viewport)return e;
        var f = this.options.viewport && this.options.viewport.padding || 0, g = this.getPosition(this.$viewport);
        if (/right|left/.test(a)) {
            var h = b.top - f - g.scroll, i = b.top + f - g.scroll + d;
            h < g.top ? e.top = g.top - h : i > g.top + g.height && (e.top = g.top + g.height - i)
        } else {
            var j = b.left - f, k = b.left + f + c;
            j < g.left ? e.left = g.left - j : k > g.width && (e.left = g.left + g.width - k)
        }
        return e
    }, c.prototype.getTitle = function () {
        var a, b = this.$element, c = this.options;
        return a = b.attr("data-original-title") || ("function" == typeof c.title ? c.title.call(b[0]) : c.title)
    }, c.prototype.getUID = function (a) {
        do a += ~~(1e6 * Math.random()); while (document.getElementById(a));
        return a
    }, c.prototype.tip = function () {
        return this.$tip = this.$tip || a(this.options.template)
    }, c.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }, c.prototype.enable = function () {
        this.enabled = !0
    }, c.prototype.disable = function () {
        this.enabled = !1
    }, c.prototype.toggleEnabled = function () {
        this.enabled = !this.enabled
    }, c.prototype.toggle = function (b) {
        var c = this;
        b && (c = a(b.currentTarget).data("bs." + this.type), c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c))), c.tip().hasClass("in") ? c.leave(c) : c.enter(c)
    }, c.prototype.destroy = function () {
        var a = this;
        clearTimeout(this.timeout), this.hide(function () {
            a.$element.off("." + a.type).removeData("bs." + a.type)
        })
    };
    var d = a.fn.tooltip;
    a.fn.tooltip = b, a.fn.tooltip.Constructor = c, a.fn.tooltip.noConflict = function () {
        return a.fn.tooltip = d, this
    }
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.popover"), f = "object" == typeof b && b, g = f && f.selector;
            (e || "destroy" != b) && (g ? (e || d.data("bs.popover", e = {}), e[g] || (e[g] = new c(this, f))) : e || d.data("bs.popover", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }

    var c = function (a, b) {
        this.init("popover", a, b)
    };
    if (!a.fn.tooltip)throw new Error("Popover requires tooltip.js");
    c.VERSION = "3.3.1", c.DEFAULTS = a.extend({}, a.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }), c.prototype = a.extend({}, a.fn.tooltip.Constructor.prototype), c.prototype.constructor = c, c.prototype.getDefaults = function () {
        return c.DEFAULTS
    }, c.prototype.setContent = function () {
        var a = this.tip(), b = this.getTitle(), c = this.getContent();
        a.find(".popover-title")[this.options.html ? "html" : "text"](b), a.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof c ? "html" : "append" : "text"](c), a.removeClass("fade top bottom left right in"), a.find(".popover-title").html() || a.find(".popover-title").hide()
    }, c.prototype.hasContent = function () {
        return this.getTitle() || this.getContent()
    }, c.prototype.getContent = function () {
        var a = this.$element, b = this.options;
        return a.attr("data-content") || ("function" == typeof b.content ? b.content.call(a[0]) : b.content)
    }, c.prototype.arrow = function () {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    }, c.prototype.tip = function () {
        return this.$tip || (this.$tip = a(this.options.template)), this.$tip
    };
    var d = a.fn.popover;
    a.fn.popover = b, a.fn.popover.Constructor = c, a.fn.popover.noConflict = function () {
        return a.fn.popover = d, this
    }
}(jQuery), +function (a) {
    "use strict";
    function b(c, d) {
        var e = a.proxy(this.process, this);
        this.$body = a("body"), this.$scrollElement = a(a(c).is("body") ? window : c), this.options = a.extend({}, b.DEFAULTS, d), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", e), this.refresh(), this.process()
    }

    function c(c) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.scrollspy"), f = "object" == typeof c && c;
            e || d.data("bs.scrollspy", e = new b(this, f)), "string" == typeof c && e[c]()
        })
    }

    b.VERSION = "3.3.1", b.DEFAULTS = {offset: 10}, b.prototype.getScrollHeight = function () {
        return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
    }, b.prototype.refresh = function () {
        var b = "offset", c = 0;
        a.isWindow(this.$scrollElement[0]) || (b = "position", c = this.$scrollElement.scrollTop()), this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight();
        var d = this;
        this.$body.find(this.selector).map(function () {
            var d = a(this), e = d.data("target") || d.attr("href"), f = /^#./.test(e) && a(e);
            return f && f.length && f.is(":visible") && [[f[b]().top + c, e]] || null
        }).sort(function (a, b) {
            return a[0] - b[0]
        }).each(function () {
            d.offsets.push(this[0]), d.targets.push(this[1])
        })
    }, b.prototype.process = function () {
        var a, b = this.$scrollElement.scrollTop() + this.options.offset, c = this.getScrollHeight(), d = this.options.offset + c - this.$scrollElement.height(), e = this.offsets, f = this.targets, g = this.activeTarget;
        if (this.scrollHeight != c && this.refresh(), b >= d)return g != (a = f[f.length - 1]) && this.activate(a);
        if (g && b < e[0])return this.activeTarget = null, this.clear();
        for (a = e.length; a--;)g != f[a] && b >= e[a] && (!e[a + 1] || b <= e[a + 1]) && this.activate(f[a])
    }, b.prototype.activate = function (b) {
        this.activeTarget = b, this.clear();
        var c = this.selector + '[data-target="' + b + '"],' + this.selector + '[href="' + b + '"]', d = a(c).parents("li").addClass("active");
        d.parent(".dropdown-menu").length && (d = d.closest("li.dropdown").addClass("active")), d.trigger("activate.bs.scrollspy")
    }, b.prototype.clear = function () {
        a(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
    };
    var d = a.fn.scrollspy;
    a.fn.scrollspy = c, a.fn.scrollspy.Constructor = b, a.fn.scrollspy.noConflict = function () {
        return a.fn.scrollspy = d, this
    }, a(window).on("load.bs.scrollspy.data-api", function () {
        a('[data-spy="scroll"]').each(function () {
            var b = a(this);
            c.call(b, b.data())
        })
    })
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.tab");
            e || d.data("bs.tab", e = new c(this)), "string" == typeof b && e[b]()
        })
    }

    var c = function (b) {
        this.element = a(b)
    };
    c.VERSION = "3.3.1", c.TRANSITION_DURATION = 150, c.prototype.show = function () {
        var b = this.element, c = b.closest("ul:not(.dropdown-menu)"), d = b.data("target");
        if (d || (d = b.attr("href"), d = d && d.replace(/.*(?=#[^\s]*$)/, "")), !b.parent("li").hasClass("active")) {
            var e = c.find(".active:last a"), f = a.Event("hide.bs.tab", {relatedTarget: b[0]}), g = a.Event("show.bs.tab", {relatedTarget: e[0]});
            if (e.trigger(f), b.trigger(g), !g.isDefaultPrevented() && !f.isDefaultPrevented()) {
                var h = a(d);
                this.activate(b.closest("li"), c), this.activate(h, h.parent(), function () {
                    e.trigger({type: "hidden.bs.tab", relatedTarget: b[0]}), b.trigger({
                        type: "shown.bs.tab",
                        relatedTarget: e[0]
                    })
                })
            }
        }
    }, c.prototype.activate = function (b, d, e) {
        function f() {
            g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), h ? (b[0].offsetWidth, b.addClass("in")) : b.removeClass("fade"), b.parent(".dropdown-menu") && b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), e && e()
        }

        var g = d.find("> .active"), h = e && a.support.transition && (g.length && g.hasClass("fade") || !!d.find("> .fade").length);
        g.length && h ? g.one("bsTransitionEnd", f).emulateTransitionEnd(c.TRANSITION_DURATION) : f(), g.removeClass("in")
    };
    var d = a.fn.tab;
    a.fn.tab = b, a.fn.tab.Constructor = c, a.fn.tab.noConflict = function () {
        return a.fn.tab = d, this
    };
    var e = function (c) {
        c.preventDefault(), b.call(a(this), "show")
    };
    a(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', e).on("click.bs.tab.data-api", '[data-toggle="pill"]', e)
}(jQuery), +function (a) {
    "use strict";
    function b(b) {
        return this.each(function () {
            var d = a(this), e = d.data("bs.affix"), f = "object" == typeof b && b;
            e || d.data("bs.affix", e = new c(this, f)), "string" == typeof b && e[b]()
        })
    }

    var c = function (b, d) {
        this.options = a.extend({}, c.DEFAULTS, d), this.$target = a(this.options.target).on("scroll.bs.affix.data-api", a.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", a.proxy(this.checkPositionWithEventLoop, this)), this.$element = a(b), this.affixed = this.unpin = this.pinnedOffset = null, this.checkPosition()
    };
    c.VERSION = "3.3.1", c.RESET = "affix affix-top affix-bottom", c.DEFAULTS = {
        offset: 0,
        target: window
    }, c.prototype.getState = function (a, b, c, d) {
        var e = this.$target.scrollTop(), f = this.$element.offset(), g = this.$target.height();
        if (null != c && "top" == this.affixed)return c > e ? "top" : !1;
        if ("bottom" == this.affixed)return null != c ? e + this.unpin <= f.top ? !1 : "bottom" : a - d >= e + g ? !1 : "bottom";
        var h = null == this.affixed, i = h ? e : f.top, j = h ? g : b;
        return null != c && c >= i ? "top" : null != d && i + j >= a - d ? "bottom" : !1
    }, c.prototype.getPinnedOffset = function () {
        if (this.pinnedOffset)return this.pinnedOffset;
        this.$element.removeClass(c.RESET).addClass("affix");
        var a = this.$target.scrollTop(), b = this.$element.offset();
        return this.pinnedOffset = b.top - a
    }, c.prototype.checkPositionWithEventLoop = function () {
        setTimeout(a.proxy(this.checkPosition, this), 1)
    }, c.prototype.checkPosition = function () {
        if (this.$element.is(":visible")) {
            var b = this.$element.height(), d = this.options.offset, e = d.top, f = d.bottom, g = a("body").height();
            "object" != typeof d && (f = e = d), "function" == typeof e && (e = d.top(this.$element)), "function" == typeof f && (f = d.bottom(this.$element));
            var h = this.getState(g, b, e, f);
            if (this.affixed != h) {
                null != this.unpin && this.$element.css("top", "");
                var i = "affix" + (h ? "-" + h : ""), j = a.Event(i + ".bs.affix");
                if (this.$element.trigger(j), j.isDefaultPrevented())return;
                this.affixed = h, this.unpin = "bottom" == h ? this.getPinnedOffset() : null, this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix", "affixed") + ".bs.affix")
            }
            "bottom" == h && this.$element.offset({top: g - b - f})
        }
    };
    var d = a.fn.affix;
    a.fn.affix = b, a.fn.affix.Constructor = c, a.fn.affix.noConflict = function () {
        return a.fn.affix = d, this
    }, a(window).on("load", function () {
        a('[data-spy="affix"]').each(function () {
            var c = a(this), d = c.data();
            d.offset = d.offset || {}, null != d.offsetBottom && (d.offset.bottom = d.offsetBottom), null != d.offsetTop && (d.offset.top = d.offsetTop), b.call(c, d)
        })
    })
}(jQuery);


