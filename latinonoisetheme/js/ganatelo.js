(function($){
	$(document).ready(function(){
		var users = [],
		user_ids = [],
		shuffled = [],
		loadout = $("#loadout"),
		insert_times = 30,
		duration_time = 10000;
		$("#roll").click(function(){
			users = [];
			var lines = $('#registrants').val();
			lines = $.parseJSON(lines);
			if(lines.length < 2){
				$("#msgbox").slideToggle(100);
				setTimeout(function() {
					  $("#msgbox").slideToggle(100);
				}, 3000);
				return false;
			}
			for(var i = 0;i < lines.length;i++){
				user_ids.push(lines[i][0]);
				users.push(lines[i][1]);
			}
			$("#roll").attr("disabled",true);
			var scrollsize = 0,
			diff = 0;
			$(loadout).html("");
			$("#log").html("");
			loadout.css("left","100%");
			if(users.length < 10){
				insert_times = 20;
				duration_time = 5000;
			}else{
				insert_times = 10;
				duration_time = 10000;
			}
			for(var times = 0; times < insert_times;times++){
				for(var i = 0;i < users.length;i++){
					loadout.append('<td data-id="'+user_ids[i]+'"><div class="roller"><div>'+users[i]+'</div></div></td>');
					scrollsize = scrollsize + 192;
				}
			}
			
			
			diff = Math.round(scrollsize /2);
			diff = randomEx(diff - 300,diff + 300);
			$( "#loadout" ).animate({
				left: "-="+diff
			},  duration_time, function() {
				$("#roll").attr("disabled",false);
				$('#loadout').children('td').each(function () {
					var center = $('.line')[0].getBoundingClientRect().left
					if($(this)[0].getBoundingClientRect().left < center && $(this)[0].getBoundingClientRect().left + 185 > center){
						console.log($('.line')[0].getBoundingClientRect().left);
						console.log($(this)[0].getBoundingClientRect().left);
						console.log($(this)[0].getBoundingClientRect().left + 185);
						console.log($(this).prev()[0].getBoundingClientRect().left);
						console.log($(this).prev()[0].getBoundingClientRect().left + 185);
						var text = $(this).children().text();
						var id = $(this).attr('data-id');

						jQuery.ajax({
				            type: "POST",
				            url: the_ajax_script.ajaxurl,
				            data: {'id': id, 'action': 'ganatelo_winner_ajax'},
				            success: function (data) {
				            },
				            error: function (jqXHR, textStatus, errorThrown) {
				                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				            }
			        	});

						$("#log").append("THE WINNER IS<br/> <span class=\"badge\">"+text+"</span>");
					}
					
				});
			});
		});
		Array.prototype.shuffle = function(){
			var counter = this.length, temp, index;
			while (counter > 0) {
				index = (Math.random() * counter--) | 0;
				temp = this[counter];
				this[counter] = this[index];
				this[index] = temp;
			}
		}
		function randomEx(min,max)
		{
			return Math.floor(Math.random()*(max-min+1)+min);
		}
	});

})(jQuery);