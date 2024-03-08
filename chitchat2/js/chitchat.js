// EMOTICONS TABS
var btn1_open = false; //tuzki
var btn2_open = false; //onion
var btn3_open = false; //smileys
$("#trigger-tuzki").click(function (e) {
  e.preventDefault();
  NProgress.start();
  if (btn2_open == true) {
    $("#emoticons").slideUp();
    $("#trigger-onion").removeClass("active");
    btn2_open = false;
    $("#emoticons").html('<div class="loader"></div>').fadeIn();
    $.ajax({
      url: "inc/emoticons_tuzki.php",
      success: function (e) {
        $("#emoticons").html(e).slideDown();
        $("#trigger-tuzki").addClass("active");
        btn1_open = true;
        reloadJS();
        NProgress.done();
      }
    })
  } else if (btn3_open == true) {
    $("#emoticons").slideUp();
    $("#trigger-smileys").removeClass("active");
    btn3_open = false;
    $("#emoticons").html('<div class="loader"></div>').fadeIn();
    $.ajax({
      url: "inc/emoticons_tuzki.php",
      success: function (e) {
        $("#emoticons").html(e).slideDown();
        $("#trigger-tuzki").addClass("active");
        btn1_open = true;
        reloadJS();
        NProgress.done();
      }
    })
  } else {
    if (btn1_open == false) {
      $("#emoticons").html('<div class="loader"></div>').fadeIn();
      $.ajax({
        url: "inc/emoticons_tuzki.php",
        success: function (e) {
          $("#emoticons").html(e).slideDown();
          $("#trigger-tuzki").addClass("active");
          btn1_open = true;
          reloadJS();
          NProgress.done();
        }
      })
    } else {
      $("#emoticons").slideUp();
      $("#trigger-tuzki").removeClass("active");
      btn1_open = false;
      NProgress.done();
    }
  }
});
$("#trigger-onion").click(function (e) {
  e.preventDefault();
  NProgress.start();
  if (btn1_open == true) {
    $("#emoticons").slideUp();
    $("#trigger-tuzki").removeClass("active");
    btn1_open = false;
    $("#emoticons").html('<div class="loader"></div>').fadeIn();
    $.ajax({
      url: "inc/emoticons_onion.php",
      success: function (e) {
        $("#emoticons").html(e).slideDown();
        $("#trigger-onion").addClass("active");
        btn2_open = true;
        reloadJS();
        NProgress.done();
      }
    })
  } else if (btn3_open == true) {
    $("#emoticons").slideUp();
    $("#trigger-smileys").removeClass("active");
    btn3_open = false;
    $("#emoticons").html('<div class="loader"></div>').fadeIn();
    $.ajax({
      url: "inc/emoticons_onion.php",
      success: function (e) {
        $("#emoticons").html(e).slideDown();
        $("#trigger-onion").addClass("active");
        btn2_open = true;
        reloadJS();
        NProgress.done();
      }
    })
  } else {
    if (btn2_open == false) {
      $("#emoticons").html('<div class="loader"></div>').fadeIn();
      $.ajax({
        url: "inc/emoticons_onion.php",
        success: function (e) {
          $("#emoticons").html(e).slideDown();
          $("#trigger-onion").addClass("active");
          btn2_open = true;
          reloadJS();
          NProgress.done();
        }
      })
    } else {
      $("#emoticons").slideUp();
      $("#trigger-onion").removeClass("active");
      btn2_open = false;
      NProgress.done();
    }
  }
});
$("#trigger-smileys").click(function (e) {
  e.preventDefault();
  NProgress.start();
  if (btn1_open == true) {
    $("#emoticons").slideUp();
    $("#trigger-tuzki").removeClass("active");
    btn1_open = false;
    $("#emoticons").html('<div class="loader"></div>').fadeIn();
    $.ajax({
      url: "inc/emoticons_smileys.php",
      success: function (e) {
        $("#emoticons").html(e).slideDown();
        $("#trigger-smileys").addClass("active");
        btn3_open = true;
        reloadJS();
        NProgress.done();
      }
    })
  } else if (btn2_open == true) {
    $("#emoticons").slideUp();
    $("#trigger-onion").removeClass("active");
    btn2_open = false;
    $("#emoticons").html('<div class="loader"></div>').fadeIn();
    $.ajax({
      url: "inc/emoticons_smileys.php",
      success: function (e) {
        $("#emoticons").html(e).slideDown();
        $("#trigger-smileys").addClass("active");
        btn3_open = true;
        reloadJS();
        NProgress.done();
      }
    })
  } else {
    if (btn3_open == false) {
      $("#emoticons").html('<div class="loader"></div>').fadeIn();
      $.ajax({
        url: "inc/emoticons_smileys.php",
        success: function (e) {
          $("#emoticons").html(e).slideDown();
          $("#trigger-smileys").addClass("active");
          btn3_open = true;
          reloadJS();
          NProgress.done();
        }
      })
    } else {
      $("#emoticons").slideUp();
      $("#trigger-smileys").removeClass("active");
      btn3_open = false;
      NProgress.done();
    }
  }
})

