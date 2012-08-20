MultiSectionTypeahead = function(el) {
	this.el = $(el);
	this.asyncCaller = "/search.json";
	this.el.get(0).typeahead = this;
	this.dropdown = $("<ul class='typeahead dropdown-menu'></ul>").css("display", "none");
	this.onFocus = function() {
		position = this.el.offset();
		this.dropdown.css("top", this.el.outerHeight()+position.top).css("left", position.left).css("width", this.el.outerWidth()).css("display", "block");
		$("body").append(this.dropdown);
	}
	
	this.el.focus(function() {
		this.typeahead.onFocus();
	});
	
	this.onBlur = function() {
		this.dropdown.remove();
		this.dropdown.css("display", "none");
	}
	this.el.blur(function() {
		setTimeout(function (that) {
			return function() {
				that.typeahead.onBlur();
			}
		}(this), 150);
	});
	
	this.onKeyUp = function() {
		$.ajax({
			url: this.asyncCaller+"?q="+this.el.val(),
			dataType: "json",
			success: function(data) {
				this._Render(data);
			},
			context: this
		});
	}
	this.el.keyup(function() {
		this.typeahead.onKeyUp();
	});
	
	this._Render = function(data) {
		this.dropdown.empty();
		if (data.groups.length > 0) {
			this.dropdown.append("<li class='nav-header'>Groups</li>");
			for (i in data.groups) {
				if (i > 5) {
					break;
				}
				group = data.groups[i];
				this.dropdown.append("<li><a href='/group/"+group.id+"'>"+group.name+"</a></li>");
			}
		}
		
		if (data.events.length > 0) {
			this.dropdown.append("<li class='nav-header'>Events</li>");
			for (i in data.events) {
				if (i > 5) {
					break;
				}
				event = data.events[i];
				this.dropdown.append("<li><a href='/event/"+event.id+"'>"+event.title+"</a></li>");
			}
		}
		
		if (data.venues.length > 0) {
			this.dropdown.append("<li class='nav-header'>Venues</li>");
			for (i in data.venues) {
				if (i > 5) {
					break;
				}
				venue = data.venues[i];
				this.dropdown.append("<li><a href='/venue/"+venue.id+"'>"+venue.name+"</a></li>");
			}
		}
	}
	
	this.doSearch = function() {
		
	}
}