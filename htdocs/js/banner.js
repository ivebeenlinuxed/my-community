var items;
items = new Array();
for (i=0; i<50; i++) {
	item = new Object();
	item.img = "/images/test.jpg";
	item.title = "Test title "+i;
	item.content = "This is some test content "+i;
	items[i] = item;
}


BCSBanner = function(el) {
	this.imgStackLength = 5;
	this.minSize = 50;
	this.vpSize = 5;
	this.border = 30;
	this.timeout = null;
	this.timeoutLength = 10000;
	
	this.el = $(el);
	this.items = null;
	this.width = this.el.innerWidth()-this.border;
	this.height = this.el.innerHeight()-this.border;
	
	this.imgStack = new Array();
	
	
	
	this.Setup = function(items) {
		this.items = items;
		for (i=0; i<this.items.length; i++) {
			items[i] = this.setupItem(items[i]);
		}
		this.Prod();
	}
	
	this.setupItem = function(itm) {
		img = $("<img src='"+itm.img+"' />");
		itm._element = img;
		itm._rendered = false;
		return itm;
	}
	
	this.Prod = function() {
		this.doRender();
		this.Rotate(1);
		this.timeout = setTimeout(function(obj) {obj.Prod();}, this.timeoutLength, this);
	}
	
	this.interruptRotate = function(n) {
		this.Rotate(n);
		if (this.timeout) {
			clearTimeout(this.timeout);
		}
		this.doRender();
		this.timeout = setTimeout(function(obj) {obj.Prod();}, 5000, this);
	}
	
	this.doRender = function() {
		for (i=0; i<this.items.length; i++) {
			item = this.items[i];
			if (i<this.imgStackLength) {
				if (!item._rendered) {
					item._element.stop().css("opacity", 0);
					item._element.css("width", this.vpSize);
					item._element.css("height", this.vpSize);
					item._element.css("position", "absolute");
					item._element.css("margin-top", (this.height/2)-(this.vpSize/2));
					item._element.css("margin-left", this.width-this.vpSize);
					
					item._element.css("border-radius", "10px");
					
					
					this.el.append(item._element);
				}
				
				size = this.height/this.imgStackLength*(this.imgStackLength-i);
				yPos = (this.height/2)-(size/2)+(this.border/2);
				xPos = (this.width/this.imgStackLength*i)+(this.border/2);
				zPos = 100-i;
				aPos = (1/this.imgStackLength)*(this.imgStackLength-i);
				item._element.stop().animate({
					"opacity": aPos,
					"width": size,
					"height": size,
					"margin-top": yPos,
					"margin-left": xPos
				}, 3000, "easeOutBack");
				item._element.css("z-index", zPos);
				item._rendered = true;
			} else {
				if (item._rendered) {
					item._element.stop().animate({
						"opacity": 0
					}, 300, function() {
						$(this).detach();
					});
					item._rendered = false;
				}
			}
		}
		
		
		text = "<h2>"+this.items[0].title+"</h2><div class='content'>"+this.items[0].content+"</div><div class='footer'>"+this.items[0].footer+"</div>";
		$("#rotator_overlay").stop().animate({"opacity": 0}, 1000, function() {
			$(this).html(text).css("padding-top", 20).css("height", 175).css("z-index", 200).animate({
				"padding-top": 5,
				"opacity": 1,
				"height": 190
			}, 1000);
		});
	}
	
	this.Rotate = function(n) {
		while (n<0) {
			n += this.items.length;
		}
		
		while (n>this.items.length) {
			n -= this.items.length;
		}
		
		stackA = new Array();
		stackB = new Array();
		for (i=0; i<this.items.length; i++) {
			if (i<n) {
				stackA.push(this.items[i]);
			} else {
				stackB.push(this.items[i]);
			}
		}
		
		while (stackA.length > 0) {
			stackB.push(stackA[0]);
			stackA = stackA.slice(1);
		}
		this.items = stackB;
		stackA = null;
		stackB = null;
	}
	
	
	
	this.beginAnimate = function() {
		
	}
}

var bnr;
$(document).ready(function() {
	bnr = new BCSBanner("#rotator");
	$.ajax(banner_data, {
		dataType: "json",
		success: function(d) {
			this.Setup(d);
		},
		context: bnr
	})
	bnr.Setup();
});