// RELOAD REQUIRED JS FOR EMOTICONS
function reloadJS() {
  $('.emoticons img').tooltip();
}

// INSERT EMOTICONS INTO TEXTAREA
function insertEmoticon(str) {
   var TextArea = document.getElementById('msgbox');
   var val = TextArea.value;
   var before = val.substring(0, TextArea.selectionStart);
   var after = val.substring(TextArea.selectionEnd, val.length);
   
   TextArea.value = before + str + after;
   setCursor(TextArea, before.length + str.length);
}

function setCursor(elem, pos) {
   if (elem.setSelectionRange) {
      elem.focus();
      elem.setSelectionRange(pos, pos);
   } else if (elem.createTextRange) {
      var range = elem.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
   }
}

// ENCODE URL
function urlencode(a) {
  a = (a + "").toString();
  return encodeURIComponent(a).replace(/!/g, "%21").replace(/'/g, "%27").replace(/\(/g, "%28").replace(/\)/g, "%29").replace(/\*/g, "%2A").replace(/%20/g, "+")
}

// TOP TOOLTIP + CLEAR TEXTAREA BUTTON
$('#btnClear, #charNum, #trigger-tuzki, #trigger-onion, #trigger-smileys, #chooseTextColor, #userOnline').tooltip();
$("#btnClear").click(function (e) {
  e.preventDefault();
  $('#msgbox').val('');
});

// POST BUTTON FOR CHATMSG
var focus_error = false;
$("#btnPost").click(function (e) {
  e.preventDefault();
  NProgress.start();
  if ($('textarea#msgbox').val().length == 0) {
    $('textarea#msgbox').addClass('focus-error');
    focus_error = true;
    NProgress.done();
  } else {
    $('#msgbox').attr('disabled', 'disabled');
    $('#btnPost').button('loading');
    var chat_hash = $('#chat_hash').val();
    var username = $('#username').val();
    var message = $('#msgbox').val();
    var text_color = current_color;
    var dataString = 'action=add&chat_hash='+urlencode(chat_hash)+'&username='+urlencode(username)+'&message='+urlencode(message)+'&text_color='+urlencode(text_color);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          $('#msgbox').val('');
          $('#charNum').html('<span class="text-default"><i class="fa fa-fw fa-text-width"></i> 500</span>');
          $('#msgbox').autosize();
          chatInitVal = 0;
          //reloadChatBubble();
          getLatestMessage(1);
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 5000);
        }
        $('#btnPost').button('reset');
        NProgress.done();
      }
    });
  }
});

// SELECT TEXT COLOR
var current_color = 'text-default';
function insertColor(color,label) {
  $('#currentColor').removeClass();
  $('#currentColor').addClass(color);
  $('#currentColorText').text(label);
  current_color = color;
  $.cookie('CCTextColor', color);
  $.cookie('CCTextColorLabel', label);
  $('#textColor').modal('hide');
}
if ($.cookie('CCTextColor') != undefined && $.cookie('CCTextColorLabel') != undefined) {
  $('#currentColor').removeClass();
  $('#currentColor').addClass($.cookie('CCTextColor'));
  $('#currentColorText').text($.cookie('CCTextColorLabel'));
  current_color = $.cookie('CCTextColor');
}

// AUTOSIZE TEXTAREA + CHARACTERS COUNTER
$('#msgbox').autosize();   
function countChar(val) {
  var icon = '<i class="fa fa-fw fa-text-width"></i>';
  var len = val.value.length;
  if (focus_error == true && len > 0) {
    $('textarea#msgbox').removeClass('focus-error');
    focus_error = false;
  }
  if (len > 500) {
    val.value = val.value.substring(0, 500);
  } else {
    var remaining = 500 - len;
    if (len == 0) {
      $('#charNum').html('<span class="text-default">'+icon+' '+remaining+'</span>');
    } else if (len > 400 && len <= 470) {
      $('#charNum').html('<span class="text-orange">'+icon+' '+remaining+'</span>');
    } else if (len > 470) {
      $('#charNum').html('<span class="text-red">'+icon+' '+remaining+'</span>');
    } else {
      $('#charNum').html('<span class="text-green">'+icon+' '+remaining+'</span>');
    }
  }
}

