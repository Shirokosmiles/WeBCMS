"use strict";
!function(r, u) {
    r.Package.name = "DashLite",
    r.Package.version = "1.4.0";
    var c = u(window)
      , l = u("body")
      , d = u(document)
      , t = "nk-menu"
      , f = "nk-header-menu"
      , o = "nk-aside"
      , g = "nk-sidebar"
      , e = "nk-sidebar-mobile"
      , n = "nk-sidebar-fat"
      , i = "nk-sidebar-short"
      , a = "nk-content-sidebar"
      , p = r.Break;
    function h(e, n) {
        return Object.keys(n).forEach(function(t) {
            e[t] = n[t]
        }),
        e
    }
    r.ClassBody = function() {
        r.AddInBody(o),
        r.AddInBody("nk-apps-sidebar"),
        r.AddInBody(g),
        r.AddInBody(n)
    }
    ,
    r.ClassNavMenu = function() {
        r.BreakClass("." + f, p.lg, {
            timeOut: 0
        }),
        r.BreakClass("." + o, p.lg, {
            timeOut: 0
        }),
        r.BreakClass("." + a, p.lg, {
            timeOut: 0
        }),
        r.BreakClass("." + g, p.lg, {
            timeOut: 0,
            classAdd: e,
            ignore: i
        }),
        r.BreakClass("." + n, p.xl, {
            timeOut: 0,
            classAdd: e
        }),
        r.BreakClass("." + i, p.md, {
            timeOut: 0,
            classAdd: e
        }),
        c.on("resize", function() {
            r.BreakClass("." + f, p.lg),
            r.BreakClass("." + o, p.lg),
            r.BreakClass("." + a, p.lg),
            r.BreakClass("." + g, p.lg, {
                classAdd: e,
                ignore: i
            }),
            r.BreakClass("." + n, p.xl, {
                classAdd: e
            }),
            r.BreakClass("." + i, p.md, {
                classAdd: e
            })
        })
    }
    ,
    r.Prettify = function() {
        window.prettyPrint && prettyPrint()
    }
    ,
    r.Copied = function() {
        var t = ".clipboard-init"
          , c = ".clipboard-text"
          , l = "clipboard-success"
          , d = "clipboard-error";
        function e(t, e) {
            var n = u(t)
              , i = n.parent()
              , a = {
                text: "Copy",
                done: "Copied",
                fail: "Failed"
            }
              , o = {
                text: n.data("clip-text"),
                done: n.data("clip-success"),
                fail: n.data("clip-error")
            };
            a.text = o.text ? o.text : a.text,
            a.done = o.done ? o.done : a.done,
            a.fail = o.fail ? o.fail : a.fail;
            var s = "success" === e ? a.done : a.fail
              , r = "success" === e ? l : d;
            i.addClass(r).find(c).html(s),
            setTimeout(function() {
                i.removeClass(l + " " + d).find(c).html(a.text).blur(),
                i.find("input").blur()
            }, 2e3)
        }
        ClipboardJS.isSupported() ? new ClipboardJS(t).on("success", function(t) {
            e(t.trigger, "success"),
            t.clearSelection()
        }).on("error", function(t) {
            e(t.trigger, "error")
        }) : u(t).css("display", "none")
    }
    ,
    r.CurrentLink = function() {
        var t = window.location.href
          , n = (n = t.substring(0, -1 == t.indexOf("#") ? t.length : t.indexOf("#"))).substring(0, -1 == n.indexOf("?") ? n.length : n.indexOf("?"));
        u(".nk-menu-link, .menu-link, .nav-link").each(function() {
            var t = u(this)
              , e = t.attr("href");
            n.match(e) ? (t.closest("li").addClass("active_ current-page_").parents().closest("li").addClass("active current-page"),
            t.closest("li").children(".nk-menu-sub").css("display", "block"),
            t.parents().closest("li").children(".nk-menu-sub").css("display", "block")) : t.closest("li").removeClass("active current-page").parents().closest("li:not(.current-page)").removeClass("active")
        })
    }
    ,
    r.PassSwitch = function() {
        r.Passcode(".passcode-switch")
    }
    ,
    r.Toast = function(t, e, n) {
        var i, a = "info" === (e = e || "info") ? "ni ni-info-fill" : "success" === e ? "ni ni-check-circle-fill" : "error" === e ? "ni ni-cross-circle-fill" : "warning" === e ? "ni ni-alert-fill" : "", o = {
            position: "bottom-right",
            ui: "",
            icon: "auto",
            clear: !1
        }, s = n ? h(o, n) : o;
        if (s.position = s.position ? "toast-" + s.position : "toast-bottom-right",
        s.icon = "auto" === s.icon ? a : s.icon ? s.icon : "",
        s.ui = s.ui ? " " + s.ui : "",
        i = "" !== s.icon ? '<span class="toastr-icon"><em class="icon ' + s.icon + '"></em></span>' : "",
        "" !== (t = "" !== t ? i + '<div class="toastr-text">' + t + "</div>" : "")) {
            !0 === s.clear && toastr.clear();
            var r = {
                closeButton: !0,
                debug: !1,
                newestOnTop: !1,
                progressBar: !1,
                positionClass: s.position + s.ui,
                closeHtml: '<span class="btn-trigger">Close</span>',
                preventDuplicates: !0,
                showDuration: "1500",
                hideDuration: "1500",
                timeOut: "2000",
                toastClass: "toastr",
                extendedTimeOut: "3000"
            };
            toastr.options = h(r, s),
            toastr[e](t)
        }
    }
    ,
    r.TGL.screen = function(t) {
        u(t).exists() && u(t).each(function() {
            var t = u(this).data("toggle-screen");
            t && u(this).addClass("toggle-screen-" + t)
        })
    }
    ,
    r.TGL.content = function(t, e) {
        var n = u(t || ".toggle")
          , i = u("[data-content]")
          , a = !1
          , o = {
            active: "active",
            content: "content-active",
            break: !0
        }
          , s = e ? h(o, e) : o;
        r.TGL.screen(i),
        n.on("click", function(t) {
            a = this,
            r.Toggle.trigger(u(this).data("target"), s),
            t.preventDefault()
        }),
        d.on("mouseup", function(t) {
            if (a) {
                var e = u(a);
                e.is(t.target) || 0 !== e.has(t.target).length || i.is(t.target) || 0 !== i.has(t.target).length || (r.Toggle.removed(e.data("target"), s),
                a = !1)
            }
        }),
        c.on("resize", function() {
            i.each(function() {
                var t = u(this).data("content")
                  , e = u(this).data("toggle-screen")
                  , n = p[e];
                r.Win.width > n && r.Toggle.removed(t, s)
            })
        })
    }
    ,
    r.TGL.expand = function(t, e) {
        var n = t || ".expand"
          , i = {
            toggle: !0
        }
          , a = e ? h(i, e) : i;
        u(n).on("click", function(t) {
            r.Toggle.trigger(u(this).data("target"), a),
            t.preventDefault()
        })
    }
    ,
    r.TGL.ddmenu = function(t, e) {
        var n = t || ".nk-menu-toggle"
          , i = {
            active: "active",
            self: "nk-menu-toggle",
            child: "nk-menu-sub"
        }
          , a = e ? h(i, e) : i;
        u(n).on("click", function(t) {
            (r.Win.width < p.lg || u(this).parents().hasClass(g) || u(this).parents().hasClass(o)) && r.Toggle.dropMenu(u(this), a),
            t.preventDefault()
        })
    }
    ,
    r.TGL.showmenu = function(t, e) {
        var n = u(t || ".nk-nav-toggle")
          , i = u("[data-content]")
          , a = l.hasClass("short-nav") || i.hasClass(f) ? p.lg : p.xl
          , o = {
            active: "toggle-active",
            content: g + "-active",
            body: "nav-shown",
            overlay: "nk-sidebar-overlay",
            break: a,
            close: {
                profile: !0,
                menu: !1
            }
        }
          , s = e ? h(o, e) : o;
        n.on("click", function(t) {
            r.Toggle.trigger(u(this).data("target"), s),
            t.preventDefault()
        }),
        d.on("mouseup", function(t) {
            !n.is(t.target) && 0 === n.has(t.target).length && !i.is(t.target) && 0 === i.has(t.target).length && r.Win.width < a && r.Toggle.removed(n.data("target"), s)
        }),
        c.on("resize", function() {
            (r.Win.width < p.xl || r.Win.width < a) && r.Toggle.removed(n.data("target"), s)
        })
    }
    ,
    r.Ani.formSearch = function(t, e) {
        var n = {
            active: "active",
            timeout: 400,
            target: "[data-search]"
        }
          , a = e ? h(n, e) : n
          , i = u(t)
          , o = u(a.target);
        i.exists() && (i.on("click", function(t) {
            t.preventDefault();
            var e = u(this).data("target")
              , n = u("[data-search=" + e + "]")
              , i = u("[data-target=" + e + "]");
            n.hasClass(a.active) ? (i.add(n).removeClass(a.active),
            setTimeout(function() {
                n.find("input").val("")
            }, a.timeout)) : (i.add(n).addClass(a.active),
            n.find("input").focus())
        }),
        d.on({
            keyup: function(t) {
                "Escape" === t.key && i.add(o).removeClass(a.active)
            },
            mouseup: function(t) {
                o.find("input").val() || o.is(t.target) || 0 !== o.has(t.target).length || i.is(t.target) || 0 !== i.has(t.target).length || i.add(o).removeClass(a.active)
            }
        }))
    }
    ,
    r.Ani.formElm = function(t, e) {
        var n = {
            focus: "focused"
        }
          , i = e ? h(n, e) : n;
        u(t).exists() && u(t).each(function() {
            var t = u(this);
            t.val() && t.parent().addClass(i.focus),
            t.on({
                focus: function() {
                    t.parent().addClass(i.focus)
                },
                blur: function() {
                    t.val() || t.parent().removeClass(i.focus)
                }
            })
        })
    }
    ,
    r.Validate = function(t, n) {
        u(t).exists() && u(t).each(function() {
            var t = {
                errorElement: "span"
            }
              , e = n ? h(t, n) : t;
            u(this).validate(e)
        })
    }
    ,
    r.Validate.init = function() {
        r.Validate(".form-validate", {
            errorElement: "span",
            errorClass: "invalid",
            errorPlacement: function(t, e) {
                t.appendTo(e.parent())
            }
        })
    }
    ,
    r.Dropzone = function(t, n) {
        u(t).exists() && u(t).each(function() {
            var t = {
                autoDiscover: !1
            }
              , e = n ? h(t, n) : t;
            u(this).addClass("dropzone").dropzone(e)
        })
    }
    ,
    r.DataTable = function(t, i) {
        u(t).exists() && u(t).each(function() {
            var t = u(this).data("auto-responsive")
              , e = {
                responsive: !0,
                autoWidth: !1,
                dom: '<"row justify-between g-2"<"col-7 col-sm-6 text-left"f><"col-5 col-sm-6 text-right"<"datatable-filter"l>>><"datatable-wrap my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-left text-md-right"i>>',
                language: {
                    search: "",
                    searchPlaceholder: "Type in to Search",
                    lengthMenu: "<span class='d-none d-sm-inline-block'>Show</span><div class='form-control-select'> _MENU_ </div>",
                    info: "_START_ -_END_ of _TOTAL_",
                    infoEmpty: "No records found",
                    infoFiltered: "( Total _MAX_  )",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Prev"
                    }
                }
            }
              , n = i ? h(e, i) : e;
            n = !1 === t ? h(n, {
                responsive: !1
            }) : n,
            u(this).DataTable(n)
        })
    }
    ,
    r.BS.ddfix = function(t, e) {
        var n = e || "a:not(.clickable), button:not(.clickable), a:not(.clickable) *, button:not(.clickable) *";
        u(t || ".dropdown-menu").on("click", function(t) {
            u(t.target).is(n) || t.stopPropagation()
        })
    }
    ,
    r.BS.tabfix = function(t) {
        u(t || '[data-toggle="modal"]').on("click", function() {
            var t = u(this)
              , e = t.data("target")
              , n = t.attr("href")
              , i = t.data("tab-target")
              , a = e ? l.find(e) : l.find(n);
            if (i && "#" !== i && a)
                a.find('[href="' + i + '"]').tab("show");
            else if (a) {
                var o = a.find(".nk-nav.nav-tabs")
                  , s = u(o[0]).find('[data-toggle="tab"]');
                u(s[0]).tab("show")
            }
        })
    }
    ,
    r.Knob.init = function() {
        var t = {
            readOnly: !0,
            lineCap: "round"
        }
          , e = {
            angleOffset: -90,
            angleArc: 180,
            readOnly: !0,
            lineCap: "round"
        };
        r.Knob(".knob", t),
        r.Knob(".knob-half", e)
    }
    ,
    r.Range.init = function() {
        r.Range(".form-range-slider")
    }
    ,
    r.Select2.init = function() {
        r.Select2(".form-select")
    }
    ,
    r.Slider.init = function() {
        r.Slick(".slider-init")
    }
    ,
    r.Dropzone.init = function() {
        r.Dropzone(".upload-zone", {
            url: "/images"
        })
    }
    ,
    r.DataTable.init = function() {
        r.DataTable(".datatable-init", {
            responsive: {
                details: !0
            }
        }),
        u.fn.DataTable.ext.pager.numbers_length = 7
    }
    ,
    r.OtherInit = function() {
        r.ClassBody(),
        r.PassSwitch(),
        r.CurrentLink(),
        r.LinkOff(".is-disable"),
        r.ClassNavMenu()
    }
    ,
    r.Ani.init = function() {
        r.Ani.formElm(".form-control-animate"),
        r.Ani.formSearch(".toggle-search")
    }
    ,
    r.BS.init = function() {
        r.BS.menutip("a.nk-menu-link"),
        r.BS.tooltip(".nk-tooltip"),
        r.BS.tooltip(".btn-tooltip", {
            placement: "top"
        }),
        r.BS.tooltip('[data-toggle="tooltip"]'),
        r.BS.tooltip(".tipinfo,.nk-menu-tooltip", {
            placement: "right"
        }),
        r.BS.popover('[data-toggle="popover"]'),
        r.BS.progress("[data-progress]"),
        r.BS.fileinput(".custom-file-input"),
        r.BS.modalfix(),
        r.BS.ddfix(),
        r.BS.tabfix()
    }
    ,
    r.Picker.init = function() {
        r.Picker.date(".date-picker"),
        r.Picker.dob(".date-picker-alt"),
        r.Picker.time(".time-picker")
    }
    ,
    r.Addons.Init = function() {
        r.Knob.init(),
        r.Range.init(),
        r.Select2.init(),
        r.Dropzone.init(),
        r.Slider.init(),
        r.DataTable.init()
    }
    ,
    r.TGL.init = function() {
        r.TGL.content(".toggle"),
        r.TGL.expand(".toggle-expand"),
        r.TGL.expand(".toggle-opt", {
            toggle: !1
        }),
        r.TGL.showmenu(".nk-nav-toggle"),
        r.TGL.ddmenu("." + t + "-toggle", {
            self: t + "-toggle",
            child: t + "-sub"
        })
    }
    ,
    r.BS.modalOnInit = function() {
        u(".modal").on("shown.bs.modal", function() {
            r.Select2.init(),
            r.Validate.init()
        })
    }
    ,
    r.init = function() {
        r.coms.docReady.push(r.OtherInit),
        r.coms.docReady.push(r.Prettify),
        r.coms.docReady.push(r.ColorBG),
        r.coms.docReady.push(r.ColorTXT),
        r.coms.docReady.push(r.Copied),
        r.coms.docReady.push(r.Ani.init),
        r.coms.docReady.push(r.TGL.init),
        r.coms.docReady.push(r.BS.init),
        r.coms.docReady.push(r.Validate.init),
        r.coms.docReady.push(r.Picker.init),
        r.coms.docReady.push(r.Addons.Init)
    }
    ,
    r.init()
}(NioApp, jQuery);
