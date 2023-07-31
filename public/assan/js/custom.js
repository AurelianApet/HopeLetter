$(document).ready(function () {
    $(window).scroll(function () {
        $(".banner-inner, .newsletter-home-text").css("opacity", 1 - $(window).scrollTop() / 350);
    });
//parallax
    if (!Modernizr.touch) {
        $('.home-newsletter').parallax("50%", 0.5);
        $('.home-contact').parallax("50%", 0.5);
    }
    //backstretch background slideshow using for banner intro
    $('.banner-slider').backstretch([
        "assan/images/top_bg.jpg",
    ], {
        fade: 750,
        duration: 3000
    });

    //animated fixed header   
    $(window).scroll(function () {
        "use strict";
        var scroll = $(window).scrollTop();
        if (scroll > 60) {
            $(".header-transparent").addClass("sticky");
        } else {
            $(".header-transparent").removeClass("sticky");
        }
    });

//Auto Close Responsive Navbar on Click
    function close_toggle() {
        if ($(window).width() <= 768) {
            $('.navbar-collapse a').on('click', function () {
                $('.navbar-collapse').collapse('hide');
            });
        }
        else {
            $('.navbar .navbar-default a').off('click');
        }
    }

    close_toggle();
    $(window).resize(close_toggle);


//Newsletter
// Checking subcribe form when focus event
    $('.assan-newsletter input[type="text"], .assan-newsletter input[type="email"]').live('focus keypress', function () {
        var $email = $(this);
        if ($email.hasClass('error')) {
            $email.val('').removeClass('error');
        }
        if ($email.hasClass('success')) {
            $email.val('').removeClass('success');
        }
    });
    // Subscribe form when submit to database
    $('.assan-newsletter').submit(function () {
        var $email = $(this).find('input[name="email"]');
        var $submit = $(this).find('input[name="submit"]');
        var email_pattern = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
        if (email_pattern.test($email.val()) === false) {
            $email.val('Please enter a valid email address!').addClass('error');
        } else {
            var submitData = $(this).serialize();
            $email.attr('disabled', 'disabled');
            $submit.attr('disabled', 'disabled');
            $.ajax({// Subcribe process with AJAX
                type: 'POST',
                url: 'mailchimp/process-subscribe.php',
                data: submitData + '&action=add',
                dataType: 'html',
                success: function (msg) {
                    if (parseInt(msg, 0) !== 0) {
                        var msg_split = msg.split('|');
                        if (msg_split[0] === 'success') {
                            $submit.removeAttr('disabled');
                            $email.removeAttr('disabled').val(msg_split[1]).addClass('success');
                        } else {
                            $submit.removeAttr('disabled');
                            $email.removeAttr('disabled').val(msg_split[1]).addClass('error');
                        }
                    }
                }
            });
        }

        return false;
    });


    //wow animations
    var wow = new WOW(
        {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 100, // distance to the element when triggering the animation (default is 0)
            mobile: false        // trigger animations on mobile devices (true is default)
        }
    );
    wow.init();

    var letterNo = 1;
    function checkTitle() {
        var isAll = true;
        for (var i = 0; i < $(".togbox1").length; i ++) {
            if (!$($(".togbox1")[i]).hasClass('on')) {
                isAll = false;
            }
        }
        if (isAll) {
            $('.before-click').addClass('disappear');
        }
    }

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

    function resetLetter() {
        if (letterNo == 1) {
            $('#letter-paper').removeClass('show');
            $('#letter-paper').addClass('disappear');
        } else {
            $('#letter-paper').removeClass('disappear');
            $('#letter-paper').addClass('show');
        }
        $('.letter').each(function() {
            if ($(this).attr('id') != 'letter' + letterNo) {
                $(this).removeClass('show');
                $(this).addClass('disappear');
            } else {
                $(this).removeClass('disappear');
                $(this).addClass('show');
            }
        });

    }

    $('.left-arrow').on('click', function() {
        letterNo --;
        if (letterNo == 0) letterNo = 5;
        resetLetter();
    });

    $('.right-arrow').on('click', function() {
        letterNo ++;
        if (letterNo > 5) letterNo = 1;
        resetLetter();
    });

    $(".togbox1").on("click",function(){$(this).toggleClass("on"); checkTitle(); return false;});
    $('#smsOpened').on('click', function() {
        $('.footer-title').addClass('disappear');
        $(this).addClass('show');
        resetLetter();
        setTimeout(function() {
            var $this = $('#countUp'),
                countTo = $this.attr('data-count');
            $({countNum: $this.text()}).animate({countNum: countTo},{duration: 1000,easing: 'swing',step: function() {$this.text(commaSeparateNumber(Math.floor(this.countNum)));},complete: function() {$this.text(commaSeparateNumber(this.countNum));}});
        }, 400)
    });


    $("#qnaBtn").on("click",function(e){
        e.preventDefault();
        if(!$("#name").val()){
            alert("이름을 입력해주세요.");
            $("#name").focus();
            return false;
        }
        if(!$("#sido").val()){
            alert("시/도를 입력해주세요.");
            $("#sido").focus();
            return false;
        }
        if(!$("#school").val()){
            alert("학교명을 입력해주세요.");
            $("#school").focus();
            return false;
        }
        if(!$("#class").val()){
            alert("학교명을 입력해주세요.");
            $("#class").focus();
            return false;
        }
        if(!$("#unit").val()){
            alert("학교명을 입력해주세요.");
            $("#unit").focus();
            return false;
        }
        if(!$("#hp2").val()){
            alert("연락처를 입력해주세요.");
            $("#hp2").focus();
            return false;
        }
        if(!$("#hp3").val()){
            alert("연락처를 입력해주세요.");
            $("#hp3").focus();
            return false;
        }
        $.ajax({
            url: "/api/request",
            type : "post",
            data : {
                name : $("#name").val(),
                school : $("#school").val(),
                class: $("#class").val(),
                unit: $("#unit").val(),
                sido : $("#sido").val(),
                tel : $("#hp1").val()+$("#hp2").val()+$("#hp3").val()
            },
            success: function(data){
                if(data.result == "SUCCESS"){
                    alert("신청이 등록되었습니다.");
                    $(".closeModal").trigger("click");
                    $("#regForm")[0].reset();
                }else{
                    console.log("fail",data);
                    alert("이미 신청되었습니다.");
                }
            },
            error : function(e) {
                console.log("e",e);
                alert("이미 신청되었습니다.");
            }
        }); //
    });
});