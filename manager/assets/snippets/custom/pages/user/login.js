var SnippetLogin = function() {
    var s = $("#m_login"),
        n = function(e, i, a) {
            var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
            e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
        },
        o = function() {
            s.removeClass("m-login--forget-password"), s.removeClass("m-login--signup"), s.addClass("m-login--signin"), mUtil.animateClass(s.find(".m-login__signin")[0], "flipInX animated")
        },
        e = function() {
            $("#m_login_forget_password").click(function(e) {
                e.preventDefault(), s.removeClass("m-login--signin"), s.removeClass("m-login--signup"), s.addClass("m-login--forget-password"), mUtil.animateClass(s.find(".m-login__forget-password")[0], "flipInX animated")
            }), $("#m_login_forget_password_cancel").click(function(e) {
                e.preventDefault(), o()
            }), $("#m_login_signup").click(function(e) {
                e.preventDefault(), s.removeClass("m-login--forget-password"), s.removeClass("m-login--signin"), s.addClass("m-login--signup"), mUtil.animateClass(s.find(".m-login__signup")[0], "flipInX animated")
            }), $("#m_login_signup_cancel").click(function(e) {
                e.preventDefault(), o()
            })
        };
    return {
        init: function() {
            e(), $("#m_login_signin_submit").click(function(e) {
                e.preventDefault();
                var t = $(this),
                    r = $(this).closest("form");
                r.validate(), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0))
            }), $("#m_login_signup_submit").click(function(e) {
                e.preventDefault();
                var t = $(this),
                    r = $(this).closest("form");
                r.validate(), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0))
            }), $("#m_login_forget_password_submit").click(function(e) {
                e.preventDefault();
                var t = $(this),
                    r = $(this).closest("form");
                r.validate(), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0))
            })
        }
    }
}();
jQuery(document).ready(function() {
    SnippetLogin.init()
});