// RELOAD CHAT BUBBLE
function reloadChatBubble() {
  NProgress.start();
  var chathash = $('#chat_hash').val();
  var chat_creator = $('#chat_creator').val();
  $('#chitchat').html('<div class="loader"></div>');
  $.ajax({
    type: 'GET', url: 'inc/cc_bubble.php?x='+urlencode(chathash)+'&ccc='+urlencode(chat_creator),
    success: function(data){
      $("#chitchat").html(data).fadeIn();
      NProgress.done();
    }
  });
}
reloadChatBubble();

// REGISTER BUTTON
$("#btnRegister").click(function (e) {
  e.preventDefault();
  NProgress.start();
  var username = $('#username').val();
  var password = $('#password').val();
  var email = $('#email').val();
  var fullname = $('#fullname').val();
  var antispam = $('#antispam').val();
  var xref = $('#btnRegister').data('xref');
  var dataString = 'action=register&username='+urlencode(username)+'&password='+urlencode(password)+'&email='+urlencode(email)+'&fullname='+urlencode(fullname)+'&antispam='+urlencode(antispam);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          NProgress.done();
          window.location.replace('router.php?xref='+xref);
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 10000);
          NProgress.done();
        }
      }
    });
});

// LOGIN BUTTON
$("#btnLogin").click(function (e) {
  e.preventDefault();
  NProgress.start();
  var xref = $('#btnLogin').data('xref');
  var username = $('#username').val();
  var password = $('#password').val();
  var dataString = 'action=login&username='+urlencode(username)+'&password='+urlencode(password);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          NProgress.done();
          window.location.replace('router.php?xref='+xref);
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 10000);
          NProgress.done();
        }
      }
    });
});

// SEND BUTTON FOR FORGOT PASSWORD
$("#btnSend").click(function (e) {
  e.preventDefault();
  NProgress.start();
  var email = $('#email').val();
  var dataString = 'action=forgot_password&email='+urlencode(email);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          NProgress.done();
          window.location.replace('login.php');
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 10000);
          NProgress.done();
        }
      }
    });
});

// DELETE BUTTON FOR DELETE ACCOUNT
$("#btnDelAccount").click(function (e) {
  e.preventDefault();
  NProgress.start();
  var password = $('#password').val();
  var dataString = 'action=delete_account&password='+urlencode(password);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          NProgress.done();
          window.location.replace('router.php');
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 10000);
          NProgress.done();
        }
      }
    });
});

// SAVE CHANGES BUTTON FOR EDIT PROFILE
$("#btnSaveChanges").click(function (e) {
  e.preventDefault();
  NProgress.start();
  var username = $('#username').val();
  var fullname = $('#fullname').val();
  var email = $('#email').val();
  var old_pass = $('#old_password').val();
  var new_pass = $('#new_password').val();
  var new_pass2 = $('#new_password2').val();
  var dataString = 'action=update&username='+urlencode(username)+'&fullname='+urlencode(fullname)+'&email='+urlencode(email)+'&oldpassword='+urlencode(old_pass)+'&newpassword='+urlencode(new_pass)+'&newpassword2='+urlencode(new_pass2);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          $('#announcement').html('<div class="callout callout-success"><h4>Success!</h4><p>Your profile has been updated.</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 5000);
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 10000);
        }
        NProgress.done();
      }
    });
});

// TOOLTIP FOR INPUTS
$('.tip').tooltip({trigger: 'focus'});

$('#newChitChat').on('shown.bs.modal', function () {
  $.ajax({
    type: 'GET', url: 'inc/timehash.php',
    success: function(data){
      $('#chitchathash').val(data);
    }
  });
})

// CREATE CHITCHAT BUTTON
$("#btnCreateCC").click(function (e) {
  e.preventDefault();
  NProgress.start();
  var cchash = $('#chitchathash').val();
  var ccname = $('#chitchatname').val();
  var username = $('#creator').val();
  var dataString = 'action=create_chitchat&hash='+urlencode(cchash)+'&name='+urlencode(ccname)+'&creator='+urlencode(username);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          $('#newChitChat').modal('hide');
          NProgress.done();
          window.location.replace('my_chitchat.php');
        } else {
          $('#ccError').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#ccError').html('').fadeOut(); }, 5000);
          NProgress.done();
        }
      }
    });
});

$("[data-toggle=popover]").popover();
$("[data-toggle=tooltip]").tooltip();

// DELETE CHITCHAT BUTTON
function deleteCC(id,hash) {
  NProgress.start();
  var dataString = 'action=delete_chitchat&id='+id+'&hash='+urlencode(hash);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          $('tr#cc-'+id).remove().fadeOut();
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 5000);
        }
        NProgress.done();
      }
    });
}

