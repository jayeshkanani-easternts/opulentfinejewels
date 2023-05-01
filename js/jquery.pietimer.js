/**
 * jQuery PieTimer Plugin v0.1
 * Authors: Kus (http://blakek.us/css3-pie-graph-timer-with-jquery/)
 *          Connor Doyle (jQuery plugin)
 *
 * http://github.com/chikamichi/jquery.pietimer
 *
 * Licensed under the MIT licenses:
 * http://www.opensource.org/licenses/mit-license.php
 */
(function($){
	var percentGT50 = true;
  var methods = {
    init: function(options) {
      var state = {
        timer: null,
        timerSeconds: 10,
        callback: function() {},
        timerCurrent: 0,        
        fill: false,
        color: '#CCC'
      };

      state = $.extend(state, options);

      return this.each(function() {
        var $this = $(this);
        var data = $this.data('pietimer');
        if (!data) {
          $this.addClass('pietimer');
          $this.css({fontSize: $this.width()});
          $this.data('pietimer', state);          
          if (state.fill) {
            $this.addClass('fill');
          }
          $this.pietimer('start');
        }
      });
    },

    stopWatch: function() {
      var data = $(this).data('pietimer');
      if (data) {
        var seconds = (data.timerFinish-(new Date().getTime()))/1000;
        if (seconds <= 0) {
          clearInterval(data.timer);
          $(this).pietimer('drawTimer', 100);
          data.callback();
        } else {
          var percent = 100-((seconds/(data.timerSeconds))*100);
          $(this).pietimer('drawTimer', percent);
        }
      }
    },

    drawTimer: function(percent) {
      $this = $(this);
      var data = $this.data('pietimer');
	  
      if (data) {		  
		  if( percent > 50 && percentGT50){
			  $('div.slice').addClass('gt50');			  
			  $('div.pie').after('<div class="pie fill"></div>');		
			  percentGT50 = false;			  
		  }
		  
        var deg = 360/100*percent;
        $this.find('.slice .pie').css({
          '-moz-transform':'rotate('+deg+'deg)',
          '-webkit-transform':'rotate('+deg+'deg)',
          '-o-transform':'rotate('+deg+'deg)',
          'transform':'rotate('+deg+'deg)'
        });
           
        if ($this.hasClass('fill')) {
          $this.find('.slice .pie').css({backgroundColor: data.color});
        }
        else {
          $this.find('.slice .pie').css({borderColor: data.color});
        }
      }
    },
    
    start: function() {
      var data = $(this).data('pietimer');
	  percentGT50 = true;
      if (data) {
        data.timerFinish = new Date().getTime()+(data.timerSeconds*1000);
        $(this).pietimer('drawTimer', 0);
        data.timer = setInterval("$this.pietimer('stopWatch')", 50);
      }
    },

    reset: function() {
      var data = $(this).data('pietimer');
      if (data) {
        clearInterval(data.timer);
        $(this).pietimer('drawTimer', 0);
		$('div.slice').removeClass('gt50');
	    $('div.fill').remove();
      }	  
    }
  };

  $.fn.pietimer = function(method) {
    if (methods[method]) {
      return methods[method].apply( this, Array.prototype.slice.call(arguments, 1));
    } else if (typeof method === 'object' || !method) {
      return methods.init.apply(this, arguments);
    } else {
      $.error('Method ' +  method + ' does not exist on jQuery.pietimer');
    }
  };
})(jQuery);
