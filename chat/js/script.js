	$(document).ready(function() {
	    loadChat();
	    loadusers();
	    setInterval(function() {
	        loadChat(); // this will run after every 5 seconds
	        loadusers();
	    }, 1000);

	    $('#action_menu_btn').click(function() {
	        $('.action_menu').toggle();
	    });

	    function loadChat() {
	        $.post('loadmessage.php?action=sendMessage&id=' + id, function(response) {
	            var pos = $('.msg_card_body').scrollTop();
	            $(".msg_card_body").html(response);
	            $('.msg_card_body').scrollTop($('.msg_card_body')[pos].scrollHeight);
	        });
	    }

	    function loadusers() {
	        $.post('users.php?action=sendMessage&id=' + roomid, function(response) {
	            $(".contacts").html(response);
	        });
	    }

	    $('.type_msg').keyup(function(e) {
	        if (e.which == 13) {
	            $('form').submit();
	        }
	    });

	    $('.send_btn').click(function() {
	        $('form').submit();
	    });

	    $('form').submit(function() {
	        var message = $('.type_msg').val();
	        $.post('message.php?action=sendMessage&id=' + id + "&user=" + user + '&message=' + message, function(response) {
	            var large = "<div class='d-flex justify-content-end mb-4'><div class='msg_cotainer_send'><p>" + message + "</p></div><div class='img_cont_msg'><img src='https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg' class='rounded-circle user_img_msg'></div></div>";
	            $(".msg_card_body").append(large);
	            $('.msg_card_body').scrollTop($('.msg_card_body')[0].scrollHeight);
	            $('.type_msg').val('');
	        });

	        return false;
	    });
	});