// ACTIVE USERS COUNTER (ONLINE USERS) - INDEX.PHP
var justVisit = true;
var docTimeout = 60000;
var sPath = window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/')+1);
$(document).on("idle.idleTimer", function (event, elem, obj) {
  getOnlineUsers('idle');
});
$(document).on("active.idleTimer", function (event, elem, obj, e) {
  getOnlineUsers('active');
});
$(document).idleTimer(docTimeout);
function getOnlineUsers(action) {
  if (sPage == 'cc.php') {
  var username = $('#username').val();
  var chathash = $('#chat_hash').val();
  $.ajax({
    type: 'POST',
    url: 'processing.php',
    data: 'idle='+action+'&username='+urlencode(username)+'&chathash='+urlencode(chathash),
    success: function (data) {
      $('#onlineUsers').text(data);
    }
  });
  }
}
getOnlineUsers('init');

// DELETE BOOKMARKED CHITCHAT BUTTON
function deleteBCC(id,hash) {
  NProgress.start();
  var dataString = 'action=delete_bookmarked_chitchat&hash='+urlencode(hash);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          $('tr#bcc-'+id).remove().fadeOut();
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 5000);
        }
        NProgress.done();
      }
    });
}

// BOOKMARK BUTTON
var bookmark = false;
$("#bookmarkCC").click(function (e) {
  e.preventDefault();
  NProgress.start();
  if (bookmark == false) {
  var chathash = $('#bookmarkCC').data('chitchat');
  var username = $('#bookmarkCC').data('bookmarker');
  var dataString = 'action=bookmark_chitchat&hash='+urlencode(chathash)+'&user='+urlencode(username);
    $.ajax({
      type: 'POST',
      url: 'processing.php',
      data: dataString,
      success: function (html) {
        if (html == 'OK') {
          $('#bookmarkCC').attr('title', 'This ChitChat already in your bookmark list.');
          $('#bookmarkCC').html('<i class="fa fa-fw fa-check-square-o"></i> Bookmark');
          bookmark = true;
        } else {
          $('#announcement').html('<div class="callout callout-danger"><h4>Error!</h4><p>'+html+'</p></div>').fadeIn();
          setTimeout(function () { $('#announcement').html('').fadeOut(); }, 5000);
        }
        NProgress.done();
      }
    });
  }
});

// DISPLAY MODAL -- USERS ONLINE
$("#userOnline").click(function (e) {
  e.preventDefault();
  var cchash = $('#userOnline').data('aulh');
  $.ajax({
    type: 'GET', url: 'inc/usersonline.php?hash='+urlencode(cchash),
    success: function(data){
      $('#aul').html(data);
      $('img.aul-tip').tooltip();
      $('#activeUsersList').modal('show');
    }
  });
});


// CHAT SERVICE
var chatInitVal = 0;
var chatServiceTimer = setInterval(chatService, 1000);
function chatService() {
  var chathash = $('#chat_hash').val();
  $.ajax({
    type: 'GET', url: 'inc/chatservice.php?hash='+urlencode(chathash),
    success: function(data){
      if (chatInitVal == 0) {
        chatInitVal = parseInt(data);
        checkNewMessage();
      }
      if (chatInitVal != 0 && parseInt(data) > chatInitVal) {
        var latest = parseInt(data) - chatInitVal;
        getLatestMessage(latest); // PREPEND DATA
        chatInitVal = parseInt(data);
        //reloadChatBubble();
        newMessage = newMessage + 1;
        checkNewMessage();
      }
    }
  });
}

// PREPEND LATEST MESSAGE
function getLatestMessage(num) {
  if ($('#noChatBubble').length) { $('#noChatBubble').remove(); }
  var chathash = $('#chat_hash').val();
  var chat_creator = $('#chat_creator').val();
  $.ajax({
    type: 'GET', url: 'inc/latest_new_msg.php?x='+urlencode(chathash)+'&ccc='+urlencode(chat_creator)+'&num='+urlencode(num),
    success: function(data){
      $('ul#chatBubble').prepend(data);
      if ($('ul#chatBubble li').size() > 50) { $('ul#chatBubble li:last').remove(); }
      $('#msgbox').removeAttr('disabled');
    }
  });
}

// CHECK NEW MESSAGE && SHOW NO. OF NEW MESSAGE ON TITLE BAR
var newMessage = 0;
function checkNewMessage() {
  if (document.hasFocus()) {
    if (newMessage > 0) { newMessage = 0; document.title = "ChitChat"; }
  } else {
    if (newMessage > 0) { document.title = "("+newMessage+") ChitChat"; }
  }
}


  